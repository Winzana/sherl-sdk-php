<?php

namespace Sherl\Sdk\Cms\Errors;

class CmsErr
{
    public const CMS_CREATE_FAILED = 'cms/cms-create-failed';
    public const CMS_ADD_MEDIA_FAILED = 'cms/cms-add-media-failed';
    public const CMS_DELETE_MEDIA_FAILED = 'cms/cms-delete-media-failed';
    public const CMS_GET_SLUG_FAILED = 'cms/cms-get-slug-failed';
    public const CMS_GET_BY_ID_FAILED = 'cms/cms-get-by-id-failed';
    public const CMS_DELETE_BY_ID_FAILED = 'cms/cms-delete-by-id-failed';
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
    public const CREATE_CMS_EVENT_FAILED_FORBIDDEN = 'cms-event/creation-failed-forbidden';
    public const CREATE_CMS_EVENT_FAILED_CMS_NOT_EXIST = 'cms-event/creation-failed-cms-not-exist';
    public const CREATE_CMS_FAQS_FAILED_CMS_NOT_EXIST = 'cms-faqs/creation-failed-cms-not-exist';
    public const CMS_CREATE_POSTS_FAILED_CMS_NOT_EXIST = 'cms-post/creation-failed-cms-not-exist';
    public const CMS_CREATE_FAILED_CMS_NOT_EXIST = 'cms-static/creation-failed-cms-not-exist';
    public const CMS_CREATE_STORIES_FAILED_CMS_NOT_EXIST = 'cms-stories/creation-failed-cms-not-exist';
    public const CMS_CREATE_TRAININGS_FAILED_CMS_NOT_EXIST = 'cms-trainings/creation-failed-cms-not-exist';
    public const CMS_DELETE_BY_ID_FAILED_CMS_FORBIDDEN = 'cms-delete/creation-failed-delete-forbidden';
    public const CMS_DELETE_MEDIA_FAILED_MEDIA_NOT_EXIST = 'cms-delete/creation-failed-delete-already-exist';
    public const CMS_GET_BY_ID_FAILED_POST_FORBIDDEN = 'cms-post/creation-failed-post-get-forbidden';
    public const CMS_GET_SLUG_FAILED_ARTICLE_FORBIDDEN = 'cms-article/creation-failed-article-get-slug-forbidden';
    public const  CMS_GET_POSTS_FAILED_POSTS_FORBIDDEN = 'cms-post/creation-failed-post-get-forbidden';
    public const CMS_GET_PUBLIC_FIND_ID_FAILED_POST_FORBIDDEN = 'cms-public/creation-failed-post-public-forbidden';
    public const CMS_GET_PUBLIC_ARTICLES_FAILED_POSTS_FORBIDDEN = 'cms-article/creation-failed-article-public-forbidden';
    public const CREATE_CMS_EVENT_FAILED_CMS_FORBIDDEN = 'cms-article/creation-failed-article-slug-forbidden';
    public const CREATE_CMS_FAQS_FAILED_CMS_FORBIDDEN = 'cms-faqs/creation-failed-article-slug-forbidden';
    public const CREATE_CMS_POSTS_FAILED_CMS_FORBIDDEN = 'cms-faqs/creation-failed-article-slug-forbidden';
    public const CREATE_CMS_STATIC_PAGES_FAILED_FORBIDDEN = 'cms-faqs/creation-failed-article-slug-forbidden';
    public const CREATE_CMS_TRAINING_FAILED_FORBIDDEN = 'cms-faqs/creation-failed-article-slug-forbidden';
    public const CREATE_CMS_STORIES_FAILED_CMS_FORBIDDEN = 'cms-faqs/creation-failed-article-slug-forbidden';
    public const CREATE_CMS_MEDIA_FAILED_CMS_FORBIDDEN = 'cms-faqs/creation-failed-media-slug-forbidden';
    public const ARTICLE_NOT_FOUND = 'cms/article-not-found';

