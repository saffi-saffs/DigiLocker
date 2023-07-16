<html lang="en"><head>
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css')}}">
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js')}}"></script>
    <style>@import url("{{asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900')}}");
* {
margin: 0;
padding: 0;
}
body {
background: #f0f4f3;
font-family: 'Roboto', sans-serif;
}
.button {
border: 1px solid #fff;
border-radius: 20px;
color: #fff;
font-size: 11px;
font-weight: 500;
letter-spacing: 1px;
padding: 15px 60px;
text-decoration: none;
text-transform: uppercase;
}
input[type="email"],
input[type="password"],
input[type="text"],select {
background: #f4f8f7;
border: none;
font-weight: 300;
margin: 4px;
padding: 7px;
width: 280px;
}
.submit-btn {
border: none;
border-radius: 25px;
color: #fff;
cursor: pointer;
font-size: 11px;
letter-spacing: 1px;
margin-top: 20px;
padding: 15px 50px;
text-transform: uppercase;
}
#login .submit-btn {
background:  rgba(86, 58, 250, 0.9);
}
#register .submit-btn {
background: rgba(86, 58, 250, 0.9);
}
#container {
background: #ededed;
border-radius: 10px;
height: 550px;
margin: 5% auto;
overflow: hidden;
width: 1000px;
}
.social-login {
border: 1px solid #ccc;
border-radius: 50px;
height: 15px;
padding: 10px;
width: 15px;
}
#login {
background: #fff;
float: left;
height: 100%;
position: relative;
width: 50%;
text-align: center;
top: -550px;
z-index: 1;
}
#register {
background: #fff;
float: right;
height: 100%;
position: relative;
width: 50%;
text-align: center;
top: -550px;
z-index: 1;
}
#login h1,
#register h1 {
padding: 20% 0 25px;
}
#login h1 {
color:   rgba(86, 58, 250, 0.9);
}
#register h1 {
color:   rgba(86, 58, 250, 0.9);
}
#login p,
#register p {
font-size: 12px;
font-weight: 300;
letter-spacing: 0.3px;
padding: 20px;
}
#forgot-pass {
border-bottom: 1px solid #ccc;
color: #000;
font-size: 12px;
font-weight: 500;
letter-spacing: 0.3px;
padding: 3px;
text-decoration: none;
}
#cover {
   width: 100%;
    height: 100vh;
    background: linear-gradient(
            45deg,
            rgba(86, 58, 250, 0.9) 0%,
            rgba(116, 15, 214, 0.9) 100%
        ),
        url("../img/hero-bg.jpg") center center no-repeat;
    background-size: cover;
color: #fff;
height: 550px;
margin: 0 0 0 50%;
position: relative;
text-align: center;
transition: margin 0.7s, background 0.5s, display 1s, width 1s;
width: 50%;
z-index: 5;
}
#cover h1 {
padding-top: 20%;
}
#cover p {
font-weight: 300;
line-height: 22px;
padding: 30px 45px 40px;
}
.sign-in {
display: none;
}
.sub {
position: relative;
top: -11px;
}
#cover:target {

    background: linear-gradient(
            45deg,
            rgba(86, 58, 250, 0.9) 0%,
            rgba(116, 15, 214, 0.9) 100%
        ),
        url("../img/hero-bg.jpg") center center no-repeat;
    background-size: cover;
margin: 0;
}
#cover:target .sign-up {
display: none;
}
#cover:target .sign-in {
display: inline-block;
}
#cover:target .login-div {
width: 35%;
}
#credit {
color: #999;
font-size: 14px;
}
#info {
 background: #5846f9;
color: #555;
padding: 20px;
text-align: center;
}</style>


<meta charset="UTF-8">
<title>Login/Registration</title>
<link rel="stylesheet" href="asset{{('css/style.css')}}">
</head>
<body>

<div id="container">
<!-- Cover Box -->
<div id="cover">
<!-- Sign Up Section -->
<h1 class="sign-up">Hello, Friend!</h1>
<p class="sign-up">Enter your personal details<br> and start a journey with us</p>
<a class="button sign-up" href="#cover">Sign Up</a>
<!-- Sign In Section -->
<h1 class="sign-in">Welcome Back!</h1>
<p class="sign-in">To keep connected with us please<br> login with your personal info</p>
<br>
<a class="button sub sign-in" href="#">Sign In</a>
</div>
<!-- Login Box -->
<div id="login">
<h1>Sign In</h1>

<form>
<input type="email" placeholder="Email" autocomplete="off"><br>
<input type="password" placeholder="Password" autocomplete="off"><br>
<a id="forgot-pass" href="#">Forgot your password?</a><br>
<input class="submit-btn" type="submit" value="Sign In">
</form>
</div>
<!-- Register Box -->
<div id="register">
<h1>Create Account</h1>

<form>
<input type="text" placeholder="First Name" autocomplete="off"><br>
<input type="text" placeholder="Last Name" autocomplete="off"><br>
<input type="text" placeholder="DoB" autocomplete="off">

<select id="province" name="province">
     <option value="choose">choose your province</option>
  <option value="province1">province 1</option>
  <option value="province2">province 2</option>
  <option value="province3">province 3</option>
  <option value="province4">province 4</option>
    <option value="province5">province 5</option>
  <option value="province6">province 6</option>
  <option value="province7">province 7</option>
</select><br>
<input type="email" placeholder="Email" autocomplete="off"><br>
<input type="password" placeholder="Password" autocomplete="off"><br>
<input class="submit-btn" type="submit" value="Sign Up">
</form>
</div>
</div> <!-- END Container -->
<!-- partial -->


<script type="text/javascript"></script></body></html>