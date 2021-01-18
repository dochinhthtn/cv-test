@extends('layouts/template')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/auth/register" method="POST">
    <h2>Create account</h2>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Email address:</label>
        <input type="name" class="form-control" placeholder="Enter name" name="name" value="{{old('name')}}">
    </div>

    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{old('email')}}">
    </div>

    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" placeholder="Enter password" name="password"
            value="{{old('password')}}">
    </div>

    <div class="form-group">
        <label for="pwd">Confirm Password:</label>
        <input type="password" class="form-control" placeholder="Enter password confirmation"
            name="passwordConfirmation" value="{{old('passwordConfirmation')}}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection