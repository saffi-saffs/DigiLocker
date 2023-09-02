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
        .rightbtn {
            float: right;
            margin-right: 20px;
        }
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.js" integrity="sha512-kwtW9vT4XIHyDa+WPb1m64Gpe1jCeLQLorYW1tzT5OL2l/5Q7N0hBib/UNH+HFVjWgGzEIfLJt0d8sZTNZYY6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <br><br><br><br>
    <div class="d1">
        <h1>My Uploaded Files</h1>


        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
                <button type="button" class="close alertbutton rightbtn" data-dismiss="alert" aria-label="Close">
                    <b>X</b>
                </button>
            </div>
        @endif
        @if(session()->has('errormessage'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session()->get('errormessage')}}
                <button type="button" class="close alertbutton rightbtn" data-dismiss="alert" aria-label="Close">
                    <b>X</b>
                </button>
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
                @if($file->status == null)
                    <a href="{{url('sendforverification',$file->id)}}" class="btn btn-success custom-confirm-link" data-confirmation="Are you sure to send this file for verification?">
                        Send for verification
                    </a>
                @endif
                @if($file->status == "pending")
                <a href="{{url('revokeverification',$file->id)}}" class="btn btn-warning custom-confirm-link" data-confirmation="Are you sure you want to revoke this verification request?">
                        Revoke verification request
                    </a>
                @endif
                <a href="{{url('deletefile',$file->id)}}" class="btn btn-danger custom-confirm-link" data-confirmation="Are you sure you want to permanently delete this file?" style="margin-left:20px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>
                </a>
            </div>
        </td> 
        

        
        @endforeach

        
    </table>
    <div>
    
 <script>
    //  click event listener to links that requires custom confirm
    $('.custom-confirm-link').click(function(e){

        //  get link and its confirmation message
        var link                = $(this);
        var confirmationmessage = link.data('confirmation');
        var address             = link.attr('href');

        e.preventDefault();

        bootbox.confirm({
            title   : 'Confirm',
            message : confirmationmessage,
            buttons : {
                confirm : {
                    label : 'Yes',
                    className: 'btn-success'
                },
                cancel : {
                    label : 'No',
                    className : 'btn-danger'
                }
            },
            callback : function (result) {
                if (result)
                {
                    //  simulate click the link
                    window.location.href = address;
                }
            }
        });
    });
</script>


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