@extends('layouts.master')

@section('title')
    My Listings
@endsection

@section('content')
    <div class="row">
        @foreach($products as $product)
            @include('shop.userproducts')
        @endforeach
    </div>
@endsection