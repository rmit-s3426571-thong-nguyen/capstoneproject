<!-- ?? Currently not in use? -->
@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div data-role="page" id="pageone">
                <div data-role="header">
                    <h1>Manage Categories</h1>
                </div>
                <div data-role="main" class="ui-content">
                    <h2>Category Lists</h2>
                    <div data-role="collapsible">
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="{{ route('categories.edit', $category->id ) }}">{{ $category->name }}</a>
                                    @if(count($category->children))
                                        @include('categories.subcategories',['children' => $category->children])
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- end show category section  -->
        <div class="col-md-4">
            <div class="well">
                <form action="{{ route('categories.store') }}" method="post">

                    {{ csrf_field() }}

                    <h2>New Category</h2>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="parent_id">
                            <option selected="selected" value="0">Select a Category</option>
                        @foreach($allCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <span>
                        <button type="submit" class="btn btn-primary btn-block btn- ">Create</button>
                    </span>
                    @include('includes.errors')
                </form>
            </div>
        </div>

    </div>

    @endsection