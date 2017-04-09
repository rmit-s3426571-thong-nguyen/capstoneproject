@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>Categories</h1>
		<table>
			<thead>
				<tr>
					<th>Name</th>
				</tr>
			</thead>
			@if(isset($categories))
			<tbody>
				@foreach ($categories as $category)
				<tr>
					<th>
					<form id ="deleteCategory" action="{{ route('categories.destroy', $category) }}" method="post">
						{!! method_field('delete') !!}
						{{ csrf_field() }}
						<a class="btn btn-sm btn-danger pull-right" onclick="document.getElementById('myform').submit()" href="{{ route('categories.destroy', $category->id ) }}">Delete</a>
					</form>
					<a class="btn btn-sm btn-success pull-right" href="{{ route('categories.edit', $category->id ) }}">Edit</a>
					{{ $category->name }} 
					</th>
				</tr>
				@endforeach
			</tbody>
			@else
			<h1>There is no categories.</h1>
			@endif
		</table>
		
	</div> <!-- end show category section  -->

	<div class="col-md-4">
		<div class="well">
			<form action="{{ route('categories.store') }}" method="post">

				{{ csrf_field() }}

				<h2>New Category</h2>

				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" name="name">
				<span>
					<button type="submit" class="btn btn-primary btn-block btn- ">Create</button>
				</span>
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
			</form>
		</div>
	</div>

</div>

@endsection