<?php

namespace App\Repositories\Posts;

use App\Models\Post;
use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{

    public function getModel()
    {
        return Post::class;
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

}
