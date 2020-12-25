@extends('admin.base')

@section('content')

<div class="container">
	<form action="{{url('admin/category')}}/{{$category->id}}" method="POST">
		@csrf
		@method('patch')
		<div class="mb-3">
		  <label for="name" class="form-label">Category Name</label>
		  <input type="text" name="name" id="name" 
		  		placeholder="Name" class="form-control" 
		  		onfocusout="convertToSlug()" 
		  		value="{{$category->name}}" required>
		  		@if($errors->has('name'))
				    <div class="text-danger">{{ $errors->first('name') }}</div>
				@endif
		</div>
		<div class="mb-3">
		  <label for="slug" class="form-label">Slug</label>
		  <input type="text" class="form-control" name="slug" id="slug" 
		  		placeholder="slug" 
		  		value="{{$category->slug}}" required>
		  		@if($errors->has('slug'))
				    <div class="text-danger">{{ $errors->first('slug') }}</div>
				@endif
		</div>
		<button type="submit" class="btn btn-primary">SAVE</button>
		<a href="{{url('admin/category')}}" 
			class="btn btn-danger">Cancel</a>
	</form>
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