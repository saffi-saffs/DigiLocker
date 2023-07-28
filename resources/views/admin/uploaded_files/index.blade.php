@extends('admin.uploaded_files.admin')



@section('content')
    <h1>Uploaded Files</h1>
    <table>
        <thead>
            <tr>
                <th>File Name</th>
                <th>Description</th>
                <th>Uploaded By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($uploadedFiles as $file)
                <tr>
                    <td>{{ $file->file_name }}</td>
                    <td>{{ $file->file_description }}</td>
                    <td>{{ $file->user->name }}</td>
                    <td>
                        <a href="{{ route('admin.uploaded_files.show', $file->id) }}">View</a>
                        <form action="{{ route('admin.uploaded_files.destroy', $file->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
