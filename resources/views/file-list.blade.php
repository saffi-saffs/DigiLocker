@extends('dashboard')
@section('content')
    <h1>Uploaded Files</h1>


    <h1>Uploaded Files</h1>
    <ul>
        @foreach($files as $file)

            <li>
                 <a href="{{ asset($file->file_path) }}" target="_blank">{{ $file->name }}</a>
               
            </li>
         
        @endforeach
    </ul>

    <title>List of Uploaded Files</title>

    <h1>List of Uploaded Files</h1>
    @if($files->isEmpty())
        <p>No files found.</p>
    @else
        <ul>
            @foreach($files as $file)
                <li>{{ $file->name }}</li>
            @endforeach
        </ul>
    @endif


@endsection