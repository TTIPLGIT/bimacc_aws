<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::post('webLoginPost', 'Auth\LoginController@webLoginPost')->name('webLoginPost');

//Route::get('/webLoginPost', 'LoginController@webLoginPost')->name('webLoginPost');
Route::post('/login_role', 'Auth\LoginController@login_role')->name('login_role');
Route::post('/login_form', 'Auth\LoginController@login')->name('login_form'); 
// Route::post('/mail_verify', 'Auth\LoginController@mail_verify')->name('mail_verify');
Route::get('/mail_verify/{id}', 'Auth\LoginController@mail_verify')->name('mail_verify');

Route::get('/role', 'Auth\LoginController@role')->name('role');
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/claim/payment', 'PaymentController@index')->name('payment.index');
Route::post('/claim/payment/payumoney', 'PaymentController@payment')->name('payumoney.payment');
Route::post('/claim/payment/payumoney/success', 'PaymentController@success');
Route::post('/claim/payment/payumoney/failure', 'PaymentController@failure');

Route::get('/online/hearing', 'HearingController@index')->name('online.chat');
Route::get('/online/hearing/login/contact', 'HearingController@hearingLoginUserContact');
Route::get('/online/hearing/contacts', 'HearingController@conversationContacts');
Route::get('/online/hearing/getting_claim', 'HearingController@getting_claimpetition');
Route::get('/online/hearing/conversation/{user_id}/{claim_id}', 'HearingController@getConversations');
Route::post('/online/hearing/send/message', 'HearingController@saveConversation');
Route::post('/online/hearing/user/access', 'HearingController@setUserAccess');
Route::post('/online/hearing/send/attachment', 'HearingController@setAttachment');
Route::post('/online/hearing/display/typing/message', 'HearingController@setTypingMessage');

Route::get('logout', array('uses' => 'HomeController@doLogout'));
Route::get('/centres', 'HomeController@index')->name('centres');
Route::get('/claiments', 'HomeController@index')->name('claiments');

Route::resource('/disputecategory','DisputeCategoryController');
Route::resource('/disputesubcategory','DisputeSubcategoryController');
Route::resource('/arbitrationmaster', 'ArbitrationMasterController');
Route::resource('/country','CountryController');
Route::resource('/securitytypes','SecurityTypesController');
Route::resource('/claimnotice','ClaimNoticeController');

Route::resource('/claimantlist','ClaimantsListController');
Route::resource('/misclaimantdetails','MisclaimantController');
Route::resource('/misrespondentdetails','MisrespondentController');
Route::resource('/misclaimnotice','MisclaimnoticeController');
Route::resource('/miscounter','MiscounterController');
Route::resource('/misclaimpetition','MisclaimpetitionController');
Route::resource('/respondentdetailupdate','RespondantCentreController');

Route::resource('/FAQ','FAQController');
Route::resource('/mainscreen','MainscreenController');
Route::get('/userfaq', 'MainscreenController@userfaq')->name('userfaq');
Route::resource('/FAQ_module','FAQ_moduleController');
Route::resource('/module_name','Module_nameController');
Route::post('moduleid','Module_nameController@moduleid')->name('moduleid');
Route::post('faq_flag','Module_nameController@faq_flag')->name('faq_flag');



Route::get('/about_us','MainscreenController@about_us')->name('about_us');
Route::get('/privacypolicy','MainscreenController@privacypolicy')->name('privacypolicy');

Route::get('/terms','MainscreenController@terms')->name('terms');




Route::resource('/videoconferencing','VideoConferencingController');
Route::get('videoconferencing/getemail/{id}', 'VideoConferencingController@getemail');
Route::get('videoconferencing/getemail_repay/{id}', 'VideoConferencingController@getemail_repay');
Route::get('videoconferencing/getlateststage/{id}', 'VideoConferencingController@getlateststage');
Route::post('/ClaimPetion/amendupdate/', 'ClaimPetionController@amendupdate')->name('ClaimPetion.amendupdate');
Route::post('/ClaimPetion/resamendupdate/', 'ClaimPetionController@resamendupdate')->name('ClaimPetion.resamendupdate');
Route::post('/claimnotice/amendupdate/', 'ClaimNoticeController@amendupdate')->name('claimnotice.amendupdate');
Route::post('/user/nameamendupdate/', 'UserController@nameamendupdate')->name('user.nameamendupdate, $user');
Route::post('/user/addressamendupdate/', 'UserController@addressamendupdate')->name('user.addressamendupdate, $user');

