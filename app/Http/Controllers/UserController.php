<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function profile(){
        if(!Session::get('user_id'))
        {
            return redirect('login')->with('error', 'Devi prima effettuare il login per accedere al tuo profilo');
        }
        return view('profile');
    }

    public function getUserProfile(){
        $user = User::find(Session::get('user_id'));
        return response()->json($user);
    }
    public function updateUserProfile(Request $request) {
        $user = User::find(Session::get('user_id'));
        
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        
        if ($user->save()) {
            return response()->json(['success' => true, 'user' => $user]);
        } else {
            return response()->json(['success' => false, 'message' => 'Errore durante l\'aggiornamento del profilo.']);
        }
    }
}
