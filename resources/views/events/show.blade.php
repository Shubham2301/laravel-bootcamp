@extends ('layouts.app')

@section('content')
<style>
		.this-event {
			background-color: red;
		}
</style>

<div class="container">
	<div class="row">
		<div class="col-md-6 this-event">
			<h1 class="display-event-name soiree">Event Name: <strong>{{ $this_event->name }}</strong></h1>
			<p class="display-event-theme soiree">Theme: <strong>{{ $this_event->theme }}</strong></p>
			<p class="display-event-date soiree">When: <strong>{{ $this_event->date }}</strong></p>
			<p class="display-event-venue soiree">Where: <strong>{{ $this_event->venue }}</strong></p>
		</div>

		<div class="col-md-4 col-md-offset-2">
			<h1 class="send-invites">Send Invitations</h1>
				<ul>
					@foreach($guest_list as $guest)
						<li><a href="/events/{{$this_event->id}}/invite/{{$guest->id}}">{{$guest->name}}</a></li>
					@endforeach
				</ul>
		</div>
	</div>
</div>
<hr>
<div class="relationship-data">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>Guests Invited for this event</h3>
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach($this_event->event_guest as $event_guest)
						<tr>
							<td>{{ $event_guest->name }}</td>
							<td>{{ $event_guest->email }}</td>
							<td>{{ $event_guest->pivot->RSVP_status }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
</div>

@endsection