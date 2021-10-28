@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create company') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="company_title" class="col-md-4 col-form-label text-md-right">{{ __('Company Title') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="company_title" required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_description" class="col-md-4 col-form-label text-md-right">{{ __('Company Description') }}</label>

                            {{-- jg issikraipys form-control pasalinti --}}
                            <div class="col-md-6" form-control>
                                <textarea class="summernote" name="company_description" cols="5" rows="5"> </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_logo" class="col-md-4 col-form-label text-md-right">{{ __('Comapny Logo') }}</label>

                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control" name="company_logo">

                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="contact_company" class="col-md-4 col-form-label text-md-right">{{ __('Contact Company') }}</label>

                            <div class="col-md-6">

                                <select class ="form-control" name="contact_company">

                                    {{-- Create blade yra atsakingas uz knygas --}}
                                    {{-- Atviazduoti kito modelio informacija: apie autorius --}}

                                    @foreach ($contacts as $contact)
                                        <option value="{{$contact->id}}"> {{$contact->phone}}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.summernote').summernote();
    });
</script>
@endsection
