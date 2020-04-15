<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;



class AdminController extends Controller
{
    public function get_all_vendeurs()
    {
    $users = User::all();
    return view('Admin.admin', compact('users'));
    }
   
   
    public function suppVendeur(){
    $users = User::all();
        return view('Admin.suppVendeur', compact('users'));
    }
    
    public function suppression(){
    $i=request('num');
    User::where('id', '=', $i)->delete();
        
        return redirect('/admin');
 
    }
}
