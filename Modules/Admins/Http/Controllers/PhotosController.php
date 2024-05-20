<?php

namespace Modules\Admins\Http\Controllers;

use App\Helpers\FormatDataHelpers;
use App\Helpers\Helpers;
use App\Services\Admins\PhotoService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\MessageBag;
use Modules\Admins\Http\Requests\Photo\CreateRequest;
use Modules\Admins\Http\Requests\Photo\EditRequest;

class PhotosController extends Controller
{

    private $photoService;
    private $type;

    public function __construct(PhotoService $photoService)
    {
        $this->photoService = $photoService;
        $this->type = \dataPhoto::TYPE;
    }

    /**
     * Category index
     * @method GET
     */
    public function index()
    {
        try {
            $data['common'] = Helpers::titleAction([\adminForm::FORM_HEAD['INDEX']]);
            $data['list'] = FormatDataHelpers::formatListAdmin($this->photoService->getList(['paginate' => \dataQuery::LIMIT]), \dataKey::LOGO);
            return view('admins::photos.index', ['data' => $data]);
        } catch (\Exception $e) {
            return !empty($e->getMessage()) ? abort('500') : abort(404);
        }
    }

    /**
     * Category add
     * @method GET
     */
    public function create()
    {
        try {
            $data['common'] = Helpers::titleAction([\adminForm::FORM_HEAD['CREATE']]);
            return view('admins::photos.create', ['data' => $data]);
        } catch (\Exception $e) {
            return !empty($e->getMessage()) ? abort('500') : abort(404);
        }
    }

    /**
     * Category store
     * @method POST
     */
    public function store(CreateRequest $request)
    {
        try {
            $_params = $request->all();
            if ($this->photoService->create($_params)) {
                return redirect(route('admin.photo.index'));
            } else {
                $errors = new MessageBag(['error' => \adminNotify::FAIL]);
                return back()->withInput($_params)->withErrors($errors);
            }
        } catch (\Exception $e) {Helpers::pre($e->getMessage());
            return !empty($e->getMessage()) ? abort('500') : abort(404);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admins::show');
    }

    /**
     * Category edit
     * @method GET
     */
    public function edit($id)
    {
        try {
            $data['common'] = Helpers::titleAction([\adminForm::FORM_HEAD['UPDATE']]);
            $data['detail'] = FormatDataHelpers::format($this->photoService->find($id), \dataKey::LOGO, 'admin', true);
            if (empty($data['detail']->id)) return abort(404);
            return view('admins::photos.edit', ['data' => $data]);
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
            $detail = $this->photoService->find($id);
            if (empty($detail->id)) return abort(404);

            $_params = $request->all();
            if ($this->photoService->update($detail->uuid, $_params)) {
                session()->flash('success', \adminNotify::SUCCESS);
                return redirect(route('admin.photo.index', ['page' => (!empty($_GET['page']) ? $_GET['page'] : 1), 'parent_id' => (request()->has('parent_id') ? request()->get('parent_id') : '')]));
            } else {
                $errors = new MessageBag(['error' => \adminNotify::FAIL]);
                return back()->withInput($_params)->withErrors($errors);
            }
        } catch (\Exception $e) {
            return !empty($e->getMessage()) ? abort('500') : abort(404);
        }
    }

    /**
     * Category status
     * @method GET
     */
    public function status($id, $status)
    {
        try {
            $detail = $this->photoService->find($id);
            if (empty($detail->id)) return abort(404);

            if ($this->photoService->update($detail->uuid, [$status => ($detail->$status ? \dataPhoto::DE_ACTIVE : \dataPhoto::ACTIVE)])) {
                session()->flash('success', \adminNotify::SUCCESS);
            } else {
                session()->flash('error', \adminNotify::FAIL);
            }
            return back();
        } catch (\Exception $e) {
            return !empty($e->getMessage()) ? abort('500') : abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $detail = $this->photoService->find($id);
            if (empty($detail->id)) return abort(404);

            if (in_array($id, [])) {
                session()->flash('error', \adminNotify::CANNOT_DELETE);
                return back();
            }
            if ($this->photoService->destroy($id)) {
                session()->flash('success', \adminNotify::SUCCESS);
            } else {
                session()->flash('error', \adminNotify::FAIL);
            }
            return back();
        } catch (\Exception $e) {
            return !empty($e->getMessage()) ? abort('500') : abort(404);
        }
    }
}
