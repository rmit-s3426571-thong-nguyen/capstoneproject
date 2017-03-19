@extends('layouts.master')

@section('title')
    Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                @foreach($products as $product)
                    <li class="list-group-product">
                        <span class="badge">{{ $product['qty'] }}</span>
                        {{ $product['product']['title'] }}
                        <span class="lable label-success">{{ $product['price'] }}</span>
                    </li>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total Price : {{$totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <button type="button" class="btn btn-success">Checkout</button>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h1>Your cart is empty</h1>
            </div>
        </div>
    @endif
@endsection