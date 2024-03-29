@extends('layouts.master')

@section('title')
    Create Listing
@endsection

@section('content')
<div class="container">
	<div class="col-sm-12">
		<h1>Post a product</h1>
		<hr>
		<form method="POST" action="/products" enctype="multipart/form-data">

			{{ csrf_field() }}
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <div class="form-group">
                    <label for="title"> Product Title</label>
                    <input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title">
                </div>
            </div>

            <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea type="body" class="form-control" id="desc" value="{{ old('desc') }}" name="desc"></textarea>
                </div>
            </div>

            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                <div class="form-group">
                    <label for="price">Price($)</label>
                    <textarea type="body" class="form-control" id="price" value="{{ old('price') }}" name="price" ></textarea>
                </div>
            </div>

            <div class="form-group{{ $errors->has('imageLocation') ? ' has-error' : '' }}">
                <div class="form-group">
                         <label>Upload Product Image</label>
                         <input type="file" name='image'>
                </div>
            </div>
			<div class="form-group">
                <button name="sell" value="sell" type="submit" class="btn btn-primary">Sell this product</button>
                <button name="preview" value="preview" type="submit" class="btn btn-success">Preview this product</button>
            </div>

			@include('includes.errors')
		</form>
	</div>
</div>
@endsection