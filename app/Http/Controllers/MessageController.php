<?php

namespace App\Http\Controllers;

use App\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
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
        $messages = message::orderBy('id' , 'desc')->paginate(20);
        $uses = DB::table('users')->get();
        return view('message.index' , compact('messages','uses'));

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
    public function store(Request $request)
    {
        //
        $request->validate([
        'post' => 'required'
        ], [
        'post.required' => 'Name is required'
        ]);
        $message = new Message();
        $message->message =$request->input('post');
        $message->cus_id = Auth()->user()->id;
        $message->save();
        return redirect()->route('messages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages = message::get()->where('cus_id' ,'=', $id);
        $uses = DB::table('users')->get()->where('id','=',Auth()->user()->id);
        return view('message.index' , compact('messages','uses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        $message = message::find($id);
        $message->delete();
        return redirect()->back();
    }
}
