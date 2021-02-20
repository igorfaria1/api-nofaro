<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'species'
    ];

    /**
     * Get the attendances for the pet.
     */
    public function attendances() {
        return $this->hasMany(Attendance::class);
    }

    public static function boot() {

	    parent::boot();

	    static::deleting(function(Pet $pet) {
            $pet->attendances()->delete();
	    });
	}
}
