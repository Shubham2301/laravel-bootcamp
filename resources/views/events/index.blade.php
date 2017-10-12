@extends('layouts.app')

@section('content')

<form method="POST" action='/events'>
	<div class="container">
		<div class="form-group">
			<label for="event_name">Event Name</label>
			<input type="text" class="form-control" id="event_name"  placeholder="Enter event name" required >
		</div>

		<div class="form-group">
			<label for="event_theme">Event Theme</label>
			<input type="text" class="form-control" id="event_theme" placeholder="Enter event theme" required >
		</div>
		
		<div class="form-group">
			<label for="event_date">Event date</label>
			<input type="date" class="form-control" id="event_date" placeholder="Enter event theme" required >
		</div>

		<div class="form-group">
			<label for="event_venue">Event Venue</label>
			<input type="text" class="form-control" id="event_venue" placeholder="Enter event venue" required >
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>

@endsection