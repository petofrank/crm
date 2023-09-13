<?php

namespace App\Models;

use Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Company
 *
 * @method static CompanyFactory factory($count = null, $state = [])
 * @method static Builder|Company newModelQuery()
 * @method static Builder|Company newQuery()
 * @method static Builder|Company onlyTrashed()
 * @method static Builder|Company query()
 * @method static Builder|Company withTrashed()
 * @method static Builder|Company withoutTrashed()
 * @mixin \Eloquent
 */
class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'phone',
        'website'
    ];
}
