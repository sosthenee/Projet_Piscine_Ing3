 
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
    <li> {{ $user-> firstname}}  </li>
    }  
  @endif
@endforeach 
    
$user = User::find(5);
$user->delete();
    
@foreach ($users as $user)   
  @if($user->role==='seller')
    {
    <li> {{ $user-> firstname}}  </li>
    }  
  @endif
@endforeach 
    
</body>
</html>

