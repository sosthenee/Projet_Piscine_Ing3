</<!DOCTYPE html>
<html>
<head>
   
</head>
<body>
 
<h1>All Information About Item</h1>
 
@foreach ($items as $item)
<li> {{ $item}}  </li>
@endforeach
 
<h1>Only Names Of items</h1>
 
@foreach ($items as $item)
 
<li> {{ $item->Title}}  </li>
 
@endforeach
 
</body>
</html>