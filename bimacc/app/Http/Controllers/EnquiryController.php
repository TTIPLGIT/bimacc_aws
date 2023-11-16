<?php

namespace App\Http\Controllers;

class EnquiryController extends Controller
{

  public function index()
  {
    $cid = '2862';
    $rid = rand(9999, 999999);
    $crn = '123456';
    $ver = '1.0';
    $typ = 'Test';

    define('POST_URL', "https://uat-etendering.axisbank.co.in/easypay2.0/frontend/index.php/api/enquiry");
    define('CHECKSUM_KEY', 'axis');
    define('ENCRYPTION_KEY', 'axisbank12345678');


    $ep = new EasyPayController(POST_URL,CHECKSUM_KEY,ENCRYPTION_KEY);
    $result = $ep->callEasyPayEnquiry($cid, $rid, $crn, $ver, $typ);
    echo '<pre>';
    print_r($result);

}
}