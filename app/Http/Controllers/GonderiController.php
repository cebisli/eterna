<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gonderi;
use App\Models\Posta;

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
        $str = "Gönderi Başarıyla oluşturuldu...";
        if ($id <= 0)
        {
            $gonderi = Gonderi::create([
                "user_id" => auth()->user()->id,
                "title" => $request->title,
                "aciklama" => $request->aciklama
            ]); 
        }
        
        $userId = auth()->user()->id;
        $aboneler = auth()->user()->aboneler;
        foreach ($aboneler as $abone)
        {
            Posta::create([
                "user_id" => auth()->user()->id,
                "abone_id" => $abone->id,
                "gonderi_id" => $gonderi->id
            ]);
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

    function MailGonder()
    {
        mail::send('mail_sablon', $array, function ($message) use ($kisi) {
            $message->from($kisi->mail, 'Mail gönderme');
            $message->subject("Yeni İleti Eklendi.");
            $message->to($kisi->mail);
        });
    }

}
