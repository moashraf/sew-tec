<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
	<div><h5> Order Number :{{$orderNumber}}</h5></div>
	<div><h5> User Name    :{{$user_info->username}}</h5></div>
	<div><h5> Email        :{{$user_info->email}}</h5></div>
	<div><h5> Phone        :{{$user_info->phone}}</h5></div>
	<div><h5> Address      :{{$user_info->address}}</h5></div>
	<hr>
	@foreach($items as $item)
	<div><h5> Product Name     :{{$item->product_name}}</h5></div>
	<div><h5> Product Price    :{{$item->product_price}}</h5></div>
	<div><h5> Product Quantity :{{$item->quantity}}</h5></div>
	<hr>
	@endforeach


	</body>
</html>