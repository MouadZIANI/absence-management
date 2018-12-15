<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $department_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 * @property Department $department
 */
class Teacher extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['department_id', 'first_name', 'last_name', 'email', 'password', 'type', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
