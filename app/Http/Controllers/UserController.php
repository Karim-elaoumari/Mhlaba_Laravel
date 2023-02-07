<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            'account_status'  =>0,
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
       $remember = $req->has('remember');
       if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
        $req->session()->regenerate();
        if($remember)   Auth::login(Auth::user());
        return redirect()->intended('/');
       }
       return  redirect()->back()->with('password',"Wrong Password Or E-mail Try Again");
    }
  
    public function change_pass(){
    }
    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
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
        \Mail::send('user.resetMail',['body'=>$body,'action_link'=>$action_link], function ($message) use ($req) {
            $message->from('elaoumarikarim@gmail.com', 'John Doe');
            $message->to($req->email,'user');
            $message->replyTo('elaoumarikarim@gmail.com', 'John Doe');
            $message->subject('reset password');
        });
        return   redirect()->back()->with('success',"Email send sunnccces ");
    }
}
