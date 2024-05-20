<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function getModel()
    {
        return User::class;
    }

    public function getAll($params)
    {
        $query = $this->model;
        $query = self::generateConditionFind($params, $query);
        if (!empty($params['paginate'])) return $query->paginate(!empty($params['paginate']) ? $params['paginate'] : $this->defaultEntry['PAGE']['LIMIT']);
        return $query->limit(!empty($params['limit']) ? $params['limit'] : $this->defaultEntry['PAGE']['LIMIT'])->get();
    }

    public static function generateConditionFind($params, $model)
    {
        foreach ($model->fillableSearch as $r) {
            if (!empty($params[$r])) {
                $model = $model->where($r, $params[$r]);
            }
        }

        foreach ($model->fillableSearchLike as $r) {
            if (!empty($params[$r])) {
                $model = $model->where($r, 'LIKE', '%' . $params[$r] . '%');
            }
        }

        foreach ($model->fillableSearchIn as $r) {
            if (!empty($params[$r])) {
                $model = $model->whereIn($r, $params[$r]);
            }
        }

        $model = $model->orderBy(!empty($params['orderField']) ? $params['orderField'] : 'id', !empty($params['orderType']) ? $params['orderType'] : 'DESC');
        return $model;
    }

}
