<?php

namespace App\Filament\Almoxarifado\Resources\Movimentacaos\Pages;

use App\Filament\Almoxarifado\Resources\Movimentacaos\MovimentacaoResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMovimentacao extends EditRecord
{
    protected static string $resource = MovimentacaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
