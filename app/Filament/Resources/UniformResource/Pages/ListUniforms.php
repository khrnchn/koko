<?php

namespace App\Filament\Resources\UniformResource\Pages;

use App\Filament\Resources\UniformResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUniforms extends ListRecords
{
    protected static string $resource = UniformResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
