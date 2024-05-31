<?php

namespace App\Repositories\Products;

use App\Helpers\Helpers;
use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    public function getModel()
    {
        return Product::class;
    }

    public function getAll($params)
    {
        $query = $this->model;
        $query = self::generateConditionFind($params, $query);
        if (!empty($params['paginate'])) return $query->paginate(!empty($params['paginate']) ? $params['paginate'] : \dataQuery::LIMIT);
        return $query->limit(!empty($params['limit']) ? $params['limit'] : \dataQuery::LIMIT)->get();
    }

    public static function generateConditionFind($params, $model)
    {
        foreach ($model->fillableSearchLike as $r) {
            if (!empty($params[$r])) {
                $model = $model->where($r, 'LIKE', '%' . $params[$r] . '%');
            }
        }

        $parent_id = !empty($params['parent_id']) ? $params['parent_id'] : '';
        $model = $model->when($parent_id, function ($query, $parent_id) {
            return $query->whereIn('category_id', $parent_id);
        });

        $model = $model->orderBy(!empty($params['orderField']) ? $params['orderField'] : 'id', !empty($params['orderType']) ? $params['orderType'] : \dataQuery::ORDER);
        return $model;
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
        if (!empty($params['type'])) {
            $model = $model->where('type', $params['type']);
        }
        $model = $model->where('total_chap', '>', 0);
        if (!empty($params['category_id'])) {
            $model = $model->whereIn('category_id', $params['category_id']);
        }
        $model = $model->where('status', \dataCategory::ACTIVE);
        if (isset($params['isContent'])) {
            $model = $model->select('id', 'uuid', 'title', 'slug', 'thumbnail', 'category_id', 'total_chap', 'view', 'rate', 'status', 'created_at', 'updated_at');
        } else {
            $model = $model->select('id', 'uuid', 'title', 'slug', 'thumbnail', 'content', 'category_id', 'total_chap', 'view', 'rate', 'status', 'created_at', 'updated_at');
        }
        $model = $model->orderBy(!empty($params['orderField']) ? $params['orderField'] : 'id', !empty($params['orderType']) ? $params['orderType'] : \dataQuery::ORDER_ASC);
        return $model;
    }

    public function apiGetAllSearch($_params)
    {
        $_params = Helpers::paramsInjection($_params);
        $query = $this->model;
        $query = self::apiGetAllSearchGenerateConditionFind($_params, $query);
        if (!empty($_params['paginate'])) {
            return $query->paginate(!empty($_params['paginate']) ? $_params['paginate'] : \dataQuery::LIMIT);
        }
        return $query->limit(!empty($params['limit']) ? $params['limit'] : \dataQuery::LIMIT)->get();
    }

    public static function apiGetAllSearchGenerateConditionFind($params, $model)
    {
        $model = $model->where('total_chap', '>', 0);
        $model = $model->where('title', 'like', '%' . $params['keyword'] . '%');
        $model = $model->where('status', \dataCategory::ACTIVE);
        $model = $model->select('id', 'uuid', 'title', 'slug', 'thumbnail', 'content', 'category_id', 'total_chap', 'view', 'rate', 'status', 'created_at', 'updated_at');
        $model = $model->orderBy(!empty($params['orderField']) ? $params['orderField'] : 'id', !empty($params['orderType']) ? $params['orderType'] : \dataQuery::ORDER_ASC);
        return $model;
    }

    public function apiGetDetail($_slug)
    {
        return $this->model->where('status', \dataCategory::ACTIVE)->where('slug', $_slug)->first();
    }

    public function apiGetNewTop($_params)
    {
        $_params = Helpers::paramsInjection($_params);
        $query = $this->model;
        $query = self::apiGetNewTopGenerateConditionFind($_params, $query);
        return $query->limit(!empty($params['limit']) ? $params['limit'] : \dataQuery::LIMIT)->get();
    }

    public static function apiGetNewTopGenerateConditionFind($params, $model)
    {
        $model = $model->where('status', \dataCategory::ACTIVE);
        $model = $model->select('id', 'uuid', 'title', 'slug', 'thumbnail', 'category_id', 'total_chap', 'status', 'created_at', 'updated_at');
        $model = $model->orderBy('view', \dataQuery::ORDER);
        return $model;
    }

    public function apiGetRankingDay($_params)
    {
        $_params = Helpers::paramsInjection($_params);
        $query = $this->model->select('id', 'uuid', 'title', 'slug', 'thumbnail', 'category_id', 'total_chap', 'rate', 'view', 'status', 'created_at', 'updated_at')->orderByRaw('RAND()');
        return $query->limit(5)->get();
    }

    public function apiGetRankingWeek($_params)
    {
        $_params = Helpers::paramsInjection($_params);
        $query = $this->model->select('id', 'uuid', 'title', 'slug', 'thumbnail', 'category_id', 'total_chap', 'rate', 'view', 'status', 'created_at', 'updated_at')->orderByRaw('RAND()');
        return $query->limit(5)->get();
    }

    public function apiGetRankingMonth($_params)
    {
        $_params = Helpers::paramsInjection($_params);
        $query = $this->model->select('id', 'uuid', 'title', 'slug', 'thumbnail', 'category_id', 'total_chap', 'rate', 'view', 'status', 'created_at', 'updated_at')->orderByRaw('RAND()');
        return $query->limit(5)->get();
    }

    public function apiGetRecommendations($_params)
    {
        $_params = Helpers::paramsInjection($_params);
        $query = $this->model->select('id', 'uuid', 'title', 'slug', 'thumbnail', 'category_id', 'total_chap', 'rate', 'view', 'status', 'created_at', 'updated_at')->orderByRaw('RAND()');
        return $query->limit(16)->get();
    }

}
