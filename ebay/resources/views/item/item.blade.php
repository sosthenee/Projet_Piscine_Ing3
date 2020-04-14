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
 

<h1>Only Pictures</h1>
 
@foreach ($items as $item)

@foreach ( $item->media as $medias)
 
<li> {{ $medias->reference}} </li>

@endforeach
@endforeach
 

</body>
</html>