@extends('dashboard')
@section('content')


    <h1>Uploaded Files</h1>

<div>
    <h1>List of Uploaded Files</h1>
    <ul>
        @foreach($files as $file)
            <li>
                <a href="{{ asset('storage/' . $file->file_path) }}">{{ $file->name }}</a>
            </li>
        @endforeach
    </ul>
</div>

@endsection