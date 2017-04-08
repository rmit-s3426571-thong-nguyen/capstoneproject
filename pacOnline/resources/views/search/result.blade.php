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

<!--
<?php /*
@section('search')
	<div class="container-fluid text-center">
		<form class="form-inline" action="search" method="GET">

			<div class="input-group custom-search-form">
				<input type="text" class="form-control" id="search" name="search" size="50"
					placeholder="Search . . .">
			
				<span class="input-group-btn">
					<button type="submit" class="btn btn-default-sm">Search</button>
				</span>
			</div>
		</form>
	</div>
@endsection


@section('content')
	<div class="container-fluid text-left">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<p><b>Here is what we found...</b></p>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Image</th>
								<th>Title</th>
								<th>Description</th>
								<th>Price</th>
								<th>Seller</th>
								<th>Age</th>
								<th></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('#search').on('keyup',function() {
			$value=$(this).val();
			$.ajax({
				type : 'get',
				url  : '{{ URL:to('search') }}',
				data : {'search':$value},
				success:function(data) {
					$('tbody').html(data);
				}
			});
		})
	</script>
@endsection
*/ ?>
-->