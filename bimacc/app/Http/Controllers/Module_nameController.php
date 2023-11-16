<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class Module_nameController extends Controller
{
    public function store(Request $request)
    {
     
     
        $module_name = $request->module_name;
        
        $test = "module_name";
        $test1 = "question";
        $test2 = "answer";

        $search = DB::table('module_name')
        ->where( 'module_name.module_name' , 'LIKE', '%' . $module_name . '%')
        ->get();

    

        $fa_search = DB::select("select * from faq");
        
        $response = [
            'search' => $search,
            'fa_search' => $fa_search,
            ];
     
       

        return $response;
    }


    public function moduleid(Request $request)
    {
         
        $mod_id = $request->mod_id;
        $moduleid=DB::select ("select * from faq where module_id= '$mod_id' ");

   return $moduleid;

       
    }




    public function faq_flag(Request $request)
{
       $flag_id=$request->f_id;
       $faqflag=DB::select("select * from faq where id='$flag_id'");
       $faqs=$faqflag[0]->flag;

       if($faqs == '1')
       {
        DB::table('faq')
        ->where('id',$request->f_id)
         ->update([
          'flag'=>'0',
              ]); 
       }
       else{
        DB::table('faq')
        ->where('id',$request->f_id)
         ->update([
          'flag'=>$request->is_active,
              ]); 
       }
       $faq_flag=DB::select("select * from faq where id='$flag_id'");
       $active=$faq_flag[0]->flag;
       return $active;

}
}

