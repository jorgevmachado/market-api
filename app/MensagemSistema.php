<?php

namespace App;

class MensagemSistema
{
    private static $arrMsg = [
        '0' => 'Mensagem não definida',
        'DB001' => 'Ocorreu um erro durante o processamento dos dados.',

        'MSG001' => 'Salvo com Sucesso!',
        'MSG002' => 'Atualizado com Sucesso!',
        'MSG003' => 'Excluido com Sucesso!',
        'LOG001' => 'Inclusão de dados',
        'LOG002' => 'Edição de dados',
        'LOG003' => 'Exclusão de dados',
    ];

    public static function get($key)
    {
        return isset(self::$arrMsg[$key]) ? self::$arrMsg[$key] : self::$arrMsg[0];
    }
}
