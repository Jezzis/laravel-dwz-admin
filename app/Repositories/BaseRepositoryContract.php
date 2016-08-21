<?php
/**
 * Created by PhpStorm.
 * User: szj
 * Date: 16/8/21
 * Time: 23:34
 */
namespace App\Repositories;
interface BaseRepositoryContract
{
    public function find($id, $columns = ['*']);

    public function findOrFail($id, $columns = ['*']);

    public function simpleSelect($wheres, $columns = ['*'], $limit = 0);

    public function all($columns = ['*']);

    public function create($attributes);

    public function delete($id);

    public function update($id, $attributes);
}