@extends('layouts.master')

@section('title')
    Pac Online
@endsection

@section('content')
    <div class="row">
        @foreach($products as $product)
            @include('shop.product')
        @endforeach
    </div>
@endsection