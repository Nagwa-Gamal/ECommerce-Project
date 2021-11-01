@extends('layouts.app')
@section('title')
    Messages
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @foreach($messages as $message)
        @foreach($uses as $use)
            @if($use->id == @auth::user()->id || @auth::user()->email=='admin@gmail.com')
                @if($message->cus_id == $use->id)
            <p>
                <div class="card_message">
                    <div class="card-body">
                        <div class="mes">
                            <span>{{$message->updated_at->diffForHumans()}}</span>
                            <h3>
                                <img src='{{ asset($use->image) }}' alt="Image" class="pimg">
                                {{$use->name}}
                            </h3>

                            @if($message->cus_id == @auth::user()->id)
                            <div class="text">
                                <p>{{$message->message}} </p>
                            <hr>
                            </div>
                                <a href="{{route('deletemessage' , $message->id)}}"><button type="submit" class="del" style="margin-left: 42%;">Delete</button></a>
                            @elseif(@auth::user()->email=='admin@gmail.com')

                                <div class="text">
                                    <p>{{$message->message}} </p>
                                    <hr>
                                </div>
                                <a href="{{route('deletemessage' , $message->id)}}"><button type="submit" class="del">Delete</button></a>
                            @endif

                        </div>
                    </div>
                </div>

                <br><br><br>
            </p>
                    @endif
            @endif
        @endforeach
        @endforeach
    </div>
</div>
@endsection
