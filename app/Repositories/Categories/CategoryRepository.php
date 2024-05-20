<?php

namespace App\Repositories\Categories;

use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    public function getModel()
    {
        return Category::class;
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
            return $query->where('parent_id', $parent_id);
        });

        $model = $model->orderBy(!empty($params['orderField']) ? $params['orderField'] : 'id', !empty($params['orderType']) ? $params['orderType'] : \dataQuery::ORDER);
        return $model;
    }

    public function getListMenu($_data)
    {
        $type = !empty($_data['type']) ? $_data['type'] : '';

        $query = $this->model->select('id', 'title', 'parent_id', 'type', 'slug', 'fontawesome_icon')
            ->when($type, function ($query, $type) {
                return $query->whereIn('type', $type);
            })
            ->where('status', \dataCategory::ACTIVE)
            ->orderBy('rank', \dataQuery::ORDER_ASC);
        return $query->get();
    }

    public function findListParentId($_id)
    {
        return $this->model->select('id', 'title')->where('parent_id', $_id)->where('status', \dataCategory::ACTIVE)->get();
    }

}
