<?php

namespace Modules\Admins\Http\Controllers;

use App\Helpers\Helpers;
use App\Services\Admins\SettingService;
use Illuminate\Routing\Controller;
use Illuminate\Support\MessageBag;
use Modules\Admins\Http\Requests\Setting\EditRequest;

class SettingsController extends Controller
{

    private $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    /**
     * Category edit
     * @method GET
     */
    public function edit($id)
    {
        try {
            $data['common'] = Helpers::titleAction([\adminForm::FORM_HEAD['UPDATE']]);
            $data['detail'] = $this->settingService->find($id);
            return view('admins::settings.edit', ['data' => $data]);
        } catch (\Exception $e) {
            return !empty($e->getMessage()) ? abort('500') : abort(404);
        }
    }

    /**
     * Category update
     * @method POST
     */
    public function update(EditRequest $request, $id)
    {
        try {
            $detail = $this->settingService->find($id);
            if (empty($detail->id)) return abort(404);

            $_params = $request->all();
            if ($this->settingService->update($detail, $_params)) {
                session()->flash('success', \adminNotify::SUCCESS);
                return redirect(route('admin.setting.update', ['id' => $id]));
            } else {
                $errors = new MessageBag(['error' => \adminNotify::FAIL]);
                return back()->withInput($_params)->withErrors($errors);
            }
        } catch (\Exception $e) {
            Helpers::pre($e->getMessage());
            return !empty($e->getMessage()) ? abort('500') : abort(404);
        }
    }
}
