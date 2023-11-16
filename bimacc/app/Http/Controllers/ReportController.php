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
use App\models\ArbitrationMaster;
use App\models\paymentdetails;
use App\models\notifications;
use DB;
use Session;
use Auth;
use App\models\User;
use Role;
use Dompdf\dompdf;
use Redirect;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\AlfrescoDocument;
use App\DatabaseHelper;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use PHPJasper\PHPJasper;



class ReportController  extends Controller
{
   
      public function noticereport()
    {  
      //echo "jhjh";exit;
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
      }
      $rows = DB::select("select distinct sm.respondant_status, sm.claimnoticeno,ci.firstname AS username,pet.arbitration_petionno,TRIM(sm.claimnoticestatus) as claimnoticestatus,sm.userid,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.awardedstatement,isstageinitiated,
    cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name,(SELECT arbitrator_fees FROM arbitrator_allocation_fees 
    where cd.damage_with_interest between claim_amount_form and claim_amount_to) AS arbitrator_fees,cd.damage_with_interest,
    (SELECT adminstration_fees FROM arbitrator_allocation_fees 
    where cd.damage_with_interest between claim_amount_form and claim_amount_to) AS adminstration_fees from claimantnotice sm
    left join claim_fees cf on (cf.claimnoticeid =sm.id )
    left join claimant_informations ci on (ci.claimnoticeid =sm.id )
    
    left join dispute_categories dc on (ci.dispute_categories_id = dc.id)
    left join relief_request cd on (cd.claimnoticeid = sm.id)
    left join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
    left join claimnotice_petion_arbitrationno pet on (pet.claimnoticeid = sm.id)
    where cd.is_respondant is null  order by sm.id desc");
      return view('Reports.notice_list', compact('rows'));
     }
      public function petitionreport()
    {  
      //echo "jhjh";exit;
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
      }
      $rows = DB::select("select distinct sm.claimnoticeno,ci.firstname AS username,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.userid,
        cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name,pet.arbitration_petionno from claimantnotice sm
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
        inner join dispute_categories dc on (ci.dispute_categories_id = dc.id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
        inner join claimant_arbitrator_configuration cac on (cac.claimnoticeid = sm.id)
        left join claimnotice_petion_arbitrationno pet on (pet.claimnoticeid = sm.id)
        where sm.isstageinitiated ='Y'");
      return view('Reports.petition_list', compact('rows'));
     }
     public function hearingreport()
    {  
      //echo "jhjh";exit;
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
      }
      $rows = DB::select("SELECT hm.claim_id,cm.claimnoticeno,hm.hearing_number,rf.name AS role_name,usf.name AS from_name, (CASE when hm.message_type ='Public' then 'All' ELSE usto.name END) AS to_name,hm.message_text,hm.message_read FROM hearing_messages AS hm
INNER JOIN claimantnotice AS cm ON (cm.id = hm.claim_id)
LEFT JOIN users AS usf ON (usf.id = hm.from_user_id)
LEFT JOIN roles AS rf ON (rf.id = usf.roles_id)
LEFT JOIN users AS usto ON (usto.id = hm.to_user_id)
GROUP BY cm.claimnoticeno,hm.hearing_number
ORDER BY cm.id desc");
      return view('Reports.hearing_list', compact('rows'));
     }
     public function videoreport()
     {  
      //echo "jhjh";exit;
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
      }
      $videoconferencing = DatabaseHelper::getvideo_conference();
      return view('Reports.videoconference_report', compact('videoconferencing'));
    }

    //  public function typeofdisputereport()
    //  {  
    //   //echo "jhjh";exit;
    //   $user_id = (auth()->check()) ? auth()->user()->id : null;
    //   if ( $user_id==null)
    //   {

    //     return view('auth.login');
    //   }
    //   $typeofdispute = DatabaseHelper::Type_of_dispute_Reports();
    //   return view('Reports.Type_of_dispute', compact('typeofdispute'));
    // }

