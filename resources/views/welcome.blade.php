@extends('layouts.sidebar')
@section('title')
    Home
@endsection
@section('content')
<div class="hmade">
    <h1>Handmade</h1>
    @foreach($products as $product)
    <div class="image">
            <div class='prod-box'>
                <img src='{{asset($product->image)}}' alt="Image">
                <div class="prod-trans">
                <div class="prod-feature">
                    <p style="color:#fff; font-weight: bold; font-size:x-large; margin-top:50%;">{{'$'.$product->price}}</p>
                    <a href="{{route('showProduct' , $product->id)}}"><input type="button" value="View" ></a>
                </div>
                </div>
            </div>
        <h3>{{$product->name}}</h3>
    </div>
@endforeach
</div>
@endsection
