<?php

namespace App\Repositories;

use Closure;

abstract class AbstractDBRepository implements RepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function newInstance($attributes = [], $exists = false)
    {
        return $this->model->newInstance($attributes, $exists);
    }

    public function all($columns = ['*'], $with = [])
    {
        $instances = $this->model->all($columns);

        return $instances->load($with);
    }

    public function find($id, $columns = ['*'], $with = [])
    {
        $instances = $this->model->find($id, $columns);

        if (empty($instances)) {
            return null;
        }

        return $instances->load($with);
    }

    public function findOrNew($id, $columns = ['*'], $with = [])
    {
        $instances = $this->model->findOrNew($id, $columns);

        return $instances->load($with);
    }

    public function findOrFail($id, $columns = ['*'], $with = [])
    {
        $instances = $this->model->findOrFail($id, $columns);

        return $instances->load($with);
    }

    public function firstOrCreate($attributes, $with = [])
    {
        $instances = $this->model->firstOrCreate($attributes);

        return $instances->load($with);
    }

    public function firstOrNew($attributes, $with = [])
    {
        $instances = $this->model->firstOrNew($attributes);

        return $instances->load($with);
    }

    public function where(
        $column,
        $operator = null,
        $value = null,
        $boolean = 'and'
    ) {
        return $this->model->where($column, $operator, $value, $boolean);
    }

    public function whereHas(
        $relation,
        Closure $callback,
        $with = [],
        $operator = '>=',
        $count = 1
    ) {
        $instances = $this->model->whereHas(
            $relation,
            $callback,
            $operator,
            $count
        )->get();

        if ($instances->isEmpty()) {
            return $instances;
        }

        return $instances->load($with);
    }

    public function updateOrCreate($attributes, $values = [], $with = [])
    {
        return $this->model->updateOrCreate($attributes, $values)->with($with);
    }

    public function save($model)
    {
        return $model->save();
    }

    public function push($model)
    {
        return $model->push();
    }

    public function delete($model)
    {
        return $model->delete();
    }

    public function destroy($ids)
    {
        return $this->model->destroy($ids);
    }

    public function setConnection($connection)
    {
        return $this->model->setConnection($connection);
    }

    public function paginate($number_of_pages)
    {
        return $this->model->paginate($number_of_pages);
    }

    public function whereIn(
        $column,
        $values,
        $boolean = 'and',
        $not = false
    ) {
        return $this->model->whereIn($column, $values, $boolean, $not);
    }

    /**
     * Paginates a subset of model items based on primary key
     *
     * @param int $ids
     * Ids of the model - should be the integer primary key even if
     * the primary key is not id
     * @param number $per_page
     * Number of instances to show per page
     * @param array $columns
     * Array of columns to select
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findAndPaginate($ids, $per_page = 15, $columns = ['*'])
    {
        return $this->model->whereIn($this->model->getKeyName(), $ids)->paginate($per_page, $columns);
    }
}
