<?php

namespace App;

use DB;

class DatabaseHelper
{
	public static function getClaimDocumentDocumentsByDocumentType($claimnoticeid, $documentType)
	{
		$rows = DB::table('claimnoticedocumentdetails')
		->where([['id', $claimnoticeid], ['document_type', $documentType]])
		->get();

		return $rows;
	} 


	public static function sendsms($fields)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode($fields),
			CURLOPT_HTTPHEADER => array(
				"authorization: YN7HuRwpczQ8da1srbfGJvFOLeSAoX2nyDiZ0EPmg9U5WlVkIjfWPGtsn6JcXyTlQRwpox2Z49Lg0SiV",
				"accept: */*",
				"cache-control: no-cache",
				"content-type: application/json"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}

		return $response;

	}


	public static function sendwaytosms($phone,$user_id,$message)
	{

		$url="https://www.way2sms.com/api/v1/sendCampaign";
	//$message = urlencode("Thank you for Your Registeration as a Claimant.");// urlencode your message
		$curl = curl_init();
	curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
	curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=9NTU6RCILNPNZWF5MYHMK7O9TA0W9OZB&secret=REL8EGNQQK3XCEE3&usetype=stage&phone=".$phone."&senderid=".$user_id."&message=".$message."");
	// post data
	// query parameter values must be given without squarebrackets.
	 // Optional Authentication:
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	curl_close($curl);
	echo $result; exit;
	return $result;

}

public static function getClaimPetionDocuments($claimnoticedocumentid)
{
	$rows = DB::table('claimnoticedocumentdetails')
	->where([['id', $claimnoticedocumentid]])
	->get();

	return $rows;
}

public static function getclaimdetailsDocuments($claimnoticedocumentid)
{
	$rows = DB::table('claimnoticedocumentdetails')
	->where([['id', $claimnoticedocumentid]])
	->get();

	return $rows;
}

public static function getNotificationByUser($userId)
{
	$row = DB::table('notifications')
	->where('notifiable_id', $userId)
	->get();

	return $row;
}

public static function getNotificationByUserBylatest($userId)
{
	$row = DB::table('notifications')
	->where([['notifiable_id', $userId],['latest', '1']])
	->get();

	return $row;
}

public static function getNotificationCountByUser($userId)
{
	$row = DB::select("select count(*) notificationcounts from notifications where latest=1 and notifiable_id =".$userId);

	return $row;
}

public static function getNotificationById($notificationId)
{
	$row = DB::table('notifications')
	->where('id', $notificationId)
	->get();

	return $row;
}



