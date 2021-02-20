<?php
namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Exception;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
     protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
    * @param array $attributes
    *
    * @return Model
    */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    /**
    * @param $id
    * @param array $attributes
    * @return Model
    */
    public function update(array $attributes, $id): ?Model
    {
        $model = $this->model->find($id);

        if (!$model) {
            throw new Exception("Not found");
        }

        return $model->update($attributes);
    }

    /**
    * @param $id
    * @return Model
    */
    public function delete($id): void
    {
        $model = $this->model->find($id);

        if (!$model) {
            throw new Exception("Not found");
        }

        $model->delete();
    }
}
