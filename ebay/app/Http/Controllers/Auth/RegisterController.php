<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'rolebuyer' => ['required_without_all: rolebuyer,roleseller'],
            'roleseller' => ['required_without_all: roleseller,rolebuyer'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create( array $data)
    {
        $roletmp = "";

        if (isset($data['rolebuyer']) && !isset($data['roleseller'])){
            $roletmp = 'buyer' ;
        }
        if (isset($data['roleseller']) && !isset($data['rolebuyer'])){
            $roletmp = 'askseller';
        }
        if (isset($data['roleseller']) && isset($data['rolebuyer'])){
            $roletmp = 'askseller';
        }
/*
        $file=$request->file('file_profil');
        echo $file;
        $path="unnamed.png";
        if(!empty($file)){
            $path=date('YmdHis') ."." .$file->getClientOriginalExtension();
            Storage::put("public/profil/".$path,file_get_contents($file));
            echo " images ajoutées";
        }
        else
            echo "pas d'images";
           
            */
        return User::create([
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role'=>$roletmp,
            'pseudo' => $data['pseudo']
        ]);

        return $user;

    }
}
