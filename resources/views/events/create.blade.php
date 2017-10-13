@extends('layouts.app')

@section('content')

<form method="POST" action='/events'>
	{{ csrf_field() }}
	<div class="container">
		<div class="form-group">
			<label for="event_name">Event Name</label>
			<input type="text" class="form-control" id="event_name"  placeholder="Enter event name" name="event_name" required >
		</div>

		<div class="form-group">
			<label for="event_theme">Event Theme</label>
			<input type="text" class="form-control" id="event_theme" placeholder="Enter event theme" name="event_theme" required >
		</div>
		
		<div class="form-group">
			<label for="event_date">Event date</label>
			<input type="date" class="form-control" id="event_date" placeholder="Enter event theme" name="event_date" required >
		</div>

		<div class="form-group">
			<label for="event_venue">Event Venue</label>
			<input type="text" class="form-control" id="event_venue" placeholder="Enter event venue" name="event_venue" required >
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>

@endsection