<!DOCTYPE html>
<html ng-app>
<head>
<title>{{ $title }}</title>
{{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css') }}
{{ HTML::script('//code.jquery.com/jquery-1.9.1.js') }}
<!--
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.6/angular.min.js"></script>
-->
{{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js') }}
</head>
<body style="padding-top: 50px;">
	@yield('menu')
	<div class="container" style="padding:10px;">
	@yield('content')
	</div>
</body>
</html>