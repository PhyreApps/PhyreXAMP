<?php

namespace App\Filament\Admin\Resources\VirtualHostResource\Pages;

use App\Filament\Admin\Resources\VirtualHostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVirtualHost extends EditRecord
{
    protected static string $resource = VirtualHostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
