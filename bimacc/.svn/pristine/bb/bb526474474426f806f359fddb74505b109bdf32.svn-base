<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <br/>
  Hello {{$data3['firstname']}}
  <br/><br/>
  Welcome to Electronic Arbitration System (EAS)<br/><br/>
  
  Go to Your Login Page : <a href="{{url('/login')}}" >{{url('/login')}}</a>
  <br/><br/> 
  Your Username is : {{$data3['email']}}
  <br/> 
  Your password is : {{$data3['decrypt']}}
  <br/><br/>
  Verify your Account and Go to your Home Page : <a href="{{route('mail_verify', $data3['user_id'])}}" >{{route('mail_verify', $data3['user_id'])}}</a>
  <br/><br/>
  Please find enclosed Claim notice ( No:{{$data1['claimnoticeno']}}) lodged by {{$data4['name']}}.<br/><br/>

  This notice commences arbitration proceedings against you by {{$data4['name']}}  as per your dispute resolution clause in your agreement with the Claimant. 
Use the above link to access the Claim Notice sent by the {{$data4['name']}} and please respond to the said notice in accordance with the options provided on the EAS Portal. You may engage the services of a lawyer to assist you. You are advised to read and understand the EAS Arbitration Rules. 
<br/><br/>
  This is a system-generated e-mail, please do not reply
  <br/><br/>
  Kindly ensure you read the rules available on our website.
  <br/><br/>
  Thanks & Regards,
  <br/><br/>
  <img src="{{ $message->embed(url(asset('images/pic.png'))) }}" style="
    width: 73px;">
  <br/>
  Electronic Arbitration System.
</body>
</html>



