<?php

namespace Modules\Api\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function healthy()
    {
        echo 'Success';
        die;
    }
}
