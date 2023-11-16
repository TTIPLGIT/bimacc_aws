
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
    p {
    line-height: 2;
    font-size: 16px;
    font-family: monospace;
}

ul {
    line-height: 2;
    font-size: 16px;
    font-family: monospace;
}

li {
   
    list-style: none;
}

strong {
    color: blueviolet;
}
h2{
font-size: 32px;
    color: #e12864;
}
html ,body{
   background-color: #e9ecff  !important;
}
.navbar-inverse {
    background-color: #222;
    border-color: #f8f5f5;
}




  </style>
</head>
<body>

  <nav class="navbar navbar-inverse" style="background:#bfc1ff">
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








  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <h2>Privacy Policy</h2> <p>
         The website <a href="https://eas-odr.org/login">https://eas-odr.org/login</a> is powered by BIMACC, a not-for-profit organization with its registered office at No 31, Thiru and Thiru Chambers, Nandidurga road, Jaymal Extension, Bangalore,Karnataka–560046,India.
       </p> <p>
         This Privacy Policy “Privacy Policy” sets out the privacy practices of BIMACC with respect to the entire content of the Website.
       </p> <p>
        This document is published in accordance with the provisions of the Information Technology Act, 2000 and the Reasonable Security Practices and Procedures and Sensitive Personal Data or Information Rules, 2011 that require publishing the rules and regulations as well as privacy policy on the online portal of BIMACC. We request you to kindly go through this Privacy Policy and the Terms of Use carefully before you decide to access this Website.
      </p> <p>
        For the purposes of this Privacy Policy,the words “us”,“we”,and “our” refer to BIMACC and all references to “you”, “your” or “user”, as applicable, shall mean the person who accesses, uses and/or participates on the Website in any manner or capacity.
      </p> 
      <p>
       The protection and security of your personal information are our top priorities. We have taken all necessary and reasonable measures to protect the confidentiality of the user information and its transmission through the internet.
      </p> 
      <p>
        <!-- <strong>Information Collection and Use</strong></p> <p> -->
        By using our services and/or the website or by otherwise giving us your information, you agree to the terms of this privacy policy. You also expressly consent to our use and disclosure of your personal information (as defined below) in the manner prescribed under this privacy policy and further signify  your agreement to this privacy policy and the terms of use. If you do not agree to this privacy policy, do not subscribe to or use the services, use the website and do not give us any of your information. 
         <p><strong>1.COLLECTION OF INFORMATION</strong></p> <p>
           <ul>
            1.1 To the extent allowed by law, we are not allow to own the information collected through the Website and you hereby grant to us, a perpetual, royalty free and irrevocable license to use th e information on the terms and conditions contained here in. We may collect and process personal information provided by you,including but not limited to:

            <ul>
            </br>
            <li>


              (a)Any information that you provide at the time of registration including any information that identifies or can be used to identify, contact, or locate the user such as name,address and phonenumber 

            </br> 
          </li>
          <li>(b)Any information that you provide on our website when you use our Services including login and logout time.</li>
          
        </br>

        <li>(c)Any data that is automatically captured by the Website, such as the &ldquo;IP&rdquo;address (see below) from which the Website has been accessed. Every computer/mobile device connected to the internet is given a domain name and a set of numbers that serve as that computer's Internet Protocol or &ldquo;IP&rdquo; address. When you request a page from any page within the Website, our web servers automatically recognize your domain name and IP address.
         <p>(Here in after,collectively referred to as&ldquo;Personal Information&rdquo;).</p>
       </li>

     </br>


   </ul>
 </ul>
 <p><strong>2. USE OF INFORMATION COLLECTED</strong></p> <p>
   <ul>
    <p>2.1. Use of Personal Information for Services</p>
    The primary goal of BIMACC in collecting Personal Information is to provide you an online platform for the purpose of providing the Services.BIMACC may use Personal Information provided by you in the following ways:

    <ul>
    </br>
    <li>


      (a) To provide and help provide you the Services;


    </li>
  </br>
  <li>(b) To observe,improve and administer the quality,features and functionality of the Services;</li>

</br>

<li>(c) To analyze how the Website is used and to diagnose technical problems;

