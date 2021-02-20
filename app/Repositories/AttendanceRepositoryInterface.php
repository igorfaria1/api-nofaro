<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface AttendanceRepositoryInterface
{
    public function create(array $attributes): Model;
}
