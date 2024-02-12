<?php

namespace Sherl\Sdk\Contact\Errors;

class ContactErr
{
    public const CONTACT_NOT_FOUND = 'contact/contact-not-found';

    // SEND CONTACT
    public const SEND_CONTACT_FAILED = 'contact/send-contact-failed';
    public const SEND_CONTACT_FORBIDDEN = 'contact/send-contact-forbidden';

    // CONTACT PERSON
    public const CONTACT_PERSON_FAILED = 'contact/contact-person-failed';
    public const CONTACT_PERSON_FORBIDDEN = 'contact/contact-person-forbidden';



    /** @var array<string, string>
    */
    public static $errors =  [
        self::CONTACT_NOT_FOUND =>
        'Failed to reach contact API. Contact not found',

      // CONTACT PERSON
      self::CONTACT_PERSON_FAILED => 'Failed to contact person',
      self::CONTACT_PERSON_FORBIDDEN =>
        'Failed to contact person. Forbidden access',

      // SEND CONTACT
      self::SEND_CONTACT_FAILED => 'Failed to send contact',
      self::SEND_CONTACT_FORBIDDEN =>
        'Failed to send contact. Forbidden access',
        ];
};
