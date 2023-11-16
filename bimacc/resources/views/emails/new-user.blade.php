<!DOCTYPE html>
<html>
<head>
    
</head>

<body>
	Dear  {{$user['name']}}<br/><br/>

	Welcome to Online Arbitration<br/><br/>
	Your Username is {{$user->email}}<br/><br/>
	Your password is :{{$data1['decrypt']}}<br/><br/>
	Click this link for registration. <br/><br/>
	Verify your Account and Go to your Home Page : <a href="{{route('mail_verify', $id)}}" >{{route('mail_verify', $id)}}</a>

	<!-- Reset Your Password Here {{route('login', $token)}}<br/><br/> -->
	This is System Generated Mail Please Do not Reply<br/><br/>
	<br/>
	<!-- Click this link for registration. <br/><br/> 

	Reset Your Password Here {{route('password.reset', $token)}}<br/><br/>
	This is System Generated Mail Please Do not Reply<br/><br/> -->
	<br/>
	Thanks & Regards,
	<br/>
	Bangalore International Mediation, Arbitration and Conciliation Centre.
</body>
</html>