@extends('admin.base')

@section('content')
<div class="container">
		@if(session('msgSaved'))
	        <div class="container">
	            <div class="alert alert-success mt-2" role="alert">
	                {{ session('msgSaved') }}
	            </div>
	        </div>
    	@endif

	@if ($products->isEmpty())
	    <p>No Products</p>
	@else
		<div class="p-3 center">
			<h4 class="d-inline">All Products</h4>
			<a class="btn btn-primary d-inline" 
				href="{{url('admin/product/create')}}">Add Product</a>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Price</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $product)
					<tr>
						<td>
							<img src="{{ asset('storage/images/product') }}/{{$product->image}}"
					  			class="img-thumbnail" alt="{{$product->image}}"
					  			width="100"  height="100">
						</td>
					    <td>{{$product->name}}</td>
					    <td>&#8377;{{number_format($product->price, 2)}}</td>
					    <td>
					    	<a href="product/{{$product->id}}/edit" 
					    		class="btn btn-primary d-inline">Edit</a>
					    	<form method="POST" class="d-inline" 
					    		action="{{url('admin/product')}}/{{$product->id}}">
					    		@csrf
					    		@method('DELETE')
					    		<button type="submit" class="btn btn-danger">Delete</button>
					    	</form>
					    </td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{$products->links("pagination::bootstrap-4")}}
	@endif
</div>
@endsection