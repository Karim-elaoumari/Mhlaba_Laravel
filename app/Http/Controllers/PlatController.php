<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Plat;
use Illuminate\Support\Str;
class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'title'=> 'required',
            'price'=>'required',
            'categorie'=>'required | exists:categories,id',
            'image'=>'required',
            'description' =>'required'
        ],
        [
            'title.required'=>'Title is Required',
            'price.required'=>'Price is required',
            'categorie.exists'=>'categorie is required',
            'image.required'=>'image is required',
            'description.required'=>'desc in required',
        ]
    
       
    );
   

    
    $image = $request->file('image');
    $image_name = time().'.'.$image->getClientOriginalExtension();
    $destinationPath = public_path('/images');
    $image->move($destinationPath, $image_name);

    $plat= new Plat;
    $plat->title = $request->title;
    $plat->slug =  Str::slug($request->title,'-');
    $plat->price =  $request->price;
    $plat->desc =  $request->description;
    $plat->categorie_id =  $request->categorie;
    $plat->image =  $image_name;
    $plat->user_id = Auth::user()->id;
    $plat->save();
 

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
        $plat = Plat::findOrFail($id);
        return response()->json([ 'status' => 'success','data' => $plat]);
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
            'description' => 'required',
            'categorie' => 'required',
        ]);
       
    
        if ($request->hasFile('image')) {
            // delete old image
            $oldImage = public_path('images/').$plat->image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            // upload new image
            $image = $request->file('image');
            $imageName = time().'-'.$image->getClientOriginalName();
            $image->move(public_path('images/'), $imageName);
            $plat->image = $imageName;
        }
        $plat = Plat::find($id);
        $plat->title = $request->title;
        $plat->slug =  Str::slug($plat->title,'-');
        $plat->price = $request->price;
        $plat->desc = $request->description;
        $plat->categorie_id = $request->categorie;
    
        $plat->update();
    
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
        $plat = Plat::findOrFail($id);
        if($plat->delete()){
        return response()->json(['status' => 'success']);
        }
       
    }
}
