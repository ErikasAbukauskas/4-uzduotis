@extends('layouts.app')

@section('content')

    <div class="container">

        <table class="table table-striped">

            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Logo</th>
                <th>Company Contacts</th>
                <th>Total types</th>
                <th>Actions</th>
            </tr>

            @if(session()->has("error_message"))
                <div class="alert alert-danger">
                    {{session()->get("error_message")}}
                </div>
            @endif

            @if(session()->has("success_message"))
                <div class="alert alert-success">
                    {{session()->get("success_message")}}
                </div>
            @endif

            <a class="btn btn-primary" href="{{route('company.create')}}">Create new company</a>

            @foreach ($companies as $company)

                <tr>
                    <td> {{$company->id}} </td>
                    <td> {{$company->title}} </td>
                    <td> {!!$company->description!!} </td>
                    <td> {{$company->logo}} </td>
                    <td> {{$company->companyContact->phone}}</td>
                    <td> {{$company->typeCompany->count()}} </td>

                    {{-- jog rodytu nuotrauka --}}
                    {{-- <td><img src="{{ $company->logo }}" alt="{{$company->logo}}" /></td> --}}

                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                              <a class="btn btn-primary" href="{{route('company.edit', [$company])}}">Edit</a>
                              <a class="btn btn-primary" href="{{route('company.show', [$company])}}">Show</a>
                              <form method="POST" action="{{route('company.destroy', [$company])}}">
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                          </div>
                    </td>


                </tr>

            @endforeach

        </table>
    </div>
@endsection
