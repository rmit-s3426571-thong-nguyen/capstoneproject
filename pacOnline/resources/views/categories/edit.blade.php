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
                    <select class="form-control" name="parent_id">
                        <option selected="selected" value="0">Select a Category</option>
                        @foreach($allCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <a class="col-md-8 btn btn-sm btn-primary pull-left" onclick="document.getElementById('editCategory').submit()" >Update</a>
                </div>
			</form>
            <a class="col-md-3 btn btn-sm btn-success pull-left" href="{{ route('categories.index') }}" >Go Back</a>
            <form id ="deleteCategory" action="{{ route('categories.destroy', $category->id) }}" method="post">

                {!! method_field('delete') !!}

                {{ csrf_field() }}
                <a class="col-md-1 btn btn-sm btn-danger pull-left" onclick="document.getElementById('deleteCategory').submit()" >Delete</a>
            </form>

        </div>
        @include('includes.errors')
    </div>
@endsection