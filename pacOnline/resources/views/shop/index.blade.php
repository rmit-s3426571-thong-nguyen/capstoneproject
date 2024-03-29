@extends('layouts.master')

@section('title')
    Pac Online
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2" style="border-right: 1px solid black; height: 100%;">
                <h4>Filter</h4>
                <ul class="nav nav-pills nav-stacked">
                    <li><h5 style="margin: 0px">Categories</h5>
                        <ul class="gap-bottom">
                            @foreach($categories as $category)
                                @if($category->children->count() > 0)
                                    <li><a href="/?category={{$category->id}}">{{ $category->name }} </a>
                                        <ul>
                                            @foreach($category->children as $subcat)
                                                <li><a href="/?category={{$subcat->id}}">{{ $subcat->name }} </a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    @if(!$category->parent)
                                        <li><a href="/?category={{$category->id}}">{{ $category->name }} </a>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li><h5 style="margin: 0px">Price Range</h5>
                        <form action="{{ url('/') }}" method="get">
                            <div class="gap-bottom">
                                <input type="input" size="5" name="price-min" id="price-min" placeholder="min"
                                       value="{{ old('price-min') }}" min="{{ \App\Product::min('price') }}"
                                       max="{{ \App\Product::max('price') }} required">
                                to 
                                <input type="input" size="5" name="price-max" id="price-max" placeholder="max"
                                       value="{{ old('price-max') }}" min="{{ \App\Product::min('price') }}" 
                                       max="{{ \App\Product::max('price') }} required">
                            </div>
                            <div class="text-center">
                                <input type="submit" data-inline="true" value="Apply">
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="pull-left">
                        <h3>Most Recent</h3>
                    </div>
                    <div class="dropdown pull-right sort-by-dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Sort by ...
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <li><a href="/?sort=lth">Price: Low to High</a></li>
                            <li><a href="/?sort=htl">Price: High to Low</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        @include('shop.product')
                    @endforeach
                </div>
            </div>
        </div>
@endsection