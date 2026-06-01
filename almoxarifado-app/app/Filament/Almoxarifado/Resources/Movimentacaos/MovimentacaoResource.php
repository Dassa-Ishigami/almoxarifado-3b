<?php

namespace App\Filament\Almoxarifado\Resources\Movimentacaos;

use App\Filament\Almoxarifado\Resources\Movimentacaos\Pages\CreateMovimentacao;
use App\Filament\Almoxarifado\Resources\Movimentacaos\Pages\EditMovimentacao;
use App\Filament\Almoxarifado\Resources\Movimentacaos\Pages\ListMovimentacaos;
use App\Filament\Almoxarifado\Resources\Movimentacaos\Pages\ViewMovimentacao;
use App\Filament\Almoxarifado\Resources\Movimentacaos\Schemas\MovimentacaoForm;
use App\Filament\Almoxarifado\Resources\Movimentacaos\Schemas\MovimentacaoInfolist;
use App\Filament\Almoxarifado\Resources\Movimentacaos\Tables\MovimentacaosTable;
use App\Models\Movimentacao;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MovimentacaoResource extends Resource
{
    protected static ?string $model = Movimentacao::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return MovimentacaoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MovimentacaoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MovimentacaosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMovimentacaos::route('/'),
            'create' => CreateMovimentacao::route('/create'),
            'view' => ViewMovimentacao::route('/{record}'),
            'edit' => EditMovimentacao::route('/{record}/edit'),
        ];
    }
}
