@extends('layouts/template')
@section('content')
@auth
<a href="/cv/create" class="btn btn-primary">Create own CV</a>
@endauth

<div class="card-columns">
    {{-- @dump($cvs) --}}
    @if (isset($cvs) && count($cvs) > 0)
    @foreach ($cvs as $cv)
    <div class="card"><img class="card-img-top w-100 d-block" src="{{asset($cv->image)}}">
        <div class="card-body">
            <h4 class="card-title"><strong>{{$cv->name}}</strong><br></h4>
            <p class="card-text text-muted">Date: {{$cv->created_at}}</p>
            <p class="card-text text-muted">Upload by: {{$cv->user->name}}</p>
            <a href="{{asset($cv->file)}}" class="btn btn-primary" type="button">View</a>
        </div>
    </div>
    @endforeach
    @else
    <h3 class="text-danger">No CV found</h3>
    @endif
</div>
@endsection