<?php

namespace LaraZeus\Delia\Models;

use Database\Factories\OfficeFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use LaraZeus\Bolt\BoltPlugin;
use Spatie\Translatable\HasTranslations;

/**
 * @property string $id
 */
class Bookmark extends Model
{
    protected array $guarded = [];

    protected $casts = [
        //
    ];

    public function getTable(): string
    {
        return config('zeus-delia.table-prefix') . 'bookmarks';
    }
}
