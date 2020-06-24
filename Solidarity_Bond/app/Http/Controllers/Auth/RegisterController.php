<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

    protected $table = "utilisateurs";

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
            'Nom' => ['required', 'string', 'max:40', function($attribute, $value, $fail){
                if(!preg_match('/^['.ValidatorConstants::REGEX_ALPHABET_AVEC_ACCENTS.']{1,40}$/',$value)){ $fail("Ce champ semble incorrect."); }
            }],
            'Prenom' => ['required', 'string', 'max:40', function($attribute, $value, $fail){
                if(!preg_match('/^['.ValidatorConstants::REGEX_ALPHABET_AVEC_ACCENTS.']{1,40}$/',$value)){ $fail("Ce champ semble incorrect."); }
            }],
            'Entreprise' => ['required', 'string', 'max:100'],
            'Mail' => ['required', 'string', 'email', 'max:100', 'unique:utilisateurs'],
            'Telephone' => ['required', 'string', 'max:10', 'regex:/(^(0[1-9])[0-9]{8}$)/'],
            'MotDePasse' => ['required', 'string', 'min:8', 'confirmed'],
            'cgv' => ['accepted']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['ID_Role']=1;
        $data['MotDePasse']=Hash::make($data['MotDePasse']);
        unset($data['password_confirmation']);
        return Utilisateur::create($data);

    }
}
