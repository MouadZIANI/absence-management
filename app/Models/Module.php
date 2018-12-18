<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $branch_id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Branch $branch
 * @property AbsenceDetail[] $absenceDetails
 * @property ModuleItem[] $moduleItems
 */
class Module extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['branch_id', 'name', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function absence()
    {
        return $this->hasMany(Absence::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moduleItems()
    {
        return $this->hasMany(ModuleItem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moduleTeacher()
    {
        return $this->belongsTo(ModuleTeacher::class);
    }
}
