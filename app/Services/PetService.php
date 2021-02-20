<?php

namespace App\Services;

use App\Repositories\Eloquent\PetRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use InvalidArgumentException;

class PetService {

    /**
     * @var PetRepository
     */
    protected $petRepository;

    /**
     * PetService constructor.
     *
     * @param PetPepository $petRepository
     */
    public function __construct(PetRepository $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    /**
     * Save a new Pet
     *
     * @param array $data
     * @return ?Model
     */
    public function save(array $data): ?Model {

        $validator = Validator::make($data, [
            'name' => 'required|min:2',
            'species' => 'required|in:C,G',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->petRepository->create($data);
    }

    /**
     * Find all Pets
     *
     * @param Request $request
     * @return array
     */
    public function all(Request $request): LengthAwarePaginator {

        return $this->petRepository->all($request);

    }

    /**
     * Delete a Pet
     *
     * @param $id
     * @return array
     */
    public function delete($id): void {

        $this->petRepository->delete($id);

    }
}
