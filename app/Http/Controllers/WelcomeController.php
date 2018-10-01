<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI;
use Socialite;
use Session;
use Illuminate\Support\Facades\Auth;
class WelcomeController extends Controller
{
    public function Lanzamientos(Request $request)
    {
    	$user = Session::get('token2');
         
        if($user!=null){
            $api = new SpotifyWebAPI\SpotifyWebAPI();
            $api->setAccessToken($user); 
             $releases = $api->getNewReleases([
                        'country' => 'co',
                    ]);
            
             return view('home')->with('releases', $releases);
         }
         else{
              Auth::logout(); 
            return redirect('/');
         } 	
    }
    public function Artista($id)
    {
        
        $user = Session::get('token2');         
        if($user!=null){
            $api = new SpotifyWebAPI\SpotifyWebAPI();
            $api->setAccessToken($user); 
            $artists = $api->getArtists($id);
            $albums = $api->getArtistAlbums($id);
            $albums->limit=$albums->total;         
             return view('artist/list')->with(['artists'=> $artists, 'albums'=>$albums]);
         }
         else{
              Auth::logout(); 
            return redirect('/');
         }  
    }

}