</li>

</br>
<li>(d) Remember basic Personal Information provided by you for effective access;

</li>
</br>
<li>(e) To confirm your identity in order to determine your eligibility to use the Website and avail the Services;

</li>
</br>
<li>(f) To notify you about any changes to the Website;

</li>
</br>
<li>(g) To enable BIMACC to comply with its legal and regulatory obligations;

</li>
</br>
<li>(h) For the purpose of sending administrative notices, Service-related alerts and other similar communication with a view to performing the Services effectively and optimizing the efficiency of the Website;

</li>
</br>
<li>(i)  Doing market research,trouble shooting,protection against error,project planning,fraud,and other criminal activity;and

</li>
</br>
<li>(l) To enforce BIMACC’s Terms of Use.

</li>



</ul>
</br>
<p>2.2.  SALE OF ASSETS,MERGER,ACQUISITION,BANKRUPTCY</p>
Information collected from you may be transferred to a third party as a result of a sale or acquisition,merger or bankruptcy involving BIMACC
</br></br>
<p> 2.3. COOKIES</p>
Cookies are small portions of information saved by your browser onto your computer/mobile/tablet  or other devices.Cookies are used to record various aspects of your visit and assist BIMACC to provide you with uninterrupted service.




<ul>
</br>



</ul>
</ul>

<p><strong>3.SHARING OF INFORMATION</strong></p> <p>
 <ul>
  <p>3.1. Sharing</p>
  Other than as mentioned else where in this Privacy Policy, BIMACC may share aggregated demographic information with BIMACC’s partners or affiliates. This is not linked to any Personal Information that can identify an individual person.BIMACC will not be liable for transfer of any Personal Information resulting from  loss or distribution of data,or corruption of media storage,power failures,natural phenomena,riots,act(s)of vandalism,sabotage, terrorism and any other event beyond BIMACC’s reasonable control, including due to acts or omissions of third parties. Further, BIMACC’s Privacy Policy does not cover the use of cookies by its partners and affiliates since BIMACC does not have access or control over such cookies.

  <ul>



  </ul>
</br>
<p> 3.2  Consulting</p>
BIMACC may partner with another party to provide specific Services if required. When you sign-up for the Services, BIMACC will share names or other Personal Information that is necessary for the third party to provide these Services.BIMACC shall take efforts to ensure that BIMACC’s arrangements with such third parties restrict these parties from using personally identifiable information except for the explicit purpose of assisting in the provision of these Services.
</br></br>
<p> 3.3 Regulatory Disclosures</p>
In the event BIMACC is required to disclose any Personal Information by law,rule,regulation,enforcement,governmental official,legal or regulatory authorities or any other statutory bodies, court orders or other legal processor for any tax authorities(“Required Disclosures”),your Personal Information may be disclosed pursuant to such Required Disclosures.Required Disclosures may be made without notice to you. BIMACC may further disclose your Personal Information to such third parties to whom it transfersits rights and duties under any agreement entered into with such third parties and may also disclose your Personal Information to any of its affiliates or related entity.

</br></br>
<p>3.4 Link to Third Party Websites</p>
This Website may contain links which may lead you too their websites.Please note that once you leave BIMACC’s Website you will be subjected to the privacy policy of the other website.The linked sites are not necessarily under the control of BIMACC. Please be aware that BIMACC is not responsible for the privacy practices of such other websites. BIMACC encourages you to read the privacy policies of each and every website that collects Personal Information. If you decide to access any of third-party sites linked to the Website, you do this entirely at your own risk. Any links to any third-party partner of BIMACC should be the responsibility of such third party providing the linking facility, and BIMACC will not be responsible for notification of any change in the name or location of any information on the third-party website.
</br></br>
<p> 3.5 Disclosure to Other Service Recipients</p>
You hereby permit BIMACC to disclose to disputants, dispute resolution professionals, witnesses and legal counsel (“Other Service Recipients”) your Personal Information to the extent such disclosure is required-(a)for you to avail the Services; or (b) by the rules of BIMACC or any third party for resolution of disputes on the Website;(c)by applicable law.




<ul>
</br>



