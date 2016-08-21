<?php
/**
 * Created by PhpStorm.
 * User: szj
 * Date: 16/8/21
 * Time: 21:41
 */

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryContract
{
    /**
     * @var Model
     */
    protected $modelInstance;

    protected $modelFullName;

    protected $modelName;

    protected $modelNamespace;

    public function __construct($modelName, $modelNamespace = 'App\\Models\\')
    {
        $this->$modelName = $modelName;
        $this->modelNamespace = $modelNamespace;

        $this->modelFullName = rtrim($modelNamespace, '\\') . '\\' . $modelName;
        $this->modelInstance = new $this->modelFullName();
    }

    public function find($primaryKey, $columns = ['*'])
    {
        return $this->modelInstance->find($primaryKey, $columns);
    }

    public function findOrFail($primaryKey, $columns = ['*'])
    {
        return $this->modelInstance->findOrFail($primaryKey, $columns);
    }

    public function all($columns = ['*'])
    {
        return call_user_func_array([$this->modelFullName, 'all'], array($columns));
    }

    public function simpleSelect($wheres, $columns = ['*'], $limit = 0)
    {
        $query = $this->modelInstance->newQuery();
        foreach ($wheres as $column => $condition) {
            if (is_array($condition)) {
                $query->where($column, $condition[0], $condition[1]);
            } else {
                $query->where($column, $condition);
            }
        }

        if ($columns) {
            $query->select($columns);
        }

        if ($limit > 0) {
            $query->take($limit);
        }

        return $query->get();
    }

    public function create($attributes)
    {
        return call_user_func_array([$this->modelFullName, 'create'], array($attributes));
    }

    public function delete($id)
    {
        $model = $this->findOrFail($id);
        if (!$model) {
            return false;
        }

        return $model->delete();
    }

    public function update($id, $attributes)
    {
        $model = $this->findOrFail($id);
        if (!$model) {
            return false;
        }

        return $model->fill($attributes)->save();
    }
}
