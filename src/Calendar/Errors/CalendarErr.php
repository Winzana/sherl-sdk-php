<?php

namespace Sherl\Sdk\Calendar\Errors;

class CalendarErr
{
    public const GET_CALENDAR_EVENTS_FOR_CURRENT_PERSON_FAILED = 'calendar-event/get-failed-for-current-person';
    public const CREATE_CALENDAR_EVENT_FAILED = 'calendar-event/creation-failed';
    public const CREATE_CALENDAR_EVENT_FORBIDDEN = 'calendar-event/creation-forbidden';
    public const CREATE_CALENDAR_EVENT_FAILED_CALENDAR_NOT_EXIST = 'calendar-event/creation-failed-calendar-not-exist';
    public const CREATE_CALENDAR_EVENT_FAILED_EVENT_ALREADY_EXIST = 'calendar-event/creation-failed-event-already-exist';

    public const UPDATE_CALENDAR_EVENT_FAILED = 'calendar-event/update-failed';
    public const UPDATE_CALENDAR_EVENT_FORBIDDEN = 'calendar-event/update-forbidden';
    public const CALENDAR_NOT_FOUND = 'calendar-event/calendar-not-found';

    public const DELETE_CALENDAR_EVENT_FAILED = 'calendar-event/delete-failed';
    public const DELETE_CALENDAR_EVENT_FORBIDDEN = 'calendar-event/delete-forbidden';
    public const GET_CALENDAR_EVENTS_WITH_CALENDAR_ID_FAILED = 'calendar-event/get-with-calendar-id-failed';

    public const GET_CALENDAR_EVENT_BY_ID_FAILED = 'calendar-event/get-by-id-failed';
    public const GET_CALENDAR_EVENT_BY_ID_FORBIDDEN = 'calendar-event/get-by-id-fobidden';
    public const GET_CALENDAR_EVENTS_FOR_OWNER_FAILED = 'calendar-event/get-by-owner-failed';
    public const GET_CALENDAR_EVENTS_FOR_OWNER_FORBIDDEN = 'calendar-event/get-by-owner-fobidden';

    public const GET_CALENDAR_EVENTS_FOR_CURRENT_USER_FAILED = 'calendar-event/get-for-current-user-failed';
    public const GET_CALENDAR_EVENTS_FOR_CURRENT_USER_FORBIDDEN = 'calendar-event/get-for-current-user-fobidden';

    public const FIND_CALENDAR_AVAILABILITIES_FAILED = 'calendar/get-availabilities-failed';
    public const FIND_CALENDAR_AVAILABILITIES_FORBIDDEN = 'calendar/get-availabilities-forbidden';

    public const CREATE_CALENDAR_FAILED = 'calendar/creation-failed';
    public const CREATE_CALENDAR_FORBIDDEN = 'calendar/creation-forbidden';

    public const UPDATE_CALENDAR_FAILED = 'calendar/update-failed';
    public const UPDATE_CALENDAR_FORBIDDEN = 'calendar/update-calendar-forbidden';
    public const UPDATE_CALENDAR_FAILED_NOT_EXIST = 'calendar/update-failed-not-exist';

    public const DELETE_CALENDAR_FORBIDDEN = 'calendar/delete-calendar-forbidden';
    public const DELETE_CALENDAR_FAILED = 'calendar/delete-failed';

    public const GET_ONE_CALENDAR_FAILED = 'calendar/get-one-failed';
    public const GET_ONE_CALENDAR_FORBIDDEN = 'calendar/get-one-forbidden';

    public const FIND_ONE_CALENDAR_FAILED = 'calendar/find-one-failed';
    public const FIND_ONE_CALENDAR_FORBIDDEN = 'calendar/find-one-forbidden';

    public const FIND_AVAILABILITIES_FAILED = 'calendar/find-availabilities-failed';
    public const FIND_AVAILABILITIES_FORBIDDEN = 'calendar/find-availabilities-forbidden';
    public const CHECK_DATES_FAILED = 'calendar/check-dates-failed';
    public const CHECK_DATES_FORBIDDEN = 'calendar/check-dates-forbidden';

    public const CHECK_LOCATION_FAILED = 'calendar/check-location-failed';
    public const CHECK_LOCATION_FORBIDDEN = 'calendar/check-location-forbidden';

    public const GET_ALL_CALENDAR_EVENTS_WITH_FILTER_FAILED = 'calendar-event/get-all-with-filter-failed';
    public const GET_ALL_CALENDAR_EVENTS_WITH_FILTER_FORBIDDEN = 'calendar-event/get-all-with-filter-forbidden';

    public const GET_CALENDAR_EVENTS_FAILED = 'calendar-event/get-all-failed';

    public const GET_CALENDAR_EVENTS_FORBIDDEN = 'calendar-event/get-all-forbidden';


