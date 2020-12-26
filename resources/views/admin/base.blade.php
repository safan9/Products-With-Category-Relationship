<!DOCTYPE html>
<html>
<head>
	<title>Shop @yield('seo_title')</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
	crossorigin="anonymous">

	@yield('header_files')

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="{{url('/')}}">Shop</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarNav">
	      <ul class="navbar-nav">
	      	<li class="nav-item">
	          <a class="nav-link" href="{{url('admin/product/')}}">Products</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="{{url('admin/category/')}}">Categories</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<div>
		@yield('content')
	</div>

	<!-- JavaScript Files -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

	<!-- To Include any additional scripts from extending page.-->
	@yield('scripts')

</body>
</html>