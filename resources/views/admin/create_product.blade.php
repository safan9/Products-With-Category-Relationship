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
		@if(session('msgSaved'))
	        <div class="container">
	            <div class="alert alert-success" role="alert">
	                {{ session('msgSaved') }}
	            </div>
	        </div>
    	@endif
		<h2>Add New Product</h2>
		<form action="{{url('admin/product')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="mb-3">
			  <label for="name" class="form-label">Product Name</label>
			  <input type="text" name="name" id="name" 
			  		placeholder="Product Name" class="form-control" 
			  		onfocusout="convertToSlug()" required>
			</div>
			<div class="mb-3">
			  <label for="description" class="form-label">Product Description</label>
			  <textarea name="description" id="description"
			  		class="form-control" placeholder="Product Description"></textarea>
			</div>
			<div class="mb-3">
			  <label for="category" class="form-label">Select Category</label>
			  <select class="form-control" name="category" id="category">
			  	@foreach($categories as $category)
			  		<option value="{{$category->id}}">{{$category->name}}</option>
			  	@endforeach
			  </select>
			</div>
			<div class="mb-3">
			  <label for="slug" class="form-label">Slug</label>
			  <input type="text" class="form-control" name="slug" id="slug" 
			  		placeholder="slug" required>
			  		@if($errors->has('slug'))
					    <div class="text-danger">{{ $errors->first('slug') }}</div>
					@endif
			</div>
			<div class="mb-3">
			  <label for="price" class="form-label">Price</label>
			  <input type="number" name="price" id="price" step="0.01" min="0.00" 
			  		placeholder="Price e.g: 99.99" class="form-control" required>
			</div>
			<div class="mb-3">
			  <label for="seo_title" class="form-label">SEO Title</label>
			  <input type="text" name="seo_title" id="seo_title" 
			  		placeholder="SEO Title" class="form-control" required>
			</div>
			<div class="mb-3">
			  <label for="seo_description" class="form-label">SEO Description</label>
			  <textarea name="seo_description" id="seo_description" 
			  		class="form-control" placeholder="SEO Description"></textarea>
			</div>
			<div class="mb-3">
			  <label for="image" class="form-label">Product Image</label>
			  <input type="file" name="image" id="image" 
			  		class="form-control" required>
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