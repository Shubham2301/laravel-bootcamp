@extends ('layouts.app')

@section('content')

<div class="container">
	<div class="this-event row">
		<p class="display-event-name soiree">Guest Name: <strong>{{$this_guest->name}}</strong></p>
		<p class="display-event-theme soiree">Guest Email: <strong>{{$this_guest->email}}</strong></p>
	</div>
</div>

<div class="relationship-data">
	@foreach($this_guest->guest_event as $guest_event)
		<ul>
			<li>{{ $guest_event->name }}</li>
		</ul>
	@endforeach
</div>

@endsection