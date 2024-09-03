<?php

namespace LaraZeus\Delia\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use LaraZeus\Delia\Delia;
use LaraZeus\Delia\DeliaPlugin;
use LaraZeus\Delia\Filament\Resources\BookmarkResource\Pages\ListBookmarks;
use LaraZeus\Delia\Models\Bookmark;

class BookmarkResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    public static function getModel(): string
    {
        return DeliaPlugin::getModel('Bookmark');
    }

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
            ->actions([
                Action::make('bookmark')
                    ->iconButton()
                    ->tooltip(__('zeus-delia::bookmark.remove'))
                    ->color('gray')
                    ->icon('heroicon-s-bookmark')
                    ->action(fn (Bookmark $record) => Delia::toggle($record->bookmarkable_resource)),
            ])
            ->columns([
                TextColumn::make('bookmarkable_resource')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->formatStateUsing(fn (Bookmark $record) => app($record->bookmarkable_resource)->getNavigationLabel())
                    ->label(__('zeus-delia::bookmark.bookmarkable_type')),
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
        return ! in_array(static::class, DeliaPlugin::get()->getHiddenResources());
    }

    public static function getNavigationGroup(): ?string
    {
        return DeliaPlugin::get()->getNavigationGroupLabel();
    }
}