</ul>
</ul>
<p><strong> 4.NON-DISCLOSUREOFINFORMATION</strong></p> <p>
 <ul>
  <p>4.1  BIMACC pledges that it will not sell or rent your Personal Information to anyone and your Personal Information will be protected and maintained strictly confidential by BIMACC except in the following cases:

    <ul>
    </br>
    <li>


      (a) A Required Disclosure of your Personal Information;


    </li>
  </br>
  <li>(b) BIMACC may disclose your Personal Information in order to provide you the Services, enforce or apply the Terms of Use, or to protect the rights, property or safety of BIMACC, its users o rothers. This includes exchanging information with other companies /agencies that work for fraud prevention;</li>

</br>

<li>(c) BIMACC may disclose your Personal Information to such third parties to whom it transfers its rights and duties under any agreement entered with such third parties;and

</li>

</br>
<li>(d)  BIMACC may disclose your Personal Information to any of its affiliates or related entity.

</li>
</br>




</ul>
</ul>
<p><strong> 5.  SECURITY OF INFORMATION</strong></p> <p>
 <ul>
  <p>5.1  BIMACC has put in place appropriate methods and managerial procedures to safeguard and secure Personal Information. BIMACC only processes Personal Information in away that is compatible with and relevant for the purpose for which it was collected from or authorized by the user.
    <p>5.2  BIMACC uses commercially reasonable precautions to preserve the integrity and security of your Personal Information against loss,theft,unauthorised access,disclosure,reproduction,use or amendment.
      <p>5.3  Personal Information that is collected from you may be transferred to,stored and processe at any destination within and/or outside India.By submitting Personal Information on the Website,you agree to this transfer,storing and/or processing. BIMACC will take such steps as it considers reasonably necessary to ensure that your Personal Information is treated securely and in accordance with this Privacy Policy.
         <p>5.4 In using the Website,you accept the inherent security implications of data transmission over the internet. Therefore, the use of the Website will be at your own risk and BIMACC assumes no liability for any disclosure of Personal Information due to errors in transmission, unauthorized third party access or any other acts of third parties, or acts or omissions beyond its reasonable control and you agree not to hold BIMACC responsible for any breach of security whether a rising due to errors in transmission or due to any acts of third parties.
           <p>5.5 In the event BIMACC becomes aware of any breach of the security of your Personal Information, it will promptly notify you and take appropriate action to the best of its ability to remedy such a breach
   
    <ul>
    
    </br>
    



</ul>
</ul>
<p><strong>6. EXCLUSION</strong></p> <p>
 <ul>
  <p>6.1  This Privacy Policy does not apply to any information other than information collected by BIMACC through the Website including such information collected in accordance with the clause on “Collection of Information”above.This Privacy Policy will not apply to any unsolicited information provided by you through this Website or through any other means. This includes, but is not limited to, information posted on any public areas of the Website. All such unsolicited information shall be deemed to be non-confidential and BIMACC will be free to use, disclose such unsolicited information without limitation.
    <p>6.2  BIMACC also protects your Personal Information off-line other than as specifically mentioned in this Privacy Policy.Access to your Personal Information is limited to employees,agents or partners and third parties,who BIMACC reasonably believes will need that information to enable BIMACC to provide Services as described under clause 2.1. However, BIMACC is not responsible for the confidentiality, security or distribution of Personal Information by our partners and third parties outside the scope of our agreement with such partners and third parties.
     
   
    <ul>
    
    </br>
    



</ul>
</ul>

<p><strong>7.  DATA RETENTION</strong></p> <p>
 <ul>
  <p>7.1  BIMACC shall not retain Personal Information longer than is necessary to fulfil the purposes for  which it was collected and as permitted by applicable law.If you wish to cancel your account or request that BIMACC no longer use your information to provide you Services, contact us through email at iinfo@eas-odr.org. However, even after your account is terminated, BIMACC may retain your Personal Information as needed to comply with our legal and regulatory obligations, resolve disputes, conclude any activities related to cancellation of an account, investigate or prevent fraud and other in appropriate activity, to enforce our agreements, and for other business reasons.
   
   
     
   
    <ul>
    
    </br>
    



