<?php

namespace App\Filament\Resources\UniformResource\Pages;

use App\Filament\Resources\UniformResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUniform extends EditRecord
{
    protected static string $resource = UniformResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
