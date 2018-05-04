<?php

namespace src\enum;

use MyCLabs\Enum\Enum;

class DefaultMessages extends Enum
{
    const INTERNAL_ERROR_TITLE = 'Houve um Erro Interno. ';
    const INTERNAL_ERROR_BODY = 'Desculpe-me pelo transtorno, mas houve um probleminha interno. Entre em contato com adm.';

    const PATIENT_ALREADY_REGISTED_TITLE = 'Paciente já possui cadastro!';
    const PATIENT_ALREADY_REGISTED_BODY = 'CPF e RG já estão sendo utilizados';
}