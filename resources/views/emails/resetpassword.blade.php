<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	<div><h5> User Name    :   {{$user_info->username}}</h5></div>
	<div><h5> Email        :   {{$user_info->email}}</h5></div>
	
	<div><h5> Please follow this link to reset your password :  <a href="{{ url('/') }}/API/users/resetpassword/{{$user_info->id}}/{{$user_info->api_token}}">{{ url('/') }}/API/users/confirmaccount/{{$user_info->id}}/{{$user_info->api_token}}</a>{</h5></div>
	<hr>


	</body>
</html>