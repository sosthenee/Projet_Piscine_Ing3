<?php

namespace App\Http\Controllers;
use Illuminate\SUpport\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Item;


class AdminController extends Controller
{
    public function get_all_vendeurs()
    {if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='admin')
            {
                return redirect('/login')->with('error','Vous n\'etes pas administrateur. Identifiez vous ou faites une création de compte !');
            }else{
    $users = User::all();
    return view('Admin.ListesVendeurs', compact('users'));}}
    }
   
   
    public function suppVendeur(){
        
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='admin')
            {
                return redirect('/login')->with('error','Vous n\'etes pas administrateur. Identifiez vous ou faites une création de compte !');
            }else{
        $k=request('id');
    User::find($k)->update(['role' => 'buyer']);
     $users = User::all();   
    return view('Admin.ListesVendeurs',compact('users'));
            }}
    }
    
    public function suppressionVendeur(){
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='admin')
            {
                return redirect('/login')->with('error','Vous n\'etes pas administrateur. Identifiez vous ou faites une création de compte !');
            }else{
    $i=request('num');
    User::where('id', '=', $i)->delete();       
    return redirect('/ListesVendeurs');}}
    }
    
    
    public function vendeurEnAttente(){if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='admin')
            {
                return redirect('/')->with('error','Vous n\'etes pas administrateur. Identifiez vous ou faites une création de compte !');
            }else{
    $users = User::all();
        return view('Admin.VendeursAttente', compact('users'));}}
    }
    
    public function VendeurchoixAjouter(Request $request, $user_id){

        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='admin')
            {
                return redirect('/')->with('error','Vous n\'etes pas administrateur. Identifiez vous ou faites une création de compte !');
            }else{
        
        User::find($user_id)->update(['role' => 'seller']);
        return back();}}
    }
    
    public function VendeurchoixRefuser(Request $request, $user_id)
    {
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='admin')
            {
                return redirect('/login')->with('error','Vous n\'etes pas administrateur. Identifiez vous ou faites une création de compte !');
            }else{
    User::find($user_id)->update(['role' => 'buyer']);
    return back();}}
    }
    
    
    public function get_all_items()
    {if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='admin')
            {
                return redirect('/login')->with('error','Vous n\'etes pas administrateur. Identifiez vous ou faites une création de compte !');
            }else{
    $items = Item::all();
    return view('Admin.ListesItems', compact('items'));}}
    }
    
    public function suppItem(){
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='admin')
            {
                return redirect('/login')->with('error','Vous n\'etes pas administrateur. Identifiez vous ou faites une création de compte !');
            }else{
        $k=request('id');
    Item::find($k)->update(['admin_state' => 'disapprove']);
     $items = Item::all();   
    return view('Admin.ListesItems',compact('items'));
        }}}
    
    public function suppressionItem(){
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='admin')
            {
                return redirect('/login')->with('error','Vous n\'etes pas administrateur. Identifiez vous ou faites une création de compte !');
            }else{
    $i=request('num');
    Item::where('id', '=', $i)->delete();       
    return redirect('ListesItems');}}
    }
    

    public function ItemsenAttente(){
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='admin')
            {
                return redirect('/login')->with('error','Vous n\'etes pas administrateur. Identifiez vous ou faites une création de compte !');
            }else{
    $items = Item::all();
        return view('Admin.ItemsChoisir', compact('items'));}}
    }
    
    public function ItemschoixAjouter(Request $request, $item_id)
    {
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='admin')
            {
                return redirect('/login')->with('error','Vous n\'etes pas administrateur. Identifiez vous ou faites une création de compte !');
            }else{
    $item=Item::find($item_id);  
    $item->admin_state = 'approve'; 
    $item->save();
    return back();}}
    }
    
    public function ItemschoixRefuser(Request $request, $item_id)
    {if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='admin')
            {
                return redirect('/login')->with('error','Vous n\'etes pas administrateur. Identifiez vous ou faites une création de compte !');
            }else{
    Item::find($item_id)->update(['admin_state' => 'disapprove']);
    return back();}}
    }
        
}

