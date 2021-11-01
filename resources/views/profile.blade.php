@extends('layouts.app')
@section('title')
    Your profile
@endsection
@section('content')
    
        <div class="navbp">
            <ul>
            @if(Auth::user()->email=='admin@gmail.com')
                <li><a href="{{route('posts')}}">{{'('.$countp.') '}}Posts</a></li>
                <li><a href="{{route('orders')}}">{{'('.$counto.') '}}Orders</a></li>
                <li><a href="{{route('messages')}}">{{'('.$countm.') '}}Messages</a></li>
                <li><a href="{{route('allusers')}}">{{'('.$countu.') '}}Users</a></li>
            @else
                <li><a href="{{route('cartorder')}}">{{'('.$countc.') '}}Cart</a></li>
                <li><a href="{{route('orders')}}">{{'('.$counto.') '}}Orders</a></li>
            @endif
                <li><a href="{{route('allreviews')}}">{{'('.$countr.') '}}Reviews</a></li>
            </ul>
        </div>
        <div class="pimage">
            <div class='prod-box'> 
                <img src="{{ Auth::user()->image }}" alt="Profile Images">
                <div class="prod-trans">
                <div class="prod-feature">
                    <!-- Update profile image -->
                    <form enctype="multipart/form-data" action="{{route('updateimage',Auth::user()->id)}}" method="POST" style="color:#fff;">
                            <label>Update Profile Image</label>
                            <input type="file" name="image" style=" border: none; color: #fff;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="pull-right btn btn-sm btn-primary">
                    </form>
                </div>
                </div>
            </div>
            <h2>{{ Auth::user()->name }}</h2>
            <br>

            

            @if(Auth::user()->email=='admin@gmail.com')
            <a href="{{ url('/create') }}"><button type="submit" name="update">Create Post</button></a>
            @endif
            <a href="{{ route('edit', Auth::user()->id) }}"><button type="submit">Update</button></a>
            <a href="{{route('deleteUsers' , @auth::user()->id)}}"><button type="submit">Delete Account</button></a>        
        </div>
@endsection
</body>
</html>
