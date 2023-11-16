<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Crypt;
use Log;
use Redirect;
use Session; 
use FlashMessages;


class BaseController extends Controller
{

 
   public function sendLog($method, $code, $message, $line, $file)
    {
        try{
            Log::error($method.': ['.$code.'] "'.$message.'" on line '.$line.' of file '.$file);
             
            return $this->sendError('Exception Error.', '['.$code.'] "'.$message.'" on line '.$line.' of file '.$file, 400);
        }catch(\Exception $exc){
            Log::error('[Decrypt data error => '.$exc->getCode().'] "'.$exc->getMessage().'" on line '.$exc->getTrace()[0]['line'].' of file '.$exc->getTrace()[0]['file']); 
        }
    }
}
