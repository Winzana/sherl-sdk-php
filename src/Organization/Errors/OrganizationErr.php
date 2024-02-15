<?php

namespace Sherl\Sdk\Organization\Errors;

class OrganizationErr
{
    // GET PUBLIC ORGANIZATION
    public const GET_PUBLIC_ORGANIZATION_FAILED = 'organization/get-public-organization-failed';
    public const GET_PUBLIC_ORGANIZATION_FORBIDDEN = 'organization/get-public-organization-forbidden';

    // GET PUBLIC ORGANIZATIONS
    public const GET_PUBLIC_ORGANIZATIONS_FAILED = 'organization/get-public-organizations-failed';
    public const GET_PUBLIC_ORGANIZATIONS_FORBIDDEN = 'organization/get-public-organizations-forbidden';

    // GET ORGANIZATION BY SLUG
    public const GET_PUBLIC_ORGANIZATION_BY_SLUG_FAILED = 'organization/get-public-organization-by-slug-failed';
    public const GET_PUBLIC_ORGANIZATION_BY_SLUG_FORBIDDEN = 'organization/get-public-organization-by-slug-forbidden';

    // GET ORGANIZATIONS
    public const GET_ORGANIZATIONS_FAILED = 'organization/get-organizations-failed';
    public const GET_ORGANIZATIONS_FORBIDDEN = 'organization/get-organizations-forbidden';

    // GET ORGANIZATION
    public const GET_ORGANIZATION_FAILED = 'organization/get-organization-failed';
    public const GET_ORGANIZATION_FORBIDDEN = 'organization/get-organization-forbidden';

    // GET RIBS
    public const GET_RIBS_FAILED = 'organization/fetch-documents-failed';
    public const GET_RIBS_FORBIDDEN = 'organization/fetch-documents-forbidden';

    // GET KYCS
    public const GET_KYCS_FAILED = 'organization/get-kycs-failed';
    public const GET_KYCS_FORBIDDEN = 'organization/get-kycs-forbidden';
    public const GET_KYCS_NOT_FOUND = 'organization/get-kycs-not-found';

    // CREATE ORGANIZATION
    public const CREATE_ORGANIZATION_FAILED = 'organization/create-organization-failed';
    public const CREATE_ORGANIZATION_FORBIDDEN = 'organization/create-organization-forbidden';

    // CREATE PICTURE FROM MEDIA
    public const CREATE_PICTURE_FROM_MEDIA_FAILED = 'organization/create-picture-from-media-failed';
    public const CREATE_PICTURE_FROM_MEDIA_FORBIDDEN = 'organization/create-picture-from-media-forbidden';

    // CREATE PICTURE
    public const CREATE_PICTURE_FAILED = 'organization/create-picture-failed';
    public const CREATE_PICTURE_FORBIDDEN = 'organization/create-picture-forbidden';

    // CREATE BACKGROUND IMAGE FROM MEDIA
    public const CREATE_BACKGROUND_IMAGE_FROM_MEDIA_FAILED = 'organization/create-background-image-from-media-failed';
    public const CREATE_BACKGROUND_IMAGE_FROM_MEDIA_FORBIDDEN = 'organization/create-background-image-from-media-forbidden';

    // CREATE BACKGROUND IMAGE
    public const CREATE_BACKGROUND_IMAGE_FAILED = 'organization/create-background-image-failed';
    public const CREATE_BACKGROUND_IMAGE_FORBIDDEN = 'organization/create-background-image-forbidden';
    public const ORGANIZATION_NOT_FOUND = 'organization/organization-not-found';

    // CREATE OPENING HOURS SPECIFICATION
    public const CREATE_OPENING_HOURS_SPECIFICATION_FAILED = 'organization/create-opening-hours-specification-failed';
    public const CREATE_OPENING_HOURS_SPECIFICATION_FORBIDDEN = 'organization/create-opening-hours-specification-forbidden';

    // CREATE EMPLOYEE
    public const CREATE_EMPLOYEE_FAILED = 'organization/create-employee-failed';
    public const CREATE_EMPLOYEE_FORBIDDEN = 'organization/create-employee-forbidden';
    public const EMPLOYEE_NOT_FOUND = 'organization/employee-not-found';

