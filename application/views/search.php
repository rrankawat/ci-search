<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Search Engine</title>
  </head>
  <body>
	<div class="container">
		<br />
		<h1 align="center">Live Data Search in Codeigniter using Ajax jQuery</h1>

		<br />
		<br />
		<?php echo form_open('search/find') ?>
			<div class="form-group">
				<label for="search">Search</label>
				<input type="text" name="search" id="search" placeholder="Search Customer" class="form-control">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Find</button>
			</div>
		<?php echo form_close(); ?>

		<br />
		<div id="result"></div>

		<div style="clear:both"></div>
	</div>

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script>
		$(document).ready(function(){

			//load_data();

			function load_data(query) {
				$.ajax({
					url: "<?php echo site_url('search/fetch'); ?>",
					method: "POST",
					data: {
						query: query
					},
					success: function(data) {
						$('#result').html(data);
					}
				});
			}

			$('#search').keyup(function(){
				var search = $(this).val();

				if(search != '') {
					load_data(search);
				} else {
					$('#result').html('');
				}
			});

		}); // End of document
	</script>
  </body>
</html>