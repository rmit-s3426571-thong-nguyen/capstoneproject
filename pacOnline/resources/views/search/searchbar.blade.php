<!-- The following code was adapted from https://www.youtube.com/watch?v=hEoTi8ms0hA
	 this is for educational purposes only -->

<div class="container-fluid text-center">
	<form class="form-inline" action="{{ url('/search') }}" method="get">
		<div class="input-group custom-search-form">
			<input type="text" name="search" id="search" class="form-control" size="50" placeholder="Search . . .">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-default-sm">Search</button>
			</span>
		</div>
		
	</form>
</div>