<!-- resources/views/admin/uploaded_files/show.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1>File Details</h1>
    <p><strong>File Name:</strong> {{ $uploadedFile->file_name }}</p>
    <p><strong>Description:</strong> {{ $uploadedFile->file_description }}</p>
    <p><strong>Uploaded By:</strong> {{ $uploadedFile->user->name }}</p>
    <p><strong>File Path:</strong> {{ asset('storage/' . $uploadedFile->file_path) }}</p>
    <p><strong>Uploaded At:</strong> {{ $uploadedFile->created_at }}</p>
    <a href="{{ route('admin.uploaded_files.index') }}">Back</a>
@endsection
