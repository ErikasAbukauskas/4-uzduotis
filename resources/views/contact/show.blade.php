@extends('layouts.app')

@section('content')

<h2>{{$contact->title}}</h2>
<h2>{{$contact->phone}}</h2>
<h2>{{$contact->address}}</h2>
<h2>{{$contact->email}}</h2>
<h2>{{$contact->country}}</h2>
<h2>{{$contact->city}}</h2>



<h2>Total companies: {{$companies_count}}</h2>

@foreach ($companies as $company)

<p> Company title: {{$company->title}}</p>
<p> Company description: {{$company->description}}</p>

@endforeach

@endsection
