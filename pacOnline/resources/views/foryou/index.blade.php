@extends('layouts.master')

@section('title')
    For You
@endsection

@section('content')
    <p>We have found some products for you :) JUST FOR YOU! OUR FAVOURITE CUSTOMER.</p>
    <div class="row">
        @foreach($products as $product)
            @include('shop.product')
        @endforeach
    </div>
@endsection