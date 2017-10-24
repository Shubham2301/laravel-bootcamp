<!doctype html>
<html>
	<head>
		<title>Welcome to ColoredCow Soiree</title>
	</head>
	<body>
			<h1>welcome here </h1>
			<p>Hello {{$guest->name}}. You are invited to {{$event->name}}. Which will be held at {{$event->venue}} on {{$event->date}}.</p>
			<p><a href="{{$token}}">Click here to submit your response.</a></p>
	</body>
</html>