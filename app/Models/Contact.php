<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Database\Factories\ContactFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Contact
 *
 * @method static ContactFactory factory($count = null, $state = [])
 * @method static Builder|Contact newModelQuery()
 * @method static Builder|Contact newQuery()
 * @method static Builder|Contact onlyTrashed()
 * @method static Builder|Contact query()
 * @method static Builder|Contact withTrashed()
 * @method static Builder|Contact withoutTrashed()
 * @mixin \Eloquent
 */
class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;

    /**
     * @var string[]
     */
    protected $fillable = [
        'uuid',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'preferred_name',
        'email',
        'phone',

    ];
}
