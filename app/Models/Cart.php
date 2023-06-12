<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Cart
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $user_id
 * @property string $session
 * @property int $quantity
 * @method static Builder|Cart newModelQuery()
 * @method static Builder|Cart newQuery()
 * @method static Builder|Cart query()
 * @method static Builder|Cart whereCreatedAt($value)
 * @method static Builder|Cart whereId($value)
 * @method static Builder|Cart whereQuantity($value)
 * @method static Builder|Cart whereSession($value)
 * @method static Builder|Cart whereUpdatedAt($value)
 * @method static Builder|Cart whereUserId($value)
 * @property int|null $amount
 * @property Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\CartFactory factory($count = null, $state = [])
 * @method static Builder|Cart onlyTrashed()
 * @method static Builder|Cart whereAmount($value)
 * @method static Builder|Cart whereDeletedAt($value)
 * @method static Builder|Cart withTrashed()
 * @method static Builder|Cart withoutTrashed()
 * @mixin Eloquent
 */
class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function products() {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity', 'deleted_at')
            ->withTimestamps();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
