{{-- This page changes the products on products page --}}

@extends('layouts.master')

@section('title')
    Pac Online
@endsection

@section('content')
	<div class="product-wrapper">
        <div class="col-1-2">

            <div class="product-wrap">
            	<div class="product-shot">
                	{{-- <img src="/uploads/productImages/{{$product->imageLocation}}" alt="..." style="max-height: 150px" --}}
                    <img src="{{ $product->imageLocation }}" alt="..." style="max-height: 150px"
                    	 class="img-responsive">
                </div>
            </div>
        </div>

        <div class="col-1-2">
           	<div class="product-info">
	            <h2>{{ $product->title }}</h2>
	            
	            <p class="product-container">{{ $product->user->name  }} posted 
                   		{{ $product->created_at->diffForHumans() }}</p>

                <div class="price"><b>${{ $product->price }}</b></div>

	            <div class="desc">
		        	<p style="clear:both;">{{ $product->desc }}.</p>
		        </div>

  		        <div><a href="{{ route('product.addToCart',['id' => $product->id]) }}"
            	        class="btn btn-primary"  role="button">Add to cart</a>
                </div>
            </div>
        </div>   
    </div>
@endsection 