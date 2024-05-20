<?php

namespace App\Repositories\Photos;

use App\Models\Photo;
use App\Repositories\BaseRepository;

class PhotoRepository extends BaseRepository implements PhotoRepositoryInterface
{

    public function getModel()
    {
        return Photo::class;
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

        $model = $model->orderBy(!empty($params['orderField']) ? $params['orderField'] : 'id', !empty($params['orderType']) ? $params['orderType'] : \dataQuery::ORDER);
        return $model;
    }

}
