@extends ('layouts.app')

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-6 col-xs-12 this-event" style="text-align: center; border-style: double; border-color: #563d7c; margin: auto; background-color: #FFF; box-shadow: 3px 3px #E0E0E0">
			<h2 class="display-event-name soiree" style="color: #000;" >Event Name: <strong style="color:#A52A2A">{{ $this_event->name }}</strong></h2>
			<p class="display-event-theme soiree" style="color: #000;" >Theme: <strong style="color:#A52A2A; font-size:16px ">{{ $this_event->theme }}</strong></p>
			<p class="display-event-date soiree" style="color: #000;" >When: <strong style="color:#A52A2A; font-size:16px ">{{ $this_event->date }}</strong></p>
			<p class="display-event-venue soiree" style="color: #000;" >Where: <strong style="color:#A52A2A; font-size:16px ">{{ $this_event->venue }}</strong></p>
		</div>

		<div class="col-md-4 col-md-offset-2 col-xs-12">
			<h2 class="send-invites">Send Invitations</h2>
				<table class="table">
					<thead>
						<th>Name</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($guest_list as $guest)
						<tr>
							<td>{{$guest->name}}</td>
							<td><a href="/events/{{$this_event->id}}/invite/{{$guest->id}}" class="btn btn-success">Send Invite</a></td>
						</tr>
						@endforeach
						<tr>
							<td>Invite All</td>
							<td><a href="/events/{{$this_event->id}}/invite/invite_all" class="btn btn-primary"><strong>Invite All</strong></a></td>
						</tr>
					</tbody>
				</table>
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
							@if($event_guest->pivot->RSVP_status == '')
								<td><span class="label label-warning">Pending</span></td>
							@endif
							@if($event_guest->pivot->RSVP_status == '1')
								<td><span class="label label-success">Confirm</span></td>
							@endif
							@if($event_guest->pivot->RSVP_status == '0')
								<td><span class="label label-danger">Declined</span></td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
</div>

@endsection