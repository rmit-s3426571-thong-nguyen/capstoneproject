{{-- This page changes the products on products page --}}

@extends('layouts.master')

@section('title')
    Pac Online
@endsection

@section('content')
	<div class="product-container">

        <div class="product-padding">

            <div class="product-image gap-bottom">
                <img src="{{ $product->imageLocation }}" alt="..." style="max-height: 150px"
                    class="img-responsive">
            </div>

            <a class="text-left" style="text-decoration: none">
                <h3>{{ $product->title }}</h3>
            </a>

            <div class ="gap-bottom">
                <p class="product-container">{{ $product->user->name  }} posted 
                    {{ $product->created_at->diffForHumans() }}</p>
                
                <div class="pull-left product-container"><b>${{ $product->price }}</b></div>

                <div><a href="{{ route('product.addToCart',['id' => $product->id]) }}"
                    class="btn btn-primary product-button"  role="button">Add to cart</a>
                </div>
            </div>
            <div class="gap-bottom">
                <p style="clear:both;">{{ $product->desc }}.</p>
            </div>
        </div>
    </div>
@endsection