<?php

namespace App\Http\Controllers;
use App\Payment_info ;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function readPaymentInfofromUser(Request $request, $user_id){
 
        $payement_infos = Payment_info::where('user_id',$user_id)->get();
        return view('payment_info.payment_info',compact('payement_infos'));
    }

    public function readPaymentInfofromId(Request $request, $id){
 
        $payement_infos = Payment_info::where('id',$id)->get();
        return view('payment_info.payment_info',compact('payement_infos'));
    }

    public function newPaymentInfo(Request $request){


        $payement_info = new Payment_info();
        $payement_info->cardType = request('cardType');
        $payement_info->cardNumber = request('cardNumber');
        $payement_info->cardName =request('cardName');
        $payement_info->expirationDate =request('expirationDate');
        $payement_info->securityCode =request('securityCode');

        $payement_info->save();


    }

    public function deletePaymentInfo(){

        $payement_infos = Payment_info::all();
        $payement_infos->softDeletes();

    }

    public function updatePaymentInfo(){



    }
    


}