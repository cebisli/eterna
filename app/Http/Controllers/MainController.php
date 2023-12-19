<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posta;

class MainController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }

    public function gonderilenPostalar(){
        $postalar = Posta::where('user_id',auth()->user()->id)->with('abone', 'gonderi')->paginate(10);
        return view('postalar', compact('postalar'));
    }

}
