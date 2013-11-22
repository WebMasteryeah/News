<h2>Create a news item</h2>

<?php 
//to report error related to from validation
echo validation_errors();
?>

<?php
//form_open() is provided by the from helper  
//and renders the form element and adds extra functionality ???
//form_open() creates an opening from tag with a base URL build from your donfig preferences. 
//
echo form_open('news/create') //creates a from that points to my based 
                              //URL plus the news/create URL segments
                              //like <form method="post" action="localhost/index.php/news/create>
?>

<?php echo form_open('news/create') ?>

	<label for="title">Title</label>
	<input type="text" id="title" name="title" /><br />

	<label for="text">Text</label>
	<textarea id="text" name="text"></textarea><br />

	<input type="submit" name="submit" value="Create news item" />

</form>

<!--
	<label for="title">Title</label>
	<input type="input" name="title" /><br />

	<label for="text">Text</label>
	<textarea name="text"></textarea><br />

	<input type="submit" name="submit" value="Create news item" />

</form> -->
