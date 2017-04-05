@extends('layouts.app')


@section('title')
	Search Result
@endsection


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