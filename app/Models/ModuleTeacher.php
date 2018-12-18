<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $module_id
 * @property int $student_id
 * @property string $created_at
 * @property string $updated_at
 * @property Module $module
 * @property Student $student
 */
class ModuleTeacher extends Model
{
    protected $primaryKey = ['module_id', 'teacher_id'];
    public $incrementing = false;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'modules_teachers';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->hasMany(Module::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }
}
