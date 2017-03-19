@extends('layouts.master')

@section('content')

<div class="col-sm-12">
	<h1>Post a product</h1>
	<hr>
	<form method="POST" action="/products">

		{{ csrf_field() }}

		<div class="form-group">
			<label for="title"> Product Title</label>
			<input type="text" class="form-control" id="title" name="title">
		</div>

		<div class="form-group">
			<label for="desc">Desciption</label>
			<textarea type="body" class="form-control" id="desc" name="desc" ></textarea>
		</div>

		<div class="form-group">
			<label for="price">Price</label>
			<textarea type="body" class="form-control" id="price" name="price" ></textarea>
		</div>

		<div class="form-group">
			<label for="image">Images</label>
			<textarea type="body" class="form-control" id="imageLocation" placeholder="Just paste a product image url here..." name="imageLocation" ></textarea>
		</div>


		<div class="form-group">
				<button type="submit" class="btn btn-primary">Sell this product</button>
		</div>

		@include('includes.errors')
	</form>
</div>
@endsection