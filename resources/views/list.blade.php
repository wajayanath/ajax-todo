<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ajax Todo</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
{{-- 	<meta name="csrf-token" content="{{ csrf_token() }}"> --}}
</head>
<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Panel title<a href="#" id="addNew" class="pull-right"><i class="fa fa-plus" data-toggle="modal" data-target="#myModal"></i></a></h3>
				  </div>
				  <div class="panel-body" id="items">
				   <ul class="list-group">
				   	@foreach ($items as $item)
				     <li class="list-group-item ourItem" data-toggle="modal" data-target="#myModal">{{ $item->item }}
				     <input type="hidden" id="itemId" value="{{ $item->id }}">
				     </li>
				   	@endforeach
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
			      	<input type="hidden" id="id">
			        <p><input type="text" placeholder="write item here" id="addItem" class="form-control"></p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default btn-warning" id="delete" data-dismiss="modal" style="display: none;">Delete</button>
			        <button type="button" class="btn btn-primary" id="SaveChanges" style="display: none;" data-dismiss="modal">Save changes</button>
			        <button type="butt  on" class="btn btn-primary" id="AddButton" data-dismiss="modal">Add Item</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

		</div>
	</div>
	{{ csrf_field() }}
	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$(document).on('click', '.ourItem', function(event) {
					var text = $.trim($(this).text());
					var id = $(this).find('#itemId').val();
					$('#title').text('Edit Item');
					$('#addItem').val(text);
					$('#delete').show('400');
					$('#SaveChanges').show('400');
					$('#AddButton').hide('400');
					$('#id').val(id);
					console.log(id);
			});

			$(document).on('click', '#addNew', function(event) {
					$('#title').text('Add New Item');
					$('#addItem').val("");
					$('#delete').hide('400');
					$('#SaveChanges').hide('400');
					$('#AddButton').show('400');
			}); 
			
			// $.ajaxSetup({
			//   headers: {
			//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			//   }
			// });
			
			$('#AddButton').click(function(event) {
				var text = $('#addItem').val(); 
				$.post('list', {'text': text,'_token':$('input[name=_token]').val()}, function(data) {
					console.log(data);
					$('#items').load(location.href + ' #items');
				});

				// $.ajax({
				//         url: "list",
				//         type:"POST",
				// 		   dataType: 'json',
				//         data: { text : text },
				//         success:function(data){
				//             alert(data); 
				//         },error:function(){ 
				//             alert("error!!!!");
				//         }
				//     }); //end of ajax
			});

			$('#delete').click(function(event) { 
				var id = $("#id").val();
				$.post('delete', {'id': id,'_token':$('input[name=_token]').val()}, function(data) {
					console.log(data);
					$('#items').load(location.href + ' #items');
				});
			});

			$('#SaveChanges').click(function(event) { 
				var id = $("#id").val();
				var value = $.trim($("#addItem").val());
				$.post('update', {'id': id,'value': value, '_token':$('input[name=_token]').val()}, function(data) {
					$('#items').load(location.href + ' #items');
					console.log(data);
				});
			});
		});

	</script>
</body>
</html>