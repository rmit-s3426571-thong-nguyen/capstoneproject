@extends('layouts.master')

<!--- someone please make this pretty pleaseeeeeeeee -->
@section('content')
	<div class="col-md-12">
		<h1>Edit: {{ $category->name }}</h1>
		<div class="container">
			<form  id ="editCategory" method="post" action="{{ route('categories.update', $category->id) }}">
			    {!! method_field('put') !!}
			    {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">New Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <a class="col-md-10 btn btn-sm btn-primary pull-right" onclick="document.getElementById('editCategory').submit()" >Update</a>
                </div>
                @include('includes.errors')
				@endif

			</form>
            <form id ="deleteCategory" action="{{ route('categories.destroy', $category->id) }}" method="post">

                {!! method_field('delete') !!}

                {{ csrf_field() }}
                <a class="col-md-2 btn btn-sm btn-danger pull-right" onclick="document.getElementById('deleteCategory').submit()" >Delete</a>
            </form>

		</div>
	</div>
@endsection