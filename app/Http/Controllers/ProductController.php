<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // public function __construct(){

    //     $this->middleware('auth:api')->except('index','show');
 
 
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
        //
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([

            'name' => 'required',
            'details' => 'required',
        ]);

        $product = Product::create($request->all());
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //

        $p = Product::find( $product->id);
        // return response()->json($p, 200);
          if(is_null($p))
        {
            return response()->json(['message'=>'userregistered sucessfully']);
            
            // return  "not foullnd";
        }
        
            return response()->json($p, 200);
        
        
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request , product $product)
    {
        //
      
        $product->update($request->all());
        echo "update done";
        return $request;
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        
        if (is_null($product)){
             return response()->json("not foujnd" , 404);
        }
        $product->delete();
        // return response()->json("deleted" , 204);
        echo "done";
        //
    }
}
