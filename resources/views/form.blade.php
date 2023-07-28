@extends('dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    
     <title>Form-Fillup</title>
      <link rel="stylesheet" href="asset{{('css/style.css')}}">
      <style>        
  .form-title{
     color:#fff;
     font: 1em sans-serif;
     font-size: 50px;
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
.button {
border: none;
border-radius: 25px;
color: #fff;
cursor: pointer;
font-size: 11px;
letter-spacing: 1px;
margin-top: 15px;
padding: 15px 50px;
text-transform: uppercase;
background:  rgba(86, 58, 250, 0.9);
}

#cover {
   width: 70%;
    height: 100vh;
    background: linear-gradient(
            45deg,
            rgba(86, 58, 250, 0.9) 0%,
            rgba(116, 15, 214, 0.9) 100%
        ),
        url("../img/hero-bg.jpg") center center no-repeat;
    background-size: cover;
color: #fff;
border-radius: 10px;
margin: 150px 100px 200px 150px ;
position: center;
text-align: center;
transition: margin 0.7s, background 0.8s, display 2s, width 1s;
width: 50%;
z-index: 5;

}
.form-content{
     padding: 10px 10px 10px 10px;
}

label{
     color: #fff;
}

        
    </style>
</head>
<body>
<br>
      <form method="get" >
            @csrf
            <br>
          <div id="cover" >
               <br>
          <div class='form-title'>
               Form Fill up 
          </div>
          <br>

     <div class='form-content'>
         <label for="firstname" class="col-sm-3 col-form-label">  First Name:</label> <input type="text" name="fname"/> </div><br>
         <div><label for="lastname" class="col-sm-3 col-form-label">  Last Name::</label><input type="text" name="lname"/></div><br>
         
         <div><label for="address" class="col-sm-3 col-form-label">  Address::</label><input type="text" name="address"/></div><br>
         
         <div><label for="email" class="col-sm-3 col-form-label">  Email::</label><input type="email" name="email"/></div><br>
          <div><label for="phone" class="col-sm-3 col-form-label"> Phone Number:</label><input type="text" name="phnum"/></div><br>
         <div> <label for="citizenship" class="col-sm-3 col-form-label"> Citizen Number:</label><input type="text" name="citizennum"/></div>
         <br>
         <div><label for="docs" class="col-sm-3 col-form-label">  Document type
       </label>
      <select class="col-sm-3 col-form-label" id="inlineFormCustomSelect">
        <option selected>Choose...</option>
        <option value="1">Education</option>
        <option value="2">Property</option>
        <option value="3">Driving</option>
      </select>
     </div>
     <div>
      <a href="upload-file"   > 
<input type="button" name="submit" value="Submit" class="button" ></a>
     </div>

</div>
     </form>

</body>
</html>
@endsection