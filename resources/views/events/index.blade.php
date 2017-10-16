@extends ('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-xs-12">
			<h2 style="text-align: center; margin-bottom: 30px;">ALL Events</h2>
			<table class="events-table table table-striped table-responsive">
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
							<td><a href="/events/{{$event->id}}" style="color:#A52A2A">{{$event->name}}</a></td>
							<td>{{$event->theme}}</td>
							<td>{{$event->venue}}</td>
							<td>{{$event->date}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection