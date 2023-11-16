<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ClaimantInformation;
use App\models\RespondantInformation;
use App\models\ClaimDetails;
use App\models\ClaimNotice;
use App\models\ReliefRequest;
use App\models\DisputeCategory;
use App\models\DisputeSubcategory;
use App\models\ClaimantNoticeStatus;
use App\models\claimnotice_petion_arbitrationno;
use DB;
use Session;
use Auth;
use Role;
use App\models\User;
use File;
use Datatables;
use Storage;
use Filesystem;
use Redirect;
use App\AlfrescoDocument;
use Dompdf\dompdf;
use App\DatabaseHelper;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Validator;

class ClaimantInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('claimantinformation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    // $rules = [
    //   'daytimetelephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
    //   'email' => 'required|max:255|regex:/.com/i',
    //   'zipcode' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:5|max:8',
    //   'age' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:2|max:3',
    // ];
    
    // $messages = [
    //   'daytimetelephone.required' => 'Contact is required',
    //   'email.required' => 'Email Id is required' ,
    //   'email.regex' => 'Please Give Proper Mail ID', 
    //   'zipcode.regex' => 'Please Enter Proper Zip Code',
    //   'age.regex' => 'Please Enter Proper Age',
    // ];

    // $validator = Validator::make($request->all(), $rules, $messages); 



    // if($validator->fails()){
    //   $request->flash();
    //   return redirect()->back()->withInput()->withErrors($validator);
    // }

      $claimdetails =DB::table('claimantnotice')->orderBy('id', 'desc')->first();
      if ($claimdetails ==null) 
      {
        $claimnoticenoNew =  'CN/EAS/'.date("Y").'/001';
        // echo ($claimnoticenoNew);exit;
      }
      else
      {
        $claimnoticeno = $claimdetails->claimnoticeno;
        $claimnoticenoNew =  ++$claimnoticeno;  // AAA004  
      }

      // commanded start

       // $file->move($storagePath."/", $file);

      $alfresco_id=DB::table('alfresco_log')->insertGetId([
        'user_id' => Auth::user()->id,
        'claimnotice_no' => $claimnoticenoNew,
        'doc_type'=>'claimant_details',
        'start_time' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes'))
      ]);

      $parentFolder = 'documentLibrary/Claim/ClaimNotice';
      $folderName = str_replace('/', '_', $claimnoticenoNew);
      $folderTitle = 'Claim Notice '. $claimnoticenoNew;
      $folderDescription = 'Claim Notice '. $claimnoticenoNew;
      $documentDirectory = AlfrescoDocument::SetAlfrescoFolder($parentFolder, $folderName, $folderTitle, $folderDescription);
      

      // commanded end

      // added start

       // $documentDirectory ="";

      // added end


      $ClaimNotice = new ClaimNotice(); 
      $ClaimNotice->claimnoticeno = $claimnoticenoNew;
      $ClaimNotice->claimnoticestatus = 'New Claim';
      $ClaimNotice->alfrescouniquefolder_id = $documentDirectory;
      $ClaimNotice->userid = Auth::user()->id;  
      $ClaimNotice->created_id = Auth::user()->id; 
      $ClaimNotice->created_at = date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ));;      
      $ClaimNotice->save(); 
      $ClaimNoticeID =  DB::getPdo()->lastInsertId();
      Session(['ClaimNoticeID' => $ClaimNoticeID]);
      $claimnoticeID = (session()->get('ClaimNoticeID'));


      $storagePath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $claimnoticenoNew);
        //echo $storagePath; exit;
      if (!File::exists($storagePath))
      {
        File::makeDirectory($storagePath);
      }
      else
      {
        File::cleanDirectory($storagePath);
      }

      if($request->hasFile('fileupload'))
      {
        $storagePath = $storagePath;
        $imageFile = $request->file('fileupload');
        $imageName = $imageFile->getClientOriginalName();
        $imageFile->move($storagePath, $imageName);
      }
         // commanded start

        $this->storeDocument($folderName, $documentDirectory,$claimnoticeID,'Claimant',Auth::user()->id,'GPA',$alfresco_id);

       // commanded end

      if (!File::exists($storagePath))
      {
        File::makeDirectory($storagePath);
      }
      else
      {
        File::cleanDirectory($storagePath);
      }

      if($request->hasFile('fileidproof'))
      {
        $storagePath = $storagePath;
        $imageFile = $request->file('fileidproof');
        $imageName = $imageFile->getClientOriginalName();
        $imageFile->move($storagePath, $imageName);
      }
        // commanded start

       $this->storeDocument($folderName, $documentDirectory,$claimnoticeID,'Claimant',Auth::user()->id,'IDPROOF',$alfresco_id);

 // commanded end

    // $ClaimantNoticeStatus = new ClaimantNoticeStatus();  
    // $ClaimantNoticeStatus->claimantnoticeid = $ClaimNoticeID;
    // $ClaimantNoticeStatus->claimantnoticestatus = 'New Claim';
    // $ClaimantNoticeStatus->userid = Auth::user()->id;  
    // $ClaimantNoticeStatus->created_id = Auth::user()->id;  
    // $ClaimantNoticeStatus->save();


      $ClaimantInformation = new ClaimantInformation();
      $ClaimantInformation->claimant_type = $request->claimant_type;        
      $ClaimantInformation->name = $request->firstname;
      $ClaimantInformation->country = $request->country;
      $ClaimantInformation->address = $request->address;
      $ClaimantInformation->state = $request->state;
      $ClaimantInformation->city = $request->city;
      $ClaimantInformation->zipcode = $request->zipcode;
      $ClaimantInformation->daytimetelephone = $request->daytimetelephone;
      $ClaimantInformation->age = $request->age;
       $ClaimantInformation->aadhar_num = $request->aadhar_num;
      $ClaimantInformation->email = $request->email;
       $ClaimantInformation->organization_name  = $request->organization_name ;
        $ClaimantInformation->organization_details  = $request->organization_details ;
         $ClaimantInformation->firstname  = $request->firstname ;
          $ClaimantInformation->middlename  = $request->middlename ;
            $ClaimantInformation->lastname  = $request->lastname ;
           $ClaimantInformation->official_designation   = $request->official_designation  ;
     $ClaimantInformation->company_name   = $request->company_name  ;
     $ClaimantInformation->dept_name   = $request->dept_name  ;
     $ClaimantInformation->govt_name   = $request->govt_name  ;
     $ClaimantInformation->others   = $request->others  ;
     
      $ClaimantInformation->company_individual = $request->company_individual;
      $ClaimantInformation->dispute_categories_id = $request->dispute_categories_id;
      $ClaimantInformation->dispute_subcategories_id = $request->dispute_subcategories_id;
      $ClaimantInformation->claimnoticeid = $request->session()->get('ClaimNoticeID');
      $ClaimantInformation->currency = $request->currency;    
        $ClaimantInformation->created_id = Auth::user()->id;
      $ClaimantInformation->save();

      if($ClaimantInformation->save())
      {

        $claimnoticedetails = DatabaseHelper::getClaimNoticeUserDetails($ClaimNoticeID);


        foreach ($claimnoticedetails as $claimnoticedetail) {
          $claimnoticeno = $claimnoticedetail->claimnoticeno;
          $email = $claimnoticedetail->email;
          $phone = $claimnoticedetail->phone;
          $claimantname = $claimnoticedetail->username;

        } 

        $totalclaimamount = DB::select("SELECT damage_with_interest as total_amount FROM relief_request  WHERE claimnoticeid = ".$claimnoticeID);
    if (count($totalclaimamount) >0 ) {
     $total_amount =  $totalclaimamount[0]->total_amount;
   }
   else
   {
    $total_amount =  '0';  
  }


  if ($total_amount > 2000000) {  
    $registrationfees = DB::select("SELECT 1000 as registration_fee" );
  }
  else
  {
    $registrationfees = DB::select("SELECT re.registration_fees as registration_fee FROM registration_fees re
      inner JOIN claimant_informations cl ON(cl.currency=re.currency)
      WHERE  " .$total_amount." between re.claim_amount_from and re.claim_amount_to AND cl.claimnoticeid=".$claimnoticeID);
 }

      $basepath= url('/');
      $imagepath = $basepath.'/images/logo1.png';

      $html = '
      <!doctype html>
      <html lang="en">
      <head>
      <meta charset="UTF-8">
      <title>Aloha!</title>

      <style type="text/css">
      @page {
        margin: 80px 25px;
      }
      
    *{
      font-family: Verdana, Arial, sans-serif;
    }
    table{
      font-size: x-small;
    }
    tfoot tr td{
      font-weight: bold;
      font-size: x-small;
    }
    .gray {
      background-color: lightgray
    }
          #footer {
    position: fixed; 
    bottom: -50px; 
    left: 0px; 
    right: 0px;
    height: 50px; 

    text-align: center;                
  }
                  #footer .page:after { content: counter(page, upper-number); }
  </style>

  </head>
  <body>

  <table width="100%">
  <tr>
  <td valign="top"><img src="'.$imagepath.'" alt="" width="150"/></td>
  <td align="right">
  <h3>BIMACC</h3>
  <pre>                 
  31, V P Deenadayalu Naidu Rd, Near Canara Bank,<br>
  Jayamahal Extension, Jayamahal,<br>
  Bengaluru, Karnataka 560046.<br>                
  080 4090 2045<br>                
  </pre>
  </td>
  </tr>

  </table>
  <h3 style = "text-align:center;">Invoice</h3>
  <br><br>

  <div id="footer">
  <p class="page"><hr>Bangalore International Mediation, Arbitration and Conciliation Centre (BIMACC)
  </p>
  </div>

  <table width="100%">
  <tr>

  <td align="center"><strong>Invoice Number : </strong> '.$claimnoticeno.'</td> 
  <td align="right"><strong>To : </strong> BIMACC </td>
  </tr>
  </table>
  <br/>
  <table width="100%">
  <thead style="background-color: lightgray;">
  <tr>
  <th>#</th>
  <th>Description</th> 
  <th>Fee Type</th>       
  <th>Unit Price </th>
  <th>Total </th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <th scope="row">1</th>        
  <td>Registration Fee</td>
  <td>Registration Fee</td>
  <td>1000.00</td>
  <td>1000.00</td>
  </tr>        
  </tbody>
  <br></br>
  <tfoot>
  <tr>
  <td colspan="3"></td>
  <td align="right">Subtotal 0.00</td>
 
  </tr>
  <tr>
  <td colspan="3"></td>
  <td align="right">GST %</td>
  <td align="right">0.00</td>
  </tr>
  <tr>
  <td colspan="3"></td>
  <td align="right">Total </td>
  <td align="right" class="gray">1000.00</td>
  </tr>
  </tfoot>
  </table>
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br /> 
  <br />
  <br />
  <br />
  <br />
  <br />
  <br /> 
  <div align = "center"><b><i>Electronically generated receipt,no signature needed</i></b></div>

  </body>
  </html>';

  $fileDirPath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $claimnoticeno);

  // $dompdf = new Dompdf();
  // $dompdf->loadHtml($html, 'UTF-8');
  // $dompdf->setPaper('A4', 'portrait');
  // $dompdf->set_option('defaultMediaType', 'all');
  // $dompdf->set_option('isFontSubsettingEnabled', true);
  // $dompdf->set_option('isHtml5ParserEnabled', true);
  // $dompdf->set_option('isRemoteEnabled', true);
  // $dompdf->render();
  // $output = $dompdf->output();
  // $receiptName = str_replace('/', '_', $claimnoticeno).'.pdf';
  // $receiptPath = $fileDirPath."/".$receiptName;
  // file_put_contents($receiptPath, $output);
  // $data = array(
  //   'Hello' => 'Welcome',
  //   'claimantname' => $claimantname,
  //   'claimnoticeno'=>$claimnoticeno,

  // );
      // command start
  // Mail::send('emails.welcome2', ["data1"=>$data], function($message) use ($email,$receiptPath,$data,$claimnoticeno){
  //   $message->to($email)
  //   ->subject('Electronic Arbitration System (EAS) Claim Notice ( No:'.$claimnoticeno.') -Submission Confirmation and Payment Advice');
    
  // }); 
