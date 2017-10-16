@extends ('layouts.app')

@section('content')

<div class="container">
	<table class="guests-table table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Guest Name</th>
				<th>Event email</th>
			</tr>
		</thead>

		<tbody>
			@foreach($guests as $guest)
				<tr>
					<td>{{$guest->id}}</td>
					<td><a href="/guests/{{$guest->id}}">{{$guest->name}}</a></td>
					<td>{{$guest->email}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection