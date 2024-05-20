<?php

namespace Modules\Pages\Http\Controllers;

use App\Helpers\Helpers;
use App\Services\Clients\CommonService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostsController extends Controller
{
    private $commonSetting;

    public function __construct(CommonService $commonSetting)
    {
        $this->commonSetting = $commonSetting;
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($slug)
    {
        try {
            $data['commonSetting'] = $this->commonSetting->commonDataSite(['active' => 'home']);
            $data['common'] = Helpers::metaHead(!empty($data['commonSetting']['setting']) ? $data['commonSetting']['setting'] : []);
            return view('pages::posts.show')->with('data', $data);
        } catch (\Exception $e) {
            abort(500);
        }
    }
}
