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
						<h2>Manage <b>Books</b></h2>
					</div>
					<div class="col-sm-6">
					
						<a href="{{route('admin.book.create')}}" class="btn btn-success" id="add"><i class="material-icons">&#xE147;</i> <span>Add New book</span></a>
						<button class="primary">
        <a href="{{route('admin.home')}}">Dashboard</a>
		</button>			
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
                        <th>Book</th>
						<th>Author</th>
                        <th>Genre</th>
                        <th>Publishing date</th>
                        <th>Book image</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
				@forelse($books as $book)
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
							
						</td>
                        <td>{{$book->id}}</td>
                        <td>{{$book->book_name}}</td>
                        <td>{{$book->author_name}}</td>
                        <td>{{$book->category_type}}</td>
                        <td>{{$book->publish_date}}</td>
                        <td><img width="60" height="60" src="{{Storage::url($book->book_image)}}" alt=""/></td>
						<td>{{$book->description}}</td>     
                        
                        <td>
                            <a href="{{route('admin.book.edit', $book->id)}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							
							<form method="POST" action="{{route('admin.book.delete', $book->id)}}" enctype="multipart/form-data">
							@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger" class="delete">Delete</button>
								
							</form>
							<a href="{{route('admin.book.show', $book->id)}}" class="edit" data-toggle="modal"><span class="material-icons-outlined">
Show
</span></a>
                        </td>
                    </tr>
                  
					@empty

					<tr>
						No books yet

						<a href="{{route('admin.book.create')}}">Back to add a book</a>
					</tr>
                   @endforelse
					
                    
                </tbody>
            </table>
			
        </div>
    </div>
	
	
	

    <script src="{{asset('js/category.js')}}"></script>
</body>
</html>