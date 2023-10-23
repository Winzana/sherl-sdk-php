<?php

namespace Sherl\Sdk\User\Dto;

class ValidateResetPasswordInputDto
{
    /**
     * @var string
     */
    public $token;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $passwordRepeat;
}
