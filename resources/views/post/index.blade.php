@extends('layouts.app')
@section('title')
    Posts
@endsection
@section('content')
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($products as $product)
                    @if($product->em_id == @auth::user()->id || @auth::user()->email=='admin@gmail.com')
                        <p>
                            <div class="card">
                            <div class="card-body">
                                <div class="view">
                                    <span>{{$product->updated_at->diffForHumans()}}</span>
                                    <h3>
                                        @foreach($uses as $use)
                                            @if($use->id == $product->em_id) 
                                                <img src='{{ asset($use->image) }}' alt="Image" class="pimg"> 
                                                {{$use->name}}
                                            @endif
                                        @endforeach
                                    </h3>
                                    <div class="imgs"><img src='{{asset($product->image)}}' alt="Image"></div>
                                    <div class="text">
                                        <h2>{{$product->name}} </h2>
                                        <h4>{{'Price: '.$product->price}}$</h4>
                                        <p>{{$product->description}}</p>
                                    </div> 
                                    <a href="{{route('editPost' , $product->id)}}"><button type="submit">update</button></a>
                                    <a href="{{route('deletePost' , $product->id)}}"><button type="submit">Delete</button></a>
                                </div>

                            </div>
                            </div>
                        </p>
                        <br>
                    @endif
                @endforeach
            </div>
        </div>
@endsection
