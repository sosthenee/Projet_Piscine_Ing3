<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Item;


class AdminController extends Controller
{
    public function get_all_vendeurs()
    {
    $users = User::all();
    return view('Admin.ListesVendeurs', compact('users'));
    }
   
   
    public function suppVendeur(){
        $k=request('id');
    User::find($k)->update(['role' => 'buyer']);
     $users = User::all();   
    return view('Admin.ListesVendeurs',compact('users'));
    }
    
    public function suppressionVendeur(){
    $i=request('num');
    User::where('id', '=', $i)->delete();       
    return redirect('/ListesVendeurs');
    }
    
    
    public function vendeurEnAttente(){
    $users = User::all();
        return view('Admin.VendeursAttente', compact('users'));
    }
    
    public function VendeurchoixAjouter(Request $request, $user_id)
    {
    User::find($user_id)->update(['role' => 'seller']);
    return back();
    }
    
    public function VendeurchoixRefuser(Request $request, $user_id)
    {
    User::find($user_id)->update(['role' => 'buyer']);
    return back();
    }
    
    
    public function get_all_items()
    {
    $items = Item::all();
    return view('Admin.ListesItems', compact('items'));
    }
    
    public function suppItem(){
        $k=request('id');
    Item::find($k)->update(['admin_state' => 'disapprove']);
     $items = Item::all();   
    return view('Admin.ListesItems',compact('items'));
        }
    
    public function suppressionItem(){
    $i=request('num');
    Item::where('id', '=', $i)->delete();       
    return redirect('ListesItems');
    }
    

    public function ItemsenAttente(){
    $items = Item::all();
        return view('Admin.ItemsChoisir', compact('items'));
    }
    
    public function ItemschoixAjouter(Request $request, $item_id)
    {
    $item=Item::find($item_id);  
    $item->admin_state = 'approve'; 
    $item->save();
    return back();
    }
    
    public function ItemschoixRefuser(Request $request, $item_id)
    {
    Item::find($item_id)->update(['admin_state' => 'disapprove']);
    return back();
    }
        
    }

