@extends('layouts.app')

@section('content')

<form method="POST" action='/events'>
	{{ csrf_field() }}
	<div class="container">
		<div class="form-group">
			<label for="name">Event Name</label>
			<input type="text" class="form-control" id="event_name"  placeholder="Enter event name" name="name" required >
		</div>

		<div class="form-group">
			<label for="theme">Event Theme</label>
			<input type="text" class="form-control" id="event_theme" placeholder="Enter event theme" name="theme" required >
		</div>
		
		<div class="form-group">
			<label for="date">Event date</label>
			<input type="date" class="form-control" id="event_date" placeholder="Enter event theme" name="date" required >
		</div>

		<div class="form-group">
			<label for="venue">Event Venue</label>
			<input type="text" class="form-control" id="event_venue" placeholder="Enter event venue" name="venue" required >
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>

@endsection