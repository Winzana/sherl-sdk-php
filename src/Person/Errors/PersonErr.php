<?php

namespace Sherl\Sdk\Person\Errors;

class PersonErr
{
    public const NOT_FOUND = 'person/not-found';
    public const ADDRESS_NOT_FOUND = 'person/address-not-found';

    // UPDATE ADDRESS
    public const UPDATE_ADDRESS_FAILED = 'person/update-address-failed';
    public const UPDATE_ADDRESS_FORBIDDEN = 'person/update-address-forbidden';

    // FETCH
    public const FETCH_FAILED = 'person/fetch-failed';
    public const FETCH_FORBIDDEN = 'person/fetch-failed';
    public const FETCH_NOT_FOUND = 'person/fetch-failed';
    public const FETCH_ALREADY_EXISTS = 'person/fetch-failed';
    public const FETCH_PERSONS_FORBIDDEN = 'person/fetch-persons-forbidden';
    public const FETCH_PERSONS_FAILED = 'person/fetch-persons-failed';
    public const FETCH_POSITION_FORBIDDEN = 'person/fetch-position-forbidden';
    public const FETCH_POSITION_FAILED = 'person/fetch-position-failed';

    // GET CONFIGS
    public const GET_CONFIGS_FAILED = 'person/get-configs-failed';
    public const GET_CONFIGS_FORBIDDEN = 'person/get-configs-forbidden';

    // GET ME
    public const GET_ME_FAILED = 'person/get-me-failed';
    public const GET_ME_FORBIDDEN = 'person/get-me-forbidden';

    // GET PERSON BY ID
    public const GET_PERSON_BY_ID_FAILED = 'person/get-person-by-id-failed';
    public const GET_PERSON_BY_ID_FORBIDDEN = 'person/get-person-by-id-forbidden';


    // UPDATE PERSON BY ID
    public const UPDATE_PERSON_BY_ID_FAILED = 'person/update-person-by-id-failed';
    public const UPDATE_PERSON_BY_ID_FORBIDDEN = 'person/update-person-by-id-forbidden';
    public const PERSON_NOT_FOUND = 'person/person-not-found';

    // POST
    public const POST_NOT_FOUND = 'person/post-person-not-found';
    public const POST_ALREADY_EXISTS = 'person/post-person-already-exists';

    // CREATE PERSON
    public const CREATE_PERSON_FAILED = 'person/create-person-failed';
    public const CREATE_PERSON_FORBIDDEN = 'person/create-person-forbidden';
    public const CREATE_PERSON_ALREADY_EXISTS = 'person/create-person-already-exists';

    // REGISTER WITH EMAIL AND PASSWORD
    public const PERSON_ALREADY_EXISTS = 'person/register-with-email-and-password-already-exists';
    public const REGISTER_PERSON_FAILED = 'person/register-person-failed';
    public const REGISTER_PERSON_FORBIDDEN = 'person/register-person-forbidden';

    // CREATE ADDRESS
    public const CREATE_ADDRESS_FAILED = 'person/create-address-failed';
    public const CREATE_ADDRESS_FORBIDDEN = 'person/create-address-forbidden';
    public const CREATE_ADDRESS_ALREADY_EXISTS = 'person/create-address-already-exists';

    // DELETE ADDRESS
    public const DELETE_ADDRESS_FAILED = 'person/delete-address-failed';
    public const DELETE_ADDRESS_FORBIDDEN = 'person/delete-address-forbidden';

    // ADD PICTURE
    public const ADD_PICTURE_FAILED = 'person/post-picture-failed';
    public const ADD_PICTURE_FORBIDDEN = 'person/post-picture-forbidden';

    /**
     * @var array<string, string>
     */
    public static $errors = [
      // FETCH
      self::FETCH_FAILED => 'Failed to fetch person API',
      self::NOT_FOUND => 'Person not found',
      self::ADDRESS_NOT_FOUND => 'Failed to reach API. Address not found',
      self::FETCH_PERSONS_FORBIDDEN =>
        'Failed to fetch persons. Forbidden access',
      self::FETCH_PERSONS_FAILED => 'Failed to fetch persons',
      self::FETCH_POSITION_FORBIDDEN =>
        'Failed to fetch position. Forbidden access',
      self::FETCH_POSITION_FAILED => 'Failed to fetch position',

      self::GET_PERSON_BY_ID_FAILED => 'Failed to get person by id',
      self::GET_PERSON_BY_ID_FORBIDDEN =>
        'Failed to get person by id. Forbidden access',

      // UPDATE PERSON BY ID
      self::UPDATE_PERSON_BY_ID_FAILED => 'Failed to update person',
      self::UPDATE_PERSON_BY_ID_FORBIDDEN =>
        'Failed to update person. Forbidden access',
      self::PERSON_NOT_FOUND => 'Failed to fetch API. Person not found',

      // GET CONFIGS
      self::GET_CONFIGS_FAILED => 'Failed to get configs',
      self::GET_CONFIGS_FORBIDDEN => 'Failed to get configs. Forbidden access',

      // GET ME
      self::GET_ME_FAILED => 'Failed to get current user',
      self::GET_ME_FORBIDDEN => 'Failed to get current user. Forbidden access',

      // CREATE PERSON
      self::CREATE_PERSON_FAILED => 'Failed to create new person',
      self::CREATE_PERSON_FORBIDDEN =>
        'Failed to create new person. Forbidden access',
      self::CREATE_PERSON_ALREADY_EXISTS =>
        'Failed to create new person. Person already exists',

      // REGISTER WITH EMAIL AND PASSWORD
      self::PERSON_ALREADY_EXISTS =>
        'Failed to register. Person already exists',
      self::REGISTER_PERSON_FAILED => 'Failed to register person',
      self::REGISTER_PERSON_FORBIDDEN =>
        'Failed to register person. Forbidden access',

      // ADD PICTURE
      self::ADD_PICTURE_FAILED => 'Failed to add picture to person profile',
      self::ADD_PICTURE_FORBIDDEN =>
        'Failed to add picture to person profile, access denied',

      // CREATE ADDRESS
      self::CREATE_ADDRESS_FAILED => 'Failed to create new address',
      self::CREATE_ADDRESS_FORBIDDEN => 'Failed to create new address. Forbidden access',
      self::CREATE_ADDRESS_ALREADY_EXISTS => 'Failed to create new address. Address already exists',

      // UPDATE ADDRESS
      self::UPDATE_ADDRESS_FAILED => 'Failed to update address',
      self::UPDATE_ADDRESS_FORBIDDEN => 'Failed to update address. Forbidden access',

      // DELETE ADDRESS
      self::DELETE_ADDRESS_FAILED => 'Failed to delete address',
      self::DELETE_ADDRESS_FORBIDDEN => 'Failed to delete address. Forbidden access',
    ];
};
