@extends ('layouts.app')

@section('content')

<div class="container">
	<table class="events-table table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Event Name</th>
				<th>Event Theme</th>
				<th>Event Venue</th>
				<th>Event Date</th>
			</tr>
		</thead>

		<tbody>
			@foreach($events as $event)
				<tr>
					<td>{{$event->id}}</td>
					<td><a href="/events/{{$event->id}}">{{$event->name}}</a></td>
					<td>{{$event->theme}}</td>
					<td>{{$event->venue}}</td>
					<td>{{$event->date}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection