<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

class CartController extends BaseController
{
    public $timestamps = false;

    public function addtocart($product_id)
    {
        $user = User::find(Session::get('user_id'));
    
        if (!$user) {
            return response()->json(['success' => false, 'error' => 'Utente non trovato'], 404);
        }
    
        $product = Product::find($product_id);
    
        if (!$product) {
            return response()->json(['success' => false, 'error' => 'Prodotto non trovato'], 404);
        }
    
        // Verifica se il prodotto è già nel carrello dell'utente
        $cartItem = Cart::where('user_id', $user->id)->where('product_id', $product_id)->first();
    
        if ($cartItem) {
            // Incrementa la quantità se il prodotto è già nel carrello
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Aggiungi il prodotto al carrello dell'utente
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->product_id = $product_id;
            $cart->quantity = 1;
            $cart->save();
        }
    
        return response()->json(['success' => true]);
    }   

    public function viewcart()
    {
        if(!Session::get('user_id')){
            return redirect('login')->with('error', 'Devi effettuare il login');
        }
        return view('cart');
    }

    public function getcartdata()
    {
        if(!Session::get('user_id')){
            return redirect('login')->with('error', 'Devi effettuare il login');
        }
        $user = User::find(Session::get('user_id'));

        if (!$user) {
            return response()->json(['success' => false, 'error' => 'Utente non trovato'], 404);
        }

        // Recupera il carrello dell'utente
        $cartItems = $user->cart()->with('product')->get();

        // Prepara i dati dei prodotti da passare alla vista
        $products = [];
        foreach ($cartItems as $item) {
            $products[] = [
                'idcart' => $item->id,
                'name' => $item->product->name,
                'image_url' => $item->product->image_url,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'product_id' => $item->product->id,  
            ];
        }

        return response()->json(['success' => true, 'products' => $products]);
    }

    public function removefromcart($product_id)
    {
        if (!Session::get('user_id')) {
            return redirect('login')->with('error', 'Devi effettuare il login');
        }

        $user = User::find(Session::get('user_id'));

        if (!$user) {
            return response()->json(['success' => false, 'error' => 'Utente non trovato'], 404);
        }

        // Recupera l'elemento del carrello
        $cartItem = Cart::where('user_id', $user->id)->where('product_id', $product_id)->first();

        if (!$cartItem) {
            return response()->json(['success' => false, 'error' => 'Prodotto non trovato nel carrello'], 404);
        }

        // Riduce la quantità del prodotto nel carrello
        $cartItem->quantity -= 1;

        if ($cartItem->quantity <= 0) {
            // Se la quantità è 0 o minore, rimuovi l'elemento dal carrello
            $cartItem->delete();
        } else {
            // Altrimenti, salva l'aggiornamento della quantità
            $cartItem->save();
        }

        return response()->json(['success' => true]);
    }






   
}
