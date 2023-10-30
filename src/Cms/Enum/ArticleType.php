<?php

namespace Sherl\Sdk\Cms\Enum;

enum ArticleType: string
{
    case BLOG = 'blog';

    case STORY = 'story';

    case TRAINING = 'training';

    case PAGE = 'page';

    case FAQ = 'faq';
}
