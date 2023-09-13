<?php

namespace App\Models;

use Database\Factories\TeamFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Team
 *
 * @method static TeamFactory factory($count = null, $state = [])
 * @method static Builder|Team newModelQuery()
 * @method static Builder|Team newQuery()
 * @method static Builder|Team onlyTrashed()
 * @method static Builder|Team query()
 * @method static Builder|Team withTrashed()
 * @method static Builder|Team withoutTrashed()
 * @mixin \Eloquent
 */
class Team extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'name',
        'department_id',
    ];


}
