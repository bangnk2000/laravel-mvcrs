<?php

namespace App\Repositories;


class BaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function makeModel()
    {
        $this->model = app()->make($this->model());
    }

    /*
    |--------------------------------------------------------------------------
    | These functions below is a wrapper of model's basic functions
    |--------------------------------------------------------------------------
    */

    /**
     * find all
     *
     * @param array $columns
     * @return Collection
     */
    public function all($columns = array('*'))
    {
        return $this->model->all($columns);
    }

     /**
     * Retrieve all data of repository, paginated
     * @param null $limit
     * @param array $columns
     * @return
     */
    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 10) : $limit;

        return $this->model->paginate($limit, $columns);
    }

    /**
     * find all of paginated
     *
     * @return Collection
     */
    public function getWithPaginate()
    {
        return $this->model->latest()->paginate(5);
    }

    /**
     * pluck function
     *
     * @param string $column
     * @param string $key
     * @param string $sortColumn
     * @param string $direction
     * @return Collection
     */

     public function pluck($column, $key = null, $sortColumn = null, $direction = 'asc')
     {
        $key = $key ?: 'id';
        $sortColumn = $sortColumn ?: 'id';

        return $this->model->orderBy($sortColumn, $direction)->pluck($column, $key);
     }

    /**
     * findById function
     *
     * @param int|string $id
     * @param array $columns
     * @return Object | Exception
     */
    public function findById($id, $columns = array('*'))
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * findWhere function
     *
     * @param array $conditions
     * @return Object | Exception
     */
    public function findWhere($conditions)
    {
        return $this->model->where($conditions)->first();
    }

    /**
     * create function
     *
     * @param array $data
     * @return Object | Exception
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * insert function
     *
     * @param array $data
     * @return int
     */
    public function insert($data)
    {
        return $this->model->insert($data);
    }
    
    /**
     * update by id function
     *
     * @param array $data
     * @param int|string $id
     * @return int
     */
    public function updateById($data, $id)
    {
        $obj = $this->model->findOrFail($id);
        return $obj->update($data);
    }

    /**
     * update function
     *
     * @param object $obj
     * @param array $data
     * @return int
     */
    public function update($obj, $data)
    {
        return $obj->update($data);
    }

    /**
     * destroy function
     *
     * @param int|string $id
     * @return int
     */
    public function destroy($id)
    {
        $obj = $this->model->findOrFail($id);
        return $obj->delete();
    }

    /**
     * Delete by condition
     *
     * @param array $condition
     *
     * @return void
     */
    public function deleteWhere(array $condition)
    {
        $this->model->where($condition)->delete();
    }

    /**
     * Delete where in condition
     *
     * @param string $column
     * @param array $condition
     *
     * @return void
     */
    public function deleteWhereIn(string $column, array $condition)
    {
        $this->model->whereIn($column, $condition)->delete();
    }

    /**
     * IncrementWhere column
     *
     * @param array $condition
     * @param string $column
     * @param int $value
     *
     * @return void
     */
    public function incrementWhere(array $condition, string $column, int $value)
    {
        $this->model->where($condition)->increment($column, $value);
    }

    /**
     * lists function
     *
     * @param string $column
     * @param string $key
     * @return void
     */
    public function lists($column, $key = null)
    {
        return $this->model->lists($column, $key);
    }

    /**
     * Update or create function
     *
     * @param array $uniqueData
     * @param array $normalData
     * @return Object | Exception
     */
    public function updateOrCreate(array $uniqueData, array $normalData)
    {
        return $this->model->updateOrCreate($uniqueData, $normalData);
    }

    /**
     * First or create function
     *
     * @param array $uniqueData
     * @param array $normalData
     * @return Object
     */
    public function firstOrCreate(array $uniqueData, array $normalData)
    {
        return $this->model->firstOrCreate($uniqueData, $normalData);
    }

     /**
     * Update by condition
     *
     * @param array $condition
     * @param array $data
     * @return void
     */
    public function updateWhere(array $condition, array $data)
    {
        $this->model->where($condition)->update($data);
    }
}
