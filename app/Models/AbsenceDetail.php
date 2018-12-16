<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $module_id
 * @property int $student_id
 * @property int $absence_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $absence_date
 * @property Absence $absence
 * @property Module $module
 * @property Student $student
 */
class AbsenceDetail extends Model
{
    protected $primaryKey = ['module_id', 'student_id', 'absence_id'];
    
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'absence_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function absence()
    {
        return $this->belongsTo(Absence::class, 'absence_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
