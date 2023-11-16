<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\models\FAQ_module;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class FAQ_moduleController extends Controller
{
    public function index()
    {
        $user_id = (auth()->check()) ? auth()->user()->id : null;
        if ( $user_id==null)
        { 
          return view('auth.login');
        }
        $module_name = DB::select("SELECT * FROM module_name WHERE status=0 ");

        return view('FAQ_module.index',compact('module_name'));
    }
    
        
    public function create()
      {   
        try{
            $method = 'Method => FAQ_moduleController => create';
    
          return view('FAQ_module.create');
        }
        catch(Exception $exc)
        {
                 Log::error('[Method => FAQ_moduleController =>  Error Code:'.$exc.'::'.auth()->user()->id.']');
        }
      }
    
    public function store(Request $request )
    {
       try{
        $method = 'Method => FAQ_moduleController => store';
       
        $FAQ_module = new FAQ_module();
        $FAQ_module->module_name = $request->module_name;
        $FAQ_module->user_id = $request->user_id ;
        $FAQ_module->save();


          return redirect()->route('FAQ_module.index')->with('success','Module Added Sucessfully');
          }
        catch(Exception $exc)
          {
          Log::error('[Method => FAQ_moduleController =>  Error Code:'.$exc.'::'.auth()->user()->id.']');
          }
    }

    public function edit($id)
     {
            
        try{
            $method = 'Method => FAQ_moduleController => edit';             
            $module_name = FAQ_module::findOrFail($id);      
            return view('FAQ_module.edit', compact('module_name'));
            }
        catch(Exception $exc)
            {
              Log::error('[Method => FAQ_moduleController =>  Error Code:'.$exc.'::'.auth()->user()->id.']');
            }
       
     }




     public function update(Request $request, $id = null)
     {
        try{
         $method = 'Method => FAQ_moduleController => update';
         $user_id=auth()->user()->id;

           DB::table('module_name')
           ->where(['id'=>$id])
           ->update([                     
               'module_name'=>$request->module_name,
               ]);
             
           return redirect(route('FAQ_module.index'))->with('success', 'Module Name updated successfully');             
          }
          catch(Exception $exc)
              {
                 Log::error('[Method => FAQ_moduleController =>  Error Code:'.$exc.'::'.auth()->user()->id.']');
              }
  
     }


    public function show($id )
    {
        try{
            $method = 'Method => FAQ_moduleController => show';     
            $module_name = module_name::findOrFail($id);       
            return view('FAQ_module.show', compact('module_name'));
              
          }
           catch(Exception $exc)
            {
              Log::error('[Method => FAQ_moduleController =>  Error Code:'.$exc.'::'.auth()->user()->id.']');
            }
       
    }

    public function destroy($id)
    {
      DB::update("update module_name set status=1 where id='$id'");

        return redirect()->route('FAQ_module.index')
                        ->with('success','Module Deleted Successfully.');
    }

}
