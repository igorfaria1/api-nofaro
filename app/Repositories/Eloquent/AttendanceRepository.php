<?php

namespace App\Repositories\Eloquent;

use App\Attendance;
use App\Repositories\AttendanceRepositoryInterface;

class AttendanceRepository extends BaseRepository implements AttendanceRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
    public function __construct(Attendance $model)
    {
        parent::__construct($model);
    }
}
