<?php
namespace App\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface PetRepositoryInterface
{
   public function all(Request $request): LengthAwarePaginator;
   public function delete($id): void;
   public function create(array $attributes): Model;
}
