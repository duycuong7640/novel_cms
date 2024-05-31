<?php

namespace App\Repositories\ProductUserLibraries;

use App\Helpers\Helpers;
use App\Models\Product;
use App\Models\ProductUserLibrary;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class ProductUserLibraryRepository extends BaseRepository implements ProductUserLibraryRepositoryInterface
{

    public function getModel()
    {
        return ProductUserLibrary::class;
    }

    public function apiGetAll($_params)
    {
        $_params = Helpers::paramsInjection($_params);
        $query = $this->model;
        $query = self::apiGetAllGenerateConditionFind($_params, $query);
        if (!empty($_params['paginate'])) {
            return $query->paginate(!empty($_params['paginate']) ? $_params['paginate'] : \dataQuery::LIMIT);
        }
        return $query->limit(!empty($params['limit']) ? $params['limit'] : \dataQuery::LIMIT)->get();
    }

    public static function apiGetAllGenerateConditionFind($params, $model)
    {
        if (!empty($params['user_id'])) $model = $model->where('user_id', $params['user_id']);
        $model = $model->where('status', \dataCategory::ACTIVE);
        $model = $model->orderBy(!empty($params['orderField']) ? $params['orderField'] : 'id', !empty($params['orderType']) ? $params['orderType'] : \dataQuery::ORDER_ASC);
        return $model;
    }

    public function apiGetAllList($_params){
        return $this->model->select('product_id')->where('user_id', $_params['user_id'])->pluck('product_id');
    }

    public function apiGetDetail($_slug)
    {
        return $this->model->where('status', \dataCategory::ACTIVE)->where('slug', $_slug)->first();
    }
}
