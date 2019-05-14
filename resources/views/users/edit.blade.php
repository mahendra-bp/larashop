@extends('layouts.global')
@section('title')
Edit User
@endsection
@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<form enctype="multipart/form-data" action="{{route('users.update', ['id'=>$user->id])}}" method="POST"
    class="bg-white shadow-sm p-3">
    @csrf
    <input type="hidden" value="PUT" name="_method">

    {{-- <label for="name">Name</label>
    <input value="{{old('name') ? old('name') : $user->name}}" class="form-control{{$errors->first('name') ? "is-invalid" : ""}}" placeholder="Full Name" type="text" name="name" id="name">
    <div class="invalid-feedback">
        {{$errors->first('name')}}
    </div>
    <br> --}}

    <label for="name">Name</label>
    <input value="{{old('name') ? old('name') : $user->name}}" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" placeholder="Full Name" type="text" name="name" id="name"/>
    <div class="invalid-feedback">
        {{$errors->first('name')}}
    </div>
    <br>

    <label for="username">Username</label>
    <input value="{{$user->username}}" disabled class="form-control" placeholder="Username" type="text" name="username"
        id="username">
    <br>
        
    <label for="email">Email</label>
    <input value="{{$user->email}}" disabled class="form-control" placeholder="user@mail.com" type="text" name="email"
        id="email" />
    <br>
    
    <label for="">Status</label>
    <br/>
    <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE"
    type="radio" class="form-control" id="active" name="status"> <label
    for="active">Active</label>
    <input {{$user->status == "INACTIVE" ? "checked" : ""}}
    value="INACTIVE" type="radio" class="form-control" id="inactive"
    name="status"> <label for="inactive">Inactive</label>
    <br><br>

    <label for="">Roles</label><br>
    <input type="checkbox" {{in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="ADMIN"
        value="ADMIN" class="form-control {{$errors->first('roles') ? "is-invalid" : "" }}" >
    <label for="ADMIN">Administrator</label>
    <input type="checkbox" {{in_array("STAFF", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="STAFF"
        value="STAFF" class="form-control {{$errors->first('roles') ? "is-invalid" : "" }}">
    <label for="STAFF">Staff</label>
    <input type="checkbox" {{in_array("CUSTOMER", json_decode($user->roles)) ? "checked" : ""}} name="roles[]"
        id="CUSTOMER" value="CUSTOMER" class="form-control {{$errors->first('roles') ? "is-invalid" : "" }}">
    <label for="CUSTOMER">Customer</label>
    <div class="invalid-feedback">
        {{$errors->first('roles')}}
    </div>
    <br>
    
    <label for="">Phone</label>
    <input class="form-control {{$errors->first('phone') ? "is-invalid" : ""}}" value="{{old('phone') ? old('phone') : $user->phone}}" placeholder="Phone" type="text" name="phone" id="phone">
    <div class="invalid-feedback">
        {{$errors->first('phone')}}
    </div>
    <br>
    
    <label for="">Address</label>
    <input class="form-control {{$errors->first('address') ? "is-invalid" : ""}}" value="{{old('address') ? old('address') : $user->address}}" placeholder="Address" type="text" name="address"
        id="address">
        <div class="invalid-feedback">
            {{$errors->first('phone')}}
        </div>
        <br>
        
    <label for="avatar">Avatar Image</label><br>
    Current Avatar <br>
    @if ($user->avatar)
    <img src="{{asset('public/storage/'.$user->avatar)}}" width="120px" alt=""><br>
    @else
    No Avatar
    @endif
    <input type="file" id="avatar" name="avatar" class="form-control">
    <small class="text-muted">kosongkan jika tidak ingin mengubah avatar</small>
    <hr class="my-3">

    <input type="submit" name="" id="" class="btn btn-primary" value="Save">



</form>

@endsection
