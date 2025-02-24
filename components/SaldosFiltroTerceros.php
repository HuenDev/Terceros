<?php

namespace app\components;

class SaldosFiltroTerceros
{
    public static function validadorSaldoFiltro($query, $saldo)
    {
        if (!empty($saldo) && preg_match('/^(<=|>=|<|>|=|!=)(\d+)$/', $saldo, $coincidencia))
        {
            $operador = $coincidencia[1];
            $valor = $coincidencia[2];
            $query->andWhere([$operador, 'saldo', $valor]);
        }

        elseif (!empty($saldo) && preg_match('/^(\d+)-(\d+)$/', $saldo, $coincidencia))
        {
            $valor1 = $coincidencia[1];
            $valor2 = $coincidencia[2];
            $query->andWhere(['between', 'saldo', $valor1, $valor2]);
        }

        else
        {
            $query->andFilterWhere(['like', 'saldo', $saldo]);
        }

        return $query;
    }
}
