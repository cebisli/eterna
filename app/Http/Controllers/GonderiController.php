<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gonderi;
use App\Models\Posta;
use Mail;

class GonderiController extends Controller
{
    public function index()
    {
        $gonderiler = auth()->user()->gonderiler;
        return view('gonderi/gonderiler', compact('gonderiler'));
    }

    public function show($id)
    {
        if ($id > 0)
        {
            $gonderi = Gonderi::whereId($id)->first();
            if (! $gonderi)
                return redirect()->route('gonderiler')->withErrors("Gönderi Bulunamadı");
        }
        else
            $gonderi = null;
        return view('gonderi/gonderi_duzenle', compact('gonderi','id'));
    }


    public function crud(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'aciklama' => 'required|min:10',
        ]);

        $str = "Gönderi Başarıyla oluşturuldu...";
        if ($id <= 0)
        {
            $gonderi = Gonderi::create([
                "user_id" => auth()->user()->id,
                "title" => $request->title,
                "aciklama" => $request->aciklama
            ]);
        }

        $aboneler = auth()->user()->aboneler;
        foreach ($aboneler as $abone)
        {
            Posta::create([
                "user_id" => auth()->user()->id,
                "abone_id" => $abone->id,
                "gonderi_id" => $gonderi->id
            ]);

            $array = [
                'ad'=>$abone->ad,
                'soyad'=>$abone->soyad,
                'mail'=>$abone->mail,
                'title'=>$gonderi->title,
                'aciklama'=>$gonderi->aciklama
            ];

            Mail::send('mail_sablon', $array, function ($message) use ($abone) {
                $message->from($abone->mail, 'Mail gönderme');
                $message->subject("Yeni İleti Eklendi.");
                $message->to($abone->mail);
            });
        }

        return redirect()->route('gonderiler')->withSuccess($str);
    }

    public function destroy($id)
    {
        $gonderi = Gonderi::find($id) ?? abort(404, 'Gönderi Bulunamadı');

        if (! $gonderi)
            return redirect()->route('gonderiler')->withErrors("Gönderi Bulunamadı");

        $str = $gonderi->title." Başlıklı Gönderi Başarıyla silindi...";
        $gonderi->delete();
        return redirect()->route('gonderiler')->withSuccess($str);
    }

}
