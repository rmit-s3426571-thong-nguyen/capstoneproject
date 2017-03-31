@extends ('layouts.master')


@section('title')
    My Details
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"> My Details </div>
					
					<form method="POST" action="">
  						<input type="hidden" name="_token" value="">
  						<input type="hidden" name="_method" value="PUT">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" value="" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">
    <i class="fa fa-btn fa-sign-in"></i>Update
  </button>
</form>
				</div>
			</div>
        </div>
    </div>
@endsection