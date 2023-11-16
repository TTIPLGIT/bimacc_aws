<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<br/>
	Hello {{$data1['name']}},
	<br/><br/><br/>
	Welcome to Electronic Arbitration System (EAS).<br/><br/>
	Kindly visit our Login Page : <a href="{{url('/login')}}" >{{url('/login')}}</a>
	<br/><br/>
	Your Username is {{$data1['email']}}  
	<br/><br/>
	Your password is {{$data1['decrypt']}}	
	<br/><br/>
	Verify your Account and Go to your Home Page : <a href="{{route('mail_verify', $data1['user_id'])}}" >{{route('mail_verify', $data1['user_id'])}}</a>
  
   <br/><br/>
	This is a system-generated e-mail, please do not reply.
	<br/><br/>
  Kindly ensure you read the rules available on our website.
	<br/><br/><br/>
	Thanks & Regards,
	<br/><br/>
  
	<br/>

	Electronic Arbitration System.
</body>
</html>