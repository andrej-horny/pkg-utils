<?php

namespace Dpb\Packages\Utils\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeasurementUnit extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'code',
        'title',
        'description',
    ];

    public function getTable()
    {
        return config('pkg-utils.table_prefix') . 'measurement_units';
    } 
}