     public function typeofdisputereport()
    {
        // $data = DB::table('dispute_categories')
        //    ->select(
        //     DB::raw('category_name as category_name'),
        //     DB::raw('count(*) as number'))
        //    ->groupBy('category_name')
        //    ->get();
        // $array[] = ['Category_name', 'Number'];
          
  $data = DB::select("SELECT dc.category_name, CAST((((SELECT COUNT(*) FROM claimant_informations WHERE dispute_categories_id = dc.id) /
  (SELECT COUNT(*) FROM claimant_informations)) * 100)AS UNSIGNED) AS dispute_percentage
  FROM dispute_categories dc");

 $array[] = ['Category_name', 'dispute_percentage'];

        //echo json_encode($data); exit();

        foreach($data as $key => $value)
        {
          $array[++$key] = [$value->category_name, $value->dispute_percentage];
        }
        //echo json_encode($array);exit();
        return view('Reports.Type_of_dispute')->with('category_name', json_encode($array));
        //return json_encode($array);
    }

    public function gettypeofSubdisputereport(Request $Request)
    {

      $Subdispute = $Request->selectvalue;

       //echo json_encode($Subdispute);exit();
        // $data = DB::table('dispute_categories')
        //    ->select(
        //     DB::raw('category_name as category_name'),
        //     DB::raw('count(*) as number'))
        //    ->groupBy('category_name')
        //    ->get();
        // $array[] = ['Category_name', 'Number'];
          
      $data = DB::select("SELECT dc.category_name,dsc.subcategory_name, CAST((((SELECT COUNT(*) FROM claimant_informations WHERE dispute_subcategories_id = dsc.id) /
        (SELECT COUNT(*) FROM claimant_informations)) * 100) AS UNSIGNED) AS Sub_dispute_percentage
        FROM dispute_subcategories dsc 
        inner join dispute_categories dc on (dc.id=dsc.dispute_categories_id) where dc.category_name='".$Subdispute."'");

      $array[] = ['subcategory_name', 'Sub_dispute_percentage'];

        //echo json_encode($data); exit();

        foreach($data as $key => $value)
        {
          $array[++$key] = [$value->subcategory_name, $value->Sub_dispute_percentage];
        }
        echo json_encode($array);exit();
        return view('Reports.Type_of_dispute')->with('subcategory_name', json_encode($array));
        //return json_encode($array);
    }
    
    //domesticrevenuereport
    public function domesticrevenuereport(Request $Request)
    {
       //return json_encode($Request);exit();
      

        $registerationfee = DB::select("SELECT month(invoicedate),CONCAT_WS('',date_format(invoicedate,'%M'),year(invoicedate)) AS monthstring, CAST(sum(invoiceamount)AS UNSIGNED) AS amount
      FROM claimnotice_invoices WHERE invoice_type='Registration' AND year(invoicedate) = year(curdate())  
    GROUP BY CONCAT_WS('',date_format(invoicedate,'%M'),year(invoicedate)),month(invoicedate) ORDER BY month(invoicedate)");

       $array = ['Monthstring', 1];

        //echo json_encode($registerationfee); exit();

        foreach($registerationfee as $key => $value)
        {
          $array[++$key] = [$value->monthstring, $value->amount];
        }
        //echo json_encode(array_splice($array,1));exit();

        $Regfee = json_encode(array_splice($array,1));
      
        //return json_encode(array_splice($array,1));

        $adminstrationfees = DB::select("SELECT month(invoicedate),CONCAT_WS('',date_format(invoicedate,'%M'),year(invoicedate)) AS month, CAST(sum(invoiceamount)AS UNSIGNED) AS amounts
      FROM claimnotice_invoices WHERE invoice_type='Administration' AND year(invoicedate) = year(curdate()) 
    GROUP BY CONCAT_WS('',date_format(invoicedate,'%M'),year(invoicedate)),month(invoicedate) ORDER BY month(invoicedate)");

       $array1[] = ['Monthstrings', 1];

        //echo json_encode($adminstrationfees); exit();

        foreach($adminstrationfees as $key => $value)
        {
          $array1[++$key] = [$value->month, $value->amounts];
        }
        //echo json_encode(array_splice($array1,1));exit();

         $AdminandArbitfee = json_encode(array_splice($array1,1));

        $domesticrevenueyear = DB::select("SELECT DISTINCT year(invoicedate) as year FROM claimnotice_invoices");

        //echo json_encode($domesticrevenueyear); exit();

       return view('Reports.Domestic_Revenue',compact('Regfee','AdminandArbitfee','domesticrevenueyear'));
      // return view('Reports.videoconference_report', compact('videoconferencing'));
      
    }

    //yearwisereport
    public function yearwisereport(Request $Request)
    {
       
       //return json_encode($Request);exit();
       //echo json_encode($Subdispute);exit();
      //$year = $Request->selectvalue;
      
      $feeyear = $Request->selectyear;

       //echo json_encode($Request->selectyear);exit();

        $registerationfee = DB::select("SELECT month(invoicedate),CONCAT_WS('',date_format(invoicedate,'%b'),date_format(invoicedate,'%y')) AS monthstring, CAST(sum(invoiceamount)AS UNSIGNED) AS amount
      FROM claimnotice_invoices WHERE invoice_type='Registration' AND year(invoicedate) = '".$feeyear."' 
    GROUP BY CONCAT_WS('',date_format(invoicedate,'%b'),date_format(invoicedate,'%y')),month(invoicedate) ORDER BY month(invoicedate)");

       $array = ['Monthstring', 1];

        //echo json_encode($registerationfee); exit();

        foreach($registerationfee as $key => $value)
        {
          $array[++$key] = [$value->monthstring, $value->amount];
        }
        //echo json_encode(array_splice($array,1));exit();

        $yearwiseRegfee = array_splice($array,1);
      
        //return json_encode(array_splice($array,1));

        $adminstrationfees = DB::select("SELECT month(invoicedate),CONCAT_WS('',date_format(invoicedate,'%b'),date_format(invoicedate,'%y')) AS month, CAST(sum(invoiceamount)AS UNSIGNED) AS amounts
      FROM claimnotice_invoices WHERE invoice_type='Administration' AND year(invoicedate) = '".$feeyear."' 
    GROUP BY CONCAT_WS('',date_format(invoicedate,'%b'),date_format(invoicedate,'%y')),month(invoicedate) ORDER BY month(invoicedate)");

       $array1[] = ['Monthstrings', 1];

        //echo json_encode($adminstrationfees); exit();

        foreach($adminstrationfees as $key => $value)
        {
          $array1[++$key] = [$value->month, $value->amounts];
        }
        //echo json_encode(array_splice($array1,1));exit();

         $yearwiseAdminandArbitfee = array_splice($array1,1);

        //echo json_encode($domesticrevenueyear); exit();

          $arraynew = [$yearwiseRegfee, $yearwiseAdminandArbitfee];

          //echo json_encode($arraynew); exit();
        
       // return $arraynew;
       echo json_encode($arraynew);
       //return view('Reports.Domestic_Revenue',compact('arraynew'));
      // return view('Reports.videoconference_report', compact('videoconferencing'));
      
    }

     public function registrationfeesreport(Request $Request)
    {
        

       $RegfeeOnemonth = $Request->selectvalue;
       //echo json_encode($RegfeeOnemonth);exit();
       $registrationfee = DB::select("SELECT DISTINCT CIF.name,RD.firstname,CN.claimnoticeno,CNI.invoiceno,CNI.invoiceamount from claimnotice_invoices CNI  
    inner join claimantnotice CN on (CN.id=CNI.claimnoticeid) 
    inner join respondantdetails RD on (RD.claimnoticeid=CNI.claimnoticeid)
    inner join claimant_informations CIF on (CIF.claimnoticeid=CNI.claimnoticeid) 
    WHERE CNI.invoice_type='Registration' AND CONCAT_WS('',date_format(CNI.invoicedate,'%b'),date_format(CNI.invoicedate,'%y'))='".$RegfeeOnemonth."' GROUP BY CN.claimnoticeno,CNI.invoiceno,CNI.invoiceamount");
     
       //echo json_encode($registrationfee);

        $registrationfeedetails = view('Reports.RegistrationFees',compact('registrationfee'))->render();
        //echo $registrationfee->render(); 
        //echo $registrationfeedeatsil; 

        return response()->json(['html'=>$registrationfeedetails]);

       //return view('Reports.Domestic_Revenue', compact('registrationfee'));
      
    }

     public function adminandarbitratorfeesreport(Request $Request)
    {


       $RegfeeOnemonth = $Request->selectvalue;
       //echo json_encode($Registrationfeemonth);exit();
       $adminandarbitratorfee = DB::select("SELECT DISTINCT CIF.name,RD.firstname,CN.claimnoticeno,CNI.invoiceno,CNI.invoiceamount from claimnotice_invoices CNI  
    inner join claimantnotice CN on (CN.id=CNI.claimnoticeid) 
    inner join respondantdetails RD on (RD.claimnoticeid=CNI.claimnoticeid)
    inner join claimant_informations CIF on (CIF.claimnoticeid=CNI.claimnoticeid) 
        WHERE CNI.invoice_type NOT IN ('Registration') AND CONCAT_WS('',date_format(CNI.invoicedate,'%b'),date_format(CNI.invoicedate,'%y'))='".$RegfeeOnemonth."' GROUP BY CN.claimnoticeno,CNI.invoiceno,CNI.invoiceamount");
     
       //echo json_encode($data);
       //return view('Reports.Domestic_Revenue', compact('data'));

        $adminandarbitratorfeedetails = view('Reports.AdminandArbitratorFee',compact('adminandarbitratorfee'))->render();
        //echo $registrationfee->render(); 
        //echo $registrationfeedeatsil; 

        return response()->json(['html'=>$adminandarbitratorfeedetails]);
      
    }

     //hearingconversationreport 
    public function hearingconversationreport(Request $Request,$id)
    {
        //echo "string"; exit();
    //echo json_encode($id); exit;
     //echo $Request->from_date; exit();
     //cho $Request->End_date; exit();
        $documentName = 'Hearing_Conversation_Report';
        $input = base_path().'/reports/Hearing_Conversation_Report.jasper';
        //$input = 'C:\xampp\htdocs\jasperreport\storage\app\public\reports/userreport.jasper';
        $output = storage_path().'/app/output/'.$documentName;
        $storage_path = storage_path().'/app/output/';
        $report_path = base_path().'/reports';

        // $filter_param = '';
        
        // if ($Request->from_date !="" && $Request->End_date !="") { 
            
        //     $filter_param .="PRH.creation_date BETWEEN '".$Request->from_date."' AND '".$Request->End_date."'";
        // }
        
        // if ($Request->supplier_names !="All_Supplier") {

        //    $filter_param .=" AND S.supplier_id=".$Request->supplier_names;
        // }

        $options = [ 
            'format' => ['pdf'] ,
            'locale' => 'en',
            'params' => [
              
                 'id' => $id,
                
            ],
            'db_connection' => [
                'driver' => 'mysql',
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                'host' => env('DB_HOST'),
                'database' => env('DB_DATABASE'),
                'port' => env('DB_PORT')
            ]
        ];
         //echo json_encode($options); exit;
        $jasper = new PHPJasper;
        
        $jasper->process(
            $input,
            $output,
            $options
        )->execute();
        
        $documentName = 'Hearing_Conversation_Report.pdf';
        $headers = array(
          'Content-Type: application/pdf',
      );
        return response()->download($storage_path.'/'.$documentName, $documentName, $headers);
    }


   public function durationreport()
    {

       $Cases_disposed_less_than_3_months = DB::select("SELECT DISTINCT CAST((((select COUNT(*) from claimantnotice CN
                 inner join claimantnoticestatus CNS on (CN.id=CNS.claimantnoticeid)
                 WHERE CN.created_at >= NOW() - INTERVAL 3 MONTH AND CNS.claimantnoticestatus='Disposed') /
                 (SELECT COUNT(*) FROM claimantnotice)) * 100)AS UNSIGNED) AS duration_percentage
                 FROM claimantnotice dc ");

      $cases_disposed_between_3months_to_6months = DB::select("SELECT DISTINCT CAST((((select COUNT(*) from claimantnotice CN inner join claimantnoticestatus CNS on (CN.id=CNS.claimantnoticeid)
             WHERE CN.created_at BETWEEN  NOW() - INTERVAL 6 MONTH AND NOW() - INTERVAL 1 MONTH AND CNS.claimantnoticestatus='Disposed') /
             (SELECT COUNT(*) FROM claimantnotice)) * 100)AS UNSIGNED) AS duration_percentage
              FROM claimantnotice dc ");

      $cases_pending_disposed_after_period_of_6months = DB::select("SELECT DISTINCT CAST((((select COUNT(*) from claimantnotice CN
            WHERE CN.created_at >= date_sub(NOW(),INTERVAL 6 MONTH) ) /
           (SELECT COUNT(*) FROM claimantnotice)) * 100)AS UNSIGNED) AS duration_percentage
            FROM claimantnotice dc ");


        // echo json_encode($Cases_disposed_less_than_3_months); 
        // echo json_encode($cases_disposed_between_3months_to_6months); 
        // echo json_encode($cases_pending_disposed_after_period_of_6months); exit();


          $array = array();

          $response = array("Duration","duration_percentage");
          array_push($array, $response);
          //$response = array();
          $Cases_disposed_less_than_3_months = $Cases_disposed_less_than_3_months[0]->duration_percentage;
          $response = array("Total Number of Cases disposed less than 3months",$Cases_disposed_less_than_3_months);
          array_push($array, $response);
          //$response = array();
          $cases_disposed_between_3months_to_6months= $cases_disposed_between_3months_to_6months[0]->duration_percentage;
          $response = array("Total Number of Cases disposed between 3months to 6months",$cases_disposed_between_3months_to_6months);
          array_push($array, $response);
          //$response = array();
          $cases_pending_disposed_after_period_of_6months = $cases_pending_disposed_after_period_of_6months[0]->duration_percentage;

          $response = array("Total Number of Cases pending disposed after period of 6months",$cases_pending_disposed_after_period_of_6months);
          array_push($array, $response);

          $Average_Time_Taken_to_Dispose_a_Case = round((($Cases_disposed_less_than_3_months+$cases_disposed_between_3months_to_6months+$cases_pending_disposed_after_period_of_6months)/3));

          $response = array("Average Time Taken to Dispose a Case",$Average_Time_Taken_to_Dispose_a_Case);

          array_push($array, $response);

          //echo json_encode($array);exit;


        // $data = DB::table('dispute_categories')
        //    ->select(
        //     DB::raw('category_name as category_name'),
        //     DB::raw('count(*) as number'))
        //    ->groupBy('category_name')
        //    ->get();
        // $array[] = ['Category_name', 'Number'];
          
 //  $data = DB::select("SELECT dc.category_name, CAST((((SELECT COUNT(*) FROM claimant_informations WHERE dispute_categories_id = dc.id) /
 //  (SELECT COUNT(*) FROM claimant_informations)) * 100)AS UNSIGNED) AS dispute_percentage
 //  FROM dispute_categories dc");

 // $array[] = ['Category_name', 'dispute_percentage'];

 //        //echo json_encode($data); exit();

 //        foreach($data as $key => $value)
 //        {
 //          $array[++$key] = [$value->category_name, $value->dispute_percentage];
 //        }
 //        echo json_encode($array);exit();
        return view('Reports.Duration')->with('duration_percentage', json_encode($array));
        //return json_encode($array);
    }

     //totalclaimnoticereport
     public function totalclaimnoticereport()
    {

      //echo "string"; exit();
          
            $totalclaimnotice = DB::select("select CN.claimnoticeno,CI.claimant_type,CN.created_at,CI.state AS Location,DC.category_name,RR.damage_with_interest AS ClaimAmount,CN.claimnoticestatus,
            RDEC.respondent_decision AS RespondentAction
            from claimantnotice CN
            LEFT join claimant_informations CI on (CI.claimnoticeid=CN.id)
            LEFT join dispute_categories DC on (DC.id=CI.dispute_categories_id)
            LEFT join respondantdetails RD on (RD.claimnoticeid=CN.id)
            LEFT join relief_request RR on (RR.claimnoticeid=CN.id)
            LEFT JOIN respondents_decision RDEC on (RDEC.claim_notice_id=CN.id)
            GROUP BY CN.claimnoticeno");
        return view('Reports.totalclaimnotice', compact('totalclaimnotice'));

        //return json_encode($array);
    }

     //totalnoticedraftreport
     public function totalnoticedraftreport()
    {

          
            $totalclaimnotice = DB::select("select CN.claimnoticeno,CI.claimant_type,CN.created_at,CI.state AS Location,DC.category_name,RR.damage_with_interest AS ClaimAmount,CN.claimnoticestatus,
            RDEC.respondent_decision AS RespondentAction
            from claimantnotice CN
            LEFT join claimant_informations CI on (CI.claimnoticeid=CN.id)
            LEFT join dispute_categories DC on (DC.id=CI.dispute_categories_id)
            LEFT join respondantdetails RD on (RD.claimnoticeid=CN.id)
            LEFT join relief_request RR on (RR.claimnoticeid=CN.id)
            LEFT JOIN respondents_decision RDEC on (RDEC.claim_notice_id=CN.id) WHERE CN.claimnoticestatus='New Claim'
            GROUP BY CN.claimnoticeno");
        return view('Reports.totalclaimnotice', compact('totalclaimnotice'));

        //return json_encode($array);
    }

    //totalnoticesendreport
     public function totalnoticesendreport()
    {

          
            $totalclaimnotice = DB::select("select CN.claimnoticeno,CI.claimant_type,CN.created_at,CI.state AS Location,DC.category_name,RR.damage_with_interest AS ClaimAmount,CN.claimnoticestatus,
            RDEC.respondent_decision AS RespondentAction
            from claimantnotice CN
            LEFT join claimant_informations CI on (CI.claimnoticeid=CN.id)
            LEFT join dispute_categories DC on (DC.id=CI.dispute_categories_id)
            LEFT join respondantdetails RD on (RD.claimnoticeid=CN.id)
            LEFT join relief_request RR on (RR.claimnoticeid=CN.id)
            LEFT JOIN respondents_decision RDEC on (RDEC.claim_notice_id=CN.id) WHERE CN.claimnoticestatus='New Claim Created'
            GROUP BY CN.claimnoticeno");
        return view('Reports.totalclaimnotice', compact('totalclaimnotice'));

        //return json_encode($array);
    }

    //totalnoticeawaitreport
     public function totalnoticeawaitreport()
    {

          
            $totalclaimnotice = DB::select("select CN.claimnoticeno,CI.claimant_type,CN.created_at,CI.state AS Location,DC.category_name,RR.damage_with_interest AS ClaimAmount,CN.claimnoticestatus,
            RDEC.respondent_decision AS RespondentAction
            from claimantnotice CN
            LEFT join claimant_informations CI on (CI.claimnoticeid=CN.id)
            LEFT join dispute_categories DC on (DC.id=CI.dispute_categories_id)
            LEFT join respondantdetails RD on (RD.claimnoticeid=CN.id)
            LEFT join relief_request RR on (RR.claimnoticeid=CN.id)
            LEFT JOIN respondents_decision RDEC on (RDEC.claim_notice_id=CN.id)
         WHERE CN.claimnoticestatus='Respondent Access Provided Waiting for the Acceptance'
            GROUP BY CN.claimnoticeno");
        return view('Reports.totalclaimnotice', compact('totalclaimnotice'));

        //return json_encode($array);
    }
    //totalnoticeclosedreport
     public function totalnoticeclosedreport()
    {
          
            $totalclaimnotice = DB::select("select CN.claimnoticeno,CI.claimant_type,CN.created_at,CI.state AS Location,DC.category_name,RR.damage_with_interest AS ClaimAmount,CN.claimnoticestatus,
            RDEC.respondent_decision AS RespondentAction
            from claimantnotice CN
            LEFT join claimant_informations CI on (CI.claimnoticeid=CN.id)
            LEFT join dispute_categories DC on (DC.id=CI.dispute_categories_id)
            LEFT join respondantdetails RD on (RD.claimnoticeid=CN.id)
            LEFT join relief_request RR on (RR.claimnoticeid=CN.id)
            LEFT JOIN respondents_decision RDEC on (RDEC.claim_notice_id=CN.id)
         WHERE CN.claimnoticestatus='Arbitrator Approved and Pleadings Initiated'
            GROUP BY CN.claimnoticeno");
        return view('Reports.totalclaimnotice', compact('totalclaimnotice'));

        //return json_encode($array);
    }

    //petitionreport
    public function totalclaimpetitionreport()
    {

      //echo "string"; exit();
          
            $totalclaimpetition = DB::select("select CN.claimnoticeno,CPA.arbitration_petionno,CN.created_at,CI.state AS Location,DC.category_name,RR.damage_with_interest AS ClaimAmount,CN.claimnoticestatus,
            RDEC.respondent_decision AS RespondentAction
            from claimantnotice CN
            INNER join claimant_informations CI on (CI.claimnoticeid=CN.id)
            LEFT join dispute_categories DC on (DC.id=CI.dispute_categories_id)
            LEFT join respondantdetails RD on (RD.claimnoticeid=CN.id)
            LEFT join relief_request RR on (RR.claimnoticeid=CN.id)
            LEFT join respondents_decision RDEC on (RDEC.claim_notice_id=CN.id)
            LEFT join claimnotice_petion_arbitrationno CPA on (CPA.claimnoticeid=CN.id)
            inner join claimant_arbitrator_configuration CAC on (CAC.claimnoticeid=CN.id) 
        WHERE CN.claimnoticestatus!='Arbitrator Approved and Pleadings Initiated'
            GROUP BY CN.claimnoticeno");
        return view('Reports.totalclaimpetition', compact('totalclaimpetition'));

        //return json_encode($array);
    }

    //totalnoticefiledreport
    public function totalnoticefiledreport()
    {

      //echo "string"; exit();
          
            $totalclaimpetition = DB::select("select CN.claimnoticeno,CPA.arbitration_petionno,CN.created_at,CI.state AS Location,DC.category_name,RR.damage_with_interest AS ClaimAmount,CN.claimnoticestatus,
            RDEC.respondent_decision AS RespondentAction
            from claimantnotice CN
            inner join claimant_informations CI on (CI.claimnoticeid=CN.id)
            inner join dispute_categories DC on (DC.id=CI.dispute_categories_id)
            inner join respondantdetails RD on (RD.claimnoticeid=CN.id)
            inner join relief_request RR on (RR.claimnoticeid=CN.id)
            inner join respondents_decision RDEC on (RDEC.claim_notice_id=CN.id)
            inner join claimnotice_petion_arbitrationno CPA on (CPA.claimnoticeid=CN.id)
            inner join claimant_arbitrator_configuration CAC on (CAC.claimnoticeid=CN.id)
            GROUP BY CN.claimnoticeno");
        return view('Reports.totalclaimpetition', compact('totalclaimpetition'));

        //return json_encode($array);
    }

     //totalnoticependingreport
    public function totalnoticependingreport()
    {

      //echo "string"; exit();
          
            $totalclaimpetition = DB::select("select CN.claimnoticeno,CPA.arbitration_petionno,CN.created_at,CI.state AS Location,DC.category_name,RR.damage_with_interest AS ClaimAmount,CN.claimnoticestatus,
            RDEC.respondent_decision AS RespondentAction
            from claimantnotice CN
            LEFT join claimant_informations CI on (CI.claimnoticeid=CN.id)
            LEFT join dispute_categories DC on (DC.id=CI.dispute_categories_id)
            LEFT join respondantdetails RD on (RD.claimnoticeid=CN.id)
            LEFT join relief_request RR on (RR.claimnoticeid=CN.id)
            LEFT join respondents_decision RDEC on (RDEC.claim_notice_id=CN.id)
            LEFT join claimnotice_petion_arbitrationno CPA on (CPA.claimnoticeid=CN.id)
            LEFT join claimant_arbitrator_configuration CAC on (CAC.claimnoticeid=CN.id) 
        WHERE CN.claimnoticestatus!='Disposed'
            GROUP BY CN.claimnoticeno");
        return view('Reports.totalclaimpetition', compact('totalclaimpetition'));

        //return json_encode($array);
    }

      //totalnoticedisposedreport
    public function totalnoticedisposedreport()
    {

      //echo "string"; exit();
          
            $totalclaimpetition = DB::select("select CN.claimnoticeno,CPA.arbitration_petionno,CN.created_at,CI.state AS Location,DC.category_name,RR.damage_with_interest AS ClaimAmount,CN.claimnoticestatus,
            RDEC.respondent_decision AS RespondentAction
            from claimantnotice CN
            LEFT join claimant_informations CI on (CI.claimnoticeid=CN.id)
            LEFT join dispute_categories DC on (DC.id=CI.dispute_categories_id)
            LEFT join respondantdetails RD on (RD.claimnoticeid=CN.id)
            LEFT join relief_request RR on (RR.claimnoticeid=CN.id)
            LEFT join respondents_decision RDEC on (RDEC.claim_notice_id=CN.id)
            LEFT join claimnotice_petion_arbitrationno CPA on (CPA.claimnoticeid=CN.id)
            LEFT join claimant_arbitrator_configuration CAC on (CAC.claimnoticeid=CN.id) 
        WHERE CN.claimnoticestatus='Disposed'
            GROUP BY CN.claimnoticeno");
        return view('Reports.totalclaimpetition', compact('totalclaimpetition'));

        //return json_encode($array);
    }


  }



