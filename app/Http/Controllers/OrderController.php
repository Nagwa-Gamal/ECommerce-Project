<?php

namespace App\Http\Controllers;

use App\order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
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
            $order = order::get()->where('cus_id','=',$id);
        }
        else{$order = order::orderBy('id' , 'desc')->paginate(20);}
        $uses = DB::table('users')->get();
        $products = DB::table('products')->get();
        return view('order.order' , compact('order','uses', 'products'));
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
    public function store(Request $request, $id)
    { 
        $order = new order();
        $order->cus_id = Auth()->user()->id;
        $order->pro_id  = $id;
        $order->quantity =$request->input('quantity');
        $order->save();
        return redirect()->route('orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $order = order::find($id);
        $order = order::get()->where('id', '=', $id);
        $products = DB::table('products')->get();

        return view('order.edit' , compact('order', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = order::find($id);
        $order->update([
            'quantity' => $request->input('quantity'),
        ]);
        return redirect()->route('orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = order::find($id);
        $order->delete();
        return redirect()->back();
    }
}
