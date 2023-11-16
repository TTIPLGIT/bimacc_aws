<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class MainscreenController extends Controller
{
    public function index()
    {
        $module_name = DB::select("SELECT * FROM module_name ");
        $faq = DB::select("SELECT * FROM faq where flag=0");

        $modules = DB::select("select DISTINCT a.module_name as modulename , a.id as id from module_name as a            
        Inner Join  faq as b on b.module_id=a.id where b.flag=0 and b.status=0"); 

        return view('mainscreen',compact('module_name','faq','modules'));
    }
 

    public function about_us()
    { 
        return view('about_us');
    }
    public function privacypolicy()
    { 
        return view('privacypolicy');
    }
    public function terms()
    { 
        return view('terms');
    }
    public function userfaq()
    {
        $module_name = DB::select("SELECT * FROM module_name ");
        $faq = DB::select("SELECT * FROM faq where flag=0");

        $modules = DB::select("select DISTINCT a.module_name as modulename , a.id as id from module_name as a            
        Inner Join  faq as b on b.module_id=a.id where b.flag=0 and b.status=0"); 

        return view('userfaqscreen',compact('module_name','faq','modules'));
    }
}
