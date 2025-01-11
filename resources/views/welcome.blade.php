@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5 text-center">
       
        {{-- <h1 class="display-5 fw-bold">
            FUNGE
        </h1> --}}

        
        <a href="{{route('activity.index')}}" class="btn btn-primary btn-lg" type="button">TEST</a>
    </div>
</div>

@endsection