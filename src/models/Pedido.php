<?php


namespace App\models;


use App\core\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    public function save($data = false)
    {
        $this->db->query('begin');
        $return = parent::save($data);
        if (!$this->saveProductsOrders($return->id)) {
            redirect('pedidos');
            return false;
        }
        $this->db->query('commit');
        return true;
    }

    public function all($page = false, $limit = false)
    {

        if ($page == false) {
            return $this->db->table($this->table)->get();
        }
        $validUser = '';
        if (isset($_SESSION['usuario']->revend)){
            $validUser = " where pedidos.id_revendedor = {$_SESSION['usuario']->id}";
        }
        $resp = $this->db->tablePage('pedidos')->select("pedidos.id,pedidos.status, pedidos.data,pedidos.valor_venda,pedidos.parcelas, r.revendedor,
                    u.nome, tp.nome from pedidos
                    left join revendedores r on pedidos.id_revendedor = r.id
                    inner join tp_pagamentos tp on pedidos.id_tp_pagamento = tp.id
                    left join usuarios u on pedidos.id_usuario = u.id $validUser", true)->paginate($page,$limit);
        $this->paginate = $this->db->paginationInfo();
        return $resp;
    }

    public function orderResponsible($id)
    {
        return $this->db
            ->tablePage('pedidos')
            ->select("pedidos.id,pedidos.status, pedidos.data,
                    pedidos.valor_venda,pedidos.parcelas, r.revendedor,
                    u.nome, tp.nome, tp.id as id_forma_pagamento from pedidos
                    left join revendedores r on pedidos.id_revendedor = r.id
                    inner join tp_pagamentos tp on pedidos.id_tp_pagamento = tp.id
                    left join usuarios u on pedidos.id_usuario = u.id 
                    where pedidos.id = $id", true)
            ->get()
            ->first();
    }


    public function validData()
    {
        $data = $_POST;
        $data['valor_pedido'] = parseCurrencyToFloat($data['valor_pedido']);
        $data['valor_venda'] = parseCurrencyToFloat($data['valor_venda']);
        switch ($data['id_tp_pagamento']):
            case 1:
                $porcentagem = 10;
                $total = $data['valor_pedido'] * ($porcentagem / 100);
                $data['valor_venda'] -= $total;
                break;
            case 2:
                if (empty($data['parcelas'])) return false;
                break;
            case 3:
                $porcentagem = 5;
                $total = $data['valor_pedido'] * ($porcentagem / 100);
                $data['valor_venda'] -= $total;
                break;
        endswitch;
        unset($data['valor_pedido'], $data['produto']);
        return $data;
    }


    private function saveProductsOrders(int $id): bool
    {
        $produtoPedidos = new PeditosProdutos();
        $data = $produtoPedidos->validData($_POST['produto'], $id);

        foreach ($data as $item) {
            if (!$produtoPedidos->save($item)) {
                $this->db->query('rollback');
                $msg['alert'][] = [
                    'message' => parent::getError()[2]
                    , 'type' => 'danger'
                ];
                $this->flashAlert($msg);
                return false;
            }
        }
        return true;

    }
}