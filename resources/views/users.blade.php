@extends('layouts.navbar')
@extends('layouts.header')
@section('title')
    Users
@endsection
@section('content')

<table class="table table hover" style="font-size: x-large; font-weight: normal; text-align: center;">
  <thead>
    <tr style=" color: #a21c1c;">
      <th>Name</th>
      <th>E-mail</th>
      <th>Option</th>
    </tr>
  </thead>
<tbody>

@foreach($user as $user)
  <tr>
    <td>{{ $user->name}} </td>
    <td>{{ $user->email}} </td>
    <td><a href="{{ route('deluser', $user->id) }}">Delete</a></td>
  </tr>
@endforeach
</tbody>
@endsection