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
use App\models\ArbitratorConfiguration;
use App\models\ClaimantRegister;
use App\models\claimstagestatus;
use App\models\claimnotice_petion_arbitrationno;
use App\Mail\SendToArbitrator;
use Illuminate\Support\Facades\Mail;
use App\models\ClaimNoticeStage;
use DB;
use Auth;
use App\User;
use Session;
use Input;
use Redirect;
use PDF;
use File;
use Datatables;
use Storage;
use Filesystem;
use App\AlfrescoDocument;
use App\DatabaseHelper;

class AwardedClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
       $user_id = (auth()->check()) ? auth()->user()->id : null;
      if ( $user_id==null)
      {

        return view('auth.login');
      }

      $claimnotice = DB::select("select distinct sm.claimnoticeno,pet.arbitration_petionno,sm.claimnoticestatus,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.userid,
        cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name from claimantnotice sm
        inner join claim_fees cf on (cf.claimnoticeid =sm.id )
        inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
        inner join dispute_categories dc on (ci.dispute_categories_id = dc.id)
        inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
        inner join claimant_arbitrator_configuration cac on (cac.claimnoticeid = sm.id)
        left join claimnotice_petion_arbitrationno pet on (pet.claimnoticeid = sm.id) where sm.claimnoticestatus in ('Disposed','Award Reserved By Arbitrator','Additional Payment Paid','Additional Payment Link Released by Centre') order by sm.id desc");

      $arbitratorlist = ArbitrationMaster::all();

    $claimant_informations = ClaimantInformation::all();        

      $respondantdetails = DB::select('select * from respondantdetails where claimnoticeid=id');                              

      $claim_details = DB::table('claim_details')->get();
      $relief_request = DB::table('relief_request')->get();
      $claim_fees = DB::table('claim_fees')->get();
      $dispute_categories = DB::table('dispute_categories')->get();
      $dispute_subcategories = DB::table('dispute_subcategories')->get();    

      return view('AwardedClaim.index', compact('claimnotice','arbitratorlist','claimant_informations','respondantdetails','claim_details','relief_request','claim_fees','dispute_categories','dispute_subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('AwardedClaim.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//     public function show($id)

//     {


//       $claimnotices = DatabaseHelper::getClaimNoticeDetails($id);

//       $claimant_information = DatabaseHelper::GetClaimantInformationsshow($id); 
//       $claimandrelief = DatabaseHelper::getclaimandrelief($id);

//       $getclaim_details = DatabaseHelper::getclaim_details($id);

//       $respondantdetails = DatabaseHelper::getRespondantDetails($id); 

//       $claim_details = DatabaseHelper::getClaimDetails($id);

//       $claim_fees = DatabaseHelper::getClaimfeesDetails($id);

//       $relief_request = DatabaseHelper::getReliefRequest($id);

      
//       $claimNoticeStageDocuments =  DatabaseHelper::getclaimNoticeStageDocuments($id);
//       $ClaimNoticeStage = DatabaseHelper::getClaimNoticeStage($id);
//       $ClaimNoticeStageStatus = DatabaseHelper::getClaimNoticeStageStatus($id);
//       $Arbitrator_Allocation = DatabaseHelper::getArbitratorAllocation($id);
//       $ClaimNoticeStatus = DatabaseHelper::getClaimNoticeStatus($id);
//       $ClaimantclaimNoticeStageDocuments = DatabaseHelper::getClaimantclaimNoticeStageDocuments($id);
//       $RespondentclaimNoticeStageDocuments = DatabaseHelper::getRespondentclaimNoticeStageDocuments($id);
//       $AwardedDcouments = DatabaseHelper::getAwardedDcouments($id);      
//       $AdminAwardedDocuments = DatabaseHelper::getAdminAwardedDocuments($id);


//       $realestate_claim = DatabaseHelper::realestate_claim($id);
//       $realestate_claim_details = DatabaseHelper::realestate_claim_details($id);
//       $insurance_claim = DatabaseHelper::insurance_claim($id);
//       $insurance_claim_part_2 = DatabaseHelper::insurance_claim_part_2($id);
//       $family_claim = DatabaseHelper::family_claim($id);
//       $family_claim_movable = DatabaseHelper::family_claim_movable($id);
//       $contract_relief = DatabaseHelper::contract_relief($id);
//       $banking_claim_mort = DatabaseHelper::banking_claim_mort($id);
//       $banking_claim_hypo = DatabaseHelper::banking_claim_hypo($id);
//       $banking_claim_pledge = DatabaseHelper::banking_claim_pledge($id);
//       $banking_claim_personal = DatabaseHelper::banking_claim_personal($id);
//       $banking_claim_corporate = DatabaseHelper::banking_claim_corporate($id);
//       $banking_claim_mort_details = DatabaseHelper::banking_claim_mort_details($id);
//       $banking_claim_hypo_details = DatabaseHelper::banking_claim_hypo_details($id);
//       $banking_claim_pledge_details = DatabaseHelper::banking_claim_pledge_details($id);
//       $banking_claim_pro_details = DatabaseHelper::banking_claim_pro_details($id);
//       $banking_relief = DatabaseHelper::banking_relief($id);
//       $bank_account = DatabaseHelper::bank_account($id);

//       $respodentcounterclaimandrelief = DatabaseHelper::getrepondentclaimandrelief($id);
      
//       $respodentcounterclaimrealestate_claim = DatabaseHelper::respodentcounterclaimrealestate_claim($id);
//       $respodentcounterclaimrealestate_claim_details = DatabaseHelper::respodentcounterclaimrealestate_claim_details($id);
//       $respodentcounterclaiminsurance_claim = DatabaseHelper::respodentcounterclaiminsurance_claim($id);
//       $respodentcounterclaiminsurance_claim_part_2 = DatabaseHelper::respodentcounterclaiminsurance_claim_part_2($id);
//       $respodentcounterclaimfamily_claim = DatabaseHelper::respodentcounterclaimfamily_claim($id);
//       $respodentcounterclaimfamily_claim_movable = DatabaseHelper::respodentcounterclaimfamily_claim_movable($id);
//       $respodentcounterclaimcontract_relief = DatabaseHelper::respodentcounterclaimcontract_relief($id);
//       $respodentcounterclaimbanking_claim_mort = DatabaseHelper::respodentcounterclaimbanking_claim_mort($id);
//       $respodentcounterclaimbanking_claim_hypo = DatabaseHelper::respodentcounterclaimbanking_claim_hypo($id);
//       $respodentcounterclaimbanking_claim_pledge = DatabaseHelper::respodentcounterclaimbanking_claim_pledge($id);
//       $respodentcounterclaimbanking_claim_personal = DatabaseHelper::respodentcounterclaimbanking_claim_personal($id);
//       $respodentcounterclaimbanking_claim_corporate = DatabaseHelper::respodentcounterclaimbanking_claim_corporate($id);
//       $respodentcounterclaimbanking_claim_mort_details = DatabaseHelper::respodentcounterclaimbanking_claim_mort_details($id);
//       $respodentcounterclaimbanking_claim_hypo_details = DatabaseHelper::respodentcounterclaimbanking_claim_hypo_details($id);
//       $respodentcounterclaimbanking_claim_pledge_details = DatabaseHelper::respodentcounterclaimbanking_claim_pledge_details($id);
//       $respodentcounterclaimbanking_claim_pro_details = DatabaseHelper::respodentcounterclaimbanking_claim_pro_details($id);
//       $respodentcounterclaimbanking_relief = DatabaseHelper::respodentcounterclaimbanking_relief($id);
//       $respodentcounterclaimbank_account = DatabaseHelper::respodentcounterclaimbank_account($id);


//     // echo date('Y-m-d H:i',strtotime('+30 days'));
    
// //test by steephan
//      // $claimNoticeStageDocuments = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
//      //  inner join claimantnotice cn on (cn.id = cs.claimnoticeid)
//      //  inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cd.claimnoticeid = cd.claimnoticeid)
//      //  where cd.claimnoticeid=".$id);

//      // $ClaimNoticeStage = DB::select("select *,claimantnotice_stage as claimantnotice_stagenew from claimantnotice_stage where claimnoticeid=".$id);


//      // $ClaimNoticeStageStatus = DB::select("select * from claimnoticestagestatus");

     
     
     
//      // $Arbitrator_Allocation = DB::select("select name as arbitrationname,DATE_FORMAT(cac.created_at,'%d/%m/%Y')  as arbitrator_acclocatedDate from claimant_arbitrator_configuration cac
//      //  inner join users us on (us.id = cac.arbitrator_id) where claimnoticeid = ".$id);

//      // $ClaimNoticeStatus = DB::select("select us.name as creatorname,date_format(cns.created_at,'%d-%m-%Y %H:%i:%s') created_at,cns.claimantnoticestatus from claimantnoticestatus cns inner join users us on (us.id = cns.userid) where cns.claimantnoticeid = ".$id. " order by cns.id asc");

//      // $ClaimantclaimNoticeStageDocuments = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
//      //    inner join claimantnotice cn on (cn.id = cs.claimnoticeid)
//      //    inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cd.claimnoticeid = cd.claimnoticeid and cn.userid = cd.created_id)
//      //    where cd.claimnoticeid=".$id);

//        // $RespondentclaimNoticeStageDocuments = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
//        //  inner join claimantnotice cn on (cn.id = cs.claimnoticeid)
//        // inner join respondantdetails res on (res.claimnoticeid = cn.id)
//        //  inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cd.claimnoticeid = cd.claimnoticeid and res.user_id = cd.created_id)
//        //  where cd.claimnoticeid=".$id);

//       //  $AwardedDcouments = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
//       // inner join claimantnotice cn on (cn.id = cs.claimnoticeid) 
//       // inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cs.claimnoticeid = cd.claimnoticeid) 
//       // inner join arbitration_masters res on (res.user_id = cd.created_id)
//       // where cd.claimnoticeid=".$id);

//      // $AdminAwardedDocuments = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
//      //  inner join claimantnotice cn on (cn.id = cs.claimnoticeid) 
//      //  inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cd.document_type='Awarded') 
//      //  inner join users res on (res.id = cd.created_id)  where cd.claimnoticeid=".$id);


//      $ClaimNoticeStatusCount = count($ClaimNoticeStage);

//      $arbitratorlist = ArbitrationMaster::all();
//      $dispute_categories = DisputeCategory::all();
//      $dispute_subcategories = DisputeSubcategory::all(); 

//      return view('AwardedClaim.show', compact('claimant_information','respondantdetails','claim_details','relief_request','claim_fees','claimnotices', 'arbitratorlist','dispute_categories','dispute_subcategories','Arbitrator_Allocation','ClaimNoticeStatus','ClaimNoticeStage','ClaimNoticeStatusCount','ClaimNoticeStageStatus','ClaimantclaimNoticeStageDocuments','RespondentclaimNoticeStageDocuments','AwardedDcouments','AdminAwardedDocuments','claimandrelief','getclaim_details','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','respodentcounterclaimandrelief','respodentcounterclaimrealestate_claim','respodentcounterclaimrealestate_claim_details','respodentcounterclaiminsurance_claim','respodentcounterclaiminsurance_claim_part_2','respodentcounterclaimfamily_claim','respodentcounterclaimfamily_claim_movable','respodentcounterclaimcontract_relief','respodentcounterclaimbanking_claim_mort','respodentcounterclaimbanking_claim_hypo','respodentcounterclaimbanking_claim_pledge','respodentcounterclaimbanking_claim_personal','respodentcounterclaimbanking_claim_corporate','respodentcounterclaimbanking_claim_mort_details','respodentcounterclaimbanking_claim_hypo_details','respodentcounterclaimbanking_claim_pledge_details','respodentcounterclaimbanking_claim_pro_details','respodentcounterclaimbanking_relief','respodentcounterclaimbank_account'));

//    }


    public function show($id)

    {

    // echo date('Y-m-d H:i',strtotime('+30 days'));
      $claimnotices = DatabaseHelper::getClaimNoticeDetails($id); 

       $claimant_information = DatabaseHelper::GetClaimantInformationsshow($id); 
      $claimandrelief = DatabaseHelper::getclaimandrelief($id);

      $getclaim_details = DatabaseHelper::getclaim_details($id);

      $respondantdetails = DatabaseHelper::getRespondantDetails($id); 

      $claim_details = DatabaseHelper::getClaimDetails($id);

      $claim_fees = DatabaseHelper::getClaimfeesDetails($id);

      $claimNoticeStageDocuments =  DatabaseHelper::getclaimNoticeStageDocuments($id);

      $ClaimNoticeStage = DatabaseHelper::getClaimNoticeStage($id); 

      $ClaimNoticeStageStatus = DatabaseHelper::getClaimNoticeStageStatus($id); 

      $claimnoticenatureofaward = DatabaseHelper::getnatureofclaimaward($id);

        $claimantinformations = DatabaseHelper::getclaimantinformationsall($id);
        $respondent_details=DatabaseHelper::respondent_details($id);

      $respondent_amend=DatabaseHelper::respondent_amend($id);   
       $claimanttype=DB::select("select cr.claimant_type,crt.id,crt.claimant_respondant_type_Code,crt.claimant_respondant_type_name FROM claimantregister cr left join claimant_respondant_type crt ON(crt.id=cr.claimant_type)");

      //echo json_encode($claimnoticenatureofaward); exit;

      $relief_request = DatabaseHelper::getReliefRequest($id);

      $Arbitrator_Allocation = DatabaseHelper::getArbitratorAllocation($id);

      $ClaimNoticeStatus = DatabaseHelper::getClaimNoticeStatus($id);

      $ClaimantclaimNoticeStageDocuments = DatabaseHelper::getClaimantclaimNoticeStageDocuments($id);

      $RespondentclaimNoticeStageDocuments = DatabaseHelper::getRespondentclaimNoticeStageDocuments($id); 

      $AwardedDcouments = DatabaseHelper::getAwardedDcouments($id);

      $AdminAwardedDocuments = DatabaseHelper::getAdminAwardedDocuments($id);    

     $ClaimNoticeStatusCount = count($ClaimNoticeStage);

     $arbitratorlist = ArbitrationMaster::all();
     $dispute_categories = DisputeCategory::all();
     $dispute_subcategories = DisputeSubcategory::all();

     $realestate_claim = DatabaseHelper::realestate_claim($id);
      $realestate_claim_details = DatabaseHelper::realestate_claim_details($id);
      $insurance_claim = DatabaseHelper::insurance_claim($id);
      $insurance_claim_part_2 = DatabaseHelper::insurance_claim_part_2($id);
      $family_claim = DatabaseHelper::family_claim($id);
      $family_claim_movable = DatabaseHelper::family_claim_movable($id);
      $contract_relief = DatabaseHelper::contract_relief($id);
      $banking_claim_mort = DatabaseHelper::banking_claim_mort($id);
      $banking_claim_hypo = DatabaseHelper::banking_claim_hypo($id);
      $banking_claim_pledge = DatabaseHelper::banking_claim_pledge($id);
      $banking_claim_personal = DatabaseHelper::banking_claim_personal($id);
      $banking_claim_corporate = DatabaseHelper::banking_claim_corporate($id);
      $banking_claim_mort_details = DatabaseHelper::banking_claim_mort_details($id);
      $banking_claim_hypo_details = DatabaseHelper::banking_claim_hypo_details($id);
      $banking_claim_pledge_details = DatabaseHelper::banking_claim_pledge_details($id);
      $banking_claim_pro_details = DatabaseHelper::banking_claim_pro_details($id);
      $banking_relief = DatabaseHelper::banking_relief($id);
      $bank_account = DatabaseHelper::bank_account($id);


       $respodentcounterclaimandrelief = DatabaseHelper::getrepondentclaimandrelief($id);
      
      $respodentcounterclaimrealestate_claim = DatabaseHelper::respodentcounterclaimrealestate_claim($id);
      $respodentcounterclaimrealestate_claim_details = DatabaseHelper::respodentcounterclaimrealestate_claim_details($id);
      $respodentcounterclaiminsurance_claim = DatabaseHelper::respodentcounterclaiminsurance_claim($id);
      $respodentcounterclaiminsurance_claim_part_2 = DatabaseHelper::respodentcounterclaiminsurance_claim_part_2($id);
      $respodentcounterclaimfamily_claim = DatabaseHelper::respodentcounterclaimfamily_claim($id);
      $respodentcounterclaimfamily_claim_movable = DatabaseHelper::respodentcounterclaimfamily_claim_movable($id);
      $respodentcounterclaimcontract_relief = DatabaseHelper::respodentcounterclaimcontract_relief($id);
      $respodentcounterclaimbanking_claim_mort = DatabaseHelper::respodentcounterclaimbanking_claim_mort($id);
      $respodentcounterclaimbanking_claim_hypo = DatabaseHelper::respodentcounterclaimbanking_claim_hypo($id);
      $respodentcounterclaimbanking_claim_pledge = DatabaseHelper::respodentcounterclaimbanking_claim_pledge($id);
      $respodentcounterclaimbanking_claim_personal = DatabaseHelper::respodentcounterclaimbanking_claim_personal($id);
      $respodentcounterclaimbanking_claim_corporate = DatabaseHelper::respodentcounterclaimbanking_claim_corporate($id);
      $respodentcounterclaimbanking_claim_mort_details = DatabaseHelper::respodentcounterclaimbanking_claim_mort_details($id);
      $respodentcounterclaimbanking_claim_hypo_details = DatabaseHelper::respodentcounterclaimbanking_claim_hypo_details($id);
      $respodentcounterclaimbanking_claim_pledge_details = DatabaseHelper::respodentcounterclaimbanking_claim_pledge_details($id);
      $respodentcounterclaimbanking_claim_pro_details = DatabaseHelper::respodentcounterclaimbanking_claim_pro_details($id);
      $respodentcounterclaimbanking_relief = DatabaseHelper::respodentcounterclaimbanking_relief($id);
      $respodentcounterclaimbank_account = DatabaseHelper::respodentcounterclaimbank_account($id);

      $security_type = DatabaseHelper::security_type($id);
$renewal_date = DatabaseHelper::renewal_date($id);
$revival_date = DatabaseHelper::revival_date($id);

$legal_notice = DatabaseHelper::legal_notice($id);
$other_document = DatabaseHelper::other_document($id);

$security_type_counter = DatabaseHelper::security_type_counter($id);
$renewal_date_counter = DatabaseHelper::renewal_date_counter($id);
$revival_date_counter = DatabaseHelper::revival_date_counter($id);

$legal_notice_counter = DatabaseHelper::legal_notice_counter($id);
$other_document_counter = DatabaseHelper::other_document_counter($id);
$bank_account_counter= DatabaseHelper::bank_account_counter($id);

$claimant_dispute = DB::select("select ci.dispute_categories_id,ci.dispute_subcategories_id,
dis.category_name,diss.subcategory_name,ci.claimnoticeid,dis.dispute_category_Code from repondent_dispute_information ci
left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)

where ci.deleted_at is null and ci.claimnoticeid = ".$id );

$counter_claim_list=DatabaseHelper::counter_claim_list($id);

      
     return view('AwardedClaim.show', compact('claimant_dispute','claimant_information','respondantdetails','claim_details','relief_request','claim_fees','claimnotices', 'arbitratorlist','dispute_categories','dispute_subcategories','Arbitrator_Allocation','ClaimNoticeStatus','ClaimNoticeStage','ClaimNoticeStatusCount','ClaimNoticeStageStatus','ClaimantclaimNoticeStageDocuments','RespondentclaimNoticeStageDocuments','AwardedDcouments','AdminAwardedDocuments','claimandrelief','getclaim_details','claimnoticenatureofaward','claimantinformations','claimanttype','realestate_claim','realestate_claim_details','insurance_claim','insurance_claim_part_2','family_claim','family_claim_movable','contract_relief','banking_claim_mort','banking_claim_hypo','banking_claim_pledge','banking_claim_personal','banking_claim_corporate','banking_claim_mort_details','banking_claim_hypo_details','banking_claim_pledge_details','banking_claim_pro_details','banking_relief','bank_account','respodentcounterclaimandrelief','respodentcounterclaimrealestate_claim','respodentcounterclaimrealestate_claim_details','respodentcounterclaiminsurance_claim','respodentcounterclaiminsurance_claim_part_2','respodentcounterclaimfamily_claim','respodentcounterclaimfamily_claim_movable','respodentcounterclaimcontract_relief','respodentcounterclaimbanking_claim_mort','respodentcounterclaimbanking_claim_hypo','respodentcounterclaimbanking_claim_pledge','respodentcounterclaimbanking_claim_personal','respodentcounterclaimbanking_claim_corporate','respodentcounterclaimbanking_claim_mort_details','respodentcounterclaimbanking_claim_hypo_details','respodentcounterclaimbanking_claim_pledge_details','respodentcounterclaimbanking_claim_pro_details','respodentcounterclaimbanking_relief','respodentcounterclaimbank_account','security_type','renewal_date','revival_date','legal_notice','other_document','security_type_counter','renewal_date_counter','revival_date_counter','legal_notice_counter','other_document_counter','bank_account_counter','counter_claim_list','respondent_details','respondent_amend'));

   }


  //  public function upload(Request $request)
  //  {

  //   if($request->hasFile('file'))
  //   {

  //     $storagePath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $request->arbitration_petionno);
  //     $imageFile = $request->file('file');
  //     $imageName = $imageFile->getClientOriginalName();
  //     $imageFile->move($storagePath, $imageName);
  //   }
  //   return response()->json(['Status'=>true, 'Message'=>'Image(s) Uploaded.']);
  // }

  // public function remove(Request $request)
  // {
  //   $filename =  $request->get('filename');
  //   $storagePath = $storagePath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $request->arbitration_petionno).'/'.$filename;
  //   if (file_exists($storagePath)) {
  //     unlink($storagePath);
  //   }
  //   return $filename;
  // }

  // public function update(Request $request, $id)
  // {

  //   $claimnoticestatus = 'Claim Petion Document Uploaded by Claimant';
  //   $folderName = $request->arbitration_petionno;
  //   $documentDirectory = $request->alfresco_stage_folderuniqueid;
  //   $claimnoticeID = $request->claimnoticeid;
  //   $stageid = $request->claimnoticestageid;
  //   $table = DB::table('claimantnotice')
  //   ->where('id' , $request->claimnoticeid)
  //   ->update(['claimnoticestatus' => $claimnoticestatus]);
  //   $ClaimantNoticeStatus = new ClaimantNoticeStatus(); 
  //   $ClaimantNoticeStatus->claimantnoticeid = $request->claimnoticeid;
  //   $ClaimantNoticeStatus->claimantnoticestatus = $claimnoticestatus;
  //   $ClaimantNoticeStatus->userid = Auth::user()->id;  
  //   $ClaimantNoticeStatus->created_id = Auth::user()->id;        
  //   $ClaimantNoticeStatus->save();

  //   $this->storeDocument($folderName, $documentDirectory,$claimnoticeID,$stageid);

  //   return redirect()->route('ClaimPetion.show',$request->claimnoticeid)
  //   ->with('success','Stage Document Uploaded successfully');
  // }

  // private function storeDocument($claimpetion_arbitrationNo, $documentDirectory,$claimnoticeID,$stageid)
  // {
  //   try
  //   {
  //     $fileDirPath = storage_path().'/app/public/uploads/claim/'.str_replace('/', '_', $claimpetion_arbitrationNo);

  //     $files = array_diff(scandir($fileDirPath), array('.', '..'));
  //     foreach ($files as $key => $value)
  //     {
  //       $fileExtension = pathinfo($value, PATHINFO_EXTENSION);
  //       $fileName = $value;
  //       $fileDescription = 'Claim Petion Document';
  //       $response = AlfrescoDocument::SetAlfrescoDocument($fileDirPath, $fileName, $fileExtension, $documentDirectory, $fileDescription);
  //       $objResponse = json_decode($response, TRUE);

  //       $documentNode = $objResponse['nodeRef'];
  //       $arrWorkSpace = explode('://', $documentNode);
  //       $arrStore = explode('/', $arrWorkSpace[1]);
  //       $workspace = $arrWorkSpace[0];
  //       $spaceStore = $arrStore[0];
  //       $alfrescoDocumentName = $arrStore[1];

  //       DB::table('claimnoticedocumentdetails')->insert([
  //         'claimnoticeid' => $claimnoticeID,
  //         'stageid'=>$stageid,
  //         'node_ref' => $documentNode,
  //         'work_space' => $workspace,
  //         'space_store' => $spaceStore,
  //         'alfresco_document_name' => $alfrescoDocumentName,
  //         'document_name' => $value,
  //         'file_extension' => $fileExtension,
  //         'document_type' => 'Stage Documents',
  //         'created_id' => auth()->user()->id,
  //         'created_at' => NOW()
  //       ]);
  //     }
  //     File::cleanDirectory($fileDirPath);
  //   }
  //   catch(Exception $exc)
  //   {

  //   }
  // }



  public function getClaimPetionStageDocuments($id)
  {
    $alfrescoURL = env('DOCUMENT_API').'/node/content/';
    $alfrescoTicket = '?alf_ticket='.AlfrescoDocument::GetAlfrescoUserTicket();
    $document = DatabaseHelper::getClaimPetionDocuments($id);

    $documentName = $document[0]->document_name;
    $documentUrl = $alfrescoURL.$document[0]->work_space.'/'.$document[0]->space_store.'/'.$document[0]->alfresco_document_name.$alfrescoTicket;
    $headers = array(
      'Content-Type: application/pdf',
    );
    return redirect($documentUrl);
  }

  }
