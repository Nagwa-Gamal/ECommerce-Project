@extends('layouts.app')
@section('title')
    Orders
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @foreach($order as $order)
                <p>
                    <div class="card card-order">
                        <div class="card-body">
                            <div class="view">
                                <div class="text">
                                   <h3>
                                @foreach($uses as $use)
                                    @if($use->id == $order->cus_id)
                                        <img src='{{ asset($use->image) }}' alt="Image" class="pimg">
                                        {{$use->name}}
                                    @endif
                                @endforeach
                            </h3>
                            @foreach($products as $product)
                                @if($product->id == $order->pro_id)
                                    <div class="imgp">
                                        <p><img src='{{asset($product->image)}}' alt="Image"></p>
                                    </div>
                                    <br><br>
                                    <p>Quantity is : <u style=" color:#10259b;">{{$order->quantity}}</u> Pieces of {{$product->name}}.</p>
                                    <p>Price:- <u style=" color:#10259b;">{{$order->quantity * $product->price}}$</u></p>
                                @endif
                            @endforeach
                                   @if($order->cus_id == @auth::user()->id)

                                    <a href="{{route('editorder' , $order->id)}}"><button type="submit" class="del del2 up">Update</button></a>
                                    <a href="{{route('deleteorder' , $order->id)}}"><button type="submit" class="del del2">Delete</button></a>
                               
                                @elseif(@auth::user()->email=='admin@gmail.com')

                                <a href="{{route('deleteorder' , $order->id)}}"><button type="submit" class="del del2">Delete</button></a>
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
