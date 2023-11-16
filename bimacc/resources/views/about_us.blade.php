
<!DOCTYPE html>
<html lang="en">
<title>Online Arbitration Systems</title>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <script src="{{ url('/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('/js/dataTables.buttons.min.js') }}"></script>
  <link href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.css') }}" rel="stylesheet">

  <link href="{{ url(asset('css/dataTables.bootstrap4.min.css')) }}" rel="stylesheet" type="text/css">
  <link href="{{ url('/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">
 
  <link href="{{ url('/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>

<style>
    /* Add some padding on document's body to prevent the content
    to go underneath the header and footer */

    
    #footer {
      color: white !important;
            padding: 10px 10px 0px 10px;
            bottom: 0 !important;
            width: 100%;
            /* Height of the footer*/ 
            height: 40px;
            background: #602e9e  !important;
        }
    .container{
        width: 80%;
        margin: 0 auto; /* Center the DIV horizontally */
    }
    nav a{
        color: #fff;
        text-decoration: none;
        padding: 7px 25px;
        display: inline-block;
    }
   
    #more {display: none;}

    .centered {
      font-family: "Nunito", sans-serif !important;

  position: absolute;
  top: 45%;
  left: 20%;
  transform: translate(-50%, -50%);
  font-size:35px !important;
  color:  gold !important;
}

.centereds {
  font-family: "Nunito", sans-serif !important;

  position: absolute;
  top: 55%;
  left: 25%;
  transform: translate(-50%, -50%);
  font-size:24px !important;
  color:white !important;
}




</style>
</head>
<body>

<nav class="navbar navbar-inverse" style="background:white">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" >
    <img src="/images/pic.png" width="100"  class="d-inline-block align-top" alt="">
   </a> 
   </div>
   <ul class="nav navbar-nav">
      <li class="active">
      <h5 style="color:#602e9e !important; padding:20px !important; font-weight:600 !important; margin-top:20px !important;  font-size:25px !important;">Electronic Arbitration System</h5>
      </li>
        </ul>
   

    <ul class="nav navbar-nav navbar-right">
      <li>
      <a type="button" href="{{url('claimantregister/create')}}"  style="margin-top: 30px !important;   font: 18px Arial, sans-serif!important; padding:10px !important;   color: #602e9e  !important; " class="btn"  title="Register"><b>Register</b></a>    
      </li>
      <li>
      <a type="button" href="{{route('login')}}"  style="margin-top: 30px !important;  font: 18px Arial, sans-serif!important; padding:10px !important;   color: #602e9e  !important; " class="btn"  title="Login"><b>Login</b></a>    
      </li>
      <li>
      <a type="button" href="{{url('https://www.bimacc.org/')}}"  style=" " class="btn"  title="Bimacc"><img src="/images/logo1.png" class="img-responsive" width="110px" style="margin-top:5px !important;"></a>    
      </li>
    </ul>
  </div>
</nav>






  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:-20px !important;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
   
        <img src="/images/Legal.jpg" alt="Image" style="width:100%;  height:460px !important; filter: brightness(70%);">
        <div class="centered"><b>Arbitration</b></div>
        <div class="centereds"><b>Real results in a virtual space</b></div>

      </div>

      <div class="item">
      <img src="/images/history.jpg" alt="Image"  style="width:100%; height:460px !important;">
      </div>
    
      <div class="item">
      <img src="/images/laws1.jpg" alt="Image" style="width:100%;  height:460px !important; "> 
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="main-content" style=" background:#d9d9d9 !important; padding:15px !important;">
  <div class="container" style="text-align: justify; text-justify: inter-word;" >
<p style="padding:15px !important; font-family:verdana; font-size:15px !important; color:#404040 !important;">
EAS (Electronic Arbitration System) is a project of BIMACC and is a new and flexible communication medium that widens the possibility of dispute resolution. EAS minimizes costs and saves time through simplified procedures, evidence by way of affidavit alone, and lower administration and arbitration fees. EAS services are far more economical than traditional litigation and notably less expensive than in-person arbitration.
<br><br>
There is also an option to get the dispute resolved through Mediation at BIMACC. 
<br><br>
Another advantage of EAS is convenience, as the name suggests, and disputes can be resolved with ease! EAS allows parties to resolve their claims from their respective offices or residences. Unlike in litigation or physical/in-person arbitration, EAS service providers are typically available twenty-four hours a day, seven days a week, every day of the year.  Disputants can communicate at all hours of the day, diminishing difficulties faced by those located in different time zones. 
</p>
	
</div>
  </div>

  <div class="main-content" style=" background:white !important; padding:15px !important;">
  <div class="container" style="text-align: justify; text-justify: inter-word;" >
<h5 style="text-align:center !important; color:#602e9e !important;  font-size:28px !important;">EAS (Electronic Arbitration System)</h5>
<div class="row">
<div class="col-lg-6">

<img src="/images/Legal1.jpg" alt="Image" style="width:100%; float:right !important; padding:15px !important;">
</div>
<div class="col-lg-6">
<p style="padding:15px !important; font-family:verdana; font-size:15px !important; color:#404040 !important;">EAS platform is unique as it offers disputants to resolve domestic and cross border disputes valued as 
  low as Rs. 10,000/- for domestic disputes and USD 1,000 for cross border disputes.
  <br>  <br>
  Low-cost arbitration at EAS is aimed at improving the accessibility of dispute resolution by removing barriers to access due 
  to financial status, disability, geographical location, and also allows arbitration to occur smoothly despite the ongoing pandemic
   and the inability to have face-to-face interactions and other such potential hindrances to accessing justice<span id="dots">...</span><span id="more"> 
   <br>  <br>The EAS portal can 
   be accessed using any device, and there is a hybrid online-offline mechanism exclusively for the banking segment for disputants 
   who do not have an email id.  <br>  <br>


EAS also offers increased benefits for the development and skills training for arbitrators. 
The pool of Arbitrators includes Arbitrators of Bangalore International Mediation Arbitration 
and Conciliation Centre who undergo special training regarding the use of the EAS Platform and EAS Arbitration Rules. 
.</span>
<a onclick="myFunction()" id="myBtn" style="cursor: pointer !important; ">Read More</a></p>
</div>
  </div>
</div>
  </div>

  <div id="footer">
    <div class="col-lg-12 text-center">
    <span2 style="color:white !important; "><a href="{{url('privacypolicy')}}" target="blank" style="color: #fff">Privacy Policy</a></span2> <span02 style="color:orange !important; padding: 15px !important;"> | </span02> <span style="color:white !important; ">Copyright © <a style="color:white !important; " href="{{route('home')}}">Lexquisite.</a> {{ now()->year }}</span> <span01 style="color:orange !important;  padding: 15px !important;"> | </span01> <span1 style="color:white !important; "><a href="{{url('terms')}}" target="blank" style="color: #fff">Terms of Service</a></span1>  
    </div>
  </div>
  



  <script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>





</body>
</html>
