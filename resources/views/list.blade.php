<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ajax Todo</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Panel title<a href="#" class="pull-right"><i class="fa fa-plus" data-toggle="modal" data-target="#myModal"></i></a></h3>
				  </div>
				  <div class="panel-body">
				   <ul class="list-group">
				     <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Cras justo odio</li>
				     <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Dapibus ac facilisis in</li>
				     <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Morbi leo risus</li>
				     <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Porta ac consectetur ac</li>
				     <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">Vestibulum at eros</li>
				   </ul>
				  </div>
				</div>
			</div>

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="title">Add New Item</h4>
			      </div>
			      <div class="modal-body">
			        <p><input type="text" placeholder="write item here" id="addItem" class="form-control"></p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default btn-warning" id="delete" data-dismiss="modal" style="display: none;">Delete</button>
			        <button type="button" class="btn btn-primary" id="SaveChanges" style="display: none;" >Save changes</button>
			        <button type="butt  on" class="btn btn-primary" id="AddButton">Add Item</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('.ourItem').each(function() {
				$(this).click(function(event) {
					var text = $(this).text();
					$('#title').text('Edit Item');
					$('#addItem').val(text);
					$('#delete').show('400');
					$('#SaveChanges').show('400');
					$('#AddButton').hide('400');
					console.log(text);
				});
			});
		});
	</script>
</body>
</html>