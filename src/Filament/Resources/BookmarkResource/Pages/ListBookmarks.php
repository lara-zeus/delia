<?php

namespace LaraZeus\Delia\Filament\Resources\OfficeResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use LaraZeus\Delia\Filament\Resources\OfficeResource;

class ListOffices extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = OfficeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