    // NOT EXIST ERRORS
    public const CALENDAR_NOT_EXIST = 'calendar/not-exist';
    public const CALENDAR_EVENT_NOT_EXIST = 'calendar-event/not-exist';
    public const CALENDAR_OWNER_NOT_EXIST = 'calendar/owner-not-exist';
    public const CALENDAR_OR_CALENDAR_EVENT_NOT_FOUND = 'calendar-or-calendar-event-not-found';




    /**
     * @var array<string, string>
     */
    public static $errors = [
      self::GET_CALENDAR_EVENTS_FOR_CURRENT_PERSON_FAILED => 'Failed to get current person calendar events',

      self::CREATE_CALENDAR_EVENT_FAILED => 'Failed to create calendar event',
      self::CREATE_CALENDAR_EVENT_FORBIDDEN => 'Failed to create calendar event, access denied',
      self::CREATE_CALENDAR_EVENT_FAILED_EVENT_ALREADY_EXIST => 'Failed to create calendar event, event already exist',

      self::UPDATE_CALENDAR_EVENT_FAILED => 'Failed to update calendar event',
      self::UPDATE_CALENDAR_EVENT_FORBIDDEN => 'Failed to update calendar event, access denied',

      self::GET_CALENDAR_EVENTS_WITH_CALENDAR_ID_FAILED => 'Failed to get calendar event with calendar id',
      self::GET_CALENDAR_EVENT_BY_ID_FAILED => 'Failed to get calendar event by id',
      self::GET_CALENDAR_EVENT_BY_ID_FORBIDDEN => 'Failed to get calendar event by id, access denied',

      self::GET_CALENDAR_EVENTS_FOR_OWNER_FAILED => 'Failed to get calendar event by owner id',
      self::GET_CALENDAR_EVENTS_FOR_OWNER_FORBIDDEN => 'Failed to get calendar event by owner id, access denied',

      self::GET_CALENDAR_EVENTS_FOR_CURRENT_USER_FAILED => 'Failed to get current user calendar events',
      self::GET_CALENDAR_EVENTS_FOR_CURRENT_USER_FORBIDDEN => 'Failed to get current user calendar events, access denied',

      self::FIND_CALENDAR_AVAILABILITIES_FAILED => 'Failed to find calendar availabilities',
      self::FIND_CALENDAR_AVAILABILITIES_FORBIDDEN => 'Failed to find calendar availabilities, access denied',

      self::CREATE_CALENDAR_FAILED => 'Failed to create calendar',
      self::CREATE_CALENDAR_FORBIDDEN => 'Failed to create calendar, access denied',

      self::UPDATE_CALENDAR_FAILED => 'Failed to update calendar',
      self::UPDATE_CALENDAR_FORBIDDEN => 'Failed to update calendar, access denied',
      self::CALENDAR_NOT_FOUND => 'Failed to reach calendar API. Calendar not found',
      self::DELETE_CALENDAR_EVENT_FAILED => 'Failed to delete calendar event',
      self::DELETE_CALENDAR_EVENT_FORBIDDEN => 'Failed to delete calendar event, access denied',

      self::DELETE_CALENDAR_FORBIDDEN => 'Failed to delete calendar, access denied',
      self::DELETE_CALENDAR_FAILED => 'Failed to delete calendar',

      self::GET_ONE_CALENDAR_FAILED => 'Failed to get calendar',
      self::GET_ONE_CALENDAR_FORBIDDEN => 'Failed to get calendar, access denied',

      self::FIND_ONE_CALENDAR_FAILED => 'Failed to find calendar',
      self::FIND_ONE_CALENDAR_FORBIDDEN => 'Failed to find calendar, access denied',

      self::FIND_AVAILABILITIES_FAILED => 'Failed to find availabilities',
      self::FIND_AVAILABILITIES_FORBIDDEN => 'Failed to find availabilities, access denied',

      self::CHECK_DATES_FAILED => 'Failed to check dates',
      self::CHECK_DATES_FORBIDDEN => 'Failed to check dates, access denied',

      self::CHECK_LOCATION_FAILED => 'Failed to check location',
      self::CHECK_LOCATION_FORBIDDEN => 'Failed to check location, access denied',

      self::GET_CALENDAR_EVENTS_FAILED => 'Failed to get calendar events for',
      self::GET_CALENDAR_EVENTS_FORBIDDEN => 'Failed to get calendar events for, access denied',

      // NOT EXIST ERRORS

      self::CALENDAR_NOT_EXIST => 'Calendar not exist',
      self::CALENDAR_EVENT_NOT_EXIST => 'Calendar event not exist',
      self::CALENDAR_OWNER_NOT_EXIST => 'Calendar owner not exist',
    ];
};
