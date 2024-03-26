<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;


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
});



Route::middleware(['auth'])->group(function () {
    Route::get('publisher/products', function (){
         $comand = Product::with('orders')->latest()->paginate(10);
         return view('publisher.products',[
        'products'=> $comand,
        'count_products' =>  Product::count(),
        'count_orders' =>  Order::count(),
        'pending_orders' =>  Order::where('status','pending')->count(),
        'in_delivery_orders' =>  Order::where('status','to_delivery')->count(),
        'delivered_orders' =>  Order::where('status','delivered')->count(),
        ])->with('title','home'); })->name('pub_products');

    Route::get('publisher/orders', function (){
        $orders = Order::with('product')->latest()->paginate(10);
        return view('publisher.orders',[
        'count_products' =>  Product::count(),
        'orders'=> $orders,
        'count_orders' =>  Order::count(),
        'pending_orders' =>  Order::where('status','pending')->count(),
        'in_delivery_orders' =>  Order::where('status','to_delivery')->count(),
        'delivered_orders' =>  Order::where('status','delivered')->count(),
        ])->with('title','home'); })->name('pub_orders');
    Route::resource('Product', ProductController::class);
});
Route::resource('Order', OrderController::class);


Route::get('/', function (){
    if(request('search_term') && request('search_term')!=""){
        $search = true;
        $comand = Product::where('title','like','%'.request('search_term').'%')->withCount('orders')->orderBy('orders_count','desc')->paginate(20);
    }else{
        $search = false;
        $comand = Product::withCount('orders')->orderBy('orders_count','desc')->paginate(20);
    }
    
    // get just 6 products that have the most orders
    $latest = Product::withCount('orders')->orderBy('orders_count','desc')->take(6)->get();

    return view('pages.home',[
        'search' => $search,
        'products'=> $comand,
        'latest' => $latest,
        'count_products' =>  Product::count()
       
    ])->with('title','home');
 })->name("home");







 Route::get('product/{slug}', function ($slug){
    $latest = Product::withCount('orders')->orderBy('orders_count','desc')->take(8)->get();
    return view('pages.product',[
        'product' => Product::where('slug', $slug)->firstOrFail(),
        'products' => $latest
    ])->with('title','home');
 })->name("single_product");


 Route::get('contact', function (){
    return view('pages.contact',[
    ])->with('title','contact');
 })->name("contact");



 Route::get('terms', function (){
    return view('pages.terms',[
    ])->with('title','contact');
 })->name("terms");


Route::get('/publisher',[UserController::class,'login'])->name('login');
Route::post('login',[UserController::class,'login_action'])->name('login.action');



