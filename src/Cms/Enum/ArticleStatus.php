<?php

namespace Sherl\Sdk\Cms\Enum;

enum ArticleStatus: string
{
    case DRAFT = 'draft';

    case PUBLISHED = 'published';

    case ARCHIVED = 'archived';
}
