<?php

namespace LaraZeus\Delia\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use LaraZeus\Delia\Delia;
use LaraZeus\Delia\DeliaPlugin;
use LaraZeus\Delia\Filament\Resources\BookmarkResource\Pages\ListBookmarks;
use LaraZeus\Delia\Models\Bookmark;

class BookmarkResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    public static function getModelLabel(): string
    {
        return __('zeus-delia::bookmark.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('zeus-delia::bookmark.plural_model_label');
    }

    public static function getNavigationLabel(): string
    {
        return __('zeus-delia::bookmark.navigation_label');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                /** @var Bookmark $query */
                return $query->user();
            })
            ->actions([
                Action::make('bookmark')
                    ->iconButton()
                    ->tooltip(__('zeus-delia::bookmark.remove'))
                    ->color('gray')
                    ->icon('heroicon-s-bookmark')
                    ->action(fn (Bookmark $record) => Delia::remove($record->url)),
            ])
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->icon(fn (Bookmark $record) => $record->icon)
                    ->url(fn (Bookmark $record) => $record->url)
                    ->label(__('zeus-delia::bookmark.title')),

                TextColumn::make('created_at')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->dateTime()
                    ->label(__('zeus-delia::bookmark.created_at')),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBookmarks::route('/'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return DeliaPlugin::isResourceVisible(static::class);
    }

    public static function getNavigationGroup(): ?string
    {
        return DeliaPlugin::get()->getNavigationGroupLabel();
    }

    public static function getModel(): string
    {
        return DeliaPlugin::getModel('Bookmark');
    }
}
