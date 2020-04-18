@extends('layouts.layout')

@section('content')

<a href="{{ url('/mybestoff/{$item->id}') }}">
@foreach($items as $item)
<p>{{$item->id }}------{{$item->price }}------{{$item->title }}</p></a>


@endforeach



@endsection