Route::post('/additionalfees', 'ClaimPetionController@additionalfees')->name('claimpetion.additionalfees');



Route::post('/claimantrespondantaccess/amendupdate/', 'ClaimantrespondantaccessController@amendupdate')->name('claimantrespondantaccess.amendupdate');
Route::post('/claimantrespondantaccess/disputedetail/', 'ClaimantrespondantaccessController@disputedetail')->name('claimantrespondantaccess.disputedetail');
Route::post('/claimantrespondantaccess/respondentfees/', 'ClaimantrespondantaccessController@respondentfees')->name('claimantrespondantaccess.respondentfees');


Route::post('/claimantrespondantaccess/detailsupdate/', 'ClaimantrespondantaccessController@detailsupdate')->name('claimantrespondantaccess.detailsupdate');
Route::Post('/payadminstrativefees', 'ClaimNoticeController@payadminstrativefees')->name('claimnotice.payadminstrativefees');
Route::Post('/payadminstrativefees_new', 'ClaimNoticeFeesController@payadminstrativefees_new')->name('claimfees.payadminstrativefees_new');
Route::get('/trash', 'ClaimNoticeController@trash')->name('claimnotice.trash');
Route::get('/trash_show/{id}', 'ClaimNoticeController@restore_show')->name('claimnotice.restore_show');
Route::get('/trash_restore/{id}', 'ClaimNoticeController@trash_restore')->name('claimnotice_restore');
Route::post('/payadminstrativefees_respondent', 'ClaimantrespondantaccessController@payadminstrativefees_respondent')->name('claimrespondent.payadminstrativefees_respondent');
//Route::get('/invoice/{id}', 'ClaimNoticeFeesController@invoice_list')->name('invoice_list'); 
//Route::get('/gettotal_outstandingamount','ClaimDetailsController@gettotal_outstandingamount');
Route::post('/claimdetails/savebankdetails', 'claimdetailscontroller@savebankdetails')->name('claimdetails.savebankdetails');
Route::post('/claimdetails/savebankdetails_counter', 'claimdetailscontroller@savebankdetails_counter')->name('claimdetails.savebankdetails_counter');
Route::post('/claimdetails/updatebankdetails', 'claimdetailscontroller@updatebankdetails')->name('claimdetails.updatebankdetails');
Route::post('/claimdetails/loanbank_details_update', 'claimdetailscontroller@loanbank_details_update')->name('claimdetails.loanbank_details_update');




Route::get('report/noticereport', 'ReportController@noticereport');
Route::get('report/petitionreport', 'ReportController@petitionreport');
Route::get('report/hearingreport', 'ReportController@hearingreport');
Route::get('report/videoreport', 'ReportController@videoreport');
Route::get('loan/delete_bankloan/{id}', 'claimdetailscontroller@delete_bankloan');
Route::get('/claimnotice/createnew/{id}', 'ClaimNoticeController@createnew')->name('createnew');
Route::resource('/claimantinformation','ClaimantInformationController');
Route::resource('/claimantregister','ClaimantRegisterController');
Route::resource('/claimantsnoticelist','ClaimentListController');
Route::get('/Initiatepayment/{id}', 'ClaimentListController@Initiatepayment')->name('Initiatepayment');
Route::get('/RespodentAccess/{id}', 'ClaimentListController@RespodentAccess')->name('RespodentAccess');
Route::resource('/arbitratorconfiguration', 'ArbitratorConfigurationController');
Route::get('/ArbitratorAllocation/{id}', 'ArbitratorConfigurationController@ArbitratorAllocation')->name('ArbitratorAllocation');


