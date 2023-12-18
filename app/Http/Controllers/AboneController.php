<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Abone;

class AboneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboneler = auth()->user()->aboneler;        
        return view('abone/aboneler', compact('aboneler'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id > 0)
        {
            $abone = Abone::whereId($id)->first();
            if (! $abone)
                return redirect()->route('aboneler')->withErrors("Abone Bulunamadı"); 
        }
        else
            $abone = null;
        return view('abone/abone_duzenle', compact('abone','id'));
    }  
    
    public function crud(Request $request, $id)
    {
        $str = "Abone Başarıyla oluşturuldu...";
        if ($id > 0)
        {
            $abone = Abone::find($id) ?? abort(404, 'Abone Bulunamadı');

            if (! $abone)
                return redirect()->route('aboneler')->withErrors("Abone Bulunamadı"); 

            $abone->update($request->except(['_method','_token']));
            $str = $abone->ad." İsimli Abone Başarıyla güncellendi...";
        }
        else
            Abone::create([
                "user_id" => auth()->user()->id,
                "ad" => $request->ad,
                "soyad" => $request->soyad,
                "mail" => $request->mail,
            ]);  
            
        
        return redirect()->route('aboneler')->withSuccess($str); 
    }
    
    public function destroy($id)
    {
        $abone = Abone::find($id) ?? abort(404, 'Abone Bulunamadı');

        if (! $abone)
            return redirect()->route('aboneler')->withErrors("Abone Bulunamadı"); 

        $str = $abone->ad." İsimli Abone Başarıyla silindi...";            
        $abone->delete();
        return redirect()->route('aboneler')->withSuccess($str); 
    }

}
