<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

class FacebookThirdPartOutputDto
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $accessToken;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $longLivedUserAccessToken;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $expirationDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $userID;
}
