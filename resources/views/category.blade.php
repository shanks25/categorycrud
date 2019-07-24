@include('category.head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<style>
	.th	{
		text-align:center;
	}
</style>
<body>

	<div class="container">
		<h2 style="margin-top: 12px;" class="alert">Add New Category </h2> <br>

		<div class="row">
			<div class="col-12">
				<a href="javascript:void(0)" data-toggle="modal" name="create_category" id="create_category" data-target="#exampleModal"  class="btn btn-success mb-2" id="create-new-user">Add Category</a> 
				<br>
				<a href="{{ route('subcategory.create') }}">Add New Subcategory</a>
				@include('message')
				@if ($categories)
				
				
				<table class="table table-bordered" id="laravel_crud">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Image</th>

							<th colspan="2">Action</th> 
						</tr>
					</thead>  
					<tbody id="users-crud"> 
						<tr id="">
							@foreach ($categories as $category)
							<td>{{$loop->index + 1}}</td>
							<td>{{$category->name}}</td>
							<td><img src="{{ asset('categories/'.$category->image) }}" width="50px" height="50px" alt=""></td>

							<td><a href="{{ route('category.edit',$category->id) }}" id="edit-user" data-id="" class="btn btn-info">Edit</a></td>
							<td>
								<form id="delete-form-{{$category->id}}" method="post" action="{{ route('category.destroy',$category->id) }}" style="display: none;">  	
									@csrf 
									@method('DELETE') 
								</form>

								<a href="javascript:void(0)" id="delete-user" data-id="" class="btn btn-danger delete-user" onclick="if(confirm('Are You Sure you want to delete this?'))
								{
									event.preventDefault();
									document.getElementById('delete-form-{{$category->id}}').submit();
								}
								else{
									event.preventDefault();

								}">Delete </a> 
							</tr>
							@endforeach
						</tbody>	
					</table>
					{{ $categories->links() }}
					@endif
				</div> 
			</div>
		</div> 
		<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">New Category</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<span id="form_result"></span>
						<form action="{{ route('category.store') }}" method="POST" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
							@csrf 
							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">Name</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Image</label>
								<div class="col-sm-12">
									<input type="file" class="form-control" id="image" name="image" required>
								</div>
								<br>	
								@if ($subcategories)
								<div class="form-group">
									<label class="col-sm-12 control-label" for="id_label_single">
										Select Subcategory
										<select style="width: 100%" class="js-example-basic-multiple form-control" name="subcategory[]" multiple="multiple" id="id_label_single">
											@foreach ($subcategories as $subcategory)
											<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
											@endforeach
										</select>
									</div>
									{{-- @foreach ($subcategories as $subcategory)
									<label class="checkbox-inline"><input name="subcategory[]"  type="checkbox" value="{{$subcategory->id}}">{{$subcategory->name}}</label> 
									@endforeach --}}
								</div>
								@endif
								<br />
								<div class="form-group" align="center">
									<input type="hidden" name="action" id="action" />
									<input type="hidden" name="hidden_id" id="hidden_id" />

								</div>
								<div class="modal-footer">
									<input type="submit" value="Add" name="action_button" id="action_button"  class="btn btn-primary"> 
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
								</div>


							</form>
						</div> 

					</div>
				</div>


				<script>
					$('#create_category').click(function(){
						$('#formModal').modal('show');
					}); 
					$(document).ready(function() {
						$('.js-example-basic-multiple').select2();
					});
					$(document).ready(function() {
						$('#formModal').on('hidden', function() {
							clear()
						});
					});
				</script>


			</body>
			</html>