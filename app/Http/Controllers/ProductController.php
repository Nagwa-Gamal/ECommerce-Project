<?php

namespace App\Http\Controllers;

use App\Product;
use App\review;
use Illuminate\Http\Request;
use App\Traits\OfferTrait;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Inline\Element\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
        $products = product::orderBy('id' , 'desc')->paginate(20);
        $uses = DB::table('users')->get();
        return view('post.index' , compact('products','uses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = product::orderBy('id' , 'desc')->paginate(20);
        return view('welcome' , compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_extension = $request->image ->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path ='Images\\Products\\';

        $request->validate([
        'name' => 'required',
        'price' => 'required',
        'description' => 'required'
        ], [
        'name.required' => 'Name is required' ,
        'price.required' => 'price is required',
        'description.required' => 'description is required',
        ]);

        $product = new Product();
        $product->name =$request->input('name');
        $product->em_id = Auth()->user()->id;
        $product->price =$request->input('price');
        $product->image =$request ->image -> move($path,$file_name);
        $product->description = $request->input('description');
        $product->save();
        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = DB::select('select * from products');
        $uses = DB::table('users')->get();
        return view('post.index' , compact('products','uses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
      $product = Product::find($id);
      $product = Product::select('id','name','description','price')->find($id);
        return view('post.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $file_extension = $request->image ->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path ='Images\\Products\\';

        $this->validate($request , [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $product = Product::find($id);
        $product->update([
            'name'  => $request->name,
            'image' => $request ->image -> move($path,$file_name),
            'description' => $request->description,
            'price'  => $request->price,
        ]);
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('posts');
    }

    public function showPro($id)
    {
        $products = Product::find($id);
        if(!$products){
            return redirect()->back();
        }
        $rate = DB::table('reviews')->where('pro_id','=',$id)->avg('rate');
        $count = DB::table('reviews')->where('pro_id','=',$id)->count();
        $products=Product::select('products.*')->find($id);
        return view('index',compact('products','rate','count'));
    }
 
}
