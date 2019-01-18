<?php

namespace App;

class MensagemSistema
{
    private static $arrMsg = [
        '0' => 'Mensagem não definida',
        'DB001' => 'Ocorreu um erro durante o processamento dos dados.',

        'MSG001' => 'Não foi encontrada nenhuma informação com os filtros informados. Verfique.',

        'MSG002' => 'Não foi selecionado nenhum registro para realizar a ação solicitada. Operação não realizada.',

        'MSG003' => 'Cadastro realizado com sucesso.',

        'MSG004' => 'Atualização realizada com sucesso.',

        'MSG005' => 'Exclusão realizada com sucesso.',

        'MSG006' => 'Bem Patrimonial removido com sucesso.',

        'MSG007' => 'Deseja salvar o arquivo gerado na exportação solicitada? Sim / Não',

        'MSG008' => 'O envio da coleta foi realizado com sucesso.',

        'MSG009' => 'A Coleta Realizada pendente de REENVIO deverá ser enviada individualmente para o Membro Auxiliar,'
            . ' devido a necessidade de justificativa do reenvio. Por favor,'
            . ' verifique os registros selecionados na lista. Operação não realizada.',

        'MSG010' => 'A justificativa é de preenchimento obrigatório. Por favor verifique e refaça a operação.',

        'MSG011' => 'Não é permitida a exclusão de coleta realizada já enviada para o Membro Auxiliar.'
            . ' Verifique os registros selecionados na lista. Operação não realizada.',

        'MSG012' => 'A Consolidação do Inventário da respectiva Lotação já foi finalizado,'
            . ' não é mais permitido o envio de coletas para essa lotação. Qualquer dúvida,'
            . ' entre em contato com o Membro Auxiliar da lotação. Operação não realizada.',

        'MSG013' => 'O último inventário anual configurado no sistema não está mais aberto para atualizações. '
            . 'Operação não permitida.',

        'MSG014' => 'O Membro de Comissão informado possui cadastrado Ativo para acesso ao respectivo Inventário Anual.'
            . ' Inclusão não permitida.',

        'MSG015' => 'Para o Inventário Anual já foi informado o Presidente de Comissão,'
            . ' que poderá ser apenas um por inventário. Para incluir o respectivo Membro de Comissão,'
            . ' favor retirar a seleção da informação "Presidente". Operação não realizada.',

        'MSG016' => 'Não foi identificado usuário cadastrado para o Membro de Comissão informado no Sistema'
            . ' de Autenticação de usuários do TRF. O perfil de Membro de Comissão não foi aplicado.'
            . ' Para que o Membro de Comissão tenha acesso ao Inventário WEB, o Administrador do Sistema'
            . ' de Autenticação de usuários do TRF deve criar o usuário e atribuir o'
            . ' perfil "Membro de Comissão".',

        'MSG017' => 'O Membro de Comissão foi incluído com sucesso para o respectivo Inventário Anual.',
        'MSG018' => 'Não é permitida a exclusão de Membro de Comissão que já realizou parecer, consolidação ou ' .
            'aceite no respectivo Inventário Anual. Operação não realizada.',

        'MSG020' => 'O cancelamento do acesso do Membro de Comissão ao Inventário Anual informado '
            . 'foi realizado com sucesso.',
        'MSG021' => 'É obrigatório selecionar a lotação para associá-la ao Membro Auxiliar. Verifique.',
        'MSG022' => 'A lotação selecionada já está associada ao Membro Auxiliar. Verifique.',
        'MSG023' => 'O Membro Auxiliar informado possui cadastrado Ativo para acesso ao respectivo Inventário Anual. '
            . 'Inclusão não permitida.',
        'MSG024' => 'Não foi identificado usuário cadastrado para o Membro Auxiliar informado no Sistema de' .
            ' Autenticação de usuários do TRF. O perfil correspondente não foi aplicado. Para que o Membro' .
            ' Auxiliar tenha acesso ao Inventário WEB, o Administrador do Sistema de Autenticação de usuários' .
            ' do TRF deve criar o usuário e atribuir o perfil "Membro Auxiliar".',
        'MSG025' => 'O Membro Auxiliar e a associação com as lotações de sua responsabilidade,'
            . ' foram incluídos com sucesso para o respectivo Inventário Anual.',
        'MSG026' => 'Para inclusão de um novo Membro Auxiliar é obrigatório informar pelo menos'
            . ' uma lotação associada ao mesmo. Verifique.',
        'MSG027' => 'O perfil correspondente foi atribuído ao usuário no Sistema de autenticação de usuários do ' .
            'TRF (KeyCloak).',
        'MSG028' => 'O Membro Auxiliar informado já está vinculado ao Inventário Anual informado'
            . ' como Membro de Comissão ou Agente Consignatário. Condição não permitida. Verifique.',
        'MSG029' => 'O Membro de Comissão já está vinculado ao Inventário Anual informado como'
            . ' Membro Auxiliar ou Agente Consignatário. Condição não permitida. Verifique.',

        'MSG030' => 'Não é permitida a exclusão de Membro Auxiliar que já realizou operações nas coletas do '
            . 'respectivo Inventário Anual ou se, para uma das lotações vinculadas a ele, já foram enviadas coletas '
            . 'realizadas. Nesse caso, o Membro Auxiliar poderá ser Cancelado. Operação não realizada.',
        'MSG034' => 'Cancelamento realizado com sucesso.',
        'MSG037' => 'Foi identificado que a Coleta Recebida possui envio(s) posterior(es) ao respectivo envio em '
            . 'atualização. Alertamos que as atualizações realizadas não serão refletidas para esse(s)'
            . 'envio(s). Deseja realmente realizar a operação?',
        'MSG038' => 'A imagem foi adicionada ao bem patrimonial com sucesso.',
        'MSG039' => 'O estado de conservação do bem patrimonial foi atualizado com sucesso.',

        'MSG040' => 'O arquivo deverá ser do tipo BMP, JPG ou PNG e ter no máximo 2 MB. O arquivo selecionado está '
            . 'fora do padrão. Operação não realizada.',
        'MSG041' => 'Existem dados obrigatórios não preenchidos: %s. Verifique e refaça a operação.',
        'MSG043' => 'Bem patrimonial incluído com sucesso na Coleta Recebida.',
        'MSG044' => 'O número da etiqueta informado não consta na base de dados do sistema SICAM. Operação não '
            . 'poderá ser realizada com número de etiqueta não encontrado nesse sistema. Verifique.',
        'MSG045' => 'O número da etiqueta informado já consta na lista de bens patrimoniais na respectiva coleta'
            . ' recebida. Verifique e se o número informado estiver correto, proceda com a remoção desse bem da lista '
            . 'de bens "Encontrados sem etiqueta" na coleta recebida para evitar duplicidade e dados inconsistentes na '
            . 'geração da consolidação do inventário. Operação não permitida.',
        'MSG046' => 'O número da etiqueta informado não pertence à respectiva lotação no SICAM. Verifique e se o '
            . 'número informado estiver correto, proceda com a remoção desse bem da lista de bens '
            . '"Encontrados sem etiqueta" na coleta recebida para evitar duplicidade e dados inconsistentes na '
            . 'geração da consolidação do inventário. Operação não permitida.',
        'MSG047' => 'O número da etiqueta e os dados informados do Bem patrimonial foram atualizados com sucesso '
            . 'na Coleta Recebida.',

        'MSG056' => 'Existem coletas recebidas com mais de um envio realizado e mais de um deles encontra-se válido '
            . 'para verificação de inconsistência e para consolidação do inventário da lotação. Deverá ser escolhido '
            . 'apenas um envio válido e os outros envios deverão ser invalidados para essas funções do sistema. '
            . 'Verifique e refaça a operação.',

        'MSG061' => 'Verificação de inconsistência finalizada com sucesso.',
        'MSG064' => 'Seu usuário não tem acesso ao Inventário Anual informado. Operação não permitida.',
        'MSG065' => 'A última Consolidação do Inventário da Lotação encontra-se pendente de parecer da Comissão ou o '
            . 'parecer registrado foi Favorável. Nessas situações, não é mais permitida a geração de verificação de '
            . 'inconsistências para a lotação. Operação não realizada.',
        'MSG067' => 'Existe coleta recebida válida que não consta da última verificação de inconsistências da '
            . 'lotação. Nesse caso, a Consolidação não é permitida. Execute nova Verificação de Inconsistência ou '
            . 'invalide essa(s) coleta(s) antes de solicitar a Consolidação.',
        'MSG068' => 'Consolidação do Inventário finalizada com sucesso.',

        'MG001' => 'Coleta não pode ser excluida.',

        'MG002' => 'Bens materiais já foram excluídos.',


        //MENSAGENS DE LOG DE HISTÓRICO
        'LOG001' => "Inclusão de vinculo com a lotação '%s'", // nome da lotação
        'LOG002' => "Cancelamento de vinculo com a lotação '%s'. %s", // nome da lotação e justificativa

    ];

    public static function get($key)
    {
        return isset(self::$arrMsg[$key]) ? self::$arrMsg[$key] : self::$arrMsg[0];
    }
}
