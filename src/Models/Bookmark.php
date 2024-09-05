<?php

namespace LaraZeus\Delia\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $url
 * @property string $title
 * @property string $icon
 * @property int $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @method Builder|static user()
 */
class Bookmark extends Model
{
    protected $guarded = [];

    protected $casts = [
        //
    ];

    public function getTable(): string
    {
        return config('zeus-delia.table-prefix') . 'bookmarks';
    }

    public function scopeUser(Builder $query): void
    {
        $query->where('user_id', auth()->user()->id);
    }
}
