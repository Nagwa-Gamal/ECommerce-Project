<?php

namespace App\Http\Controllers;

use App\Product;
use App\review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
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
            $reviews = review::get()->where('cus_id','=',$id);
        }
        else{$reviews = review::orderBy('id' , 'desc')->paginate(20);}
        $uses = DB::table('users')->get();
        $products = DB::table('products')->get();
        return view('review.index' , compact('reviews','uses', 'products'));
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
    public function store(Request $request,$id)
    {
        $request->validate([
        'quantity' => 'required' ,
        'comment' => 'required'
        ], [
        'quantity.required' => 'Name is required' ,
        'comment.required' => 'price is required'
        ]);
        $review = new review();
        $review->content =$request->input('comment');
        $review->cus_id = Auth()->user()->id;
        $review->pro_id  = $id;
        $review->rate =$request->input('quantity');
        $review->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = review::find($id);
        $review->delete();
        return redirect()->back();
    }

    /**
     * @param $pro_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRev($pro_id)
    {
        $reviews = review::get()->where('pro_id','=',$pro_id);
        $uses = DB::table('users')->get();
        $products = DB::table('products')->get();
        return view('review.index',compact('reviews','uses','products'));
    }
}
