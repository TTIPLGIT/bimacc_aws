<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <br/>
  Hello {{$data1['username']}}, 
  <br/><br/><br/>
  <!-- Welcome to Online Arbitration System -->

This is with Reference to Electronic Arbitration System (EAS) - Claim Petition (No:{{$data1['arbitration_petionno']}})
  <br/><br/>
  Login & Access the Page : <a href="{{url('/login')}}" >{{url('/login')}}</a>
  <br/><br/>
The Award has now been reserved by the Arbitrator and you will be notified once it is released.  <br/><br/>
  
  This is a system-generated e-mail, please do not reply
  <br/><br/>
  Kindly ensure you read the rules available on our website.
  <br/><br/>
  Thanks & Regards,
  <br/>
  Electronic Arbitration System.
</body>
</html>



