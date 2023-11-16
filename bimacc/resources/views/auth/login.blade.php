@extends('layouts.basic')
@section('content')
<style type="text/css">
  @media (min-width: 768px) {
    .login1 {
      margin-bottom: 248px !important;
    }
    .container-login101 {
      margin-bottom: 251px !important;
    }
    .main_row {
      margin-bottom: 110px !important;
    }
  }
  
  @media (min-width: 992px) {
    .login1 {
      width:42%; float:left;margin-top: 8%;
      margin-bottom: 0px !important;
    }
    .container-login101 {
      width:35%; float:right;
      margin-bottom: 0px !important;
    }
  }
  @media (min-width: 1200px) {
    .login1 {
      width:42%; float:left;margin-top: 8%;
    }
    .container-login101 {
      width:35%; float:right;
    }
  }


  
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-error">
  <p>{{ $message }}</p>
</div>
@endif

<div class="limiter">

  <div class="container">
    <div class="row" class="main_row">
      <div class="col-lg-12 text-center">
        <img src="/images/pic.png"   class="img-responsive" width="220px">
      </div>
    </div>
  </div>

  <div class="login1">            
    <div class="login100-form-avatar">
      <h1 class="bold1" style="color: #602e9e !important;">Resolve With eAs! <br>
        Electronic Arbitration System <br>
      Powered by BIMACC </h1>

      <!-- <img src="{{ url(asset('images/logo1.png')) }}" class="img1001" /> -->
      <div>
        <h4 style="
        padding-top: 20px;
        padding-bottom: 20px;
        ">If you don’t have an account</h4>
        <a class="login100-form-btnnew" title="Register" href="{{ route('claimantregister.create') }}" style="background: #602e9e !important;">{{ __('Please Register') }}</a>     </div>
      </div>
    </div>
 
    <div class="container-login101">
      <img src="/images/login_page1.jpg"   class="loginimg" >
      <form method="POST" action="{{ route('login_form') }}" class="login101-form validate-form" autocomplete="off">
        <!-- <form class="login101-form validate-form" autocomplete="off"> -->

          @csrf                
          <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
            <div>
             <h1 class="boldnew">LOGIN</h1>
           </div>
           <input id="email" type="text" class="input101 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter Email ID or Mobile Number" value="{{ old('email') }}" required autofocus>

           @if ($errors->has('email'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
  <!--   <span class="symbol-input100" style="    margin-bottom: 42px;">
        <img src="{{ url(asset('images/usericon.png')) }}" class="inputicon" />
      </span> -->
    </div>

    <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
      <input  type="password" placeholder="Enter Password" class="input101 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
      @if ($errors->has('password'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
  <!--  <span class="symbol-input100" style="    margin-bottom: 50px;
    "> 
    <img src="{{ url(asset('images/passicon.png')) }}" class="inputicon" />
  </span> -->
</div>



<div class="m-auto">
  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

  <label class="rememberme" for="remember">
    {{ __('Remember Me') }}
  </label>
</div>
<div class="container-login100-form-btn p-t-10">
    <!-- <button type="submit" class="login101-form-btn" data-toggle="modal" data-target="#loginmodal"><div><img src="{{ url(asset('images/Layer3.png')) }}" class="imgicon" /></div>
        {{ __('') }}
      </button> -->
      <button type="submit" class="login101-form-btn"><div><img src="{{ url(asset('images/Layer3.png')) }}" class="imgicon" /></div>
        {{ __('') }}
      </button>

      @if (Route::has('password.request'))
      <a class="text-center w-full p-t-25 p-b-0 txt2 btn btn-link" href="{{ route('password.request') }}" style="color: white !important;">
        {{ __('Forgot Password!') }}
      </a>
      @endif
      <div style="
    text-align: center;
   
    padding-top: 100px !important;
">
    
    <a href="http://www.bimacc.org/">
  
      Have you considered resolving your dispute through Mediation?
    
  </a>
  </div>
    </div>
<!-- <button type="submit" class="btn btn-primary login_submit"  style="
  color: white;
 
  margin-left: 146px;
  margin-top: 21px;
  ">Submit</button> -->


</form>
</div> 
<div style="width: 100%"> 

 <div class="footercredits">
  <img src="{{ url(asset('images/logo1.png')) }}" class="" width="200px" />
  
  <div><a href="{{url('privacypolicy')}}" target="blank" style="color: #602e9e"> &nbsp;<b>Privacy Policy </b>&nbsp;</a> 
    <p>&nbsp;&nbsp;|&nbsp;&nbsp;</p> 
    <i class="fa fa-copyright" style="color: black; "></i><p style="color: #602e9e;font-weight: bold">{{ now()->year }} <a href="{{url('https://www.bimacc.org/')}}" target="blank" style="color: #602e9e"> &nbsp;Lexquisite. &nbsp;</a> &nbsp; All Rights Reserved. &nbsp; </p>|</p><a href="{{url('about_us')}}" target="blank" style="color: #602e9e"> &nbsp;<b>About Us </b>&nbsp;</a></p>|</p> <a href="{{url('mainscreen')}}" target="blank" style="color: #602e9e"> &nbsp;<b>FAQ </b>&nbsp;</a>|</p> <a href="{{url('terms')}}" target="blank" style="color: #602e9e"> &nbsp;<b>Terms & Conditions </b>&nbsp;</a></div>|</p><a href="" data-toggle="modal"  data-target="#contactusmodal" style="color: #602e9e"> &nbsp;<b>Contact Us</b>&nbsp;</a>|</p><a href="https://ttci-demo.com/eAs_User_Manual.pdf" download  style="color: #602e9e"> &nbsp;<b>User Manual</b>&nbsp;</a></div>


  </div>
</div>

</div> 
@include('modals/loginmodal')
@include('modals/contactus')
<!-- <script>
$(document).ready(function(){
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var email = $('#email').val();
var password = $('#password').val();
$(".login_submit").click(function(){

$.ajax({

url: '{{ url('/login') }}',
type: 'POST',
data: {_token: CSRF_TOKEN, email:email,password:password},
dataType: 'JSON',
success: function (data) {
alert(data);
}
});
});
});
</script> -->
<!-- <script type="text/javascript">
  $("form input:radio").change(function(){ 
    alert("kkjh");
    // if ($(this).val() == "walk_in") {
    //     // Disable your roomnumber element here
    //     $('.roomNumber').attr('disabled', 'disabled');
    // } else {
    //     // Re-enable here I guess
    //     $('.roomNumber').removeAttr('disabled');
    // }
});
</script> -->
<script type="text/javascript">
  $('form').on('submit', function(e){
    e.preventDefault();
    var $this = $(this);
    // alert($this.prop('action'));

    $.ajax({
      url: $this.prop('action'),
      method: 'POST',
      data: $this.serialize(),
    }).done(function(response){
     console.log(response);




     
     var count_mail=response.mail_count;
     var count_claimant1=response.count_claimant1;
     var roles_id=response.role_id;
     var email=response.email;
     var password=response.encrypt;
     var CSRF_TOKEN=response.token;
     var verify_count=response.verify_count;

  // alert(verify_count);
  if (count_mail=='0'){
    swal("Invalid Credential", "", "error");
    return false;
  }
  else{
    if((count_mail=='1' && count_claimant1 !='0') || (count_mail=='1' && count_claimant1 =='0'))
    {
      if(verify_count =='0'){
        swal("Kindly Verify your Mail", "", "error");
        return false;
      }
  // alert('A');
  else{
   $.post('/login_role', {_token: CSRF_TOKEN, email:email,password:password,roles_id:roles_id},  function(){
    window.location.href = '{{ route("home") }}';
  });
 }
}
else if(count_mail!='1' && count_claimant1 !='0'){


 var role=response.userList;
 // alert(role);

 var html = '';

 
 $('#role_email').val(response.email);
 $('#role_pass').val(response.encrypt);
 $('#verify_count').val(response.verify_count);


 for(var count = 0; count < role.length; count++)
 {
  html +=  '<input type="radio" name="role_pop" value="'+role[count].roles_id+'" mail_ver="'+role[count].mail_verify+'"> <label for="male">'+role[count].display_name+'</label><input type="text" name="mail_verify" value="'+role[count].mail_verify+'" style="display: none;"> <label></label></br>';
  

}
$('#select_role').html(html);





$('#loginmodal').modal({'show' : true});

}
else{
//  if(verify_count !='2'){
//   swal("Either your Role is not Verified", "", "error");
//   return false;
// }
// else{
  

 window.location.href = '{{ route("role") }}'; 
// }

}
}

});



  });
</script>

<script type="text/javascript">
  $(function() {
    $(document).on('change', '[name="role_pop"]' , function(){
      var CSRF_TOKEN = $('input[name="_token"]').val();
      var roles_id = $('[name="role_pop"]:checked').val();
      var email=$("#role_email").val();
      var password=$("#role_pass").val();
      var verify_count=$('[name="role_pop"]:checked').attr('mail_ver');
      // alert(verify_count);

      if(verify_count !='1'){
        swal("Kindly Verify your Mail", "", "error");
        return false;
      }
      else{

       $.post('/login_role', {_token: CSRF_TOKEN, email:email,password:password,roles_id:roles_id},  function(){
        window.location.href = '{{ route("home") }}';
      });
     }

     
   }); 

  });
</script>

@endsection
