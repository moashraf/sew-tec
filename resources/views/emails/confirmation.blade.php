<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	<div><h5> User Name    :   {{$user_info->username}}</h5></div>
	<div><h5> Email        :   {{$user_info->email}}</h5></div>
	<div><h5> Phone        :   {{$user_info->phone}}</h5></div>
	<div><h5> Address      :    {{$user_info->address}}</h5></div>
	<div><h5> Please follow this link to confirm your account :  <a href="{{ url('/') }}/API/users/confirmaccount/{{$user_info->id}}/{{$user_info->api_token}}">{{ url('/') }}/API/users/confirmaccount/{{$user_info->id}}/{{$user_info->api_token}}</a>{</h5></div>
	<hr>


	</body>
</html>