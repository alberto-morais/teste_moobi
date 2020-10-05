<?php


namespace App\models;


use App\core\Model;

class PeditosProdutos extends Model
{
    protected $table = 'pedidos_produtos';

    public function save($data = false)
    {
        return parent::save($data);
    }

    public function validData(array $data, int $id)
    {
        $prduto = new Produto();

        foreach ($data as $item){
            $prduto->decrementar($item['qtd'],$item['id']);
            $dataPedidoProduto[] = [
                'quantidade' => $item['qtd'],
                'id_produto' => $item['id'],
                'id_pedido' => $id
            ];

            return $dataPedidoProduto;
        }
    }

}