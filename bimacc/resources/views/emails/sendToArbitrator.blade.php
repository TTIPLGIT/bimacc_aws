<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <br/><br/>
  Hello {{$dataname['name']}},
  <br/><br/>
  This is with reference to Electronic Arbitration System (EAS) - Claim Notice {{$data1['claimnoticeno']}}<br/><br/>
  Login & Access the Page : <a href="{{url('/login')}}" >{{url('/login')}}</a>
  <br/><br/>
  

  This is to inform you that you have been proposed to be appointed as an Arbitrator in the Arbitration between {{$data1['clai_name']}} and {{$data1['res_name']}} as per Claim Notice  {{$data1['claimnoticeno']}}.  Kindly use the above link to view/access the Claim petition. Kindly give your consent on the EAS Portal. If there is any conflict of interest, please let us know at the earliest through the portal, or by contacting the centre at info@bimacc.org. 
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





