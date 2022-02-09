<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="{{asset('css/category.css')}}" rel="stylesheet">
  <body>

    <div class="container">
		@if(Session::has('message'))
		<div class="message">
			<p>{{Session::get('message')}}</p>
		</div>
		@endif
		
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Genres</b></h2>
					</div>
					<div class="col-sm-6">
					
						<a href="{{route('admin.category.create')}}" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Genre</span></a>
												
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Id</th>
                        <th>Genre</th>
						<th>Description</th>
                        
                        <th>Number of books</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
				@forelse($categories as $category)
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
							
						</td>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_type}}</td>
						<td>{{$category->description}}</td>     
                        
						<td>    </td>
                        <td>
                            <a href="{{route('admin.category.edit', $category->id)}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							
							<form method="POST" action="{{ route('admin.category.delete', $category->id) }}" enctype="multipart/form-data">
							@csrf
								@method('DELETE')
								<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
								<div id="deleteEmployeeModal" class="modal fade">
									<div class="modal-dialog">
										<div class="modal-content">
											<form>
												<div class="modal-header">						
													<h4 class="modal-title">Delete Genre</h4>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												</div>
												<div class="modal-body">					
													<p>Are you sure you want to delete this genre?</p>
													<p class="text-warning"><small>This action cannot be undone.</small></p>
												</div>
												<div class="modal-footer">
													<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
													<button type="submit" class="btn btn-primary" class="delete">Delete</button>
												</div>
											</form>
										</div> 
									</div>
								</div>
								
							</form>
							<a href="{{route('admin.category.show', $category->id)}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Show">&#xE254;</i></a>
                        </td>
                    </tr>
					@empty

					<tr>
						No genre yet

						<a href="{{route('admin.category.create')}}">Back to add a genre</a>
					</tr>

					@endforelse
                    
                </tbody>
            </table>
			
        </div>
    </div>
	
	
	

    <script src="{{asset('js/category.js')}}"></script>
</body>
</html>