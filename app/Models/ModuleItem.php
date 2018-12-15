<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $module_id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Module $module
 */
class ModuleItem extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['module_id', 'name', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
