<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Department
 *
 * @method static DepartmentFactory factory($count = null, $state = [])
 * @method static Builder|Department newModelQuery()
 * @method static Builder|Department newQuery()
 * @method static Builder|Department onlyTrashed()
 * @method static Builder|Department query()
 * @method static Builder|Department withTrashed()
 * @method static Builder|Department withoutTrashed()
 * @mixin \Eloquent
 */
class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'name',
        'company_id',
    ];
}
