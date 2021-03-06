<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    private static $panier = "panier";

    protected $table = "utilisateurs";

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return "Mail";
    }

    public static function getNomPanier(){
        return self::$panier;
    }

    protected function authenticated(Request $request, $user)
    {
        try {
            $api_token = Http::post(route('api.login'), ['Mail' => $request->Mail, 'password' => $request->password])->object()->access_token;
            session()->put("token", $api_token);
        }catch (\Exception $e){
            $this->logout($request);
        }
    }

    public function logout(Request $request)
    {
        try {
            $user = Auth::user();
            Http::post(route('api.logout'), ['Mail' => $user->Mail, 'password' => $user->MotDePasse, 'token'=>$request->session()->get('token')]);
        }catch (\Exception $e){}

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/');
    }

}
