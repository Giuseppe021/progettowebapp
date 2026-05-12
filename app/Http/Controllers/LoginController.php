<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;

class LoginController extends BaseController
{
    public function login_form(){
        if(Session::get('user_id'))
        {
            $superadmin=null;
            $user= User::find(Session::get('user_id'));
            if($user->role == 'superadmin')
            {
                $superadmin = true;
            }
            return redirect('home')->with('superadmin', $superadmin);
        }
        $error = Session::get('error');
        Session::forget('error');
        return view('login')->with('error', $error);
    }

    public function do_login(){
        
        if(Session::get('user_id'))
        {
            return redirect('home');
        }   
        if(strlen(request('username')) == 0 || strlen(request('password')) == 0 )
        {
            Session::put('error', 'empty_fields');
            return redirect('login')->withInput();
        }  
        $user = User::where('username', request('username'))->first();  
        if(!$user || !password_verify(request('password'), $user->password)){
            Session::put('error', 'wrong_credentials');
            return redirect('login')->withInput();
        }      
        $superadmin=null;
        if($user->role == 'superadmin')
        {
            $superadmin = true;
        }
        
       
        Session::put('user_id', $user->id);
      
        return redirect('home')->with('superadmin', $superadmin);
    }

    public function register_form(){
        $superadmin = null;

        if(Session::get('user_id')) {
            $user = User::find(Session::get('user_id'));
            if ($user && $user->role != 'superadmin') {
                return redirect('home')->with('superadmin', $superadmin);
            } else if ($user && $user->role == 'superadmin') {
                $superadmin = true;
            }
        }

        $error = Session::get('error');
        Session::forget('error');
        return view('register', [
            'superadmin' => $superadmin,
            'error' => $error 
        ]);
    }

    public function do_register(){
        $superadmin = null;
        if(Session::get('user_id')) {
            $user = User::find(Session::get('user_id'));
            if ($user && $user->role != 'superadmin') {
                return redirect('home')->with('superadmin', $superadmin);
            }
        }

        if(Session::get('user_id')) {
            $user = User::find(Session::get('user_id'));
            if ($user && $user->role == 'superadmin') {
                $superadmin = true;
                if(strlen(request('role')) == 0) {
                    Session::put('error', 'empty_fields');
                    return redirect('register')->withInput();
                }
            }
        }

        if(strlen(request('name')) == 0 || strlen(request('surname')) == 0 || strlen(request('email')) == 0 || strlen(request('password')) == 0 || strlen(request('confirm_password')) == 0  || strlen(request('username')) == 0)
        {
            Session::put('error', 'empty_fields');
            return redirect('register')->withInput();
        }    
        else if (request('password') != request('confirm_password'))
        {
            Session::put('error', 'bad_confirm_password');
            return redirect('register')->withInput();
        }
        else if (strlen(request('password')) < 8)
        {
            Session::put('error', 'bad_password');
            return redirect('register')->withInput();
        }
        else if(User::where('username', request('username'))->first())
        {           
            Session::put('error', 'existing');
            return redirect('register')->withInput();  
        }
        else if(User::where('email', request('email'))->first())
        {           
            Session::put('error', 'existing');
            return redirect('register')->withInput();  
        }
        
        $user = new User;
        $user->name = request('name');
        $user->surname = request('surname');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = password_hash(request('password'), PASSWORD_BCRYPT);
        if(Session::get('user_id')) {
            $currentUser = User::find(Session::get('user_id'));
            if ($currentUser && $currentUser->role == 'superadmin') {
                $user->role = request('role');
            } else {
                $user->role = 'user';
            }
        } else {
            $user->role = 'user';
        }
        $user->save();

        if($user->role != 'superadmin')
        {
            Session::put('user_id', $user->id);
        }
        
        
        
        return redirect('home')->with('superadmin', $superadmin);
    }

    public function logout(){
        Session::flush();
        return redirect('home');
    }
}

