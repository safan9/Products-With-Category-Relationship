@extends('shop.base')

@section('content')
<div class="container">
	<h3 class="mt-2">{{ $category->name }}</h3>
	@if ($products->isEmpty())
		<div class="container">
	        <div class="alert alert-warning m-5" role="alert">
	    		There are no products available in this category at the moment.
	        </div>
	    </div>
	@else
		<div class="row row-cols-1 row-cols-md-3 g-4">
		@foreach($products as $product)
			<div class="card-group">
	  		<div class="col">
				<div class="card" style="width: 18rem;">
				  <img src="{{ asset('storage/images/product') }}/{{$product->image}}" class="card-img-top" alt="{{$product->image}}">
				  <div class="card-body">
				    <h5 class="card-title">{{$product->name}}</h5>
				  </div>
				  	<div class="card-footer">
						<a href="/{{$product->slug}}" class="w-100 btn btn-primary">Buy</a>
					</div>
				</div>
			</div>
			</div>
		@endforeach
		</div>
	@endif
</div>
@endsection