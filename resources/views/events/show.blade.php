@extends ('layouts.app')

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-6 col-xs-12 this-event" style="text-align: center; border-style: double; border-color: #563d7c; margin: auto;">
			<h2 class="display-event-name soiree">Event Name: <strong style="color:#A52A2A">{{ $this_event->name }}</strong></h2>
			<p class="display-event-theme soiree">Theme: <strong style="color:#A52A2A; font-size:16px ">{{ $this_event->theme }}</strong></p>
			<p class="display-event-date soiree">When: <strong style="color:#A52A2A; font-size:16px ">{{ $this_event->date }}</strong></p>
			<p class="display-event-venue soiree">Where: <strong style="color:#A52A2A; font-size:16px ">{{ $this_event->venue }}</strong></p>
		</div>

		<div class="col-md-4 col-md-offset-2 col-xs-12">
			<h2 class="send-invites">Send Invitations</h2>
				<ul>
					@foreach($guest_list as $guest)
						<li><a href="/events/{{$this_event->id}}/invite/{{$guest->id}}">{{$guest->name}}</a></li>
					@endforeach
					<li><a href="/events/{{$this_event->id}}/invite/invite_all"><strong>Invite All</strong> </a></li>
				</ul>
		</div>
	</div>
</div>
<hr>
<div class="relationship-data">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3 style="font-weight: bold;">Guests Invited for this event</h3>
				<table class="table table-striped">
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
							<td><a href="/guests/{{ $event_guest->id }}">{{ $event_guest->name }}</a></td>
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