<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Product;
class HomeController extends BaseController
{
    public function home(){
        $user = User::find(Session::get('user_id'));
        if($user && $user->role == 'superadmin')
        {
            return view('home')->with('superadmin', true);
        }
        return view('home')->with('superadmin', false);  
    }
    public function listPopularProducts(){

        $products = Product::limit(10)->get();
        return response()->json($products);
    }

    public function product($id){
        if(!Session::get('user_id'))
        {
            return redirect('login')->with('error', 'Devi prima effettuare il login per visualizzare i dettagli del prodotto');
        }
        $product = Product::find($id);
        if (!$product) {
            
            abort(404, 'Product not found');
        }
        return view('product')->with('product', $product);
    }

    public function allProducts(){
        return view('allproducts');
    }
    
    public function getAllProducts(){
        $products = Product::all();
        return response()->json($products);
    }
    
    public function search($search)
    {
       
        
        
        $client_id = env('SPOTIFY_CLIENT_ID');
        $client_secret = env('SPOTIFY_CLIENT_SECRET');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $headers = array("Authorization: Basic ".base64_encode($client_id.":".$client_secret));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $token = json_decode($result)->access_token;
        
        $data = http_build_query(array("q" => $search, "type" => "track"));
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.spotify.com/v1/search?".$data);
        $headers = array("Authorization: Bearer ".$token);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $songs = json_decode($result)->tracks->items;
        for($i=0; $i<min([count($songs), 20]); $i++)
        {
            $songs[$i] = ['artist' => $songs[$i]->artists[0]->name,
                            'title' => $songs[$i]->name,
                            'image' => $songs[$i]->album->images[0]->url
                            ];
        }
        return $songs;
    }
}
