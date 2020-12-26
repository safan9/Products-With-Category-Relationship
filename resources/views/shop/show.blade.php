@extends('shop.base')


@section('seo_title')
	| {{$product->seo_title}}
@endsection

@section('header_files')
	<meta name="description" content="{{$product->seo_description}}">
@endsection

@section('content')
	<div class="row">
	   <div class="col-md-6">
	    	<img
				src="{{ asset('storage/images/product') }}/{{$product->image}}"
				alt="{{$product->image}}"
				class="img-fluid img-thumbnail" 
				width="100%" height="60%"
				/>
	   </div>
	   <div class="col-md-6">
	   	<div class="row">
			<div class="col-md-12">
			   <h1>{{$product->name}}</h1>
			   <p>
			   	<a href="category/{{$product->category->slug}}">{{$product->category->name}}</a>
			   </p>
			</div>
			<div class="col-md-12">
			 	{!! $product->description !!}
			</div>
			<div class="col-md-12">
				<a href="#" class="btn btn-primary">
					Add to cart	&#8377;{{number_format($product->price, 2)}}
				</a>
			</div>
	   </div>
	</div>
  </div>
@endsection