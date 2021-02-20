<?php

namespace App\Services;

use App\Repositories\Eloquent\AttendanceRepository;
use App\Repositories\Eloquent\PetRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use InvalidArgumentException;
use Exception;

class AttendanceService {

    /**
     * @var PetRepository
     */
    protected $petRepository;

     /**
     * @var PetRepository
     */
    protected $attendanceRepository;

    /**
     * AttendanceService constructor.
     *
     * @param PetPepository $petRepository
     * @param AttendancePepository $attendanceRepository
     */
    public function __construct(
        AttendanceRepository $attendanceRepository,
        PetRepository $petRepository
    ) {
        $this->attendanceRepository = $attendanceRepository;
        $this->petRepository = $petRepository;
    }

    /**
     * Save a new Pet
     *
     * @param Request $request
     * @return ?Model
     */
    public function save(Request $request): ?Model {

        $validator = Validator::make($request->all(), [
            'pet_id' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'description' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $pet = $this->petRepository->find($request->input('pet_id'));

        if (!$pet) {
            throw new Exception('Pet does not found');
        }


        return $this->attendanceRepository->create($request->all());
    }
}
