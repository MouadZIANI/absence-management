<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
class Teacher extends Authenticatable
{
    use Notifiable;

    protected $guard = 'teacher';
    /**
     * @var array
     */
    protected $fillable = ['department_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