//PaymentFormDataController   GeneratePayment
Route::resource('/PaymentFormData','PaymentFormDataController');
//Aravinth claimantrespondantaccess
Route::get('/ClaimPetion/respodentclaimpetitionshow/{id}', 'ClaimPetionController@respodentclaimpetitionshow')->name('ClaimPetion.respodentclaimpetitionshow');

Route::get('/ClaimPetion/respodentclaimpetionindex/', 'ClaimPetionController@respodentclaimpetition')->name('ClaimPetion.respodentclaimpetition');
Route::get('/videoconferencing/list/arbitrator/', 'VideoConferencingController@arbitratorlist')->name('videoconferencing.arbitratorlist');

Route::get('/arbitartion/list/{id}', 'ArbitrationMasterController@arbitratorindex')->name('arbitrationmaster.arbitratorindex');


Route::resource('/claimantrespondantaccess','ClaimantrespondantaccessController');
Route::resource('/ArbitratorAllocatedClaims','ArbitratorAllocatedClaimsController');
Route::get('/getClaimNoticeDocumentDocuments/{id}', 'ClaimNoticeController@getClaimNoticeDocumentDocuments')->name('getClaimNoticeDocumentDocuments');
Route::get('/getclaimdetailsDocuments/{id}', 'ClaimNoticeController@getclaimdetailsDocuments')->name('getclaimdetailsDocuments');
// getClaimPetionStageDocuments 

Route::get('/getClaimNoticeDocumentDocumentss/{id}/{documenttype}', 'ClaimentListController@getClaimNoticeDocumentDocumentss')->name('getClaimNoticeDocumentDocumentss');
Route::resource('/ClaimNoticeStage','ClaimNoticeStageController');
Route::resource('/ClaimPetion','ClaimPetionController'); //AwardedClaimController
Route::resource('/ClaimPetition','ClaimPetitionController'); //ClaimPetitionController
Route::resource('/AwardedClaim','AwardedClaimController'); //AwardedClaimController
Route::post('/ClaimPetion/upload', 'ClaimPetionController@upload')->name('ClaimPetion.upload');
Route::post('/ClaimPetion/respondentupload', 'ClaimPetionController@respondentupload')->name('ClaimPetion.respondentupload');
Route::post('/ClaimPetion/remove', 'ClaimPetionController@remove')->name('ClaimPetion.remove');
Route::post('/ClaimPetion/respondentremove', 'ClaimPetionController@respondentremove')->name('ClaimPetion.respondentremove');
Route::get('/getClaimPetionStageDocuments/{id}', 'ClaimPetionController@getClaimPetionStageDocuments')->name('getClaimPetionStageDocuments');

Route::resource('/payadministationfees','ClaimNoticeFeesController');
Route::resource('/invoice','InvoiceController');


Route::get('uploadClaimDocument', ['as' => 'uploadClaimDocument', 'uses' => 'ClaimNoticeStageController@UploadClaimDocuments']);

//steephan
Route::resource('/claiment_type','ClaimentTypeController');
Route::resource('/claimant_respondant_type','ClaimantRespondantTypeController');
Route::resource('/loantype', 'LoanTypeController');

Route::get('/generateAccessToRespondant/{id}', 'ClaimantrespondantaccessController@generateAccessToRespondant')->name('generateAccessToRespondant');
Route::resource('/respondantinformation','RespondantInformationController');
Route::get('/getexistingmail','RespondantInformationController@getexistingmail');
Route::resource('/claimdetails','ClaimDetailsController');
Route::post('/claimdetails/updateClaimDetails', 'ClaimDetailsController@updateClaimDetails')->name('claimdetails.updateClaimDetails');
Route::post('/claimdetails/respondantclaim', 'ClaimDetailsController@respondantclaim')->name('claimdetails.respondantclaim');
Route::post('/claimdetails/loan_details', 'ClaimDetailsController@loan_details')->name('claimdetails.loan_details');
Route::post('/claimdetails/loan_details_update', 'ClaimDetailsController@loan_details_update')->name('claimdetails.loan_details_update');
Route::get('/gettotal_outstandingamount','ClaimDetailsController@gettotal_outstandingamount');
Route::get('/gettotal_outstandingamount_counter/{id}','ClaimDetailsController@gettotal_outstandingamount_counter');
Route::post('/claimdetails/loan_details_counter', 'ClaimDetailsController@loan_details_counter')->name('claimdetails.loan_details_counter');


