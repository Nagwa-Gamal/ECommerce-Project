@extends('layouts.sidebar')
@section('title')
    Contact Us
@endsection
@section('content')
    <div class="c_box">
        <div class="text">
            <p><i class="fa fa-address-book-o fa-lg"></i> 198 West 21th Street</p>
            <br>
            <p><i class="fa fa-mobile fa-lg"></i> +01 035 235 598</p>
            <br>
            <a href="https://www.facebook.com"><i class="fa fa-envelope-o fa-lg"></i> @Team Work</a>
        </div>
        <form method="post" action="{{route('sandmessage')}}">
            {{ csrf_field() }}
        <div class="cont">
            <h1>Contact us</h1>
            <textarea name="post" id="" cols="25" rows="10" placeholder="Your message"></textarea>
            <br>
            <button type="submit" name="sub3">contact us</button>
        </div>
        </form>
    </div>

@endsection
