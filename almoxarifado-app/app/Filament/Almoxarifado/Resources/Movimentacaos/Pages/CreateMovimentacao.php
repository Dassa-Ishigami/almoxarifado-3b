<?php

namespace App\Filament\Almoxarifado\Resources\Movimentacaos\Pages;

use App\Filament\Almoxarifado\Resources\Movimentacaos\MovimentacaoResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use App\Models\Produto;
use App\Models\Movimentacao;

class CreateMovimentacao extends CreateRecord
{
    protected static string $resource = MovimentacaoResource::class;

    /**
     * O que a função beforeCreate faz?
     * 
     * @param $data recebe os dados do produto
     * @param $produto recebe uma lista com os dados dos produtos pelo id
     * @param $quantidade recebe os dados de $data pela quantidade
     * @param $tipo recebe os dados de $data pelo tipo
     * 
     * definição de uma condicional if:
     * @param $tipo for === 's' e $quantidade for > o estoque da lista de produtos:
     *        uma Notificação de erro indicando o problema nessa criação é exibida na tela
     *        um halt impede a criação do movimento de saída
    */
    
    /**
     * O que a função afterCreate faz? 
     * 
     * 
     */
    

    protected function beforeCreate(): void {
        // Recebe a lista de produtos
        $data = $this->data;

        // Seleciona o produto/qtd e tipo pelo id recebido na lista
        $produto = Produto::find($data['produto_id']);
        $quantidade = $data['quantidade'];
        $tipo = $data['tipo'];

        // Verificar se é uma saída e se o estoque é suficiente
        if ($tipo === 's' && $quantidade > $produto->estoque) {
            Notification::make()
                ->danger()
                ->title('Estoque Insuficiente!')
                ->body("O estoque de '{$produto->nome}' é de apenas {$produto->estoque} unidade(s), mas você tentou retirar {$quantidade}.")
                ->send();

            $this->halt(); // Impede a criação do movimento
        }
    }

    protected function afterCreate(): void{
        $movimento = $this->getRecord();
        $produto = $movimento->produto;

        if ($movimento->tipo === 'e') {
            $produto->increment('estoque', $movimento->quantidade);
        } else {
            $produto->decrement('estoque', $movimento->quantidade);            
        }
    }
}
