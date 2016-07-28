<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
<form action="nama" method="post">
	{{ csrf_field() }}
	Nama : <input type="text" name="nama"><br>
	<input type="submit" name="OK">	
</form>
</body>
</html>