<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="api/books" method="post" id="books_form">
		@csrf
		<input type="text" name="isbn" id="isbn" class="form-control" placeholder="Enter your isbn" pattern="[0-9]{1,13}">
		<input type="text" name="title" class="form-control" placeholder="Enter your title">
		<input type="text" name="description" class="form-control" placeholder="Enter your description">
		<input type="text" name="name" class="form-control" placeholder="Enter your author name">
		<input type="text" name="surname" class="form-control" placeholder="Enter your surname">
		<button type="submit">Save Student</button>
	</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('#books_form').submit(function(e) {
			e.preventDefault();
			let isbn = $('#isbn').val();
			console.log(isbn);
			$(".error").remove();

			if (isbn.length < 13) {
      		$('##isbn').after('<span class="error">This field is 13 characters, digits only required</span>');
    		}
		}
	}
</script>
</body>
</html>