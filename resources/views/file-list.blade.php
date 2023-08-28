@extends('dashboard')
@section('content')
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">


</head>
<body>
    <br><br><br><br>
    <div class="d1">
        <h1>My Uploaded Files</h1>

        @if(session()->has('message'))
                         <div class="alert alert-success"> 
                             
     {{session()->get('message')}}
     <button type="button" class="close"  aria-hidden="true">X</button>
                         </div>
                         @endif

 

        <table width=1600px>
        @php $count = 1 @endphp
        @foreach($files as $file) 
        @if($count>3)</tr>@php $count=1 @endphp @endif
        @if($count==1)<tr>@endif
        @php $count++ @endphp
        <td>
            <div class="img-holder">
                <a href="{{url('storage/'.$file->file_path)}}" target="_blank">
                    <img alt="{{ $file->name }}" height=auto weidth=auto src="{{url('storage/'.$file->file_path)}}">
                </a>
            </div>
            <div class="mt-4">
                <h3 class="{{$file->file_type}}">{{$file->file_type}}</h3>
                <h2 >{{ $file->name }}</h2>
                <a href="{{url('storage/'.$file->file_path)}}" target="_blank">
                    <p class="mt-1">{{url('storage/'.$file->file_path)}}</p>
                </a>
                     <a href="{{url('sendforverification',$file->id)}}" class="btn btn-success" onclick="return confirm('are you sure to send  this for verification?')">Verify</a>

            </div>
        </td> 
        

        
        @endforeach

        
    </table>
    <div>
    

</body>

 <script src="jss/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="jss/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="jss/bootstrap.js"></script>
      <!-- custom js -->
      <script src="jss/custom.js"></script>

</html>
@endsection