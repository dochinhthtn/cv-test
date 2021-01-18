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

<form action="/cv" method="POST" enctype="multipart/form-data">
    <h2>Create a CV</h2>

    {{csrf_field()}}
    <div class="form-group">
        <label for="name">CV's name:</label>
        <input type="name" class="form-control" placeholder="Enter name" name="name" value="{{old('name')}}">
    </div>

    <div class="form-group">
        <label for="file">Image:</label>
        <input type="file" class="form-control" name="image" value="{{old('image')}}">
    </div>

    <div class="form-group">
        <label for="file">File:</label>
        <input type="file" accept="application/pdf" class="form-control" name="file" value="{{old('file')}}">
    </div>

    <div class="form-group">
        <label for="file">Description:</label>
        <textarea name="content" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection