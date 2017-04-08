@extends('layouts.master')

@section('title')
    Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="cart">
            <table>
                <thead>
                    <tr>
                        <th class="image">Image</th>
                        <th class="title">Title</th>
                        <th class="number">Quantity</th>
                        <th class="number">Price</th>
                        <th class="bin"></th>
                    </tr>
                </thead>
                
                <tbody>
            
                    @foreach($products as $product)
                    <tr>
                        <td><span><img src="{{ $product['product']['imageLocation'] }}"
                            alt="..." class="img-responsive"></span></td>
                        <td><span>{{ $product['product']['title'] }}</span></td>
                        <td>{{ $product['qty'] }}</td>
                        <td>{{ $product['price'] }}</td>
                        <th></th>
                    </tr>
                    @endforeach
            
                    <tr class="totalprice">
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>{{$totalPrice}}</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3 text-right">
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