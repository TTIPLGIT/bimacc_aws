<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ModalController extends Controller
{
    function createarbitratormaster() 
    {
        return view('modals.createArbitrationMasterModal');
    }
}
