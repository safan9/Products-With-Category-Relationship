@extends('admin.base')

@section('content')

<div class="container">
	<form action="{{url('admin/category')}}" method="POST">
		@csrf
		<div class="mb-3">
		  <label for="name" class="form-label">Category Name</label>
		  <input type="text" name="name" id="name" 
		  		placeholder="Name" class="form-control" 
		  		onfocusout="convertToSlug()" required>
		  		@if($errors->has('name'))
				    <div class="text-danger">{{ $errors->first('name') }}</div>
				@endif
		</div>
		<div class="mb-3">
		  <label for="slug" class="form-label">Slug</label>
		  <input type="text" class="form-control" name="slug" id="slug" 
		  		placeholder="slug" required>
		  		@if($errors->has('slug'))
				    <div class="text-danger">{{ $errors->first('slug') }}</div>
				@endif
		</div>
		<button type="submit" class="btn btn-primary">SAVE</button>
	</form>

<hr>
		@if(session('msgSaved'))
	        <div class="container">
	            <div class="alert alert-success" role="alert">
	                {{ session('msgSaved') }}
	            </div>
	        </div>
    	@endif

	@if ($categories->isEmpty())
	    <p>No Categories</p>
	@else
		<h4>All Categories</h4>
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>No Of Products</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($categories as $category)
					<tr>
					    <td>{{$category->name}}</td>
					    <td>
					    	{{$category->products_count}}
					    </td>
					    <td>
					    	<a href="category/{{$category->id}}/edit" 
					    		class="btn btn-primary d-inline">Edit</a>
					    	<form method="POST" class="d-inline" 
					    		action="{{url('admin/category')}}/{{$category->id}}">
					    		@csrf
					    		@method('DELETE')
					    		<button type="submit" class="btn btn-danger">Delete</button>
					    	</form>
					    </td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{$categories->links("pagination::bootstrap-4")}}
	@endif
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