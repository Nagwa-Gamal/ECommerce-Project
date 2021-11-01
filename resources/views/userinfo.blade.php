@extends('profile')
@section('contents')
    <div class="nav">
        <ul>
            <li><a href="#post">Posts</a></li>
            <li><a href="#review">Reviews</a></li>
            <li><a href="#order">Orders</a></li>
        </ul>
    </div>

        @foreach($products as $product)
            @if($product->em_id == @auth::user()->id)
    <form class="wpost" id="post" method="POST" action="{{route('posts')}}">
        <h1>Posts</h1>
        <div class="imgs"><img src='{{asset($product->image)}}' width="150" height="150" alt="Image"></div>
        <div class="text">
            <h3>{{ Auth::user()->name }}</h3>
            <h3>{{$product->name}} </h3>
            <p>{{$product->price}}</p>
        </div>
        <a href="{{route('editPost' , $product->id)}}"><button type="submit">update</button></a>
        <a href="{{route('deletePost' , $product->id)}}"><button type="submit">Delete</button></a>
    </form>
            @endif
        @endforeach

    <form class="wpost" id="review">
        <h1>Reviews</h1>
        <div class="imgs"><img src="./Images/16.jpg" alt="Profile Images"></div>
        <div class="text">
            <h3>{{ Auth::user()->name }}</h3>
            <p>The first Review</p>
        </div>
        <button type="submit" name="delrev">delete</button>
    </form>

    <form class="wpost" id="order">
        <h1>Orders</h1>
        <div class="imgs"><img src="./Images/16.jpg" alt="Profile Images"></div>
        <div class="text">
            <h3>{{ Auth::user()->name }}</h3>
            <p>The first order</p>
        </div>
        <a href="/updateorder"><button type="submit" name="updateor">update</button></a>
        <button type="submit" name="delorders">delete</button>
    </form>
@endsection
    

   

    