<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'jdoc' => 'array',
    ];

    /**
     * Relation with user.
     *
     * @return Collection
     */
    public function users()
    {
        return $this->belonsToMany(User::class);
    }
}
