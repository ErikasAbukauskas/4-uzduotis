@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit company') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('company.update', [$company]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="company_title" class="col-md-4 col-form-label text-md-right">{{ __('Company title') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="company_title" value="{{$company->title}}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_description" class="col-md-4 col-form-label text-md-right">{{ __('Company Description') }}</label>

                            {{-- jg issikraipys form-control pasalinti --}}
                            <div class="col-md-6" form-control>
                                <textarea class="summernote" name="company_description" cols="5" rows="5">{{$company->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_logo" class="col-md-4 col-form-label text-md-right">{{ __('Company logo') }}</label>

                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control" name="company_logo">

                            </div>
                        </div>

                        <img src="{{$company->logo}}" alt="{{$company->logo}}" width="200">


                        <div class="form-group row">

                            <label for="company_type" class="col-md-4 col-form-label text-md-right">{{ __('Company Type') }}</label>

                            <div class="col-md-6">

                                <select class ="form-control" name="contact_company">

                                    {{-- Create blade yra atsakingas uz knygas --}}
                                    {{-- Atviazduoti kito modelio informacija: apie autorius --}}

                                    @foreach ($contacts as $contact)
                                        <option value="{{$contact->id}}" @if($contact->id == $company->contact_id) selected @endif> {{$contact->phone}}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
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
