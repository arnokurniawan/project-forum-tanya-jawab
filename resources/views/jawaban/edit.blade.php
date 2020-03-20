<!DOCTYPE html>
<html>
<head>
	<title>EDIT JAWABAN</title>
</head>
<body>
	<form action="{{ route('jawaban.update', ['id' => $jawaban->id ]) }}" method="post" >
		@csrf
		@method('PUT')
		<label>Isi Jawaban :</label>
		<textarea name="isi" cols="40" rows="10" >{{ $jawaban->isi }}</textarea><br>
		<input type="submit" name="submit" value="Edit">

	</form>
</body>
</html>