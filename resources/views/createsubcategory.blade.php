@include('category.head')
<body>

	<div class="container">
		<h2 style="margin-top: 12px;" class="alert">Add New Subcategory</h2> <br>
		@include('message')
		<form action="{{ route('subcategory.store') }}" method="POST" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
			@csrf 
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required>
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Info</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="name" name="info" placeholder="Enter Info" value="" maxlength="50">
				</div>
			</div>

			<br />
			<div class="form-group" align="center">
				<input type="hidden" name="action" id="action" />
				<input type="hidden" name="hidden_id" id="hidden_id" />

			</div>
			<div class="modal-footer">
				<input type="submit" value="Add" name="action_button" id="action_button"  class="btn btn-primary"> 
				<a href="{{ route('category.index') }}" class="btn btn-info">Back</a>

			</div>


		</form>