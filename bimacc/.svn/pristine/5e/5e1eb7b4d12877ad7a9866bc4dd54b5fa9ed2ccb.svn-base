<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\models\FAQ;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $user_id = (auth()->check()) ? auth()->user()->id : null;
        if ( $user_id==null)
        { 
          return view('auth.login');
        }

        $FAQ = DB::select("SELECT * FROM faq ");

        $FAQ_module = DB::select("select a.*,b.*,a.module_name as modulename from module_name as a            
        Inner Join  faq as b on b.module_id=a.id where a.status=0 and b.status=0"); 
     

        $module_name = DB::select("select * from module_name  where status=0");

        return view('FAQ.index',compact('FAQ','module_name','FAQ_module'));
    }
    
        
    public function create()
      {   
        try{
            $method = 'Method => FAQController => create';
    
          return view('FAQ.create');
        }
        catch(Exception $exc)
        {
                 Log::error('[Method => FAQController =>  Error Code:'.$exc.'::'.auth()->user()->id.']');
        }
      }
    
    public function store(Request $request )
    {
       try{
        $method = 'Method => FAQController => store';
       
        // $user_id =  auth()->user()->id ;   
        // $module=DB::select("select * from module_name where module_name= ".$request->module_name." and flag=0");
        // $module_id= $module[0]->id;


        $FAQ = new FAQ();
        $FAQ->module_id = $request->module_name;
        $FAQ->question = $request->question;
        $FAQ->answer = $request->answer;
        $FAQ->user_id = $request->user_id ;
        // $FAQ->module_id=$module_id;

        $FAQ->save();


          return redirect()->route('FAQ.index')->with('success','FAQ Added Sucessfully');
          }
        catch(Exception $exc)
          {
          Log::error('[Method => FAQController =>  Error Code:'.$exc.'::'.auth()->user()->id.']');
          }
    }

    public function edit($id)
    {
           
       try{
           $method = 'Method => FAQController => edit';    
           $FAQ = FAQ::findOrFail($id);      
           return view('FAQ.edit', compact('FAQ'));
           }
       catch(Exception $exc)
           {
             Log::error('[Method => FAQController =>  Error Code:'.$exc.'::'.auth()->user()->id.']');
           }
      
    }




    public function update(Request $request, $id = null)
    {
       try{
        $method = 'Method => FAQController => update';
        $user_id=auth()->user()->id;

          DB::table('faq')
          ->where(['id'=>$id])
          ->update([                     
              'module_id'=>$request->module_name,
              'question'=>$request->question,
              'answer'=>$request->answer,

              ]);
            
          return redirect(route('FAQ.index'))->with('success', 'FAQ updated successfully');             
         }
         catch(Exception $exc)
             {
                Log::error('[Method => FAQController =>  Error Code:'.$exc.'::'.auth()->user()->id.']');
             }
 
    }


   public function show($id )
   {
       try{
           $method = 'Method => FAQController => show';     
           $FAQ = faq::findOrFail($id);       
           return view('FAQ.show', compact('faq'));
             
         }
          catch(Exception $exc)
           {
             Log::error('[Method => FAQController =>  Error Code:'.$exc.'::'.auth()->user()->id.']');
           }
      
   }

   public function destroy($id)
   {
       DB::update("update faq set status=1 where id='$id'");

       return redirect()->route('FAQ.index')
                       ->with('success','FAQ Deleted Successfully.');
   }
  }
  
    
                

                
            
            
           