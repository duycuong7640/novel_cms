<?php

namespace Modules\Pages\Http\Controllers;

use App\Helpers\Helpers;
use App\Services\Clients\CommonService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    private $commonSetting;

    public function __construct(CommonService $commonSetting)
    {
        $this->commonSetting = $commonSetting;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        try {
            $data['commonSetting'] = $this->commonSetting->commonDataSite(['active' => 'home']);
            $data['common'] = Helpers::metaHead(!empty($data['commonSetting']['setting']) ? $data['commonSetting']['setting'] : []);
            return view('pages::index')->with('data', $data);
        } catch (\Exception $e) {
            abort(500);
        }
    }

}
