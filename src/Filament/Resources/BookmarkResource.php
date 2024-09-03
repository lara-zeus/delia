<?php

namespace LaraZeus\Delia\Filament\Resources;

use Filament\Facades\Filament;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use LaraZeus\Bolt\BoltPlugin;
use LaraZeus\InlineChart\Tables\Columns\InlineChart;
use LaraZeus\Quantity\Components\Quantity;
use LaraZeus\Delia\DeliaPlugin;

class BookmarkResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    public static function getModel(): string
    {
        return DeliaPlugin::getModel('Bookmark');
    }

    public static function getModelLabel(): string
    {
        return __('delia::bookmark.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('delia::bookmark.plural_model_label');
    }

    public static function getNavigationLabel(): string
    {
        return __('delia::bookmark.navigation_label');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('ordering')
            ->columns([
                TextColumn::make('bookmarkable_type')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->label(__('delia::bookmark.bookmarkable_type')),

                TextColumn::make('bookmarkable_id')
                    ->searchable()
                    ->toggleable()
                    ->sortable()
                    ->label(__('delia::bookmark.bookmarkable_id')),
            ])
            ->filters([

            ])
            ->actions([

            ])
            ->bulkActions([
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookmarks::route('/'),
        ];
    }

    public static function canViewAny(): bool
    {
        return ! in_array(static::class, DeliaPlugin::get()->getHiddenResources());
    }

    public static function getNavigationGroup(): ?string
    {
        return DeliaPlugin::get()->getNavigationGroupLabel();
    }
}
