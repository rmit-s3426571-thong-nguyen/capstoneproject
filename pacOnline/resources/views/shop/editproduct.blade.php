@extends('layouts.master')

@section('title')
    Edit Listing
@endsection

@section('content')
@if($products->user_id == Auth::id())
	<div class="col-sm-12">
		<h1>Edit Your product</h1>
		<hr>
		<form method="POST" action="/product/{{$products->id}}" enctype="multipart/form-data">
			{{ method_field('PUT') }}
			{{ csrf_field() }}

			<div class="form-group">
				<label for="title"> Product Title</label>
				<input type="text" class="form-control" id="title" value="{{ $products->title }}" name="title">
			</div>

			<div class="form-group">
				<label for="desc">Description</label>
				<input type="body" class="form-control" id="desc" value="{{ $products->desc }}" name="desc"></input>
			</div>
			<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
				<div class="form-group">
					<label for="category_id">Category</label>
                    <?php $productCat = \App\Category::find($products->category_id); ?>
					<select class="form-control" name="category_id" >
						@foreach($categories as $category)
							@if($category == $productCat)
								<option value="{{ $category->id }}" selected> {{ $category->name }}</option>
							@else
								<option value="{{ $category->id }}"> {{ $category->name }}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="price">Price($)</label>
				<input type="body" class="form-control" id="price" value="{{ $products->price }}" name="price" ></input>
			</div>

			<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
				<img src="{{ $products->imageLocation }}" alt="..." style="max-height: 150px" class="img-responsive">
				<div class="form-group">
					<label>Change Product Image</label>
					<input type="file" name='image'>
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