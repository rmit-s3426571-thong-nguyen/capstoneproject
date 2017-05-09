@extends('layouts.master')

@section('title')
    For You
@endsection

@section('content')
    <div class="text-center gap-bottom">
    	<h3>Recommendations for You :)</h3>
    	<p>Based on your interests we would like to recommend the following products to you</p>
    </div>
    <div class="row">
        @foreach($products as $product)
            @include('shop.product')
        @endforeach
    </div>
@endsection