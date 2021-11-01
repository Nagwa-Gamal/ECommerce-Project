<?php

namespace App\Http\Controllers;
use App\message;
use App\order;
use App\Product;
use App\review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Quotation;
use Auth;

class UsersController extends Controller
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
        $users = DB::select('select * from users');
        return view('profile', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
        //
        if(Auth()->user()->email != 'admin@gmail.com') {
            $id = Auth()->user()->id;
            $countp = DB::table('products')->where('em_id', '=', $id)->count();
            $countm = DB::table('messages')->where('cus_id', '=', $id)->count();
            $counto = DB::table('orders')->where('cus_id', '=', $id)->count();
            $countr = DB::table('reviews')->where('cus_id', '=', $id)->count();
            $countc = DB::table('cuspros')->where('cus_id', '=', $id)->count();

            return view('profile', compact('countp', 'counto', 'countr', 'countm' ,'countc'));
        }
        else {
            $countp = Product::count();
            $countm = message::count();
            $counto = order::count();
            $countr = review::count();
            $countu = DB::table('users')->where('email','!=','admin@gmail.com')->count();

            return view('profile', compact('countp', 'counto', 'countr', 'countm', 'countu'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $user = DB::table('users')->get()->where('email','!=','admin@gmail.com');
        return view('users' , compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        if(!$user){
            return redirect()->back();
        }
        $user = User::select('id','name','email')->find($id);
        return view('update', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
        $this->validate($request , [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::find($id);
        if(!$user)
        {
            return redirect()->back();
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    $users = user::find($id)
                ->delete();
    return redirect()->route('Home');
    }

    public function updateimage(Request $request,$id)
     {

        $file_extension = $request->image ->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path ='Images\\Userimage\\';

        $user = user::find($id);
        $user->update([
            'image' => $request ->image -> move($path,$file_name),
        ]);

        return redirect()->route('profile');
    
     }

     public function deleteuser($id)
    {
        //
    $users = user::find($id)
                ->delete();
    return redirect()->route('allusers');
    }
}