// command end
}


return Redirect::to('claimnotice/create#claimantinformation')
        ->with('success','Claimant Information Saved Successfully.');
}

private function storeDocument($claimnoticeno, $documentDirectory,$claimnoticeID,$claimant_respondent_type,$claimant_respondent_id,$document_Type,$alfresco_id)

{
  try
  {
    $fileDirPath = storage_path().'/app/public/uploads/claim/'.$claimnoticeno;

    $files = array_diff(scandir($fileDirPath), array('.', '..'));
    foreach ($files as $key => $value)
    {
      $fileExtension = pathinfo($value, PATHINFO_EXTENSION);
      $fileName = $value;
      $fileDescription = 'Claimant Document';
      $response = AlfrescoDocument::SetAlfrescoDocument($fileDirPath, $fileName, $fileExtension, $documentDirectory, $fileDescription);
      $objResponse = json_decode($response, TRUE);

      $documentNode = $objResponse['nodeRef'];
      $arrWorkSpace = explode('://', $documentNode);
      $arrStore = explode('/', $arrWorkSpace[1]);
      $workspace = $arrWorkSpace[0];
      $spaceStore = $arrStore[0];
      $alfrescoDocumentName = $arrStore[1];

     $alfresco_update = DB::table('alfresco_log')
     ->where(['id'=>$alfresco_id])
     ->update(['end_time' =>  date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes')),'document_name'=>$value]);

      DB::table('claimnoticedocumentdetails')->insert([
        'claimnoticeid' => $claimnoticeID,
        'node_ref' => $documentNode,
        'work_space' => $workspace,
        'space_store' => $spaceStore,
        'alfresco_document_name' => $alfrescoDocumentName,
        'document_name' => $value,
        'file_extension' => $fileExtension,
        'document_type' => $document_Type,
        'claimant_respondent_type' => $claimant_respondent_type,
        'claimant_respondent_id' => $claimant_respondent_id,
        'created_id' => auth()->user()->id,
        'created_at' => date("Y-m-d H:i:s", strtotime('+5 hours +30 minutes' ))
      ]);
    }
  }
  catch(Exception $exc)
  {

  }
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //  echo $id; exit;
      
      $claimantinformations = ClaimantInformation::findOrFail($id);
      return view('claimantinformation.show', compact('claimantinformations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , $id)
    {
      $claimantinformation = ClaimantInformation::find($id);

      return view('claimnotice.create', compact('claimantinformation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
      // dd($request->aadhar_num);

      $request->validate([
        
        'email' => 'required',
        'daytimetelephone' => 'required',
      ]);

      $ClaimNoticeID =  $request->claimnoticeid;
      Session(['ClaimNoticeID' => $ClaimNoticeID]);
    // $claimnoticeID = (session()->get('ClaimNoticeID'));
      // echo $id; exit;

      $dispute_exist=DB::select("select dispute_categories_id from claimant_informations where claimnoticeid=".$ClaimNoticeID);
      $claimant_dispute=$dispute_exist[0]->dispute_categories_id;
      // echo $claimant_dispute;exit;
      if($claimant_dispute != $request->dispute_categories_id)
      {
         $claimdetails = DB::select("select * from claim_details where claimnoticeid=".$ClaimNoticeID);
        // dd($claimdetails);
         if ($claimdetails != null)
       {
        DB::delete('delete from claim_details where claimnoticeid = ?',[$ClaimNoticeID]);

      
        DB::delete('delete from banking_account_detail where claim_notice_id = ?',[$ClaimNoticeID]);
       }
       $reliefrequest =DB::select("select * from relief_request where claimnoticeid=".$ClaimNoticeID);
      
       if ($reliefrequest != null)
       {
       // $reliefrequest->delete();
        DB::delete('delete from relief_request where claimnoticeid = ?',[$ClaimNoticeID]);
      }
      }



      $table = DB::table('claimant_informations')
      ->where('id' , $id)
      ->update([
        'dispute_categories_id' => $request->dispute_categories_id,
        'dispute_subcategories_id' => $request->dispute_subcategories_id,
        'claimant_type' => $request->claimant_type,
        'organization_name'=>$request->organization_name,
        'organization_details'=>$request->organization_details,
        'firstname'=>$request->firstname,
        'middlename'=>$request->middlename,
        'lastname'=>$request->lastname,
        'official_designation'=>$request->official_designation,
        'name' => $request->name,
        'address' => $request->address,
        'country' => $request->country,
        'state' => $request->state,
        'city' => $request->city,
        'zipcode' => $request->zipcode,
        'email' => $request->email,
        'daytimetelephone' => $request->daytimetelephone,
        'company_name' => $request->company_name,
        'aadhar_num' => $request->aadhar_num,
        'dept_name' => $request->dept_name,
        'age' => $request->age,
        'govt_name' => $request->govt_name,
        'others' => $request->others,
        'currency' => $request->currency]); 


      return redirect()->route('claimnotice.create')
      ->with('success','Claimant Information Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $claimantinformation = ClaimantInformation::find($id);
      $claimantinformation->delete();
      return redirect()->route('claimnotice.create')
      ->with('success','Claimant Information Deleted Successfully.');
    }
  }
