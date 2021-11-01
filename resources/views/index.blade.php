@extends('layouts.app')
@section('title')
	View Product
@endsection
@section('content')
	<!-- start our service-->
	<div class="product">
		<div class="Proimage">
			<p><img src='{{asset($products->image)}}' id=""></p>
		</div>
		<div class="proinfo">
			<h1>{{$products->name}}</h1>
			<span> Price :</span><span class="new-price">{{'$'.$products->price}}</span><br><br>
			<span class="rating">
				@for($i=1;$i<=5;$i++)
					@if($i<=$rate)
						<i class="fa fa-star" aria-hidden="true"></i>
					@else
						<i class="fa fa-star-o" aria-hidden="true"></i>
					@endif
				@endfor
			</span>&nbsp; &nbsp; &nbsp; &nbsp;
            <a href="{{route('reviews', $products->id)}}" style="font-size: x-large;">{{'('.$count.') '}}<u>Reviews</u></a>
			<br><br><p>{{$products->description}}</p>

			<!-- ADD Rate-->
			<form method="post" action="{{route('store' , $products->id)}}" enctype="multipart/form-data">
				@csrf
				   Add Rate 1:5 : <input step="1" min="1" max="5" name="quantity" value="1" title="Qty" class="input-t" size="4" type="number">
				   <input  type="text" name="comment" placeholder="Your Opinion">
				   <button type="submit">Add Opinion</button></a>
			</form>

          <!-- ADD Cart-->

				 <form method="post" action="{{route('cart' , $products->id)}}" enctype="multipart/form-data">
				 	@csrf
					 <a><button class="btu" type="submit">Add To Cart</button></a>
			 </form>
		</div>
	</div>
	@endsection
</body>
</html>
