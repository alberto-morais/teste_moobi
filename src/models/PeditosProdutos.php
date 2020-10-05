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

        foreach ($data as $item) {
            $prduto->decrementar($item['qtd'], $item['id']);
            $dataPedidoProduto[] = [
                'quantidade' => $item['qtd'],
                'id_produto' => $item['id'],
                'id_pedido' => $id
            ];

        }
        return $dataPedidoProduto;
    }

    public function listItens(int $id)
    {
        return $this->db->query("select p.nome,p.preco,p.descricao, pd.quantidade as quantidade from
                                pedidos_produtos pd
                                inner join produtos p on pd.id_produto = p.id
                                where pd.id_pedido = $id");
    }
}