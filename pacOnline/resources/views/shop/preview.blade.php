{{-- This page changes the products on products page --}}

@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Yo! this is how it looks when you post it</h1>
        <hr>
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

                    <div class="pull-left product-container"><b>${{ $product->price }}</b></div>
                </div>
                <div class="gap-bottom">
                    <p style="clear:both;">{{ $product->desc }}.</p>
                </div>
            </div>
        </div>
        <div>
            <a class="btn btn-primary product-button pull-left" role="button" href="javascript:history.back()">Go Back</a>
        </div>
    </div>
@endsection