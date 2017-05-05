{{-- This page changes the products on products page --}}

@extends('layouts.master')

@section('title')
    Pac Online
@endsection

@section('content')
	<div class="wrapper container-fluid">
        
        <div class="col-1-2">
            <div class="product-wrap">
                <div class="product-shot">
                    <img src="{{ $product->imageLocation }}" alt="..." style="max-height: 200px">
                </div>
            </div>
        </div>
        
        <div class="col-1-2">
            <div class="product-info">
                <h2>{{ $product->title }}</h2>
                
                <p class="gap-bottom">{{ $product->user->name  }} posted 
                         {{ $product->created_at->diffForHumans() }} </p>

                <div class ="desc"> {{ $product->desc }}. </div>

                <div class="price"><h4><b>${{ $product->price }}<b></h4></div>

                <div><a href="{{ route('product.addToCart',['id' => $product->id]) }}"
                        class="btn btn-primary"  role="button">Add to cart</a></div>
            </div>
            <div class="gap-bottom"><p style="clear:both;"></p></div>
        </div>
    </div>
@endsection