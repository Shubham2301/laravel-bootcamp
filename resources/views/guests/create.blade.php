@extends('layouts.app')

@section('content')

<form method="POST" action='/guests'>
	{{ csrf_field() }}
	<div class="container">
		<div class="form-group">
			<label for="name">Guest Name</label>
			<input type="text" class="form-control" id="guest_name"  placeholder="Enter name" name="name" required >
		</div>

		<div class="form-group">
			<label for="email">Guest Email</label>
			<input type="email" class="form-control" id="guest_email" placeholder="Enter email" name="email" required >
		</div>
		
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>

@endsection