<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 * @property Student[] $students
 */
class Group extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'type', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
