<x-admin-layout>

    <div>
        <h1>Admin's Uploaded Files</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(count($files) > 0)
            <form action="{{ route('admin.verified') }}" method="post">
                @csrf
                <table>
                    <tr>
                        @php $count = 0 @endphp
                        @foreach($files as $file)
                            <td>
                                <div>
                                    <a href="{{ url('storage/'.$file->file_path) }}" target="_blank">
                                        <img alt="{{ $file->name }}" src="{{ url('storage/'.$file->file_path) }}">
                                    </a>
                                </div>
                                <div>
                                    <p>Category: <strong>{{ $file->file_type }}</strong></p>
                                    <p>Name: <strong>{{ $file->name }}</strong></p>
                                    <p>User ID: <strong>{{ $file->uploder_id }}</strong></p>
                                    <input type="checkbox" name="selectedFiles[]" value="{{ $file->id }}">
                                </div>
                            </td>
                            @php $count++ @endphp
                            @if($count >= 3)
                                </tr><tr>
                                @php $count = 0 @endphp
                            @endif
                        @endforeach
                    </tr> 
                </table>

                <button type="submit">Verify Selected Files</button>
            </form>
        @else
            <p>No files to display.</p>
        @endif
    </div>

</x-admin-layout>
