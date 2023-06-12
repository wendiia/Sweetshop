<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;


/**
 * App\Models\Product
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $title
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereTitle($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @property string|null $slug
 * @property int $category_id
 * @property int $size_id
 * @property int $expiration_date
 * @property string $product_value
 * @property string $description
 * @property string $ingredients
 * @property int $weight
 * @property int $price
 * @property string $photo
 * @property string $status
 * @property Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cart> $carts
 * @property-read int|null $carts_count
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Size $size
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SpecialIngredient> $special_ingredients
 * @property-read int|null $special_ingredients_count
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static Builder|Product filter(array $input = [], $filter = null)
 * @method static Builder|Product findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static Builder|Product onlyTrashed()
 * @method static Builder|Product paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static Builder|Product simplePaginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static Builder|Product whereBeginsWith($column, $value, $boolean = 'and')
 * @method static Builder|Product whereCategoryId($value)
 * @method static Builder|Product whereDeletedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereEndsWith($column, $value, $boolean = 'and')
 * @method static Builder|Product whereExpirationDate($value)
 * @method static Builder|Product whereIngredients($value)
 * @method static Builder|Product whereLike($column, $value, $boolean = 'and')
 * @method static Builder|Product wherePhoto($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product whereProductValue($value)
 * @method static Builder|Product whereSizeId($value)
 * @method static Builder|Product whereSlug($value)
 * @method static Builder|Product whereStatus($value)
 * @method static Builder|Product whereWeight($value)
 * @method static Builder|Product withTrashed()
 * @method static Builder|Product withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @method static Builder|Product withoutTrashed()
 * @mixin Eloquent
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    use Filterable;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'size_id',
        'expiration_date',
        'product_value',
        'description',
        'ingredients',
        'weight',
        'photo',
        'price',
        'status',
    ];

    public function carts() {
        return $this->belongsToMany(Cart::class)
            ->withPivot('quantity', 'deleted_at')
            ->withTimestamps();
    }

    public function orders() {
        return $this->belongsToMany(Order::class)
            ->withPivot('price', 'amount', 'quantity', 'updated_at', 'created_at', 'deleted_at') //
            ->withTimestamps();
    }


    public function special_ingredients() {
        return $this->belongsToMany(SpecialIngredient::class)
            ->withPivot('deleted_at')
            ->as('product_special_ingredient')
            ->withTimestamps();
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function size() {
        return $this->belongsTo(Size::class);
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
