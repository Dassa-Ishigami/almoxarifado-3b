<?php

namespace App\Filament\Almoxarifado\Resources\Movimentacaos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MovimentacaoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('produto_id')
                    ->required()
                    ->numeric(),
                TextInput::make('quantidade')
                    ->required()
                    ->numeric(),
                Select::make('tipo')
                    ->options(['Entrada' => 'Entrada', 'Saida' => 'Saida'])
                    ->required(),
            ]);
    }
}
