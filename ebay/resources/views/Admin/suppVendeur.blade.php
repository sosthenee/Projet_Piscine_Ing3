
 
<!DOCTYPE html>
<html>
<head>
   
</head>
<body>
 
<h1>All Information About the sellers</h1>
 

@foreach ($users as $user)
    
  @if($user->role==='seller')
    {
    <li> {{ $user}}  </li>
    }  
  @endif
@endforeach
@foreach ($users as $user)   
  @if($user->role==='seller')
    {
    <li> {{ $user->firstname}}  </li>
    }  
  @endif
@endforeach 
    

    
 
     <form method="POST" action="/admin/action">
 
        {{ csrf_field() }}
         @foreach ($users as $user)   
          @if($user->role==='seller')
            {
            <li> {{ $user->firstname}}  </li>
             
            }  
          @endif
        @endforeach

      
      <div>
    <div>
          <input type="number" name="num">
            </div>
            <input type="submit" value="Select name">
 
      </div>
 
    </form>  
</body>
</html>