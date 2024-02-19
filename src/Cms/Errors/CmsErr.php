<?php

namespace Sherl\Sdk\Cms\Errors;

class CmsErr
{
    public const CMS_CREATE_FAILED = 'cms/cms-create-failed';
    public const CMS_STATIC_PAGES_CREATE_FAILED = 'cms/cms-static-pages-create-failed';
    public const CMS_ADD_MEDIA_FAILED = 'cms/cms-add-media-failed';
    public const CMS_DELETE_MEDIA_FAILED = 'cms/cms-delete-media-failed';
    public const CMS_GET_SLUG_FAILED = 'cms/cms-get-slug-failed';
    public const CMS_GET_BY_ID_FAILED = 'cms/cms-get-by-id-failed';
    public const CMS_DELETE_ARTICLE_BY_ID_FAILED = 'cms/cms-delete-by-id-failed';
    public const CMS_UPDATE_ARTICLE_BY_ID_FAILED = 'cms/cms-update-article-by-id-failed';
    public const CMS_CREATE_TRAININGS_FAILED = 'cms/cms-create-trainings-failed';
    public const CMS_CREATE_STORIES_FAILED = 'cms/cms-create-stories-failed';
    public const CMS_CREATE_FAQS_FAILED = 'cms/cms-create-faqs-failed';
    public const CMS_CREATE_POSTS_FAILED = 'cms/cms-create-posts-failed';
    public const CMS_GET_POSTS_FAILED = 'cms/cms-get-posts-failed';
    public const CMS_GET_ARTICLE_BY_SLUG_FAILED = 'cms/cms-get-article-by-slug-failed';
    public const CMS_GET_PUBLIC_FIND_ID_FAILED = 'cms/cms-get-public-by-id-failed';
    public const CMS_GET_PUBLIC_ARTICLES_FAILED = 'cms/cms-get-public-articles-failed';
    public const CREATE_CMS_EVENT_FAILED = 'cms-event/creation-failed';
    public const CREATE_CMS_EVENT_FAILED_CMS_NOT_EXIST = 'cms-event/creation-failed-cms-not-exist';
    public const CREATE_CMS_FAQS_FAILED_CMS_NOT_EXIST = 'cms-faqs/creation-failed-cms-not-exist';
    public const CMS_CREATE_POSTS_FAILED_CMS_NOT_EXIST = 'cms-post/creation-failed-cms-not-exist';
    public const CMS_CREATE_FAILED_CMS_NOT_EXIST = 'cms-static/creation-failed-cms-not-exist';
    public const CMS_CREATE_STORIES_FAILED_CMS_NOT_EXIST = 'cms-stories/creation-failed-cms-not-exist';
    public const CMS_CREATE_TRAININGS_FAILED_CMS_NOT_EXIST = 'cms-trainings/creation-failed-cms-not-exist';
    public const CMS_DELETE_ARTICLE_BY_ID_FAILED_CMS_FORBIDDEN = 'cms-delete/creation-failed-delete-forbidden';
    public const CMS_DELETE_MEDIA_FAILED_MEDIA_NOT_EXIST = 'cms-delete/creation-failed-delete-already-exist';
    public const CMS_GET_BY_ID_FAILED_POST_FORBIDDEN = 'cms-post/creation-failed-post-get-forbidden';
    public const CMS_GET_SLUG_FAILED_ARTICLE_FORBIDDEN = 'cms-article/creation-failed-article-get-slug-forbidden';
    public const CMS_GET_PUBLIC_FIND_ID_FAILED_POST_FORBIDDEN = 'cms-public/creation-failed-post-public-forbidden';
    public const CMS_GET_PUBLIC_ARTICLES_FAILED_POSTS_FORBIDDEN = 'cms-article/creation-failed-article-public-forbidden';
    public const CMS_EVENT_CREATION_FAILED_FORBIDDEN = 'cms-event/creation-failed-forbidden';
    public const CMS_UPDATE_ARTICLE_BY_ID_FORBIDDEN = 'cms/update-article-by-id-forbidden';
    public const CMS_FAQS_CREATION_FAILED_FORBIDDEN = 'cms-faqs/creation-failed-forbidden';
    public const CMS_POSTS_CREATION_FAILED_FORBIDDEN = 'cms-posts/creation-failed-forbidden';
    public const CMS_STATIC_PAGES_CREATION_FAILED_FORBIDDEN = 'cms-faqs/creation-failed-article-slug-forbidden';
    public const CMS_TRAINING_CREATION_FAILED_FORBIDDEN = 'cms-training/creation-failed-forbidden';
    public const CMS_STORIES_CREATION_FAILED_FORBIDDEN = 'cms-stories/creation-failed-forbidden';
    public const CREATE_CMS_MEDIA_FAILED_CMS_FORBIDDEN = 'cms-faqs/creation-failed-media-slug-forbidden';
    public const ARTICLE_NOT_FOUND = 'cms/article-not-found';

