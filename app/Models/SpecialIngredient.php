<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\SpecialIngredient
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @method static Builder|SpecialIngredient newModelQuery()
 * @method static Builder|SpecialIngredient newQuery()
 * @method static Builder|SpecialIngredient query()
 * @method static Builder|SpecialIngredient whereCreatedAt($value)
 * @method static Builder|SpecialIngredient whereId($value)
 * @method static Builder|SpecialIngredient whereName($value)
 * @method static Builder|SpecialIngredient whereUpdatedAt($value)
 * @mixin Eloquent
 */
class SpecialIngredient extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded = [];

}
