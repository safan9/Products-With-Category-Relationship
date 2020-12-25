@extends('admin.base')

@section('content')
<div class="container">
	<h3>{{ $category->name }}</h3>
	<div class="row row-cols-3 row-cols-md-3 g-4">
	@foreach($products as $product)
		<div class="card-group">
  		<div class="col">
			<div class="card" style="width: 18rem;">
			  <img src="{{ asset('storage/images/product') }}/{{$product->image}}" class="card-img-top" alt="{{$product->image}}">
			  <div class="card-body">
			    <h5 class="card-title">{{$product->name}}</h5>
			  </div>
			</div>
		</div>
		</div>
	@endforeach
	</div>
</div>
@endsection