</ul>
</ul>
<p><strong>8.  RIGHT TO WITH DRAW CONSENT</strong></p> <p>
 <ul>
  <p>8.1  The consent that you provide for the collection, use and disclosure of your Personal Information will remain valid until such time it is withdrawn by you in writing.If you withdraw your consent,BIMACC will stop processing the relevant Personal Information except to the extent that BIMACC has other grounds for processing such Personal Information under applicable laws. BIMACC will respond to your request within a reasonable time frame. You may withdraw your consent at anytime by contacting BIMACC or by using the functionalities of the Website. However, please note that consent with respect to the pleadings and documents related to any dispute you wish to resolve using the Services,may not be withdrawn.
  
   
     
   
    <ul>
    
    </br>
    



</ul>
</ul>

<p><strong>9. RIGHT TO CORRECTION</strong></p> <p>
 <ul>
  <p>9.1  You are responsible for maintaining the accuracy of the information you submit to us, such as your contact information provided as part of account registration.BIMACC relies on the users to disclose to it all relevant and accurate information and to inform BIMACC of any changes. If you wish to make a request to correct or update any of your personal data which we hold about you, you may submit your request in writing or via email to info@eas-odr.org.
  
   
     
   
    <ul>
    
    </br>
    



</ul>
</ul>

<p><strong>10.  DATA TRANSFER</strong></p> <p>
 <ul>
  <p>10.1 BIMACC may transfer information that it collects about you, including Personal Information, to affiliated entities, or to other third parties across borders and from your country or jurisdiction to other countries or jurisdictions around the world.These countries may have data protection laws that are different from the laws of your country and, in some cases, may not be as protective. BIMACC shall take appropriate safeguards to require that your Personal Information will remain protected in accordance with this Privacy Policy.
  
   
     
   
    <ul>
    
    </br>
    



</ul>
</ul>
<p><strong>11.NOTIFICATION OF CHANGES</strong></p> <p>
 <ul>
  <p>11.1 From time to time, BIMACC may update this Privacy Policy to reflect changes to its information practices.Any changes will be effective immediately upon the posting of the revised Privacy Policy. If BIMACC makes any material changes, it will notify you by email (sent to the e-mail address specified in your account)or by means of a notice on the Services prior to the change becoming effective. We encourage you to periodically review this page for the latest information on our privacy practices.
  
   
     
   
    <ul>
    
    </br>
    



</ul>
</ul>

<p><strong>12.  OPT OUT PROCEDURES</strong></p> <p>
 <ul>
  <p>12.1 Upon initial communication from BIMACC, you may opt-out of receiving further communications from BIMACC. To be completely removed from BIMACC’s mailing list,you may contact us at info@eas-odr.org.If you are using an e-mail forwarding service or any other similar service please make sure to include the correcte-mail address or addresses.
  
   
     
   
    <ul>
    
    </br>
    



</ul>
</ul>
<p><strong>13.  ADDRESS FOR PRIVACY QUESTIONS</strong></p> <p>
 <ul>
  <p>13.1 Should you have questions about this Privacy Policy or BIMACC’s information collection,use and disclosure practices,you may contact us at:info@eas-odr.org. We will use reasonable efforts to respond promptly to requests, questions or concerns you may have regarding our use of Personal Information about you. Except where required by law, BIMACC cannot ensure a response to questions or comments regarding topics unrelated to this policy or BIMACC’s privacy practices.
  
   
     
   
    <ul>
    
    </br>
    
<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YOU HAVE READ THIS PRIVACY POLICY AND AGREE TO ALL OF THE PROVISIONS CONTAINED ABOVE.</strong></p> <p>


</ul>
</ul>





</div>
</div>
</div>

<div id="footer">
  <div class="col-lg-12 text-center">
     <span style="color:white !important; ">Copyright © <a style="color:white !important; " href="{{route('home')}}">Lexquisite.</a> {{ now()->year }}</span> <span01 style="color:orange !important;  padding: 15px !important;"> | </span01> <span1 style="color:white !important; "><a href="{{url('terms')}}" target="blank" style="color: white">Terms & Conditions</a></span1>  
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
