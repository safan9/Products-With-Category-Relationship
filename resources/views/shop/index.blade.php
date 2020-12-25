@extends('shop.base')

@section('content')
<div class="container-fluid p-2">
	<div class="row">
		<div class="col-md-2">
			<h4>Categories</h4>
			@if ($categories->isEmpty())
				<p>No Categories</p>
			@else
				<ul class="list-group">
					@foreach($categories as $category)
						<li class="list-group-item">
							<a href="category/{{$category->slug}}">{{$category->name}}</a>
						</li>
					@endforeach
				</ul>
			@endif
		</div>
		<div class="col-md-10">
			<h4>All Products</h3>
			<div class="row row-cols-1 row-cols-md-3 g-4">
			@foreach($products as $product)
		  		<div class="col">
					<div class="card" style="width: 18rem;">
					  <img src="{{ asset('storage/images/product') }}/{{$product->image}}" 
					  	class="card-img-top img-thumbnail" alt="{{$product->image}}">
					  <div class="card-body">
					    <h5 class="card-title">
					    	{{$product->name}}
					    </h5>
					  </div>
					  <div class="card-footer">
					    <a href="/{{$product->slug}}" class="w-100 btn btn-primary">Buy</a>
					  </div>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div>
</div>
@endsection