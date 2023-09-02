@extends('dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Form-Fillup</title>
      <link rel="stylesheet" href="asset{{('css/style.css')}}">
      <style>        
         .form-title{
         color:#000;
         font: 1em sans-serif;
         font-size: 35px;
         }
         input[type="email"],
         input[type="text"],select, {
         background: #f4f8f7;
         border: none;
         font-weight: 300;
         margin: 4px;
         padding: 7px;
         width: 250px;
         }
         /* .button {
         border: none;
         border-radius: 25px;
         color: #fff;
         cursor: pointer;
         font-size: 15px;
         letter-spacing: 1px;
         margin-top: 15px;
         padding: 15px 50px;
         text-transform: uppercase;
         background:  rgba(86, 58, 250);
         } */
         #cover {
         width: 70%;
         height: 100vh;
         color: #fff;
         border-radius: 10px;
         position: center;
         text-align: center;
         }
         .form-content{
         padding: 10px 10px 10px 10px;
         }
         label{
         color: #fff;
         }
         .container {
            max-width: 500px;
        }
      </style>
   </head>
   <body>
      <br><br>

      <form action="/update-user" method="PUT" enctype="multipart/form-data">
         @csrf
         <br>
         <div class="container mt-5">
            <br>
            <div class='form-title'>
               My Profile
            </div>
            <br>
            <div class='form-content'>
               <label for="firstname" class="col-sm-3 col-form-label">  First Name:</label> <input type="text" name="fname" value="{{$user->first_name}}"/> 
            </div>
            <br>
            <div><label for="lastname" class="col-sm-3 col-form-label">  Last Name:</label><input type="text" name="lname" value="{{$user->last_name}}"/></div>
            <br>
            <div><label for="address" class="col-sm-3 col-form-label">  Address:</label><input type="text" name="address" value="{{$user->address}}"/></div>
            <br>
            <div><label for="email" class="col-sm-3 col-form-label">  Email:</label><input type="email" name="email" value="{{$user->email}}" disabled/></div>
            <br>
            <div><label for="phone" class="col-sm-3 col-form-label"> Phone Number:</label><input type="text" name="phnum" value="{{$user->phone}}"/></div>
            <br>
            <div> <label for="citizenship" class="col-sm-3 col-form-label"> Citizen Number:</label><input type="text" name="citizennum" value="{{$user->citizen_number}}"/></div>
            <div>
               <br>
               <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block mt-4" >
            </div>
         </div>
      </form>
   </body>
</html>
@endsection