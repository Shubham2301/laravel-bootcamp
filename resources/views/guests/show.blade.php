@extends ('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="this-event row" style="text-align: center; border-style: double; border-color: #563d7c; margin: auto; background-color: #FFF; box-shadow: 3px 3px #E0E0E0">
			<h2 class="display-event-name soiree">Guest Name: <strong>{{$this_guest->name}}</strong></h2>
			<h3 class="display-event-theme soiree">Guest Email: <strong>{{$this_guest->email}}</strong></h3>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="relationship-data col-xs-12 col-sm-6">
			<table class="table">
				<thead>
					<th>Event</th>
					<th>Status</th>
				</thead>
			@foreach($this_guest->guest_event as $guest_event)
					<tr>
						<td>{{ $guest_event->name }}</td>
						@if($guest_event->pivot->RSVP_status == '')
								<td><span class="label label-warning">Pending</span></td>
							@endif
							@if($guest_event->pivot->RSVP_status == '1')
								<td><span class="label label-success">Confirm</span></td>
							@endif
							@if($guest_event->pivot->RSVP_status == '0')
								<td><span class="label label-danger">Declined</span></td>
							@endif
						<td>{{ $guest_event->pivot->RSVP_status }}</td>
					</tr>
			@endforeach
			</table>
		</div>
	</div>
</div>

@endsection