    // CREATE FOUNDER
    public const CREATE_FOUNDER_FAILED = 'organization/create-founder-failed';
    public const CREATE_FOUNDER_FORBIDDEN = 'organization/create-founder-forbidden';
    public const FOUNDER_NOT_FOUND = 'organization/founder-not-found';

    // ADD LOGO
    public const ADD_LOGO_FAILED = 'organization/add-logo-failed';
    public const ADD_LOGO_FORBIDDEN = 'organization/add-logo-forbidden';
    public const LOGO_NOT_FOUND = 'organization/logo-not-found';

    // ADD RIB
    public const ADD_RIB_FAILED = 'organization/add-rib-failed';
    public const ADD_RIB_FORBIDDEN = 'organization/add-rib-forbidden';

    // ADD ADDRESS
    public const ADD_ADDRESS_FAILED = 'organization/add-address-failed';
    public const ADD_ADDRESS_FORBIDDEN = 'organization/add-address-forbidden';

    // ADD KYC
    public const ADD_DOCUMENT_FAILED = 'organization/add-failed';
    public const ADD_DOCUMENT_FORBIDDEN = 'organization/add-forbidden';
    public const KYC_NOT_FOUND = 'organization/kyc-not-found';

    // REGISTER ORGANIZATION
    public const REGISTER_ORGANIZATION_FAILED = 'organization/register-organization-failed';
    public const REGISTER_ORGANIZATION_FORBIDDEN = 'organization/register-organization-forbidden';

    // REGISTER ORGANIZATION TO PERSON
    public const REGISTER_ORGANIZATION_TO_PERSON_FAILED = 'organization/register-organization-to-person-failed';
    public const REGISTER_ORGANIZATION_TO_PERSON_FORBIDDEN = 'organization/register-organization-to-person-forbidden';
    public const REGISTER_ORGANIZATION_TO_PERSON_NOT_FOUND = 'organization/register-organization-to-person-not-found';

    // SET COMMUNICATION
    public const SET_COMMUNICATION_FAILED = 'organization/set-communication-failed';
    public const SET_COMMUNICATION_FORBIDDEN = 'organization/set-communication-forbidden';
    public const COMMUNICATION_NOT_FOUND = 'organization/set-communication-not-found';

    // SUGGEST ORGANIZATION
    public const SUGGEST_ORGANIZATION_FAILED = 'organization/suggest-organization-failed';
    public const SUGGEST_ORGANIZATION_FORBIDDEN = 'organization/suggest-organization-forbidden';
    public const SUGGEST_ORGANIZATION_NOT_FOUND = 'organization/suggest-organization-not-found';

    // UPDATE ORGANIZATION
    public const UPDATE_ORGANIZATION_FAILED = 'organization/update-organization-failed';
    public const UPDATE_ORGANIZATION_FORBIDDEN = 'organization/update-organization-forbidden';

    // UPDATE ADDRESS
    public const UPDATE_ADDRESS_FAILED = 'organization/update-address-failed';
    public const UPDATE_ADDRESS_FORBIDDEN = 'organization/update-address-forbidden';

    // UPDATE EMPLOYEE
    public const UPDATE_EMPLOYEE_FAILED = 'organization/update-employee-failed';
    public const UPDATE_EMPLOYEE_FORBIDDEN = 'organization/update-employee-forbidden';

    // UPDATE FOUNDER
    public const UPDATE_FOUNDER_FAILED = 'organization/update-founder-failed';
    public const UPDATE_FOUNDER_FORBIDDEN = 'organization/update-founder-forbidden';

    // UPDATE OPENING HOURS SPECIFICATIONS
    public const UPDATE_OPENING_HOURS_SPECIFICATION_FAILED = 'organization/update-opening-hours-specification-failed';
    public const UPDATE_OPENING_HOURS_SPECIFICATION_FORBIDDEN = 'organization/update-opening-hours-specification-forbidden';

    // UPDATE DOCUMENT
    public const UPDATE_DOCUMENT_FAILED = 'organization/update-failed';
    public const UPDATE_DOCUMENT_FORBIDDEN = 'organization/update-forbidden';

    // DELETE ADDRESS
    public const DELETE_ADDRESS_FAILED = 'organization/delete-address-failed';
    public const DELETE_ADDRESS_FORBIDDEN = 'organization/delete-address-forbidden';
    public const ADDRESS_NOT_FOUND = 'organization/address-not-found';

