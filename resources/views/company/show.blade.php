@extends('layouts.app')

@section('content')

<h2>{{$company->title}}</h2>
<p>{!!$company->description!!}</p>
<img src="{{ $company->logo }}" alt="{{$company->logo}}" />



<h2>Total types: {{$types_count}}</h2>

@foreach ($types as $type)

<p> Type title: {{$type->title}}</p>
<p> Type description: {{$type->description}}</p>

@endforeach

@endsection
