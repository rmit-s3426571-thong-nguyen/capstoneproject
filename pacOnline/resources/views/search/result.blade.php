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
            <h4 class="text-center"> This is what we found ... </h4>
        	@foreach($products as $product)
            	@include('shop.product')
        	@endforeach
        </div>
    @else
        <div class="alert alert-danger fade in text-center">
    		<p><strong>Sorry!</strong> The we could not find what you are looking for.</p>
    		<p>Please search for something else.</p>
		</div>
	@endif
@endsection