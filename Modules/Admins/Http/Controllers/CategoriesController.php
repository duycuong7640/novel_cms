<?php

namespace Modules\Admins\Http\Controllers;

use App\Helpers\Helpers;
use App\Services\Admins\CategoryService;
use App\Services\Common\CommonCategoryService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Modules\Admins\Http\Requests\Category\CreateRequest;
use Modules\Admins\Http\Requests\Category\EditRequest;

class CategoriesController extends Controller
{

    private $categoryService;
    private $commonCategoryService;

    public function __construct(CategoryService $categoryService, CommonCategoryService $commonCategoryService)
    {
        $this->categoryService = $categoryService;
        $this->commonCategoryService = $commonCategoryService;
    }

    /**
     * Category index
     * @method GET
     */
    public function index()
    {
        try {
            $data['common'] = Helpers::titleAction([\adminForm::FORM_HEAD['INDEX']]);
            $data['list'] = $this->categoryService->getList(['paginate' => \dataQuery::LIMIT, 'type' => \dataCategory::TYPE]);
            $data['category'] = $this->commonCategoryService->getListMenu(['type' => \dataCategory::TYPE, 'parent_id' => [(request()->has('parent_id') ? request()->get('parent_id') : '')]]);
            $data['multi'] = $this->commonCategoryService->getListMenu(['multi' => true]);
            return view('admins::categories.index', ['data' => $data]);
        } catch (\Exception $e) {Helpers::pre($e->getMessage());
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
            $data['category'] = $this->commonCategoryService->getListMenu(['type' => \dataCategory::TYPE]);
            return view('admins::categories.create', ['data' => $data]);
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
            if ($this->categoryService->create($_params)) {
                return redirect(route('admin.category.index'));
            } else {
                $errors = new MessageBag(['error' => \adminNotify::FAIL]);
                return back()->withInput($_params)->withErrors($errors);
            }
        } catch (\Exception $e) {
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
            $data['detail'] = $this->categoryService->find($id);
            if (empty($data['detail']->id)) return abort(404);
            $data['category'] = $this->commonCategoryService->getListMenu(['type' => \dataCategory::TYPE, 'multi' => true, 'parent_id' => [$data['detail']->parent_id]]);
            return view('admins::categories.edit', ['data' => $data]);
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
            $detail = $this->categoryService->find($id);
            if (empty($detail->id)) return abort(404);

            $_params = $request->all();
            if ($this->categoryService->update($detail, $_params)) {
                session()->flash('success', \adminNotify::SUCCESS);
                return redirect(route('admin.category.index', ['page' => (!empty($_GET['page']) ? $_GET['page'] : 1), 'parent_id' => (request()->has('parent_id') ? request()->get('parent_id') : '')]));
            } else {
                $errors = new MessageBag(['error' => \adminNotify::FAIL]);
                return back()->withInput($_params)->withErrors($errors);
            }
        } catch (\Exception $e) {
            Helpers::pre($e->getMessage());
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
            $detail = $this->categoryService->find($id);
            if (empty($detail->id)) return abort(404);

            if ($this->categoryService->update($detail->uuid, [$status => ($detail->$status ? \dataCategory::DE_ACTIVE : \dataCategory::ACTIVE)])) {
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
//    public function destroy($id)
//    {
//        try {
//            $detail = $this->categoryService->find($id);
//            if (empty($detail->id)) return abort(404);
//
//            if (in_array($id, [])) {
//                session()->flash('error', \adminNotify::CANNOT_DELETE);
//                return back();
//            }
//            if ($this->categoryService->destroy($id)) {
//                session()->flash('success', \adminNotify::SUCCESS);
//            } else {
//                session()->flash('error', \adminNotify::FAIL);
//            }
//            return back();
//        } catch (\Exception $e) {
//            return !empty($e->getMessage()) ? abort('500') : abort(404);
//        }
//    }
}
