<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent;
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
 * @mixin Eloquent
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;


//    protected $fillable = [
//        'title',
//        'slug',
//        'category_id',
//        'size_id',
//        'expiration_date',
//        'product_value',
//        'description',
//        'ingredients',
//        'weight',
//        'photo',
//        'price',
//        'status',
//    ];

    protected $guarded = [];

    public function special_ingredients() {
        return $this->belongsToMany(SpecialIngredient::class)
            ->withPivot('updated_at', 'created_at', 'deleted_at')
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
