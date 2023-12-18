<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gonderi;

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
            Gonderi::create([
                "user_id" => auth()->user()->id,
                "title" => $request->title,
                "aciklama" => $request->aciklama
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

}
