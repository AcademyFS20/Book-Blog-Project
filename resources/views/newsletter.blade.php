<!DOCTYPE html>
<html>
 <head>
  <meta charset=utf-8>
  <title>Aura Shelf</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
 </head>
 <body>
  <div >
  @if (\Session::has('success'))
   <div >
    <p>{{ \Session::get('success') }}</p>
   </div><br />
   @endif
   @if (\Session::has('failure'))
   <div >
    <p>{{ \Session::get('failure') }}</p>
   </div><br />
   @endif
   <h2>Newsletter</h2><br/>
   <form method="post" action="{{route('newsletter')}}">
    @csrf
    </div>
    <div >
     <div ></div>
      <div >
       <label for="Email">Email:</label>
       <input type=text name=email>
      </div>
     </div>
    <div >
     <div ></div>
     <div >
      <button type=submit >Subscribe</button>
     </div>
    </div>
   </form>
  </div>
 </body>
</html>