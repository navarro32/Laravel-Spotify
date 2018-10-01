<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use SpotifyWebAPI;
use Session;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/Lanzamientos';

    /**
     * Create a new controller instance.
     *
     * @return void
     */    
        public function redirectToProviderSpotify()
        {
           
            if (Auth::check() or Session::get('token2')!=null) { 
                Session::forget('token2');
                Session::flush();               
                Auth::logout(); 
                 return redirect('/');
            }else{
              return Socialite::driver('spotify')->redirect();  
            }
                      
            
        }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
  
     public function handleProviderCallbackSpotify()
        {
           
                $user = Socialite::driver('spotify')->user();           
                $session = new SpotifyWebAPI\ Session(
                env('SPOTIFY_KEY'),
                env('SPOTIFY_SECRET'),
                env('SPOTIFY_REDIRECT_URI')
                 );
                $api = new SpotifyWebAPI\SpotifyWebAPI();          

               if (isset($user->token)) {
                //se debe convertir la variable $accessToken a public ubicada en vendor\jwilsson\spotify-web-api-php\src\Session.php
                $session->accessToken=$user->token;          
                // $conect=$session->requestAccessToken($user->token);            
                $api->setAccessToken($session->getAccessToken());          
                Session::put('token2', $user->token);
                 return redirect()->action('WelcomeController@Lanzamientos');

                 
            }
           
        }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
