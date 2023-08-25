@extends('layouts.admin') <!-- Use your admin layout -->

@section('content')
    <h1>Verify Files</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table>
        <thead>
            <tr>
                <th>File Name</th>
                <th>Uploader</th>
                <th>Verification</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unverifiedFiles as $file)
                <tr>
                    <td>{{ $file->name }}</td>
                    <td>{{ $file->uploader->name }}</td>
                    <td>
                        <form action="{{ route('admin.verify.file', ['file' => $file->id]) }}" method="post">
                            @csrf
                            <button type="submit">Verify</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
