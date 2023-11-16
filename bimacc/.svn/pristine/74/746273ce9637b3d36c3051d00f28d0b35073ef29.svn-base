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

class InvoiceController extends Controller
{
	 
public function index()
    {  
      //echo "jhjh";exit;
      $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
      }
      $invoice=DB::select("SELECT * FROM claimnotice_invoices ci
INNER JOIN claimantnotice cm ON (cm.id = ci.claimnoticeid)
INNER JOIN users us ON (us.id =cm.userid)
");
      return view('invoice.index', compact('invoice'));
     }

	}