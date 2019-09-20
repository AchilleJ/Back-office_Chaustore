<!DOCTYPE html>
<html>
<head>
	<title></title>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
	<?php echo '<h1>'.$_POST["choice"].' '.'management'.'</h1>';?>
	<h2>Add, modify or delete:</h2>

	<div class="forms">
	    <form method="post" action="" id="add">
	        <input name="choice" type="submit" value="Add">
	    </form>

	    <form method="post" action="" id="modify">
	        <input name="choice" type="submit" value="Modify">
	    </form>
	    <form method="post" action="" id="delete">
	        <input name="choice" type="submit" value="Delete">
	    </form>
	</div>
	
</body>
</html>
