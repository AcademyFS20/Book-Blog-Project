
@extends('layouts.app')

@section('content')
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
						<h2>Manage <b>Articles</b></h2>
					</div>
					<div class="col-sm-6">
					
						<a href="{{route('admin.article.create')}}" class="btn btn-success" id="add" ><i class="material-icons">&#xE147;</i> <span>Add New Author</span></a>
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
                        <th>Article</th>
						<th>Content</th>
                        
                        <th>Article image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
				@forelse($articles as $article)
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
							
						</td>
                        <td>{{$article->id}}</td>
                        <td>{{$article->title}}</td>
						<td>{{$article->body}}</td>     
                        
						<td><img width="60" height="60" src="{{Storage::url($article->article_image)}}" alt=""/></td>
                        <td>
                            <a href="{{route('admin.article.edit', $article->id)}}" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							
							<form method="POST" action="{{route('admin.article.delete', $article->id)}}" enctype="multipart/form-data">
							@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger" class="delete">Delete</button>
								
							</form>
							<a href="{{route('admin.article.show', [$article->id, $article->slug])}}" class="edit">Show</a>
                        </td>
                    </tr>
                    @empty
					

					<tr>
						No genre yet

						<a href="{{route('admin.article.create')}}">Back to add an author</a>
					</tr>
                    @endforelse
					
                    
                </tbody>
            </table>
			
        </div>
    </div>
	
	
	

    <script src="{{asset('js/category.js')}}"></script>
</body>

</html>

@endsection