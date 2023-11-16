
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <br/>
 Hello {{$data3['firstname']}},
  <br/><br/><br/>
  This is with Reference to Online Arbitration System - Claim Notice ( No:{{$data3['claimnoticeno']}}), your case reference numbers is now Claim Petition (No:{{$data3['ArbitrationNo']}})
<br/><br/>
  
  Login & Access the Page : <a href="{{url('/login')}}" >{{url('/login')}}</a>
  <br/><br/>
   We are pleased to inform you that Mr/Ms.{{$data3['arbitrator_name']}} has been appointed after obtaining his consent and disclosure of conflict of interest.Please use the above link to participate in the proceedings.<br/><br/>

   
  This is System Generated Mail Please Do not Reply.<br/><br/>
  Thanks & Regards,
  <br/>
  Bangalore International Mediation, Arbitration and Conciliation Centre.
</body>
</html>














