<x-admin-layout>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> My Uploaded Files</title>
    <link rel="stylesheet" href="{{asset('css/styles.min.css')}}" />
    <style>
        .d1 {
            padding-left: 20px;
        }
        table {
            border-collapse: separate;
            border-spacing: 0 25px;
            }
        .img-holder {
            border-style: solid;
            border-width: 1px;
            border-color: #128FC8;
            width: 500px;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        h3 {
            padding: 10px 0px 10px 30px;
            width: 250px;
            border-radius: 100px;
            font-size: 20px;
            font-weight: bold;
            background-color: #FFE45C;
            color: #00468B;
        }
        .Personal {
            background-color: #d62828;
            color: #eae2b7;
        }
        .Property {
            background-color: #023047;
            color: #fff;
        }
        h2 {
            font-size: 18px;
        }
        td {
            width: 300px;
        }
        img {
            max-width: 500px;
            max-height: 400px;
        }
    </style>
</head>
   
        <div>
            <h1>Admin's Uploaded Files</h1>
            <table>
                @php $count = 1 @endphp
                @foreach($files as $file)
                    @if($count > 3)</tr>@php $count=1 @endphp @endif
                    @if($count == 1)<tr>@endif
                    @php $count++ @endphp
                    <td>
                        <div>
                            <a href="{{url('storage/'.$file->file_path)}}" target="_blank">
                                <img alt="{{ $file->name }}" src="{{url('storage/'.$file->file_path)}}">
                            </a>
                        </div>
                        <div>
                            Category: <h3>{{$file->file_type}}</h3>
                            Name: <h3>{{ $file->name }}</h3>
                            User ID: <h3>{{$userid}}</h3>
                        
                            <form method="POST" action="{{ route('admin.verifieduserfiles') }}">
                                @csrf
                                <input type="checkbox" name="selectedFiles[]" value="{{ $file->id }}">
                                <input type="submit" value="Verify Selected">
                            </form>
                        </div>
                        <br><br>
                    </td>
                    <br>
                @endforeach
            </table>
        </div>
  
</x-admin-layout>
