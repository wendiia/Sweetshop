<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Banner
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property string $photo
 * @property string $status
 * @method static Builder|Banner newModelQuery()
 * @method static Builder|Banner newQuery()
 * @method static Builder|Banner query()
 * @method static Builder|Banner whereCreatedAt($value)
 * @method static Builder|Banner whereDescription($value)
 * @method static Builder|Banner whereId($value)
 * @method static Builder|Banner wherePhoto($value)
 * @method static Builder|Banner whereSlug($value)
 * @method static Builder|Banner whereStatus($value)
 * @method static Builder|Banner whereTitle($value)
 * @method static Builder|Banner whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Banner extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'description', 'photo', 'status', 'condition'];
}
