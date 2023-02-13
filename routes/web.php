<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlatController;

use Illuminate\Support\Facades\Route;
use App\Models\Plat;
use App\Models\User;
use App\Models\Categorie;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])->group(function (){
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
    Route::get('user/profile', function (){
    return view('user.profile',[
        'categories' =>Categorie::all(),
        'count_plats' =>Plat::with('categorie')->where('user_id',Auth::user()->id)->count() 
        ])->with('title','home');
    })->name("user.profile");
     Route::post('/update_name',[UserController::class,'update_name'])->name('update_name');
     Route::post('/update_password',[UserController::class,'update_password'])->name('update_pass');
});


Route::middleware(['isAdmin'])->group(function () {
    Route::get('admin/dashboard', function (){
        return view('admin.dashboard',[
            'users'=>User::where('role', '!=', 2)->latest()->paginate(6),
            'categories' =>Categorie::all(),
            ])->with('title','home'); 
    })->name('admin.dash');
    Route::post('users', [UserController::class, 'change_status'])->name('change_status');
});




Route::middleware(['isPublisher'])->group(function () {
    Route::get('publisher/store', function (){
         if(Auth::user()->role==2)  {
         $comand = Plat::with('categorie','user')->latest()->paginate(6);
         }
         else{
            $comand =  Plat::with('categorie')->where('user_id',Auth::user()->id)->latest()->paginate(6);
         }
         return view('publisher.store',[
        'plats'=> $comand,
        'count_plats' =>Plat::with('categorie')->where('user_id',Auth::user()->id)->count(), 
        'categories' =>Categorie::all()
        ])->with('title','home'); })->name('store');
    Route::resource('Plat', PlatController::class);
});


Route::get('/', function (){
    return view('pages.home',[
        'plats' => Plat::latest()->take(15)->get()
       
    ])->with('title','home');
 })->name("home");
 Route::get('/plats', function (){
    return view('pages.plats',[
        'plats' => Plat::with('categorie','user')->latest()->paginate(8)
    ])->with('title','home');
 })->name("plats");


 Route::get('plat/{slug}', function ($slug){
    return view('pages.plat',[
        'plat' => Plat::where('slug', $slug)->firstOrFail()
    ])->with('title','home');
 })->name("single_plat");



Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('register',[UserController::class,'register_action'])->name('register.action');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('login',[UserController::class,'login_action'])->name('login.action');
Route::get('reset-pass/{token}',[UserController::class,'reset_pass'])->name('reset.password');
Route::post('reset-pass-action',[UserController::class,'reset_pass_action'])->name('reset.password.action');
Route::get('forget-pass',[UserController::class,'forget_pass'])->name('forget.password');
Route::post('forget-pass-action',[UserController::class,'forget_pass_action'])->name('forget.password.action');


