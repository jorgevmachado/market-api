<?php

namespace App;

class MensagemSistema
{
    private static $arrMsg = [
        '0' => 'Mensagem não definida',
        'DB001' => 'Ocorreu um erro durante o processamento dos dados.',

        'MSG001' => 'Cidade salva com sucesso!',
        'MSG002' => 'Cidade atualizada com sucesso!',
        'MSG003' => 'Cidade excluida com sucesso!',

    ];

    public static function get($key)
    {
        return isset(self::$arrMsg[$key]) ? self::$arrMsg[$key] : self::$arrMsg[0];
    }
}
