@extends('layouts.app')

@section('content')

<h2>{{$type->title}}</h2>
<p>{!!$type->description!!}</p>
<p>{{$type->typeCompany->title}} {{$type->typeCompany->description}} {{$type->typeCompany->logo}}</p>

@endsection

