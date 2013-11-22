<h2>Delete a news item</h2>

<?php echo form_open('news/delete/'.$slug) ?>

	<p>Are you sure? You want do delete <?php echo $slug ?></p>
	<input type="submit" name="submit" value="Yes" />
    <input type="submit" name="submit" value="No" />

</form>
