<?php

namespace App\Filament\Admin\Resources\VirtualHostResource\Pages;

use App\Filament\Admin\Resources\VirtualHostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVirtualHosts extends ListRecords
{
    protected static string $resource = VirtualHostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
