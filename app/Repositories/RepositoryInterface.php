<?php
namespace App\Repositories;

use Closure;

/**
 * RepositoryInterface provides the standard functions for any repository.
 *
 * Most of these methods aren't commented, since they match the default
 * Laravel method signatures. The only addition is the $with argument,
 * which is just an easy way to eager load through the repository.
 */
interface RepositoryInterface
{
    public function create(array $attributes);

    public function newInstance($attributes = [], $exists = false);

    public function all($columns = ['*'], $with = []);

    public function find($id, $columns = ['*'], $with = []);

    public function findOrNew($id, $columns = ['*'], $with = []);

    public function findOrFail($id, $columns = ['*'], $with = []);

    public function firstOrCreate($attributes, $with = []);

    public function firstOrNew($attributes, $with = []);

    public function where(
        $column,
        $operator = null,
        $value = null,
        $boolean = 'and'
    );

    public function whereHas(
        $relation,
        Closure $callback,
        $with = [],
        $operator = '>=',
        $count = 1
    );

    public function whereIn(
        $column,
        $values,
        $boolean = 'and',
        $not = false
    );

    public function updateOrCreate($attributes, $values = [], $with = []);

    /**
     * Saves a model
     *
     * @param mixed $model
     * Model is not typehinted so this interface can be flexible
     */
    public function save($model);

    /**
     * Saves a model and its relationships.
     *
     * @param mixed $model
     * Model is not typehinted so this interface can be flexible
     */
    public function push($model);

    /**
     * Deletes a model
     *
     * @param mixed $model
     * Model is not typehinted so this interface can be flexible
     */
    public function delete($model);

    /**
     * Destroys models
     *
     * @param int|array $ids
     * A single id or array of ids of the model(s) to delete
     */
    public function destroy($ids);

    public function setConnection($connection);

    public function paginate($number_of_pages);

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
    public function findAndPaginate($ids, $per_page = 15, $columns = ['*']);
}
