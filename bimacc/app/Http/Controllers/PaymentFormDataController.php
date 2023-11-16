<?php

namespace App\Http\Controllers;

class PaymentFormDataController extends Controller
{

  

    public function index()
    {
      
     $encryption_key= 'axisbank12345678';
    //Change Checksum Key as provided by EasyPay Team
    $checksum_key = "axis";
    $cid = '3636'; //Axis bank Unique ID
    $rid = rand(9999, 999999);//rand(9999, 999999); //Random No
    $crn = '8000012';  //Claim Notice Id
    $amt = '50.00'; //Amount Capture
    $ver = '1.0';
    $typ = 'Test'; 
    $cny = 'INR';
    $rtu = 'http://localhost:73/Online_Arbitration_New/Online_Arbitration/public/';
    $ppi = 'frank link|01/10/2018|9787780523|frank@frank.com|50.00';    //FirstNAme Last Name|currentdate|phone|emailid|amount
    $re1 = 'MN';
    $re2 = '';
    $re3 = '';
    $re4 = '';
    $re5 = '';

    /*CKS= hash("sha256",CID+RID+CRN+AMT+checksum_key)*/
    $cks = hash("sha256", $cid.$rid.$crn.$amt.$checksum_key);
    //$str = "CID=".$_POST['CID']."&RID=".$_POST['RID']."&CRN=".$_POST['CRN']."&AMT=".$_POST['AMT']."&VER=".$_POST['VER']."&TYP=".$_POST['TYP']."&CNY=".$_POST['CNY']."&RTU=".$_POST['RTU']."&PPI=".$_POST['PPI']."&RE1=".$_POST['RE1']."&RE2=".$_POST['RE2']."&RE3=".$_POST['RE3']."&RE4=".$_POST['RE4']."&RE5=".$_POST['RE5']."&CKS=".$checksum;
    $str ='CID='.$cid.'&RID='.$rid.'&CRN='.$crn.'&AMT='.$amt.'&VER='.$ver.'&TYP='.$typ.'&CNY='.$cny.'&RTU='.$rtu.'&PPI='.$ppi.'&RE1=&RE2=&RE3=&RE4=&RE5=&CKS='.$cks;
      $aesJava = new AesForJavaController();
      $i = $aesJava->encrypt(urldecode($str), $encryption_key, 128);
    //  echo $i; exit;
     return view('PaymentFormData.index', compact('i'));
   }


   
 }