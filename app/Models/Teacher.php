<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $department_id
 * @property int $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property Department $department
 * @property User $user
 */
class Teacher extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'department_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moduleTeacher()
    {
        return $this->belongsTo(ModuleTeacher::class);
    }

}
