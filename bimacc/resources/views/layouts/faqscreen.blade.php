
<!DOCTYPE html>
<html lang="en">
<title>Online Arbitration Systems</title>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href="{{ url(asset('css/style.css')) }}" rel="stylesheet" type="text/css">

   <script src="{{ url('/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('/js/dataTables.buttons.min.js') }}"></script>

  <link href="{{ url(asset('css/dataTables.bootstrap4.min.css')) }}" rel="stylesheet" type="text/css">
  <link href="{{ url('/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css">
 
  <link href="{{ url('/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css">

  <link href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.css') }}" rel="stylesheet">
<head>
<meta charset="utf-8">
<style>
    /* Add some padding on document's body to prevent the content
    to go underneath the header and footer */

    .fixed-header{
        width: 100%;
            
        background: #602e9e !important;
        padding: 10px 0;
        color: #fff;
    }
    .fixed-header{
        top: 0;
    }
    #footer {
      color: white !important;
            position: fixed;
            padding: 10px 10px 0px 10px;
            bottom: 0;
            width: 100%;
            /* Height of the footer*/ 
            height: 40px;
            background: #602e9e !important;
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


h2,h5{
    font-size:22px !important;
    text-align:center !important;
}
#box{
  border-color: #602e9e !important;
 
}

.col-lg-3{
  margin-bottom:0px !important;
}

.tabss {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  height:40% !important;

}
#reg{
  margin-right:50px !important;
  margin-left:50px !important;

}
#navback{
  background-image:url('images/s3.jpg') !important;
   background-repeat: no-repeat;
    background-attachment: fixed;

}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg " style="height:100px; position:relative!important;background-color:#602e9e !important;">
<div class="col-lg-2">
<a type="button" href="{{url('https://www.bimacc.org/')}}"    title="Bimacc"><img src="/images/logo1.png" class="" width="120px">  </a>
</div>           
<div class="col-lg-8">
<h5 style="color:white !important;text-align:center !important;"><b>Electronic Arbitration System Powered by BIMACC</b></h5>

</div>
<div class="col-lg-2">
<button type="button" value="Close" onclick="closeMe()" style=" float:right !important; background-color: white!important; color:  #602e9e !important; border-radius:30px;" class="btn btn-primary"  title="Close"><i class="fas fa-backspace"></i></button>
</div>
</nav>
<nav class="navbar navbar-expand-lg " id="navback">
<div class="col-lg-4">    
<img src="/images/ser1.PNG" width="50%">  
</div>
<div class="col-lg-4 text-center">
<h2><b>What do you need help with ?</b></h2>

      <div class="input-group ">
      <input type="search" class="form-control rounded" id="box" name="module_name" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  <button type="button" onclick="searchIt()" style="background: #602e9e !important; color:white !important;" class="btn btn-primary"><i class="fas fa-search"></i></button>
                  </div> 
                 </div>
                 <div class="col-lg-2">    
</div>
                 <div class="col-lg-1">
<a type="button" href="{{url('claimantregister/create')}}"  style="margin-top:20px !important; float:right !important;  font: 18px Arial, sans-serif!important; padding:10px !important;   color: #602e9e  !important; " class="btn"  title="Register"><b>Register</b></a>    

</div>
<div class="col-lg-1">
<a type="button" href="{{route('login')}}"  style="margin-top:20px !important; float:left !important;  font: 18px Arial, sans-serif!important; padding:10px !important;   color: #602e9e  !important; " class="btn"  title="Login"><b>Login</b></a>    

</div>

</nav>
<!-- <div class="tabss">
<div class="col-lg-5">    
</div>
<div class="col-lg-2">    
</div>
<div class="col-lg-5" style="">    
<a type="button" href="{{url('https://www.bimacc.org/')}}"  style="float:right !important; font-size:18px !important; padding:15px !important; text-align:center !important;  color: #602e9e !important; border-radius:25px;"   title="Bimacc-official link"><i class="fas fa-home"></i><b>Home</b></a>
<a type="button" href="{{route('login')}}" id="reg" style="margin-top:10px !important; float:right !important;  font: 18px Arial, sans-serif!important; padding:10px !important; background-color:#ffc002 !important;  color: black !important; border-radius:25px;" class="btn-primary"  title="Register / Login"><b>REGISTER / LOGIN</b></a>    
</div>
</div> -->
           
   
	@yield('content')

  
 

  <div id="footer">
    <div class="col-lg-12 text-center">
    <span2><a href="{{url('privacypolicy')}}">Privacy Policy</a></span2> <span02 style="color:orange !important; padding: 15px !important;"> | </span02> <span>Copyright © <a href="{{route('home')}}">Lexquisite.</a> {{ now()->year }}</span> <span01 style="color:orange !important;  padding: 15px !important;"> | </span01> <span1><a href="{{url('terms')}}">Terms & Conditions</a></span1>  
    </div>
  </div>
  

  <script>
function closeMe()
{
    window.opener = self;
    window.close();
}
</script>






</body>
</html>
