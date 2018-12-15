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
    protected $fillable = ['type', 'justification', 'nb_hours', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function absenceDetails()
    {
        return $this->hasMany(AbsenceDetail::class);
    }
}