    // DELETE BACKGROUND IMAGE
    public const DELETE_BACKGROUND_IMAGE_FAILED = 'organization/delete-background-image-failed';
    public const DELETE_BACKGROUND_IMAGE_FORBIDDEN = 'organization/delete-background-image-forbidden';
    public const BACKGROUND_IMAGE_NOT_FOUND = 'organization/delete-background-image-not-found';

    // DELETE EMPLOYEE
    public const DELETE_EMPLOYEE_FAILED = 'organization/delete-employee-failed';
    public const DELETE_EMPLOYEE_FORBIDDEN = 'organization/delete-employee-forbidden';

    // DELETE FOUNDER
    public const DELETE_FOUNDER_FAILED = 'organization/delete-founder-failed';
    public const DELETE_FOUNDER_FORBIDDEN = 'organization/delete-founder-forbidden';

    // DELETE LOGO
    public const DELETE_LOGO_FAILED = 'organization/delete-logo-failed';
    public const DELETE_LOGO_FORBIDDEN = 'organization/delete-logo-forbidden';

    // DELETE OPENING HOURS SPECIFICATION
    public const DELETE_OPENING_HOURS_SPECIFICATION_FAILED = 'organization/delete-opening-hours-specification-failed';
    public const DELETE_OPENING_HOURS_SPECIFICATION_FORBIDDEN = 'organization/delete-opening-hours-specification-forbidden';

    // DELETE PICTURE
    public const DELETE_PICTURE_FAILED = 'organization/delete-picture-failed';
    public const DELETE_PICTURE_FORBIDDEN = 'organization/delete-picture-forbidden';

    // UNUSED
    public const UPDATE_IS_PUBLIC_ORGANIZATION_FAILED = 'organization/update-is-public-organization-failed';
    public const UPDATE_THIRD_PARTY_FAILED = 'organization/update-third-party-failed';
    public const UPDATE_THIRD_PARTY_IMPOSSIBLE = 'organization/update-third-party-impossible';
    public const ADD_KYC_FAILED = 'organization/add-kyc-failed';

