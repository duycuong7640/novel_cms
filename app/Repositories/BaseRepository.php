<?php

namespace App\Repositories;

use App\Helpers\Helpers;
use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll($params)
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findFirstDESC()
    {
        return $this->model->orderBy('id', 'DESC')->first();
    }

    public function findByColumn($column, $value)
    {
        return $this->model->where($column, $value)->first();
    }

    public function findByUUID($id)
    {
        return $this->model->where('uuid', $id)->first();
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->findByUUID($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
