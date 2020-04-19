<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use Storage;

class UserController extends Controller
{
    //
    function my_account(Request $request){
        $user = Auth::user();
        return view('myAccount.myAccount',compact('user'));
    }

    function index(Request $request){
        $user = Auth::user();
        return view('myAccount.myInfos',compact('user'));
    }

    function edit_myinfos(Request $request){
        $user = Auth::user();
        return view('myAccount.myInfosEdit',compact('user'));
    }

    function modif_myinfos (Request $request){
        $user = Auth::user();
        $user->update(['username' => request('user_username')]);
        $user->update(['firstname' => request('user_firstname')]);
        $user->update(['lastname' => request('user_lastname')]);
        $user->update(['email' => request('user_email')]);
        if($user->role!='buyer')
        {
            $user->update(['pseudo' => request('user_pseudo')]);
        }
        
        
        if($file = $request->file('file_profil')){
            $path=date('YmdHis') ."0." .$file->getClientOriginalExtension();
            Storage::put("public/profil/".$path,file_get_contents($file));
            echo " image ajoutée";
            $user->update(['email' => "profil/".$path]);
        }
        else
        echo "pas d'images";
        if($file = $request->file('file_backgroud')){
            $path=date('YmdHis') ."1." .$file->getClientOriginalExtension();
            Storage::put("public/profil/".$path,file_get_contents($file));
            echo " back image ajoutée";
            $user->update(['email' => "profil/".$path]);
        }
        else
            echo "pas d'images";
    
        return view('myAccount.myAccount',compact('user'));
    }
}
