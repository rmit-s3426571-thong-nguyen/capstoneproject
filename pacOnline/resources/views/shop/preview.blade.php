@extends('layouts.master')

@section('title')
    PREVIEW
@endsection

@section('content')
    <h3 class="jumbotron text-center gap-bottom">PREVIEW!! This does not create a listing.</h3>

    <div class="product-wrapper">
        <div class="col-1-2">
            <div class="product-wrap">
                <div class="product-shot">
                     <img src="{{ $product->imageLocation }}" alt="..." style="max-height: 150px"
                    {{-- <img src="/uploads/productImages/{{$product->imageLocation}}" alt="..." style="max-height: 150px" --}}
                         class="img-responsive"> 
                </div>
            </div>
        </div>

        <div class="col-1-2">
            <div class="product-info">
                <h2>{{ $product->title }}</h2>
                
                <p class="product-container">{{ $product->user->name  }} posted today </p>

                <div class="price"><b>${{ $product->price }}</b></div>

                <div class="desc">
                    <p style="clear:both;">{{ $product->desc }}.</p>
                </div>
                <div><a class="btn btn-success product-button pull-left"
                        role="button" href="javascript:history.back()">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection