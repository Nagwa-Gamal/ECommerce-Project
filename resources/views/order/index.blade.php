@extends('layouts.app')
@section('title')
    Cart
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="navbp">
            <ul>
                <li style="font-size: xx-large;"><a href="{{route('orders')}}"><U>Orders</U></a></li>
            </ul>
        </div>
            @foreach($cart as $cart)
                <p>
                    <div class="card card-cart">
                        <div class="card-body">
                            <div class="view">
                                <div class="text">
                                   <h3>
                                @foreach($uses as $use)
                                    @if($use->id == $cart->cus_id)
                                        <img src='{{ asset($use->image) }}' alt="Image" class="pimg">
                                        {{$use->name}}
                                    @endif
                                @endforeach
                            </h3>
                            @foreach($products as $product)
                                @if($product->id == $cart->pro_id)
                                    <div class="imgp">
                                        <p><img src='{{asset($product->image)}}' alt="Image"><span style="font-size: 19px; margin: 0;">Price:- {{$product->price}}$</span></p>
                                    </div>

                        <!-- ADD order-->  
                             <div class="product">
                             <div class="proinfo">
                                     
                        <form method="post" action="{{route('orderstore' , $product->id)}}" enctype="multipart/form-data">
                            @csrf
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Quantity : <input step="1" min="1" max="10" name="quantity" value="1" title="Qty" class="input-t" size="4" type="number">

                            <button type="submit" class="del" style="margin-left: 110px;">Order</button>
                        </form>
                      </div></div>
                        <!-- End add order-->
                                   
                                @endif
                            @endforeach
                                   @if($cart->cus_id == @auth::user()->id)
                              <br> <br> <br> <br> <br> <br>  
                               &nbsp; 
                               <a href="{{route('deletecart' , $cart->id)}}"><button type="submit" class="del">Delete</button></a>

                                @elseif(@auth::user()->email=='admin@gmail.com')

                                <a href="{{route('deletecart' , $cart->id)}}"><button type="submit" class="del">Delete</button></a>
                            @endif
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </p>
    <br><br>
            @endforeach
        </div>
    
@endsection
