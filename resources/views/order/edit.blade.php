@extends('layouts.app')
@section('title')
    Update Order
@endsection
@section('content')
<div class="row justify-content-center">
@foreach($order as $order)
    <div class="card">
        <div class="card-body">
            <div class="view">
                <div class="text">
                    @foreach($products as $product)
                        @if($product->id == $order->pro_id)
                            <div class="imgp">
                                <p><img src='{{asset($product->image)}}' alt="Image"></p>
                                <span style="font-size: 23px">Price:- {{$order->quantity * $product->price}}$</span>

                            </div>
                        @endif
                    @endforeach

            <!-- ADD order-->  
                    <div class="product">
                        <div class="proinfo">
                            <form method="post" action="{{route('orderupdate' , $order->id)}}" enctype="multipart/form-data">
                                @csrf
                                Quantity : <input step="1" min="1" max="10" name="quantity" value="{{$order->quantity}}" title="Qty" class="input-t" size="4" type="number">

                                <button type="submit" class="del">Update</button>
                            </form>
                        </div>
                    </div>
            <!-- End add order-->

                </div>          
            </div>
        </div>
    </div> 
@endforeach
</div>
@endsection