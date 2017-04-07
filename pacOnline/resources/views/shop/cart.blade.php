@extends('layouts.master')

@section('title')
    Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <table>
            <tr>
                <th>
                    ITEM
                </th>
                <th>
                    QTY
                </th>
                <th>
                    Total
                </th>
                <th>

                </th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>
                    <span>
                        <img src="{{ $product['product']['imageLocation'] }}" alt="..." style="max-height: 50px" class="img-responsive">
                    </span>
                    <span>
                        {{ $product['product']['title'] }}
                    </span>
                </td>
                <td>
                    {{ $product['qty'] }}
                </td>
                <td>
                    {{ $product['price'] }}
                </td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td>
                    Total
                </td>
                <td>
                    {{$totalPrice}}
                </td>
                <td>
                </td>
            </tr>



        </table>
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