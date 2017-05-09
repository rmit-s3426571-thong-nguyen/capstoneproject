@extends('layouts.master')

@section('title')
    Edit Listing
@endsection

@section('content')
@if($products->user_id == Auth::id())
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
				<label for="price">Price($)</label>
				<input type="body" class="form-control" id="price" value="{{ $products->price }}" name="price" ></input>
			</div>

            <div class="form-group{{ $errors->has('imageLocation') ? ' has-error' : '' }}">
                <div class="form-group">
                         <label>Update Product Image</label>
                         <input type="file" name='imageLocation'>
                </div>
            </div>


			<div class="form-group">
					<button type="submit" class="btn btn-primary">Save Changes</button>
			</div>

			@include('includes.errors')
		</form>
	</div>
@endif
@endsection