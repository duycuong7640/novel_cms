<?php

namespace Modules\Pages\Http\Controllers;

use App\Helpers\Helpers;
use App\Services\Clients\CommonService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoriesController extends Controller
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
            return view('pages::products.index')->with('data', $data);
        } catch (\Exception $e) {
            abort(500);
        }
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function library()
    {
        try {
            $data['commonSetting'] = $this->commonSetting->commonDataSite(['active' => 'home']);
            $data['common'] = Helpers::metaHead(!empty($data['commonSetting']['setting']) ? $data['commonSetting']['setting'] : []);
            return view('pages::products.library')->with('data', $data);
        } catch (\Exception $e) {
            abort(500);
        }
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function ranking()
    {
        try {
            $data['commonSetting'] = $this->commonSetting->commonDataSite(['active' => 'home']);
            $data['common'] = Helpers::metaHead(!empty($data['commonSetting']['setting']) ? $data['commonSetting']['setting'] : []);
            return view('pages::products.ranking')->with('data', $data);
        } catch (\Exception $e) {
            abort(500);
        }
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function categories()
    {
        try {
            $data['commonSetting'] = $this->commonSetting->commonDataSite(['active' => 'home']);
            $data['common'] = Helpers::metaHead(!empty($data['commonSetting']['setting']) ? $data['commonSetting']['setting'] : []);
            return view('pages::products.categories')->with('data', $data);
        } catch (\Exception $e) {
            abort(500);
        }
    }
}
