@extends('layouts.app')
@section('title')
    Reviews
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @foreach($reviews as $review)
                <div class="card-rev">
                    <div class="card-body">
                        <div class="view">
                            <span>{{$review->updated_at->diffForHumans()}}</span>
                            <h3>
                                @foreach($uses as $use)
                                    @if($use->id == $review->cus_id)
                                        <img src='{{ asset($use->image) }}' alt="Image" class="pimg">
                                        {{$use->name}}
                                    @endif
                                @endforeach
                            </h3>
                            @foreach($products as $product)
                                @if($product->id == $review->pro_id)
                                    <div class="imgp">
                                        <span class="rating texrate">
                                            @for($i=1;$i<=5;$i++)
                                                @if($i<=$review->rate)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                @endif
                                            @endfor
                                        </span>
                                        <img src='{{asset($product->image)}}' alt="Image">
                                    </div>
                                @endif
                            @endforeach
                            <div class="text">
                                <p>{{$review->content}}</p>
                            </div>
                            @if($review->cus_id == @auth::user()->id)
                                <a href="{{route('deletereview' , $review->id)}}"><button type="submit" class="del">Delete</button></a>
                            @elseif(@auth::user()->email=='admin@gmail.com')
                                <a href="{{route('deletereview' , $review->id)}}"><button type="submit" class="del">Delete</button></a>
                            @endif
                        </div>
                    </div>
                </div>

                <br><br><br>
        @endforeach
    </div>
</div>
@endsection
