<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        
        return view('user.register')->with('title','');
    }
    public function register_action(Request   $req){
        $req->validate([
            'username' =>'required',
            'email'    => 'required|unique:users',
            'password' => 'required',
            'confirmPassword'  => 'required|same:password'
           ]);
        $user = new user([
            'username' => $req->username,
            'email'    =>$req->email,
            'password' =>Hash::make($req->password),
            'role'  =>0,
            'account_status'=>0,
            'token'           =>Str::random(60)
        ]);
        $user->save();
        return redirect()->route('login')->with('success','You have registred seccesfully');
    }


    
    public function login(){
      
        return view('user.login')->with('title','');
    }
    public function login_action(Request   $req){
       $req->validate([
        'email' =>'required',
        'password' => 'required',
       ]);
       $credentials = $req->only('email', 'password');

       if (Auth::attempt($credentials, $req->has('remember'))) {
           // Authentication passed...
           return redirect()->intended('/');
       }
       return  redirect()->back()->with('password',"Wrong Password Or E-mail Try Again");
    }
  
    public function change_pass(){
    }
    public function logout(Request $req){
        Auth::logout();
        return redirect('/');
    }
    public function reset_pass(request $req,$token=null){
        return view("user.resetPass",['title'=>'','token'=>$token,'email'=>$req->email]);
    }
    public function reset_pass_action(request $req){
        $req->validate([
            'email'=> 'required|email|exists:users,email',
            'token' => 'required|exists:users,token',
            'password' => 'required|min:5',
            'confirmPassword' =>'required|same:password'
        ]);
      
        User::where('email',$req->email)->update([
            "password"=>Hash::make($req->password),
            "token" => Str::random(60)
        ]);
        return   redirect('/login')->with('success',"You have Changed your password");
        
    }
    public function forget_pass(){
        return view('user.forgetPass')->with('title','');
    }
    public function forget_pass_action(request  $req){
        $req->validate([
            'email'=> 'required|email|exists:users,email'
        ]);
        $token = User::where('email', $req->email)->first()->token;
        $action_link = route('reset.password',['token'=>$token,'email'=>$req->email]);
        $body = "we have sent  to you a reset link to get access to change you pass";
        Mail::send('user.resetMail',['body'=>$body,'action_link'=>$action_link], function ($message) use ($req) {
            $message->from('elaoumarikarim@gmail.com', 'John Doe');
            $message->to($req->email,'user');
            $message->replyTo('elaoumarikarim@gmail.com', 'John Doe');
            $message->subject('reset password');
        });
        return   redirect()->back()->with('success',"Email send sunnccces ");
    }
    public function update_name(request  $req){
        $req->validate([
            'name'=> 'required',
            'password' =>'required'
        ]);
        $user = Auth::user();
        if (!Hash::check($req->input('password'), $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Last password is incorrect'])->withInput();
        }
        User::where('id',$user->id)->update([
            "username"=>$req->name,
        ]);
        return   redirect()->back()->with('success_name',"Name Updated successufuly");


    }
    public function update_password(request  $req){
        $req->validate([
            'last_password' => 'required',
            'new_password' => 'required|min:5|max:14|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,14}$/',
            'conf_password' => 'required|same:new_password'
        ], [
            'last_password.required' => 'Last password is required',
            'new_password.required' => 'Password is required',
            'new_password.min' => 'Password must be at least 5 characters',
            'new_password.max' => 'Password cannot be more than 14 characters',
            'new_password.regex' => 'Password must contain at least one letter and one number',
            'conf_password.required' => 'Confirm password is required',
            'conf_password.same' => 'Password and confirm password must match'
        ]);
        // Get the current user
        $user = Auth::user();
    
        // Check if the last password matches the password stored in the database
        if (!Hash::check($req->input('last_password'), $user->password)) {
            return redirect()->back()->withErrors(['last_password' => 'Last password is incorrect'])->withInput();
        }

        User::where('id',$user->id)->update([
            "password"=>Hash::make($req->new_password),
        ]);
        return   redirect()->back()->with('success_name',"Password Updated successufuly");
         

    }
    public function change_status(request $req){
        $user = User::findOrFail($req->id);
        if($user->role==0){
            $user->role = 1;
        }
        else{
            $user->role=0;
        }
        $user->save();
        return response()->json([ 'status' => 'success']);
    }
}
