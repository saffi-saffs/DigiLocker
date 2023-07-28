@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Photo List</h1>
        @if($photos->isEmpty())
            <p>No photos found.</p>
        @else
            <div class="row">
                @foreach($photos as $photo)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/photos/' . $photo->filename) }}" class="card-img-top" alt="{{ $photo->filename }}">
                            <div class="card-body">
                                <p class="card-text">{{ $photo->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection