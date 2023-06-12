<?php

namespace App\Models;

use Database\Factories\OrderFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $quantity
 * @property-read Collection<int, Product> $products
 * @property-read int|null $products_count
 * @method static OrderFactory factory($count = null, $state = [])
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereQuantity($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @property int $user_id
 * @property string $date_readiness
 * @property int $amount
 * @property string $status
 * @property Carbon|null $deleted_at
 * @property-read \App\Models\User $user
 * @method static Builder|Order onlyTrashed()
 * @method static Builder|Order whereAmount($value)
 * @method static Builder|Order whereDateReadiness($value)
 * @method static Builder|Order whereDeletedAt($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereUserId($value)
 * @method static Builder|Order withTrashed()
 * @method static Builder|Order withoutTrashed()
 * @mixin Eloquent
 */
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public function products() {
        return $this->belongsToMany(Product::class)
            ->withPivot('price', 'amount', 'quantity', 'updated_at', 'created_at', 'deleted_at')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
