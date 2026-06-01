<?php

namespace App\Filament\Almoxarifado\Resources\Produtos\Pages;

use App\Filament\Almoxarifado\Resources\Produtos\ProdutoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProduto extends ViewRecord
{
    protected static string $resource = ProdutoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
