<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property string $justification
 * @property int $nb_hours
 * @property string $created_at
 * @property string $updated_at
 * @property AbsenceDetail[] $absenceDetails
 */
class Absence extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['module_id', 'student_id', 'type', 'justification', 'nb_hours', 'absence_date','created_at', 'updated_at'];

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
