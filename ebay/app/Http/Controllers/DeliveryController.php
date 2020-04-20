<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delivery_address;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function AllfromUser(Request $request){
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='buyer'&&$user->role!=='buyerseller')
            {
                return redirect('/')->with('error','Vous n\'etes pas buyer. Identifiez vous ou faites une création de compte !');
            }else{
                $request->user()->authorizeRoles(['buyer','buyerseller']);
                $delivery_addresses = Delivery_address::where('user_id',$user->id)->get();
                return view('adress.adress',compact('delivery_addresses'));
            }
        }
    }

    public function updateView(Request $request, $id){
       
        if(Auth::guest())
        {return redirect('/login')->with('error','Vous n\'etes pas connecté. Identifiez vous ou faites une création de compte !');}
        else{
            $user = Auth::user();
            if($user->role!=='buyer'&&$user->role!=='buyerseller')
            {
                return redirect('/')->with('error','Vous n\'etes pas buyer. Identifiez vous ou faites une création de compte !');
            }else{
                $request->user()->authorizeRoles(['buyer','buyerseller']);
                $delivery_addresses = Delivery_address::where('id',$id)->first();
        
            }
        }
    }

    public function Create(Request $request){

        $request->user()->authorizeRoles(['buyer','buyerseller']);
        $user = Auth::user();

        $address = new Delivery_address();
        $address->firstName = request('firstName');
        $address->lastName = request('lastName');
        $address->phoneNumber =request('phoneNumber');
        $address->number =request('number');
        $address->street =request('street');
        $address->city =request('city');
        $address->postCode =request('postCode');
        $address->country =request('country');
        $address->user()->associate($user);
        $address->save();

        return redirect()->action('DeliveryController@AllfromUser');

    }

    public function delete(Request $request, $adress_id){

        $request->user()->authorizeRoles(['buyer','buyerseller']);
        $user_id = Auth::id();
        $address = Delivery_address::where([
            ['id',$adress_id],
            ['user_id', $user_id]
        ])->delete();
        
        $delivery_addresses = Delivery_address::where('user_id',$user_id)->get();
        return view('adress.adress',compact('delivery_addresses'));
    
    }

    public function update(Request $request ,  $adress_id){

        $request->user()->authorizeRoles(['buyer','buyerseller']);
        $user_id = Auth::id();
        $addresses = Delivery_address::where('id',$adress_id)->first();
        $addresses->firstName = request('firstName');
        $addresses->lastName = request('lastName');
        $addresses->phoneNumber =request('phoneNumber');
        $addresses->number =request('number');
        $addresses->street =request('street');
        $addresses->city =request('city');
        $addresses->postCode =request('postCode');
        $addresses->country =request('country');
        $addresses->save();

        $delivery_addresses = Delivery_address::where('user_id',$user_id)->get();
        return view('adress.adress',compact('delivery_addresses'));
    }
}
