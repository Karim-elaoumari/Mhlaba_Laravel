<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
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
                    'title' => 'required',
                    'price' => 'required',
                    'x_price' => 'required',
                    'desc' => 'required',
                    'main_image' => 'required',
                    'st1_image' => 'required',
                    'st2_image' => 'required',
                    'st3_image' => 'required',
                    'st4_image' => 'required',
                    
        ],
        [
            'title.required' => 'Le titre est obligatoire',
            'price.required' => 'Le prix est obligatoire',
            'x_price.required' => 'Le prix de base est obligatoire',
            'desc.required' => 'La description est obligatoire',
            'main_image.required' => 'L\'image principale est obligatoire',
            'st1_image.required' => 'L\'image 1 est obligatoire',
            'st2_image.required' => 'L\'image 2 est obligatoire',
            'st3_image.required' => 'L\'image 3 est obligatoire',
            'st4_image.required' => 'L\'image 4 est obligatoire',
        ]
    
       
    );
   

    
    $image = $request->file('main_image');
    $image_name = time().'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $image->move($destinationPath, $image_name);

    // 1st_image
    $st1_image = $request->file('st1_image');
    $st1_image_name = time().'1.'.$st1_image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $st1_image->move($destinationPath, $st1_image_name);

    // 2nd_image
    $st2_image = $request->file('st2_image');
    $st2_image_name = time().'2.'.$st2_image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $st2_image->move($destinationPath, $st2_image_name);

    // 3rd_image
    $st3_image = $request->file('st3_image');
    $st3_image_name = time().'3.'.$st3_image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $st3_image->move($destinationPath, $st3_image_name);

    // 4th_image
    $st4_image = $request->file('st4_image');
    $st4_image_name = time().'4.'.$st4_image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $st4_image->move($destinationPath, $st4_image_name);

    // colors and sizes are passed as array so we need to convert them to string
    $colors = '';
    if($request->colors){
        $colors = implode(';',$request->colors);
    }
    $sizes = '';
    if($request->sizes){
        $sizes = implode(';',$request->sizes);
    }

    $product= new Product;
    $product->title = $request->title;
    $product->slug =  Str::slug($request->title,'-');
    $product->price =  $request->price;
    $product->desc =  $request->desc;
    $product->x_price =  $request->x_price;
    $product->main_image =  $image_name;
    $product->st1_image =  $st1_image_name;
    $product->st2_image =  $st2_image_name;
    $product->st3_image =  $st3_image_name;
    $product->st4_image =  $st4_image_name;
    $product->sizes =  $sizes;
    $product->colors =  $colors;
    $product->save();
 

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
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response()->json([ 'status' => 'success','data' => $product]);
    }

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
                    'title' => 'required',
                    'price' => 'required',
                    'x_price' => 'required',
                    'desc' => 'required',
                   
                    
        ],
        [
            'title.required' => 'Le titre est obligatoire',
            'price.required' => 'Le prix est obligatoire',
            'x_price.required' => 'Le prix de base est obligatoire',
            'desc.required' => 'La description est obligatoire'
        ]);
        $product = Product::find($id);
        if ($request->hasFile('main_image')) {
            // delete old image
            $oldImage = public_path('images/').$product->main_image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            // upload new image
            $image = $request->file('main_image');
            $imageName = time().'-'.$image->getClientOriginalExtension();
            $image->move(public_path('images/'), $imageName);
            $product->main_image = $imageName;
        }
        if ($request->hasFile('st1_image')) {
            // delete old image
            $oldImage = public_path('images/').$product->st1_image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            // upload new image
            $image = $request->file('st1_image');
            $imageName = time().'1-'.$image->getClientOriginalExtension();
            $image->move(public_path('images/'), $imageName);
            $product->st1_image = $imageName;
        }
        if ($request->hasFile('st2_image')) {
            // delete old image
            $oldImage = public_path('images/').$product->st2_image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            // upload new image
            $image = $request->file('st2_image');
            $imageName = time().'2-'.$image->getClientOriginalExtension();
            $image->move(public_path('images/'), $imageName);
            $product->st2_image = $imageName;
        }
        if ($request->hasFile('st3_image')) {
            // delete old image
            $oldImage = public_path('images/').$product->st3_image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            // upload new image
            $image = $request->file('st3_image');
            $imageName = time().'3-'.$image->getClientOriginalExtension();
            $image->move(public_path('images/'), $imageName);
            $product->st3_image = $imageName;
        }
        if ($request->hasFile('st4_image')) {
            // delete old image
            $oldImage = public_path('images/').$product->st4_image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            // upload new image
            $image = $request->file('st4_image');
            $imageName = time().'4-'.$image->getClientOriginalExtension();
            $image->move(public_path('images/'), $imageName);
            $product->st4_image = $imageName;
        }

        $product->title = $request->title;
        $product->slug =  Str::slug($product->title,'-');
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->x_price = $request->x_price;
        $product->update();
    
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
        $product = Product::findOrFail($id);
        if($product->delete()){

            $oldImage = public_path('images/').$product->main_image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $oldImage = public_path('images/').$product->st1_image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $oldImage = public_path('images/').$product->st2_image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $oldImage = public_path('images/').$product->st3_image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $oldImage = public_path('images/').$product->st4_image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            return redirect('/publisher/products');
        }
       
    }
}
