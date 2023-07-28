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
      <br>
      <form method="get" >
         @csrf
         <br>
         <div class="container mt-5">
            <br>
            <div class='form-title'>
               My Profile
            </div>
            <br>
            <div class='form-content'>
               <label for="firstname" class="col-sm-3 col-form-label">  First Name:</label> <input type="text" name="fname"/> 
            </div>
            <br>
            <div><label for="lastname" class="col-sm-3 col-form-label">  Last Name:</label><input type="text" name="lname"/></div>
            <br>
            <div><label for="address" class="col-sm-3 col-form-label">  Address:</label><input type="text" name="address"/></div>
            <br>
            <div><label for="email" class="col-sm-3 col-form-label">  Email:</label><input type="email" name="email"/></div>
            <br>
            <div><label for="phone" class="col-sm-3 col-form-label"> Phone Number:</label><input type="text" name="phnum"/></div>
            <br>
            <div> <label for="citizenship" class="col-sm-3 col-form-label"> Citizen Number:</label><input type="text" name="citizennum"/></div>
            <div>
               <br>
               <a href="upload-file"   > 
               <input type="button" name="submit" value="Submit" class="btn btn-primary btn-block mt-4" ></a>
            </div>
         </div>
      </form>
   </body>
</html>
@endsection