<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll($params);

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Get one
     * @return mixed
     */
    public function findFirstDESC();

    /**
     * Get one
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findByColumn($column, $value);

    /**
     * Get one
     * @param $uuid
     * @return mixed
     */
    public function findByUUID($uuid);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = []);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, $attributes = []);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
