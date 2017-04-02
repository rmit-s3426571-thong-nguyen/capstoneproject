<!-- The following code was adapted from https://www.youtube.com/watch?v=hEoTi8ms0hA
	 this is for educational purposes only -->

<div class="container-fluid text-center">
	<form class="form-inline" action="search" method="GET">

		<div class="input-group custom-search-form">
			<input type="text" class="form-control" size="50" name="s" placeholder="Search . . ."
			value="{!! isset($s) ? $s : '' !!}">
			
			<span class="input-group-btn">
				<button type="submit" class="btn btn-default-sm">Search</button>
			</span>
		</div>
	</form>
</div>