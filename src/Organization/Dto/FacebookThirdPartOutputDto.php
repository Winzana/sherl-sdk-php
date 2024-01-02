<?php

namespace Sherl\Sdk\Organization\Dto;

use JMS\Serializer\Annotation as Serializer;

use DateTime;

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
     * @var DateTime
     * @Serializer\Type("DateTime")
     */
    public $expirationDate;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    public $userID;
}
