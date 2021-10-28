@extends('layouts.app')

@section('content')

    <div class="container">

        <table class="table table-striped">

            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Company Type</th>
                <th> Actions </th>
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

            <a class="btn btn-primary" href="{{route('type.create')}}">Create new type</a>

            @foreach ($types as $type)

                <tr>
                    <td> {{$type->id}} </td>
                    <td> {{$type->title}} </td>
                    <td> {!!$type->description!!} </td>
                    <td> {{$type->typeCompany->title}}</td>

                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                              <a class="btn btn-primary" href="{{route('type.edit', [$type])}}">Edit</a>
                              <a class="btn btn-primary" href="{{route('type.show', [$type])}}">Show</a>
                              <form method="POST" action="{{route('type.destroy', [$type])}}">
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