    public static $errors = [
        self::CmsErr.CMS_CREATE_FAILED => 'cms/cms-create-failed',
        self::CmsErr.CMS_ADD_MEDIA_FAILED => 'cms/cms-add-media-failed',
        self::CmsErr.CMS_DELETE_MEDIA_FAILED => 'cms/cms-delete-media-failed',
        self::CmsErr.CMS_GET_SLUG_FAILED => 'cms/cms-get-slug-failed',
        self::CmsErr.CMS_GET_BY_ID_FAILED => 'cms/cms-get-by-id-failed',
        self::CmsErr.CMS_DELETE_BY_ID_FAILED => 'cms/cms-delete-by-id-failed',
        self::CmsErr.CMS_UPDATE_ARTICLE_BY_ID_FAILED => 'cms/cms-update-article-by-id-failed',
        self::CmsErr.CMS_CREATE_TRAININGS_FAILED => 'cms/cms-create-trainings-failed',
        self::CmsErr.CMS_CREATE_STORIES_FAILED => 'cms/cms-create-stories-failed',
        self::CmsErr.CMS_CREATE_FAQS_FAILED => 'cms/cms-create-faqs-failed',
        self::CmsErr.CMS_CREATE_POSTS_FAILED => 'cms/cms-create-posts-failed',
        self::CmsErr.CMS_GET_POSTS_FAILED => 'cms/cms-get-posts-failed',
        self::CmsErr.CMS_GET_ARTICLE_BY_SLUG_FAILED => 'cms/cms-get-article-by-slug-failed',
        self::CmsErr.CMS_GET_PUBLIC_FIND_ID_FAILED => 'cms/cms-get-public-by-id-failed',
        self::CmsErr.CMS_GET_PUBLIC_ARTICLES_FAILED => 'cms/cms-get-public-articles-failed',
        self::CmsErr.CREATE_CMS_EVENT_FAILED => 'cms-event/creation-failed',
        self::CmsErr.CREATE_CMS_EVENT_FAILED_FORBIDDEN => 'cms-event/creation-failed-forbidden',
        self::CmsErr.CREATE_CMS_EVENT_FAILED_CMS_NOT_EXIST => 'cms-event/creation-failed-cms-not-exist',
        self::CmsErr.CREATE_CMS_FAQS_FAILED_CMS_NOT_EXIST => 'cms-faqs/creation-failed-cms-not-exist',
        self::CmsErr.CMS_CREATE_POSTS_FAILED_CMS_NOT_EXIST => 'cms-post/creation-failed-cms-not-exist',
        self::CmsErr.CMS_CREATE_FAILED_CMS_NOT_EXIST => 'cms-static/creation-failed-cms-not-exist',
        self::CmsErr.CMS_CREATE_STORIES_FAILED_CMS_NOT_EXIST => 'cms-stories/creation-failed-cms-not-exist',
        self::CmsErr.CMS_CREATE_TRAININGS_FAILED_CMS_NOT_EXIST => 'cms-trainings/creation-failed-cms-not-exist',
        self::CmsErr.CMS_DELETE_BY_ID_FAILED_CMS_FORBIDDEN => 'cms-delete/creation-failed-delete-forbidden',
        self::CmsErr.CMS_DELETE_MEDIA_FAILED_MEDIA_NOT_EXIST => 'cms-delete/creation-failed-delete-already-exist',
        self::CmsErr.CMS_GET_BY_ID_FAILED_POST_FORBIDDEN => 'cms-post/creation-failed-post-get-forbidden',
        self::CmsErr.CMS_GET_SLUG_FAILED_ARTICLE_FORBIDDEN => 'cms-article/creation-failed-article-get-slug-forbidden',
        self::CmsErr.CMS_GET_POSTS_FAILED_POSTS_FORBIDDEN => 'cms-post/creation-failed-post-get-forbidden',
        self::CmsErr.CMS_GET_PUBLIC_FIND_ID_FAILED_POST_FORBIDDEN => 'cms-public/creation-failed-post-public-forbidden',
        self::CmsErr.CMS_GET_PUBLIC_ARTICLES_FAILED_POSTS_FORBIDDEN => 'cms-article/creation-failed-article-public-forbidden',
        self::CmsErr.CREATE_CMS_EVENT_FAILED_CMS_FORBIDDEN => 'cms-article/creation-failed-article-slug-forbidden',
        self::CmsErr.CREATE_CMS_FAQS_FAILED_CMS_FORBIDDEN => 'cms-faqs/creation-failed-article-slug-forbidden',
        self::CmsErr.CREATE_CMS_POSTS_FAILED_CMS_FORBIDDEN => 'cms-faqs/creation-failed-article-slug-forbidden',
        self::CmsErr.CREATE_CMS_STATIC_PAGES_FAILED_FORBIDDEN => 'cms-faqs/creation-failed-article-slug-forbidden',
        self::CmsErr.CREATE_CMS_TRAINING_FAILED_FORBIDDEN => 'cms-faqs/creation-failed-article-slug-forbidden',
        self::CmsErr.CREATE_CMS_STORIES_FAILED_CMS_FORBIDDEN => 'cms-faqs/creation-failed-article-slug-forbidden',
        self::CmsErr.CREATE_CMS_MEDIA_FAILED_CMS_FORBIDDEN => 'cms-faqs/creation-failed-media-slug-forbidden',
        self::CmsErr.ARTICLE_NOT_FOUND => 'cms/article-not-found',
    ];
}
