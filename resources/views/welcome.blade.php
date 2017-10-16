<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Laravel Bootcamp</title>

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

		<!-- Styles -->
		<style>
			html, body {
				background-color: #fff;
				color: #636b6f;
				font-family: 'Raleway', sans-serif;
				font-weight: 100;
				height: 100vh;
				margin: 0;
			}

			.full-height {
				height: 100vh;
			}

			.flex-center {
				align-items: center;
				display: flex;
				justify-content: center;
			}

			.position-ref {
				position: relative;
			}

			.top-right {
				position: absolute;
				right: 10px;
				top: 18px;
			}

			.content {
				text-align: center;
			}

			.title {
				font-size: 84px;
			}

			.soiree {
				font-size: 30px;
			}

			.links > a {
				color: #636b6f;
				padding: 0 25px;
				font-size: 12px;
				font-weight: 600;
				letter-spacing: .1rem;
				text-decoration: none;
				text-transform: uppercase;
			}

			.m-b-md {
				margin-bottom: 30px;
			}

			.upcoming-event {
				/*background-color: #D5DBDB;*/
			}
		</style>
	</head>
	<body>
		<div class="flex-center position-ref full-height">
			@if (Route::has('login'))
				<div class="top-right links">
					@auth
						<a href="{{ url('/home') }}">Home</a>
					@else
						<a href="{{ route('login') }}">Login</a>
						<a href="{{ route('register') }}">Register</a>
					@endauth
				</div>
			@endif

			<div class="content row">
				<div class="upcoming-event col-xs-12">
					<h2 style="font-size: 50px;">Upcoming Event</h2>
					<p class="display-event-name soiree" name="name" >Event Name: <strong style="color:#A52A2A">{{$event->name}}</strong></p>
					<p class="display-event-theme soiree" name="theme">Theme: <strong style="color:#A52A2A">{{$event->theme}}</strong></p>
					<p class="display-event-date soiree" name="date">When: <strong style="color:#A52A2A">{{$event->date}}</strong></p>
					<p class="display-event-venue soiree" name="venue">Where: <strong style="color:#A52A2A">{{$event->venue}}</strong></p>
				</div>
			</div>
		</div>
	</body>
</html>
