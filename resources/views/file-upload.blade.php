@extends('dashboard')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> File Upload</title>
    <style>
        .container {
            max-width: 500px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>
<body>
     <br>
    <div class="container mt-5">
        <form action="{{ route('upload-file') }}" method="POST" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Upload Your File</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <div>
            <label for="docs" class="col-sm-4 col-form-label">  
                Document type
            </label>
        <select class="col-sm-7" id="inlineFormCustomSelect" name="documentType">
            <option selected>Choose...</option>
            @foreach($fileTypes as $types) 
            <option value="{{$types->id}}">{{$types->file_type}}</option>
            @endforeach
        </select>
     </div>
     <br>
        <div>
            <label for="filename" class="col-sm-4 col-form-label">  File Name:</label> 
            <input type="text" class="col-sm-7" name="filename"/> 
        </div>
        <br>
        <div id="multi-upload-button"
                class="inline-flex items-center px-4 py-2 bg-gray-600 border border-gray-600 rounded-l font-semibold cursor-pointer text-sm text-black tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ">
            <div class="custom-file">
                <label class="col-sm-4 col-form-label" for="chooseFile">Select file</label>
                <input type="file" name="file" class="col-sm-7">
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
            Upload File
        </button>
            
        </form>
    </div>
</body>
</html>
@endsection