    /** @var array<string, string> */
    public static $errors = [
        self::CMS_CREATE_FAILED => 'Failed to create CMS.',
        self::CMS_STATIC_PAGES_CREATE_FAILED => 'Failed to create static pages of CMS.',
        self::CMS_ADD_MEDIA_FAILED => 'Failed to add media to CMS.',
        self::CMS_DELETE_MEDIA_FAILED => 'Failed to delete media from CMS.',
        self::CMS_GET_SLUG_FAILED => 'Failed to retrieve CMS slug.',
        self::CMS_GET_BY_ID_FAILED => 'Failed to retrieve CMS by ID.',
        self::CMS_DELETE_ARTICLE_BY_ID_FAILED => 'Failed to delete CMS article by ID.',
        self::CMS_UPDATE_ARTICLE_BY_ID_FAILED => 'Failed to update CMS article by ID.',
        self::CMS_CREATE_TRAININGS_FAILED => 'Failed to create CMS trainings.',
        self::CMS_CREATE_STORIES_FAILED => 'Failed to create CMS stories.',
        self::CMS_CREATE_FAQS_FAILED => 'Failed to create CMS FAQs.',
        self::CMS_CREATE_POSTS_FAILED => 'Failed to create CMS posts.',
        self::CMS_GET_POSTS_FAILED => 'Failed to retrieve CMS posts.',
        self::CMS_GET_ARTICLE_BY_SLUG_FAILED => 'Failed to retrieve CMS article by slug.',
        self::CMS_GET_PUBLIC_FIND_ID_FAILED => 'Failed to retrieve public CMS by ID.',
        self::CMS_GET_PUBLIC_ARTICLES_FAILED => 'Failed to retrieve public CMS articles.',
        self::CREATE_CMS_EVENT_FAILED => 'Failed to create CMS event.',
        self::CREATE_CMS_EVENT_FAILED_CMS_NOT_EXIST => 'Failed to create CMS event - CMS does not exist.',
        self::CREATE_CMS_FAQS_FAILED_CMS_NOT_EXIST => 'Failed to create CMS FAQs - CMS does not exist.',
        self::CMS_CREATE_POSTS_FAILED_CMS_NOT_EXIST => 'Failed to create CMS posts - CMS does not exist.',
        self::CMS_CREATE_FAILED_CMS_NOT_EXIST => 'Failed to create static pages of CMS - CMS does not exist.',
        self::CMS_CREATE_STORIES_FAILED_CMS_NOT_EXIST => 'Failed to create CMS stories - CMS does not exist.',
        self::CMS_CREATE_TRAININGS_FAILED_CMS_NOT_EXIST => 'Failed to create CMS trainings - CMS does not exist.',
        self::CMS_DELETE_ARTICLE_BY_ID_FAILED_CMS_FORBIDDEN => 'Failed to delete CMS article by ID - Forbidden.',
        self::CMS_DELETE_MEDIA_FAILED_MEDIA_NOT_EXIST => 'Failed to delete media from CMS - Media does not exist.',
        self::CMS_GET_BY_ID_FAILED_POST_FORBIDDEN => 'Failed to retrieve CMS by ID - Forbidden.',
        self::CMS_GET_SLUG_FAILED_ARTICLE_FORBIDDEN => 'Failed to retrieve CMS slug - Forbidden.',
        self::CMS_GET_PUBLIC_FIND_ID_FAILED_POST_FORBIDDEN => 'Failed to retrieve public CMS by ID - Forbidden.',
        self::CMS_GET_PUBLIC_ARTICLES_FAILED_POSTS_FORBIDDEN => 'Failed to retrieve public CMS articles - Forbidden.',
        self::CMS_EVENT_CREATION_FAILED_FORBIDDEN => 'Failed to create CMS event - Forbidden.',
        self::CMS_FAQS_CREATION_FAILED_FORBIDDEN => 'Failed to create CMS FAQs - Forbidden.',
        self::CMS_POSTS_CREATION_FAILED_FORBIDDEN => 'Failed to create CMS posts - Forbidden.',
        self::CMS_STATIC_PAGES_CREATION_FAILED_FORBIDDEN => 'Failed to create static pages of CMS - Forbidden.',
        self::CMS_TRAINING_CREATION_FAILED_FORBIDDEN => 'Failed to create CMS trainings - Forbidden.',
        self::CMS_STORIES_CREATION_FAILED_FORBIDDEN => 'Failed to create CMS stories - Forbidden.',
        self::CREATE_CMS_MEDIA_FAILED_CMS_FORBIDDEN => 'Failed to create CMS media - Forbidden.',
        self::ARTICLE_NOT_FOUND => 'Article not found.',
        self::CMS_UPDATE_ARTICLE_BY_ID_FORBIDDEN => 'Failed to update CMS article by ID - Forbidden.',        
    ];
}
