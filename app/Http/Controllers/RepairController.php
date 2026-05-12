<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Repair;
use Illuminate\Http\Request;

class RepairController extends BaseController
{
    public function viewrepairs(){
        $superadmin=null;
        
        if(!Session::get('user_id')){
            return redirect('login')->with('error', 'Devi effettuare il login');
        }
        $user = User::find(Session::get('user_id'));
        if($user->role == 'superadmin')
        {
            $superadmin = true;
        }
        return view('repairstatus')->with('user', $user)->with('superadmin', $superadmin);
    }

    public function listRepairs(){
        $superadmin = null;
        if(!Session::get('user_id'))
        {
            return redirect('login')->with('error', 'Devi effettuare il login');
        }
        
        $user = User::find(Session::get('user_id'));
        if($user->role == 'superadmin')
        {
            $repairs = Repair::all();
            $superadmin = true;
        }
        else
        {
            $repairs = Repair::where('user_id', $user->id)->get();
        }
        return response()->json([
            'repairs' => $repairs->toArray(),
            'isSuperadmin' => $superadmin
        ]);
    }

    public function getNameUser($id){
        $user = User::find($id);
        return response()->json($user);  
    }   

    public function removeRepair($id){
        $repair = Repair::find($id);
        $repair->delete();
        return response()->json(['message' => 'Riparazione eliminata']);
    }

    public function addRepair(Request $request) {
        $repair = new Repair();
        $repair->status = $request->input('status');
        $repair->description = $request->input('description');
        $repair->start_date = $request->input('start_date');
        $repair->estimated_completion= $request->input('estimated_completion');
        $repair->user_id = $request->input('user_id');

        if(User::find($repair->user_id) == null)
        {
            return response()->json(['success' => false, 'message' => 'Utente non trovato. Inserire un id_utente valido o effettuare la registrazione di un nuovo utente']);
        }
        
        if($repair->save()){
            return response()->json(['success' => true, 'repair' => $repair]);
        } else {
            return response()->json(['success' => false, 'message' => 'Errore durante l\'inserimento della riparazione']);
        }
        
    }
}
