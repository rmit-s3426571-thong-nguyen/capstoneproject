@extends('layouts.master')

<!--- someone please make this pretty pleaseeeeeeeee -->
@section('content')
	<div class="col-md-12">
		<h1>Edit: {{ $category->name }}</h1>
		<div class="well">
			<form  method="post" action="{{ route('categories.update', $category->id) }}">	
			    {!! method_field('put') !!}
			    {{ csrf_field() }}
				<label for="name">New Name:</label>
				<input type="text" class="form-control" id="name" name="name">
				<span>
					<button type="submit" class="btn btn-primary btn-block">Update</button>
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
@endsection