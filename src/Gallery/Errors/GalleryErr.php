<?php

namespace Sherl\Sdk\Gallery\Errors;

class GalleryErr
{
    // DYNAMIC BACKGROUND
    public const DYNAMIC_BACKGROUND_NOT_FOUND = 'gallery/dynamic-background-not-found';

    // GALLERY
    public const GALLERY_NOT_FOUND = 'gallery/gallery-not-found';

    // ADD DYNAMIC BACKGROUND
    public const ADD_DYNAMIC_BACKGROUND_FAILED = 'gallery/add-dynamic-background-failed';
    public const ADD_DYNAMIC_BACKGROUND_FORBIDDEN = 'gallery/add-dynamic-background-forbidden';
    public const ADD_DYNAMIC_BACKGROUND_NOT_FOUND = 'gallery/add-dynamic-background-not-found';

    // CREATE GALLERY
    public const CREATE_GALLERY_FAILED = 'gallery/create-gallery-failed';
    public const CREATE_GALLERY_FORBIDDEN = 'gallery/create-gallery-forbidden';

    // DELETE DYNAMIC BACKGROUND
    public const DELETE_DYNAMIC_BACKGROUND_FAILED = 'gallery/delete-dynamic-background-failed';
    public const DELETE_DYNAMIC_BACKGROUND_FORBIDDEN = 'gallery/delete-dynamic-background-forbidden';

    // DELETE GALLERY
    public const DELETE_GALLERY_FAILED = 'gallery/delete-gallery-failed';
    public const DELETE_GALLERY_FORBIDDEN = 'gallery/delete-gallery-forbidden';

    // GET DYNAMIC BACKGROUNDS
    public const GET_DYNAMIC_BACKGROUNDS_FAILED = 'gallery/get-dynamic-backgrounds-failed';
    public const GET_DYNAMIC_BACKGROUNDS_FORBIDDEN = 'gallery/get-dynamic-backgrounds-forbidden';

    // GET GALLERIES
    public const GET_GALLERIES_FAILED = 'gallery/get-gallery-failed';
    public const GET_GALLERIES_FORBIDDEN = 'gallery/get-gallery-forbidden';

    // UPDATE DYNAMIC BACKGROUND
    public const UPDATE_DYNAMIC_BACKGROUND_FAILED = 'gallery/update-dynamic-background-failed';
    public const UPDATE_DYNAMIC_BACKGROUND_FORBIDDEN = 'gallery/update-dynamic-background-forbidden';

    /**
     * @var array<string, string>
     */
    public static $errors = [
      // DYNAMIC BACKGROUND
      self::DYNAMIC_BACKGROUND_NOT_FOUND =>
        'Failed to fetch dynamic background. Dynamic background not found',

      // GALLERY
      self::GALLERY_NOT_FOUND => 'Failed to fetch gallery. Gallery not found',

      // ADD DYNAMIC
      self::ADD_DYNAMIC_BACKGROUND_FAILED =>
        'Failed to add dynamic background',
      self::ADD_DYNAMIC_BACKGROUND_FORBIDDEN =>
        'Failed to add dynamic background. Forbidden access',
      self::ADD_DYNAMIC_BACKGROUND_NOT_FOUND =>
        'Failed to add dynamic background. Page not found',

      // CREATE GALLERY
      self::CREATE_GALLERY_FAILED => 'Failed to create gallery',
      self::CREATE_GALLERY_FORBIDDEN =>
        'Failed to create gallery. Forbidden access',

      // DELETE DYNAMIC BACKGROUND
      self::DELETE_DYNAMIC_BACKGROUND_FAILED =>
        'Failed to delete dynamic background',
      self::DELETE_DYNAMIC_BACKGROUND_FORBIDDEN =>
        'Failed to delete dynamic background. Forbidden access',

      // DELETE GALLERY
      self::DELETE_GALLERY_FAILED => 'Failed to delete gallery',
      self::DELETE_GALLERY_FORBIDDEN => 'Failed to delete gallery',

      // UPDATE DYNAMIC BACKGROUND
      self::UPDATE_DYNAMIC_BACKGROUND_FAILED =>
        'Failed to update dynamic background',
      self::UPDATE_DYNAMIC_BACKGROUND_FORBIDDEN =>
        'Failed to update dynamic background. Forbidden access',

      // GET DYNAMIC BACKGROUNDS
      self::GET_DYNAMIC_BACKGROUNDS_FAILED =>
        'Failed to get dynamic backgrounds',
      self::GET_DYNAMIC_BACKGROUNDS_FORBIDDEN =>
        'Failed to get dynamic backgrounds. Forbidden access',

      // GET GALLERIES
      self::GET_GALLERIES_FAILED => 'Failed to get galleries',
      self::GET_GALLERIES_FORBIDDEN =>
        'Failed to get galleries. Forbidden access',
      ];
};
