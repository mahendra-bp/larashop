@extends('layouts.global')
@section('title') Create Category @endsection
@section('content')

@if(session('status'))
<div class="alert alert-success">
{{session('status')}}
</div>
@endif

<form
    enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('categories.store')}}" method="POST">
    @csrf

    <label for="">Category Name</label><br>
    <input type="text" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" name="name" value="{{old('name')}}">
    <div class="invalid-feedback">
        {{$errors->first('name')}}
    </div>
    <br><br>

    <label for="">Category Image</label><br>
    <input type="file" class="form-control {{$errors->first('image') ? "is-invalid" : ""}}" name="image">
    <div class="invalid-feedback">
        {{$errors->first('image')}}
    </div>
    <br>
    <br>
    <input type="submit" class="btn btn-primary" value="Save" name="" id=""><br>
</form>

@endsection