<?php /* 
maybe extends master view here :P
@extends('layouts.app') 
*/?>

@extends('layouts.master')

@section('title')
    Search Result
@endsection

@section('content')
    
    @if(count($products) > 0)
    	<div class="row">
            <h4 class="text-center"> This is what we could find ... </h4>
        	@foreach($products as $product)
            	@include('shop.product')
        	@endforeach
        </div>
    @else
        <div class="alert alert-danger fade in">
    		<p><strong>Sorry!</strong> The product you are trying to find is NOT available.</p>
    		<p>Please search for something else.</p>
		</div>
	@endif
@endsection