public static function getClaimNoticeUserDetails($ClaimNoticeid)
{
	$rows = DB::select('SELECT cr.email,cr.phone,cm.claimnoticeno,cr.username FROM claimantnotice cm 
		LEFT JOIN claimantregister cr ON (cr.user_id = cm.userid)  WHERE cm.id ='.$ClaimNoticeid);
	return $rows;
}

public static function SessionLogout()
{
	$user_id = (auth()->check()) ? auth()->user()->id : null;
	if ( $user_id==null) {
		return view('auth.login');
	} 

}


public static function getClaimNoticeDetails($id)
{
	$rows = DB::select("select sm.claimnoticeno,sm.respondant_status,pet.arbitration_petionno,TRIM(sm.claimnoticestatus) as claimnoticestatus,sm.userid,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.awardedstatement,isstageinitiated,
		cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name,cin.arbitrtor_fee AS arbitrator_fees,cd.damage_with_interest as claimamount,
		cin.admin_fee AS adminstration_fees from claimantnotice sm
		inner join claim_fees cf on (cf.claimnoticeid =sm.id)
		inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
		inner join dispute_categories dc on (ci.dispute_categories_id = dc.id)
		left join relief_request cd on (cd.claimnoticeid = sm.id and cd.is_respondant is null)
		inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
		left join claimnotice_petion_arbitrationno pet on (pet.claimnoticeid = sm.id)
		left join claimnotice_invoices cin on (cin.claimnoticeid = sm.id AND cin.admin_fee IS NOT null)
		where sm.id=".$id. " AND  cd.deleted_at IS NULL order by sm.id desc");
	return $rows;  
} 

// public static function getrespondentdecisionDetails($id)
// {
// 	$rows = DB::select("SELECT * FROM respondents_decision
// 		           where sm.claim_notice_id=".$id." and created_id =".Auth::user()->id);
// 	return $rows;
// }

public static function getClaimantInformations($id)
{
	$rows = DB::select("select distinct ci.name,ci.address,ci.others,ci.country,ci.age,ci.state,ci.email,ci.city,ci.daytimetelephone,crt.claimant_respondant_type_name as claimant_type,cnd.node_ref,cnd.work_space,cnd.space_store,cnd.alfresco_document_name,cnd.id AS document_id,cni.id AS document_id_idproof,cni.document_name AS claimant_IDproof,cnd.document_name,cnd.document_type,cr.organization_name,cr.organization_details  from claimant_informations ci
		left join claimant_respondant_type crt on (crt.id =ci.claimant_type ) 
		inner join claimantnotice cn on (cn.id = ci.claimnoticeid)
		inner join claimantregister cr on (cr.user_id = cn.userid)
		LEFT join claimnoticedocumentdetails cnd on (cnd.claimnoticeid = ci.claimnoticeid and cnd.document_type='GPA')
		LEFT join claimnoticedocumentdetails cni on (cni.claimnoticeid = ci.claimnoticeid and cni.document_type='IDPROOF') where ci.claimnoticeid=".$id);
	return $rows;
}

public static function getRespondantDetails($id)
{
	// $rows = DB::select("select ci.name,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation,ci.age,ci.address,ci.email,ci.country,ci.state,ci.city,ci.respondant_type,ci.company_name,ci.proprietar_name,ci.aadhar_num,
	// 	ci.daytimetelephone,ci.zipcode,crt.claimant_respondant_type_name,crt.claimant_respondant_type_Code,cd.document_name,cd.id as document_id,ci.id AS repondent_id from respondantdetails ci
	// 	left join claimant_respondant_type crt on (crt.id =ci.respondant_type )
	// 	left JOIN claimnoticedocumentdetails cd ON (cd.claimnoticeid = ci.claimnoticeid AND ci.user_id = cd.claimant_respondent_id) where ci.claimnoticeid=".$id);
	$rows = DB::select("SELECT ci.user_id, ci.auth_name,ci.auth_age,ci.name,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation,ci.age,ci.address,ci.email,ci.country,ci.state,ci.city,ci.respondant_type,ci.company_name,ci.proprietar_name,ci.aadhar_num,
		ci.daytimetelephone,ci.zipcode,crt.claimant_respondant_type_name,crt.claimant_respondant_type_Code,ci.id AS repondent_id from respondantdetails ci
		left join claimant_respondant_type crt on (crt.id =ci.respondant_type )
		
		 where ci.claimnoticeid=".$id);
	return $rows;
}

public static function getclaimantinformationsall($id)
{
	// $rows = DB::select("select ci.name,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation,ci.age,ci.address,ci.email,ci.country,ci.state,ci.city,ci.respondant_type,ci.company_name,ci.proprietar_name,ci.aadhar_num,
	// 	ci.daytimetelephone,ci.zipcode,crt.claimant_respondant_type_name,crt.claimant_respondant_type_Code,cd.document_name,cd.id as document_id,ci.id AS repondent_id from respondantdetails ci
	// 	left join claimant_respondant_type crt on (crt.id =ci.respondant_type )
	// 	left JOIN claimnoticedocumentdetails cd ON (cd.claimnoticeid = ci.claimnoticeid AND ci.user_id = cd.claimant_respondent_id) where ci.claimnoticeid=".$id);
	$rows = DB::select("select ci.id,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation,ci.name,ci.address,ci.country,ci.state,ci.city,ci.age,dis.dispute_category_Code,ci.company_name,ci.dept_name,ci.govt_name,ci.others,
        ci.company_individual,ci.zipcode,ci.daytimetelephone,ci.email,crt.claimant_respondant_type_name as  claimant_type,ci.dispute_categories_id,ci.dispute_subcategories_id,ci.aadhar_num,cnd.id AS document_id,cndd.id AS amend_id,cndd.document_name as amend_name,cni.id AS document_id_idproof,cni.document_name AS claimant_IDproof,cnd.document_name,cnd.document_type,
        dis.category_name,diss.subcategory_name,ci.claimnoticeid,ci.currency from claimant_informations ci
        left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
        left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)
        left join claimant_respondant_type  crt on (crt.id = ci.claimant_type) 
        LEFT join claimnoticedocumentdetails cnd on (cnd.claimnoticeid = ci.claimnoticeid and cnd.document_type='GPA')
    LEFT join claimnoticedocumentdetails cni on (cni.claimnoticeid = ci.claimnoticeid and cni.document_type='IDPROOF')
    LEFT join claimnoticedocumentdetails cndd on (cndd.claimnoticeid = ci.claimnoticeid and cndd.document_type='CLAIMANT_AUTHORIZED')
        where ci.deleted_at is null and ci.claimnoticeid = ".$id );
	return $rows;
}

public static function getClaimDetails($id)
{
	$rows = DB::select("select account_name,commercial_monthly,percentage_interest,total_amount,Total_outstanding_Amount,date_format(cd.NPADate,'%d-%m-%Y') as NPADate,date_format(cd.loan_taken_date,'%d-%m-%Y') as loan_taken_date,
		claim_details_remarks,loanaccountno,sequirity,rate_penalinterest,
		dateofrevival,lp.loan_type_name,cd.rate_penalinterest,date_format(cd.dateofrevival,'%d-%m-%Y') dateofrevival,cd.claim_details_Remarks from claim_details cd
		inner join loan_type lp on (lp.id = cd.loan_type_id )  where cd.is_respondant is null and cd.claimnoticeid=".$id);
	return $rows;

}

public static function getClaimfeesDetails($id)
{
	$rows = DB::select("select cf.claim_amount,cf.claim_amount_purpose,cf.registration_fees,dc.category_name,dsc.subcategory_name from claim_fees cf inner join claimant_informations cm on (cm.claimnoticeid = cf.claimnoticeid) inner join dispute_categories dc on (dc.id = cm.dispute_categories_id) inner join dispute_subcategories dsc on (dsc.id = cm.dispute_subcategories_id) where cm.claimnoticeid=".$id);
	return $rows;
}

public static function getReliefRequest($id)
{
	$rows = DB::select("select * from relief_request where is_respondant is null and  claimnoticeid=".$id);
	return $rows;
}

public static function getclaimNoticeStageDocuments($id) 
{
	$rows = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
		inner join claimantnotice cn on (cn.id = cs.claimnoticeid)
		inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cd.claimnoticeid = cd.claimnoticeid)
		where cd.claimnoticeid=".$id);

	return $rows;
}

public static function getClaimNoticeStage($id)
{
	$rows = DB::select("select *,claimantnotice_stage as claimantnotice_stagenew from claimantnotice_stage where claimnoticeid=".$id);

	return $rows;
}

public static function getClaimNoticeStageStatus($id)
{
	$rows = DB::select("select * from claimnoticestagestatus");

	return $rows;
}

public static function getArbitratorAllocation($id)
{
	$rows = DB::select("select name as arbitrationname,DATE_FORMAT(cac.created_at,'%d/%m/%Y')  as arbitrator_acclocatedDate from claimant_arbitrator_configuration cac
		inner join users us on (us.id = cac.arbitrator_id) where claimnoticeid = ".$id);

	return $rows;
}

public static function getnatureofclaimaward($id)
{
	$rows = DB::select("SELECT * from claimantnotice_stage WHERE claimnoticeid=".$id." AND nature_of_award IS NOT NULL");
	return $rows;
}

public static function getClaimNoticeStatus($id)
{
	$rows = DB::select("select us.name as creatorname,date_format(cns.created_at,'%d-%m-%Y %H:%i:%s') created_at,cns.claimantnoticestatus from claimantnoticestatus cns inner join users us on (us.id = cns.userid) where cns.claimantnoticeid = ".$id. " order by cns.id asc");

	return $rows;
}


public static function getClaimantclaimNoticeStageDocuments($id)
{
	$rows = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,remarks,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
		inner join claimantnotice cn on (cn.id = cs.claimnoticeid)
		inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cd.claimnoticeid = cd.claimnoticeid and cn.userid = cd.created_id)
		where cd.claimnoticeid=".$id);

	return $rows;
}

public static function getRespondentclaimNoticeStageDocuments($id)
{
	$rows = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,remarks,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
		inner join claimantnotice cn on (cn.id = cs.claimnoticeid)
		inner join respondantdetails res on (res.claimnoticeid = cn.id)
		inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cd.claimnoticeid = cd.claimnoticeid and res.user_id = cd.created_id)
		where cd.claimnoticeid=".$id);

	return $rows;
}

public static function getAwardedDcouments($id)
{
	$rows = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
		inner join claimantnotice cn on (cn.id = cs.claimnoticeid) 
		inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cs.claimnoticeid = cd.claimnoticeid) 
		inner join arbitration_masters res on (res.user_id = cd.created_id)
		where is_delete is null and cd.claimnoticeid=".$id);

	return $rows;
}

public static function getAdminAwardedDocuments($id)
{
	$rows = DB::select("select node_ref,work_space,space_store,alfresco_document_name,document_name,cd.id as documentid,cs.id,cs.claimnoticeid from claimantnotice_stage cs 
		inner join claimantnotice cn on (cn.id = cs.claimnoticeid) 
		inner join claimnoticedocumentdetails cd on (cd.stageid = cs.id and cd.document_type='Disposed') 
		inner join users res on (res.id = cd.created_id)  where cd.claimnoticeid=".$id);
	return $rows;
} 

public static function getclaimandrelief($id)
{
	$rows = DB::select("select cd.*,rr.*,'INR' as currency ,cd.claimnoticeid,rr.id as reliefrequestid,cd.id as claimdetailsid,dc.category_name from claim_details cd 
		left join relief_request rr on (cd.claimnoticeid = rr.claimnoticeid)
		LEFT JOIN claimant_informations ci ON (ci.claimnoticeid = cd.claimnoticeid)
		LEFT JOIN dispute_categories dc ON (dc.id = ci.dispute_categories_id) where  cd.is_respondant is null and rr.is_respondant is null and  rr.deleted_at is null and cd.deleted_at is NULL and  cd.claimnoticeid=".$id);
	return $rows;
}
public static function getloan($id)
{
	$rows = DB::select("select cd.*,'INR' as currency ,cd.claim_notice_id,cd.id as claimdetailsid,dc.category_name from banking_account_detail cd 
		LEFT JOIN claimant_informations ci ON (ci.claimnoticeid = cd.claim_notice_id)
		LEFT JOIN dispute_categories dc ON (dc.id = ci.dispute_categories_id) where  cd.is_respondant is null and  cd.deleted_at is NULL and  cd.claim_notice_id=".$id);
	return $rows;
}



public static function getrepondentclaimandrelief($id)
{
	

	$rows = DB::select("select dc.dispute_category_Code,cd.*,rr.*,rr.id,cd.id,cd.user_id as user_id,'INR' as currency ,cd.claimnoticeid,rr.id as reliefrequestid,rr.id as claimdetailsid from relief_request cd inner join claim_details rr on (cd.claimnoticeid = rr.claimnoticeid AND cd.user_id=rr.user_id) 
    INNER JOIN repondent_dispute_information rdi ON(rdi.claimnoticeid=rr.claimnoticeid AND rdi.user_id=rr.user_id)
      INNER JOIN dispute_categories dc ON(dc.id=rdi.dispute_categories_id)
where rr.is_respondant='1' and cd.is_respondant='1' and cd.claimnoticeid=".$id);
	
  return $rows;
}



public static function getarbitratormaster()
{
	$rows = DB::select("sELECT am.*  FROM arbitration_masters am
		
		
		where am.deleted_at is NULL");
	return $rows;
}
public static function getarbitratormaster_index()
{
	// $rows = DB::select("sELECT am.*,dc.category_name,us.mail_verify  FROM arbitration_masters am
	// 	INNER JOIN dispute_categories dc ON (am.dispute_categories_id = dc.id)
	// 	inner JOIN users us ON (am.user_id=us.id)
	// 	 where am.deleted_at is NULL");
	$rows = DB::select("sELECT am.*,us.mail_verify,cdd.id as name_id,cdd.document_name as name_doc,cdn.id as address_id, cdn.document_name as address_name  FROM arbitration_masters am
		
		inner JOIN users us ON (am.user_id=us.id) 
		left JOIN claimnoticedocumentdetails cdd ON (cdd.created_id =us.id and  cdd.document_type='AMEND_NAME')
left JOIN claimnoticedocumentdetails cdn ON (cdn.created_id =us.id and  cdn.document_type='AMEND_USER')
		 where am.deleted_at is NULL");
	return $rows;
}


public static function getclaim_details($id)
{
	$rows = DB::select("select *,'INR' as currency from claim_details cd  where cd.is_respondant is null and  cd.claimnoticeid=".$id);
	return $rows;
}


public static function realestate_claim($id)
{
	$rows = DB::select("select * from realestate_claim md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}
public static function counter_claim_list($id)
{
	$rows = DB::select("SELECT distinct cd.email,rd.respondent_decision,cd.user_id,dc.category_name,dcs.subcategory_name from respondantdetails cd 
left JOIN respondents_decision rd ON(rd.claim_notice_id=cd.claimnoticeid AND rd.created_id=cd.user_id)
left JOIN repondent_dispute_information rdi ON(rdi.claimnoticeid=cd.claimnoticeid AND rdi.user_id=cd.user_id)
left JOIN dispute_categories dc ON(dc.id=rdi.dispute_categories_id)
left JOIN dispute_subcategories dcs ON(dcs.id=rdi.dispute_subcategories_id)
WHERE  cd.claimnoticeid=".$id);
	return $rows;
}

public static function respondent_details($id)
{
	$rows = DB::select("SELECT * FROM claimnoticedocumentdetails WHERE  document_type='AUTH_NAME' AND  claimnoticeid=".$id);
	return $rows;
}

public static function respondent_amend($id)
{
	$rows = DB::select("SELECT * FROM claimnoticedocumentdetails WHERE  document_type='RESPONENT_AUTH' AND  claimnoticeid=".$id);
	return $rows;
}

// insurance_claim

public static function insurance_claim($id)
{
	$rows = DB::select("select * from insurance_claim  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}

//insurance_claim_part_2

public static function insurance_claim_part_2($id)
{
	$rows = DB::select("select * from insurance_claim_part_2  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}

//realestate_claim_details

//family_claim

public static function family_claim($id)
{
	$rows = DB::select("select * from family_claim  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}


//family_claim_movable

public static function family_claim_movable($id)
{
	$rows = DB::select("select * from family_claim_movable  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}

//contract_relief

public static function contract_relief($id)
{
	$rows = DB::select("select * from contract_relief  md 
		left join relief_request rr on (rr.id = md.relief_id)  where rr.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}

//Banking and Finacial Start
public static function banking_claim_mort($id)
{
	$rows = DB::select("select * from banking_claim_mort  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}


public static function banking_claim_hypo($id)
{
	$rows = DB::select("select * from banking_claim_hypo  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}


public static function banking_claim_pledge($id)
{
	$rows = DB::select("select * from banking_claim_pledge md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}


public static function banking_claim_personal($id)
{
	$rows = DB::select("select * from banking_claim_personal  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}


public static function banking_claim_corporate($id)
{
	$rows = DB::select("select * from banking_claim_corporate  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}


public static function banking_claim_mort_details($id)
{
	$rows = DB::select("select * from banking_claim_mort_details  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}
public static function bank_account($id)
{
	$rows = DB::select("select *,md.id as bank_id from banking_account_detail  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and is_deleted='N' and md.claim_notice_id=".$id);
	//dd($rows);
	//echo json_encode($rows); exit;
	return $rows;
}
public static function security_type($id)
{
	$rows = DB::select("select * from security_type  md
		left join claim_details cd on (cd.claimnoticeid = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	//echo json_encode($rows); exit;
	return $rows;
}
public static function renewal_date($id)
{
	$rows = DB::select("select * from renewal_date  md
		left join claim_details cd on (cd.claimnoticeid = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);

	//echo json_encode($rows); exit;
	return $rows;
}
public static function revival_date($id)
{
	$rows = DB::select("select * from revival_date  md
		left join claim_details cd on (cd.claimnoticeid = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	//echo json_encode($rows); exit;
	return $rows;
}
public static function legal_notice($id)
{
	$rows = DB::select("select * from legal_notice  md
		left join claim_details cd on (cd.claimnoticeid = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	//echo json_encode($rows); exit;
	return $rows;
}
public static function other_document($id)
{
	$rows = DB::select("select * from other_document  md
		left join claim_details cd on (cd.claimnoticeid = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	//echo json_encode($rows); exit;
	return $rows;
}
public static function bank_account_counter($id)
{
	$rows = DB::select("select md.*,md.id as bank_id from banking_account_detail  md
		inner join claim_details cd on (cd.id = md.claim_id) where cd.is_respondant ='1' and is_deleted='N' and md.claim_notice_id=".$id);
	//dd($rows);
	
	return $rows;
}
public static function security_type_counter($id)
{
	$rows = DB::select("select * from security_type  md
		left join claim_details cd on (cd.claimnoticeid = md.claim_id ) where  cd.is_respondant ='1' and md.claim_notice_id=".$id);
	//echo json_encode($rows); exit;
	return $rows;
}
public static function renewal_date_counter($id)
{
	$rows = DB::select("select * from renewal_date  md
		left join claim_details cd on (cd.claimnoticeid = md.claim_id ) where  cd.is_respondant ='1' and md.claim_notice_id=".$id);

	//echo json_encode($rows); exit;
	return $rows;
}
public static function revival_date_counter($id)
{
	$rows = DB::select("select * from revival_date  md
		left join claim_details cd on (cd.claimnoticeid = md.claim_id ) where  cd.is_respondant ='1' and md.claim_notice_id=".$id);
	//echo json_encode($rows); exit;
	return $rows;
}
public static function legal_notice_counter($id)
{
	$rows = DB::select("select * from legal_notice  md
		left join claim_details cd on (cd.claimnoticeid = md.claim_id ) where  cd.is_respondant ='1' and md.claim_notice_id=".$id);
	//echo json_encode($rows); exit;
	return $rows;
}
public static function other_document_counter($id)
{
	$rows = DB::select("select * from other_document  md
		left join claim_details cd on (cd.claimnoticeid = md.claim_id ) where  cd.is_respondant ='1' and md.claim_notice_id=".$id);
	//echo json_encode($rows); exit;
	return $rows;
}

public static function banking_claim_hypo_details($id)
{
	$rows = DB::select("select * from banking_claim_hypo_details  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}


public static function banking_claim_pledge_details($id)
{
	$rows = DB::select("select * from banking_claim_pledge_details  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}


public static function banking_claim_pro_details($id)
{
	$rows = DB::select("select *,md.revival_letter from banking_claim_pro_details  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	//echo json_encode($rows); exit;
	return $rows;
}

//End

//banking_relief


public static function banking_relief($id)
{
	$rows = DB::select("select * from banking_relief  md 
		left join relief_request rr on (rr.id = md.relief_id)  where rr.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}

public static function realestate_claim_details($id)
{
	$rows = DB::select("select * from realestate_claim_details  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant is null and md.claim_notice_id=".$id);
	return $rows;
}



//Respodent CounterClaimstart Aravinth

public static function respodentcounterclaimrealestate_claim($id)
{
	$rows = DB::select("select * from realestate_claim md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}

// insurance_claim

public static function respodentcounterclaiminsurance_claim($id)
{
	$rows = DB::select("select * from insurance_claim  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}

//insurance_claim_part_2

public static function respodentcounterclaiminsurance_claim_part_2($id)
{
	$rows = DB::select("select * from insurance_claim_part_2 md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}

//realestate_claim_details

//family_claim

public static function respodentcounterclaimfamily_claim($id)
{
	$rows = DB::select("select * from family_claim md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}


//family_claim_movable

public static function respodentcounterclaimfamily_claim_movable($id)
{
	$rows = DB::select("select * from family_claim_movable  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}

//contract_relief

public static function respodentcounterclaimcontract_relief($id)
{
	$rows = DB::select("select * from contract_relief md 
		left join relief_request rr on (rr.id = md.relief_id)  where rr.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}

//Banking and Finacial Start
public static function respodentcounterclaimbanking_claim_mort($id)
{
	$rows = DB::select("select * from banking_claim_mort  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}


public static function respodentcounterclaimbanking_claim_hypo($id)
{
	$rows = DB::select("select * from banking_claim_hypo  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}


public static function respodentcounterclaimbanking_claim_pledge($id)
{
	$rows = DB::select("select * from banking_claim_pledge md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}


public static function respodentcounterclaimbanking_claim_personal($id)
{
	$rows = DB::select("select * from banking_claim_personal md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}


public static function respodentcounterclaimbanking_claim_corporate($id)
{
	$rows = DB::select("select * from banking_claim_corporate  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}


public static function respodentcounterclaimbanking_claim_mort_details($id)
{
	$rows = DB::select("select * from banking_claim_mort_details  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}
public static function respodentcounterclaimbank_account($id)
{
	$rows = DB::select("select * from banking_account_detail  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}


public static function respodentcounterclaimbanking_claim_hypo_details($id)
{
	$rows = DB::select("select * from banking_claim_hypo_details  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}


public static function respodentcounterclaimbanking_claim_pledge_details($id)
{
	$rows = DB::select("select * from banking_claim_pledge_details  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}


public static function respodentcounterclaimbanking_claim_pro_details($id)
{
	$rows = DB::select("select * from banking_claim_pro_details  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}

//End

//banking_relief


public static function respodentcounterclaimbanking_relief($id)
{
	$rows = DB::select("select * from banking_relief  md 
		left join relief_request rr on (rr.id = md.relief_id)  where rr.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}

public static function respodentcounterclaimrealestate_claim_details($id)
{
	$rows = DB::select("select * from realestate_claim_details  md
		left join claim_details cd on (cd.id = md.claim_id ) where cd.is_respondant ='1' and md.claim_notice_id=".$id);
	return $rows;
}



//Respondent counter claim End




public static function GetClaimantInformationsshow($id) 
{

	$rows =  DB::select("select ci.id,ci.firstname,ci.lastname,ci.middlename,ci.organization_name,ci.organization_details,ci.official_designation,ci.name,ci.address,ci.country,ci.state,ci.city,ci.age,dis.dispute_category_Code,ci.company_name,ci.dept_name,ci.govt_name,ci.others,
        ci.company_individual,ci.zipcode,ci.daytimetelephone,ci.email,crt.claimant_respondant_type_name as claimant_type,ci.dispute_categories_id,ci.dispute_subcategories_id,ci.aadhar_num,cnd.id AS document_id,cni.id AS document_id_idproof,cni.document_name AS claimant_IDproof,cnd.document_name,cnd.document_type,
        dis.category_name,diss.subcategory_name,ci.claimnoticeid,ci.currency from claimant_informations ci
        left join dispute_categories dis on (dis.id = ci.dispute_categories_id)
        left join dispute_subcategories diss on (diss.id = ci.dispute_subcategories_id)
        left join claimant_respondant_type  crt on (crt.id = ci.claimant_type) 
        LEFT join claimnoticedocumentdetails cnd on (cnd.claimnoticeid = ci.claimnoticeid and cnd.document_type='GPA')
    LEFT join claimnoticedocumentdetails cni on (cni.claimnoticeid = ci.claimnoticeid and cni.document_type='IDPROOF')
        where ci.deleted_at is null and ci.claimnoticeid = ".$id); 
	
	return $rows;
}
 
public static function GetClaimNoticeShow($id)
{
	$rows = DB::select("select sm.claimnoticeno,sm.respondant_status,pet.arbitration_petionno,TRIM(sm.claimnoticestatus) as claimnoticestatus,sm.userid,date_format(sm.created_at,'%d-%m-%Y %H:%i:%s') created_at,cf.claim_amount,sm.id,sm.awardedstatement,isstageinitiated,
		cf.dispute_categories_id,cf.dispute_subcategories_id,dc.category_name,dcp.subcategory_name,cin.arbitrtor_fee as arbitrator_fees,cd.damage_with_interest as claimamount,cin.admin_fee as 
		  adminstration_fees,(cin.admin_fee + cin.arbitrtor_fee) as total_fee from claimantnotice sm 
		left join claim_fees cf on (cf.claimnoticeid =sm.id)
		inner join claimant_informations ci on (ci.claimnoticeid =sm.id )
		inner join dispute_categories dc on (ci.dispute_categories_id = dc.id)
		left join relief_request cd on (cd.claimnoticeid = sm.id and cd.is_respondant is null)
		inner join dispute_subcategories dcp on (dcp.id = ci.dispute_subcategories_id)
		left join claimnotice_petion_arbitrationno pet on (pet.claimnoticeid = sm.id)
		left join claimnotice_invoices cin on (cin.claimnoticeid = sm.id AND cin.admin_fee IS NOT null)
		where sm.id=".$id. " order by sm.id desc");
	// echo json_encode($rows);exit;
	
	return $rows;
}


public static function fillclaimnoticeforvideoconferencing()
{
	$rows = DB::select("SELECT cm.id, cm.claimnoticeno,cac.arbitration_petionno  from claimantnotice cm
		INNER JOIN claimnotice_petion_arbitrationno cac ON (cm.id = cac.claimnoticeid)
		WHERE isstageinitiated='Y'");
	return $rows;
}


public static function getemailfromclaimnotice($id)
{
	$rows = DB::select("SELECT distinct us.id,us.email FROM claimantnotice cm
		INNER JOIN users us ON (cm.userid = us.id)
		WHERE cm.id = ".$id."
		UNION 
		SELECT distinct us.id,us.email FROM respondantdetails rd
		INNER JOIN users us ON (rd.user_id = us.id)
		WHERE rd.claimnoticeid  = ".$id."
		UNION
		SELECT distinct us.id,us.email FROM claimant_arbitrator_configuration cac
		INNER JOIN users us ON (cac.arbitrator_id = us.id)
		WHERE cac.claimnoticeid=".$id);
	return $rows;
}
public static function getemailfromclaimnotice_repay($id)
{
	$rows = DB::select("SELECT distinct us.id,us.email FROM claimantnotice cm
		INNER JOIN users us ON (cm.userid = us.id)
		WHERE cm.id = ".$id."
		UNION 
		SELECT distinct us.id,us.email FROM respondantdetails rd
		INNER JOIN users us ON (rd.user_id = us.id)
		WHERE rd.claimnoticeid  = ".$id);
	return $rows;
}


public static function getclaimnoticestageforvideoconference($id)
{
	$rows = DB::select("SELECT * FROM claimantnotice_stage WHERE claimnoticeid=".$id." ORDER BY id desc");
	return $rows;
}


public static function getvideo_conference()
{
	$video_conference_header = DB::select("select cac.claimnoticeid as claimnoticeid,cm.claimnoticeno,cac.arbitration_petionno,TIMESTAMPDIFF(MINUTE,vc.end_date,now()) as timedifference,vc.* from video_conferencing vc
INNER JOIN claimantnotice cm ON (cm.id = vc.claim_notice_id)
INNER JOIN claimnotice_petion_arbitrationno cac ON (cm.id = cac.claimnoticeid)
WHERE cm.isstageinitiated='Y' order by vc.id desc");
	$video_conference_email = DB::select("select * from video_conferencing_emails order by id desc");

	$rows = '';
  $rows = [
    'video_conference_header' =>$video_conference_header,
    'video_conference_email' =>$video_conference_email
  ];

  return $rows;

}


public static function getvideo_conferencebyid($id)
{
	$video_conference_header = DB::select("select cm.claimnoticeno,cac.arbitration_petionno,vc.* from video_conferencing vc
INNER JOIN claimantnotice cm ON (cm.id = vc.claim_notice_id)
INNER JOIN claimnotice_petion_arbitrationno cac ON (cm.id = cac.claimnoticeid)
WHERE cm.isstageinitiated='Y' and vc.id = ".$id." order by vc.id desc");
	$video_conference_email = DB::select("select * from video_conferencing_emails where video_conferencing_link_id =".$id." order by id desc");

	$rows = '';
  $rows = [
    'video_conference_header' =>$video_conference_header,
    'video_conference_email' =>$video_conference_email
  ];

  return $rows;

}




}