    /**
     * @var array<string, string> Associative array where both keys and values are strings.
     */
    public static array $errors = [
      // UNUSED
      self::ADD_KYC_FAILED => 'Failed to add KYC',
      self::ADD_ADDRESS_FAILED => 'Failed to add address',
      self::UPDATE_IS_PUBLIC_ORGANIZATION_FAILED =>
        'Failed to update isPublic organization',
      self::UPDATE_THIRD_PARTY_FAILED => 'Failed to update third party',
      self::UPDATE_THIRD_PARTY_IMPOSSIBLE =>
        'Impossible to update third party',

      // ADDRESS
      self::ADDRESS_NOT_FOUND =>
        'Failed to delete address. Address not found',

      // GET PUBLIC ORGANIZATION
      self::GET_PUBLIC_ORGANIZATION_FAILED =>
        'Failed to fetch public organization',
      self::GET_PUBLIC_ORGANIZATION_FORBIDDEN =>
        'Failed to fetch public organization. Forbidden access',

      // GET PUBLIC ORGANIZATIONS
      self::GET_PUBLIC_ORGANIZATIONS_FAILED =>
        'Failed to fetch public organizations',
      self::GET_PUBLIC_ORGANIZATIONS_FORBIDDEN =>
        'Failed to fetch public organizations. Forbidden access',

      // GET ORGANIZATION BY SLUG
      self::GET_PUBLIC_ORGANIZATION_BY_SLUG_FAILED =>
        'Failed to fetch organization by slug',
      self::GET_PUBLIC_ORGANIZATION_BY_SLUG_FORBIDDEN =>
        'Failed to fetch organization by slug. Forbidden access',

      // GET ORGANIZATIONS
      self::GET_ORGANIZATIONS_FAILED => 'Failed to fetch organizations',
      self::GET_ORGANIZATIONS_FORBIDDEN =>
        'Failed to fetch organizations. Forbidden access',

      // GET ORGANIZATION
      self::GET_ORGANIZATION_FAILED => 'Failed to fetch organization',
      self::GET_ORGANIZATION_FORBIDDEN =>
        'Failed to fetch organization. Forbidden access',

      // GET RIBs
      self::GET_RIBS_FAILED => 'Failed to fetch all organization RIBs',
      self::GET_RIBS_FORBIDDEN =>
        'Failed to fetch all organization RIBs. Forbidden access',

      // GET KYCS
      self::GET_KYCS_FAILED => 'Failed to get KYCs',
      self::GET_KYCS_FORBIDDEN => 'Failed to get KYCs. Forbidden access',
      self::GET_KYCS_NOT_FOUND => 'Failed to get KYCs. KYCs not found',

      // CREATE ORGANIZATION
      self::CREATE_ORGANIZATION_FAILED => 'Failed to create organization',
      self::CREATE_ORGANIZATION_FORBIDDEN =>
        'Failed to create organization. Forbidden access',

      // CREATE BACKGROUND IMAGE FROM MEDIA
      self::CREATE_BACKGROUND_IMAGE_FROM_MEDIA_FAILED =>
        'Failed to create background image from media',
      self::CREATE_BACKGROUND_IMAGE_FROM_MEDIA_FORBIDDEN =>
        'Failed to create background image from media. Forbidden access',

      // CREATE BACKGROUND IMAGE
      self::CREATE_BACKGROUND_IMAGE_FAILED =>
        'Failed to create background image',
      self::CREATE_BACKGROUND_IMAGE_FORBIDDEN =>
        'Failed to create background image. Forbidden access',
      self::ORGANIZATION_NOT_FOUND =>
        'Failed to fetch API. Organization not found',

      // CREATE PICTURE FROM MEDIA
      self::CREATE_PICTURE_FROM_MEDIA_FAILED =>
        'Failed to create picture from media',
      self::CREATE_PICTURE_FROM_MEDIA_FORBIDDEN =>
        'Failed to create picture from media. Forbidden access',

      // CREATE PICTURE
      self::CREATE_PICTURE_FAILED => 'Failed to create picture',
      self::CREATE_PICTURE_FORBIDDEN =>
        'Failed to create picture. Forbidden access',

      // CREATE EMPLOYEE
      self::CREATE_EMPLOYEE_FAILED => 'Failed to create employee',
      self::CREATE_EMPLOYEE_FORBIDDEN =>
        'Failed to create employee. Forbidden access',
      self::EMPLOYEE_NOT_FOUND =>
        'Failed to reach employee API. Employee not found',

      // CREATE FOUNDER
      self::CREATE_FOUNDER_FAILED => 'Failed to create founder',
      self::CREATE_FOUNDER_FORBIDDEN =>
        'Failed to create founder. Forbidden access',
      self::FOUNDER_NOT_FOUND =>
        'Failed to reach founder API. Founder not found',

      // REGISTER ORGANIZATION
      self::REGISTER_ORGANIZATION_FAILED =>
        'Failed to register organization',
      self::REGISTER_ORGANIZATION_FORBIDDEN =>
        'Failed to register organization. Forbidden access',

      // REGISTER ORGANIZATION TO PERSON
      self::REGISTER_ORGANIZATION_TO_PERSON_FAILED =>
        'Failed to register organization to person',
      self::REGISTER_ORGANIZATION_TO_PERSON_FORBIDDEN =>
        'Failed to register organization to person. Forbidden access',
      self::REGISTER_ORGANIZATION_TO_PERSON_NOT_FOUND =>
        'Failed to register organization to person. Organization not found',

      // CREATE OPENING HOURS SPECIFICATION
      self::CREATE_OPENING_HOURS_SPECIFICATION_FAILED =>
        'Failed to create opening hours specification',
      self::CREATE_OPENING_HOURS_SPECIFICATION_FORBIDDEN =>
        'Failed to create opening hours specification. Forbidden access',

      // ADD LOGO
      self::ADD_LOGO_FAILED => 'Failed to add logo',
      self::ADD_LOGO_FORBIDDEN => 'Failed to add logo. Forbidden access',
      self::LOGO_NOT_FOUND => 'Failed to reach logo API. Logo not found',

      // ADD KYC
      self::ADD_DOCUMENT_FAILED => 'Failed to add document',
      self::ADD_DOCUMENT_FORBIDDEN =>
        'Failed to add document. Forbidden access',
      self::KYC_NOT_FOUND =>
        'Failed to reach document API. KYC not found',

      // ADD RIB
      self::ADD_RIB_FAILED => 'Failed to add RIB',
      self::ADD_RIB_FORBIDDEN => 'Failed to add RIB. Forbidden access',

      // SET COMMUNICATION
      self::SET_COMMUNICATION_FAILED => 'Failed to set communication',
      self::SET_COMMUNICATION_FORBIDDEN =>
        'Failed to set communication. Forbidden access',
      self::COMMUNICATION_NOT_FOUND =>
        'Failed to set communication. Communication not found',

      // UPDATE ORGANIZATION
      self::UPDATE_ORGANIZATION_FAILED => 'Failed to update organization',
      self::UPDATE_ORGANIZATION_FORBIDDEN =>
        'Failed to update organization',

      // UPDATE EMPLOYEE
      self::UPDATE_EMPLOYEE_FAILED => 'Failed to update employee',
      self::UPDATE_EMPLOYEE_FORBIDDEN =>
        'Failed to update employee. Forbidden access',

      // UPDATE FOUNDER
      self::UPDATE_FOUNDER_FAILED => 'Failed to update founder',
      self::UPDATE_FOUNDER_FORBIDDEN =>
        'Failed to update founder. Forbidden access',

      // UPDATE DOCUMENT
      self::UPDATE_DOCUMENT_FAILED => 'Failed to update document',
      self::UPDATE_DOCUMENT_FORBIDDEN =>
        'Failed to update document. Forbidden access',

      // UPDATE OPENING HOURS SPECIFICATION
      self::UPDATE_OPENING_HOURS_SPECIFICATION_FAILED =>
        'Failed to update opening hours specification',
      self::UPDATE_OPENING_HOURS_SPECIFICATION_FORBIDDEN =>
        'Failed to update opening hours specification. Forbidden access',

      // UPDATE ADDRESS
      self::UPDATE_ADDRESS_FAILED => 'Failed to update address',
      self::UPDATE_ADDRESS_FORBIDDEN =>
        'Failed to update address. Forbidden access',

      // SUGGEST ORGANIZATION
      self::SUGGEST_ORGANIZATION_FAILED =>
        'Failed to suggest organization',
      self::SUGGEST_ORGANIZATION_FORBIDDEN =>
        'Failed to suggest organization. Forbidden access',
      self::SUGGEST_ORGANIZATION_NOT_FOUND =>
        'Failed to suggest organization. Organization not found',

      // DELETE ADDRESS
      self::DELETE_ADDRESS_FAILED => 'Failed to delete address',
      self::DELETE_ADDRESS_FORBIDDEN =>
        'Failed to delete address. Forbidden access',

      // DELETE LOGO
      self::DELETE_LOGO_FAILED => 'Failed to delete logo',
      self::DELETE_LOGO_FORBIDDEN =>
        'Failed to delete logo. Forbidden access',

      // DELETE BACKGROUND IMAGE
      self::DELETE_BACKGROUND_IMAGE_FAILED =>
        'Failed to delete background image',
      self::DELETE_BACKGROUND_IMAGE_FORBIDDEN =>
        'Failed to delete background image. Forbidden access',
      self::BACKGROUND_IMAGE_NOT_FOUND =>
        'Failed to delete background image. Background image not found',

      // DELETE EMPLOYEE
      self::DELETE_EMPLOYEE_FAILED => 'Failed to delete employee',
      self::DELETE_EMPLOYEE_FORBIDDEN =>
        'Failed to delete employee. Forbidden access',

      // DELETE FOUNDER
      self::DELETE_FOUNDER_FAILED => 'Failed to delete founder',
      self::DELETE_FOUNDER_FORBIDDEN =>
        'Failed to delete founder. Forbidden access',

      // DELETE OPENING HOURS SPECIFICATION
      self::DELETE_OPENING_HOURS_SPECIFICATION_FAILED =>
        'Failed to delete opening hours specification',
      self::DELETE_OPENING_HOURS_SPECIFICATION_FORBIDDEN =>
        'Failed to delete opening hours specification. Forbidden access',

      // DELETE PICTURE
      self::DELETE_PICTURE_FAILED => 'Failed to delete picture',
      self::DELETE_PICTURE_FORBIDDEN =>
        'Failed to delete picture. Forbidden access',
    ];
}
