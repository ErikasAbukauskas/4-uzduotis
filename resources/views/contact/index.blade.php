@extends('layouts.app')

@section('content')

    <div class="container">

        <table class="table table-striped">

            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Email</th>
                <th>Country</th>
                <th>City</th>
                <th>Total company</th>
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

            <a class="btn btn-primary" href="{{route('contact.create')}}">Create new contact</a>

            @foreach ($contacts as $contact)

                <tr>
                    <td> {{$contact->id}} </td>
                    <td> {{$contact->title}} </td>
                    <td> {{$contact->phone}} </td>
                    <td> {{$contact->address}} </td>
                    <td> {{$contact->email}} </td>
                    <td> {{$contact->country}} </td>
                    <td> {{$contact->city}} </td>
                    <td> {{$contact->companyContact->count()}} </td>

                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                              <a class="btn btn-primary" href="{{route('contact.edit', [$contact])}}">Edit</a>
                              <a class="btn btn-primary" href="{{route('contact.show', [$contact])}}">Show</a>
                              <form method="POST" action="{{route('contact.destroy', [$contact])}}">
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
