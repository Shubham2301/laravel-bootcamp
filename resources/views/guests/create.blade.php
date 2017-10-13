@extends('layouts.app')

@section('content')

<form method="POST" action='/guests'>
	{{ csrf_field() }}
	<div class="container">
		<div class="form-group">
			<label for="event_name">Guest Name</label>
			<input type="text" class="form-control" id="event_name"  placeholder="Enter event name" name="event_name" required >
		</div>

		<div class="form-group">
			<label for="event_theme">Guest Email</label>
			<input type="email" class="form-control" id="event_theme" placeholder="Enter event theme" name="event_theme" required >
		</div>
		
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>

@endsection