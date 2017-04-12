@extends('layouts.master')

@section('title')
    Edit Listing
@endsection

@section('content')

<div class="col-sm-12">
	<h1>Edit Your product</h1>
	<hr>
	<form method="POST" action="/product/{{$products->id}}">
		{{ method_field('PUT') }}
		{{ csrf_field() }}

		<div class="form-group">
			<label for="title"> Product Title</label>
			<input type="text" class="form-control" id="title" value="{{ $products->title }}" name="title">
		</div>

		<div class="form-group">
			<label for="desc">Desciption</label>
			<input type="body" class="form-control" id="desc" value="{{ $products->desc }}" name="desc"></input>
		</div>

		<div class="form-group">
			<label for="price">Price</label>
			<input type="body" class="form-control" id="price" value="{{ $products->price }}" name="price" ></input>
		</div>

		<div class="form-group">
			<label for="image">Images</label>
			<input type="body" class="form-control" id="imageLocation"  value="{{ $products->imageLocation }}" placeholder="Just paste a product image url here..." name="imageLocation" ></input>
		</div>


		<div class="form-group">
				<button type="submit" class="btn btn-primary">Edit product</button>
		</div>

		@include('includes.errors')
	</form>
</div>
@endsection