Route::post('/reliefrequest/updatereliefrequest', 'ReliefRequestController@updatereliefrequest')->name('reliefrequest.updatereliefrequest');
Route::post('/reliefrequest/respondantrelief', 'ReliefRequestController@respondantrelief')->name('reliefrequest.respondantrelief');


Route::resource('/reliefrequest','ReliefRequestController');
Route::resource('/claimfees','ClaimFeesController');
// Route::resource('/claimantrespondantaccess/GenerateAccessToRespondant','ClaimantrespondantaccessController');
Route::resource('/administrationfees','AdministrationFeesController');
Route::get('/get-dispute-list','HomeController@getDisputeList');
Route::post('/put-dispute-list','HomeController@putDisputeList');
Route::resource('/registrationfees', 'RegistrationFeesController');
Route::resource('/arbitratorallocationfees', 'ArbitratorAllocationFeesController');
Route::resource('/claimantslist', 'ClaimantsListController');

Route::resource('/respondantlist', 'RespondantListController');

// Route::get('/claimdetails/edit/{id}','ClaimDetailsController@edit');

// Route::get('/', function () {
//     return view('index');
// });

// Auth::routes();


Route::get('/sendnotification', 'HomeController@sendNotification');

Route::get('markAsRead', function(){
	Auth::user()->unreadNotifications->markAsRead();
	redirect()->back();
})->name('markRead');

Route::get('users',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);

Route::get('/notifications', 'NotificationsController@index')->name('notifications');
Route::get('/notifications/{id}','NotificationsController@show');


Route::get('/notification/read/{id}', 'NotificationsController@read')->name('notification.read');

Route::get('/notification/reading/{notificationId}/{id}', 'NotificationsController@reading')->name('notification.reading');

Route::resource('/loantype', 'LoanTypeController');

//REPORT
Route::get('report/typeofdisputereport', 'ReportController@typeofdisputereport');
Route::post('/gettypeofSubdisputereport','ReportController@gettypeofSubdisputereport')->name('/gettypeofSubdisputereport');
Route::get('report/domesticrevenuereport', 'ReportController@domesticrevenuereport');
Route::post('/registrationfeesreport','ReportController@registrationfeesreport')->name('/registrationfeesreport');
Route::post('/adminandarbitratorfeesreport','ReportController@adminandarbitratorfeesreport')->name('/adminandarbitratorfeesreport');
Route::post('/yearwisereport','ReportController@yearwisereport')->name('/yearwisereport');

Route::get('/hearingconversationreport/{id}', 'ReportController@hearingconversationreport')->name('hearingconversationreport');

Route::get('report/durationreport', 'ReportController@durationreport');

Route::get('report/totalclaimnoticereport', 'ReportController@totalclaimnoticereport');
Route::get('report/totalnoticedraftreport', 'ReportController@totalnoticedraftreport');
Route::get('report/totalnoticesendreport', 'ReportController@totalnoticesendreport');
Route::get('report/totalnoticeawaitreport', 'ReportController@totalnoticeawaitreport');
Route::get('report/totalnoticeclosedreport', 'ReportController@totalnoticeclosedreport');
Route::get('report/totalnoticefiledreport', 'ReportController@totalnoticefiledreport');
Route::get('report/totalnoticependingreport', 'ReportController@totalnoticependingreport');
Route::get('report/totalnoticedisposedreport', 'ReportController@totalnoticedisposedreport');

Route::get('report/totalclaimpetitionreport', 'ReportController@totalclaimpetitionreport');



// Razorpay

Route::get('razorpay-payment', 'ClaimFeesController@razorpayindex');
// Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']); 
Route::post('razorpay-payment', 'ClaimFeesController@razorpayment')->name('razorpay.payment.store');


// 











