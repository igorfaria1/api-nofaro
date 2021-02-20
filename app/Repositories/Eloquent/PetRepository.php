<?php

namespace App\Repositories\Eloquent;

use App\Pet;
use App\Repositories\PetRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class PetRepository extends BaseRepository implements PetRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
    public function __construct(Pet $model)
    {
        parent::__construct($model);
    }

    /**
    * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
    */
    public function all(Request $request): LengthAwarePaginator
    {
        $pets = $this->model->with('attendances');

        if ($request->has('name')) {
            $pets = $pets->where('name', 'like', "%{$request->input('name')}%");
        }

        return $pets->paginate($request->input('per_page', 10));
    }
}
