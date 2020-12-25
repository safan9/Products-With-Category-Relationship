@extends('admin.base')

@section('header_files')
	<script src="https://cdn.tiny.cloud/1/vqgfmk8ff0c8s2tg70qpgiek5wg922zxtmfw2imnahc43w5w/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

	 <script>
	   tinymce.init({
      	selector: '#description',
	    menubar: false
	   });
	</script>
@endsection

@section('content')
<div class="container">
	<div>
		<h2>Edit Product</h2>
		<form action="{{url('admin/product')}}/{{$product->id}}" 
			method="POST" enctype="multipart/form-data">
			@csrf
			@method('patch')
			<div class="mb-3">
			  <label for="name" class="form-label">Product Name</label>
			  <input type="text" name="name" id="name" 
			  		placeholder="Product Name" class="form-control" 
			  		onfocusout="convertToSlug()" 
			  		value="{{$product->name}}" required>
			</div>
			<div class="mb-3">
			  <label for="description" class="form-label">Product Description</label>
			  <textarea name="description" id="description"
			  		class="form-control" placeholder="Product Description">
			  			{!! $product->description !!}
			  		</textarea>
			</div>
			<div class="mb-3">
			  <label for="category" class="form-label">Select Category</label>
			  <select class="form-control" name="category" id="category">
			  	@foreach($categories as $category)
			  		<option value="{{$category->id}}" 
			  			{{$category->id == $product->category_id ? "selected" : "" }}>
			  			{{$category->name}}
			  		</option>
			  	@endforeach
			  </select>
			</div>
			<div class="mb-3">
			  	<label for="slug" class="form-label">
			  		Slug
				</label>
			  <input type="text" class="form-control" name="slug" id="slug" 
			  		placeholder="slug" 
			  		value="{{$product->slug}}" required>
			  		@if($errors->has('slug'))
					    <div class="text-danger">{{ $errors->first('slug') }}</div>
					@endif
			</div>
			<div class="mb-3">
			  <label for="price" class="form-label">Price</label>
			  <input type="number" name="price" id="price" min="0" step="0.01" 
			  		placeholder="Price e.g: 99.99" class="form-control" 
			  		value="{{$product->price}}" required>
			</div>
			<div class="mb-3">
			  <label for="seo_title" class="form-label">SEO Title</label>
			  <input type="text" name="seo_title" id="seo_title" 
			  		placeholder="SEO Title" class="form-control" 
			  		value="{{$product->seo_title}}" required>
			</div>
			<div class="mb-3">
			  <label for="seo_description" class="form-label">SEO Description</label>
			  <textarea name="seo_description" id="seo_description" 
			  		class="form-control" placeholder="SEO Description">{{$product->slug}}
			  		</textarea>
			</div>
			<div class="mb-3">
				<img src="{{ asset('storage/images/product') }}/{{$product->image}}"
					  			class="img-thumbnail" alt="{{$product->image}}"
					  			width="100"  height="100"> <br>
				<label>This Image is currently used for Product</label> <br>
			  <label for="image" class="form-label">
			  	Change Image <span class="text-muted">Max 4mb</span>
			  </label>
			  <input type="file" name="image" id="image" 
			  		class="form-control">
			  		@if($errors->has('image'))
					    <div class="text-danger">{{ $errors->first('image') }}</div>
					@endif
			</div>
			<button type="submit" class="btn btn-primary">SAVE</button>
			<a class="btn btn-danger" 
				href="{{url('admin/product/')}}">Cancel</a>
		</form>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	function convertToSlug(){
		name = document.getElementById("name").value;
		url_slug = document.getElementById("slug");
	    slug = name.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
	    url_slug.value=slug;
	    /*alert(slug);*/
	}
</script>
@endsection