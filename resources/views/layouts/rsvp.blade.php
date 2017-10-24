@extends('layouts.app')

@section('content')
	<h2>Event Name: {{$event->name}} </h2>
	<p>Event theme: {{$event->theme}} </p>
	<p>Event Date: {{$event->date}} </p>
	<p>Event Venue: {{$event->venue}} </p>

	<form action="/response" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="invite_id"  value="{{$invite_id}}">
		<input type="radio" name="response" value="1"> Coming
		<input type="radio" name="response" value="0"> Can't Make it this time.
		<br>
		<button type="submit" class="btn btn-primary">Submit your response</button>
	</form>
@endsection