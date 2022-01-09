<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Session;

class OptionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
 


    public function index(){


        if (Session::has('user')){
            $user = Session::get('user');
        }else{
            $user = Auth::user();
        }




        return view('options', compact('user'));


    }

    public function update(Request $request){


        $additional_msg = false;
        if ($request->input("type") == "password") {
            $validator = Validator::make($request->all(), [
                'current_password' => 'required|passcheck',
                'password' => 'required|min:6|confirmed'
            ]);


            if ($validator->fails()) {
                $save = false;
            } else {
                Auth::user()->password = \Hash::make($request->input("password"));
                $save = Auth::user()->save();
            }
        }elseif ($request->input("type") == "username"){
            $validator = Validator::make($request->all(), [
                'username' => 'required|max:191|unique:users,username,' . Auth::user()->id
            ]);

            $user = [
                'username' => $request->input("username"),
                
                'email' => Auth::user()->email
            ];

            if ($validator->fails()) {
                $save = false;
            }else {
                Auth::user()->username = $user['username'];
                if (Auth::user()->validateUsername()) {
                    $save = Auth::user()->save();
                }else{
                    $save = false;
                    $additional_msg = "Username cannot contain special character or spaces";
                }
            }
        }else {
            $validator = Validator::make($request->all(), [
                
                'email' => 'required|email|max:191|unique:users,email,' . Auth::user()->id
            ]);

            $user = [
                
                'email' => $request->input("email"),
                'private' => $request->input("private"),
            ];

            if ($validator->fails()) {
                $save = false;
            }else {
                
                Auth::user()->email = $user['email'];
                Auth::user()->private = $user['private'];
                $save = Auth::user()->save();
            }
        }
        if ($save){
            $request->session()->flash('alert-success', 'Your settings have been successfully updated!');
        }else{
            $request->session()->flash('alert-danger', ($additional_msg)?$additional_msg:'There was a problem saving your settings!');
        }

        if ($request->input("type") == "password") {
            if ($save){
                return redirect('options');
            }else{
                return redirect('options')
                    ->withErrors($validator);
            }
        }else{
            if ($save){
                return redirect('options');
            }else{
                return redirect('options')
                    ->withErrors($validator)
                    ->with('user', $user);
            }
        }

    }
}