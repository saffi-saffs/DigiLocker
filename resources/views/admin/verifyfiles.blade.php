<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="content">
        <div class="d1">
            <h1>Admin's Uploaded Files</h1>
            <table width="1600px">
                @php $count = 1 @endphp
                @foreach($files as $file) 
                @if($count > 3)</tr>@php $count=1 @endphp @endif
                @if($count == 1)<tr>@endif
                @php $count++ @endphp
                <td>
                    <div class="img-holder">
                        <a href="{{url('storage/'.$file->file_path)}}" target="_blank">
                            <img alt="{{ $file->name }}" height="auto" width="auto" src="{{url('storage/'.$file->file_path)}}">
                        </a>
                    </div>
                    <div class="mt-4">
                        Category: <h3 class="{{$file->file_type}}">{{$file->file_type}}</h3>
                        Name: <h3>{{ $file->name }}</h3>
                        User ID: <h3>{{$userid}}</h3>
                        
                        <form method="POST" action="{{ route('admin.verifieduserfiles') }}">
                            @csrf
                            <input type="checkbox" name="selectedFiles[]" value="{{ $file->id }}">
                            <input type="submit" value="Verify Selected">
                        </form>
                    </div>
                </td> 
                @endforeach
            </table>
        </div>
    </x-slot>
</x-admin-layout>
