<?php

namespace App\Http\Controllers;

use App\cuspro;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CusproController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        if (Auth()->user()->email != 'admin@gmail.com')
        {
            $id = Auth()->user()->id;
            $cart = cuspro::get()->where('cus_id','=',$id);
        }
        else{$cart = cuspro::orderBy('id' , 'desc')->paginate(20);}
        $uses = DB::table('users')->get();
        $products = DB::table('products')->get();
        return view('order.index' , compact('cart','uses', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id)
    {
        //
        $cart = new cuspro();
        $cart->cus_id = Auth()->user()->id;
        $cart->pro_id  = $id;
        $cart->save();
        return redirect()->route('cartorder');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cuspro  $cuspro
     * @return \Illuminate\Http\Response
     */
    public function show(cuspro $cuspro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cuspro  $cuspro
     * @return \Illuminate\Http\Response
     */
    public function edit(cuspro $cuspro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cuspro  $cuspro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cuspro $cuspro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cuspro  $cuspro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cart = cuspro::find($id);
        $cart->delete();
        return redirect()->route('cartorder');
    }
}
