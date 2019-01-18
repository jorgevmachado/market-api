<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;

use Illuminate\Database\Eloquent\SoftDeletes;

class TraTbUsuaUsuario extends Authenticable
{
    use SoftDeletes, Notifiable;
    /*
    * Table primary key
    */
    protected $primaryKey = 'usua_id';

    public function getAuthIdentifierName()
    {
        return "usua_id";
    }

    public function getAuthIdentifier()
    {
        return $this->usua_id;
    }

    public function getAuthPassword()
    {
        return '';
    }

    public function getRememberToken()
    {
        return '';
    }

    public function setRememberToken($value)
    {
        //
    }

    public function getRememberTokenName()
    {
        return '';
    }

    public function getMatricula()
    {
        return mb_strtoupper($this->usua_tx_username);
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return in_array(Constants::ROLE_ADMIN, $this->roles);
    }

    /**
     * @return bool
     */
    public function isResponsavelColeta()
    {
        return in_array(Constants::ROLE_RESPONSAVEL_COLETA, $this->roles);
    }

    /**
     * @return bool
     */
    public function isMembroAuxiliar()
    {
        return in_array(Constants::ROLE_MEMBRO_AUXILIAR, $this->roles);
    }

    /**
     * @return bool
     */
    public function isMembroComissao()
    {
        return in_array(Constants::ROLE_MEMBRO_COMISSAO, $this->roles);
    }
    /**
     * @return bool
     */
    public function isConsignatario()
    {
        return in_array(Constants::ROLE_CONSIGNATARIO, $this->roles);
    }
}
