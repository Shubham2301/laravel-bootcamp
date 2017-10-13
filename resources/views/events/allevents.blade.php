@extends ('layouts.app')

@section('content')

<div class="container">
	<table class="events-table table">
		<thead>
			<tr>
				<th>Event Name</th>
				<th>Event Theme</th>
				<th>Event Venue</th>
				<th>Event Date</th>
			</tr>
		</thead>

		<tbody>
			@foreach($events as $event)
				<tr>
					<td>{{$event->event_name}}</td>
					<td>{{$event->event_theme}}</td>
					<td>{{$event->event_venue}}</td>
					<td>{{$event->event_date}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection