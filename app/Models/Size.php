<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Size
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @method static Builder|Size newModelQuery()
 * @method static Builder|Size newQuery()
 * @method static Builder|Size query()
 * @method static Builder|Size whereCreatedAt($value)
 * @method static Builder|Size whereId($value)
 * @method static Builder|Size whereName($value)
 * @method static Builder|Size whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Size extends Model
{
    use HasFactory;
    use SoftDeletes;

}
