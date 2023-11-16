<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <br/>
 Hello {{$data1['username']}},
  <br/><br/><br/>
  This is with Reference to Electronic Arbitration System  - Claim Notice ( No:{{$data1['claimnoticeno']}}), your case reference numbers is now Claim Petition (No:{{$data1['ArbitrationNo']}})
<br/><br/>
  
  Login & Access the Page : <a href="{{url('/login')}}" >{{url('/login')}}</a>
  <br/><br/>
  We are pleased to inform you that Mr/Ms.{{$data1['arbitrator_name']}} has been appointed after obtaining his consent and disclosure of conflict of interest.Please use the above link to participate in the proceedings.<br/><br/>
   
  <br/><br/>
  
 This is a system-generated e-mail, please do not reply
  <br/><br/>
  Kindly ensure you read the rules available on our website.
  <br/><br/>
  Thanks & Regards,
  <br/>
  Electronic Arbitration System.
</body>
</html>







