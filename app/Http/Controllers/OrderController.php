<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class OrderController extends Controller
{

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
            'full_name' => 'required',
            'phone' => 'required|numeric',

            'city' => 'required',
            'address' => 'required',
            'product_id' => 'required',
                    
                    
        ],
        [
           'quantity.required' => 'قيمة الكمية مطلوبة',
           'full_name.required' => 'الاسم مطلوب',
           'phone.required' => 'رقم الهاتف مطلوب',
           'city.required' => 'المدينة مطلوبة',
           'address.required' => 'العنوان مطلوب',
           'product_id.required' => 'المنتج مطلوب',
            
        ]
    
       
    );


    $order = new Order();
    $order->quantity = $request->quantity;
    $order->size = $request->size;
    $order->color = $request->color;
    $order->full_name = $request->full_name;
    $order->phone = $request->phone;
    $order->city = $request->city;
    $order->address = $request->address;
    $order->comment = $request->comment;
    $order->product_id = $request->product_id;
    $order->save();
 

    return  response()->json(['status'=>'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
                    'status' => 'required',
                    
        ],
        [
              'status.required' => 'Le status est obligatoire',
                
          ]
            
        );
       
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->update();
    
        return response()->json([ 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        if($order->delete()){
        // return a view page publisher/orders not json response
        return redirect('/publisher/orders');



        }
       
    }
}
