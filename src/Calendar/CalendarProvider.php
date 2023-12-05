<?php

namespace Sherl\Sdk\Calendar;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Calendar\Dto\CalendarDto;

use Sherl\Sdk\Calendar\Dto\AvailabilityDto;
use Sherl\Sdk\Calendar\Dto\CalendarEventDto;
use Sherl\Sdk\Calendar\Dto\CalendarFilterInputDto;
use Sherl\Sdk\Calendar\Dto\CheckDatesInputDto;
use Sherl\Sdk\Calendar\Dto\CheckLocationInputDto;
use Sherl\Sdk\Calendar\Dto\CreateCalendarEventInputDto;
use Sherl\Sdk\Calendar\Dto\CreateCalendarInputDto;
use Sherl\Sdk\Calendar\Dto\FindAvailabilitiesInputDto;
use Sherl\Sdk\Calendar\Dto\FindAvailabilitiesOutputDto;
use Sherl\Sdk\Calendar\Dto\GetCalendarEventForCalendarInputDto;
use Sherl\Sdk\Calendar\Dto\GetCalendarEventForCalendarResultsDto;
use Sherl\Sdk\Calendar\Dto\GetCalendarEventForCurrentPersonInputDto;
use Sherl\Sdk\Calendar\Dto\CalendarEventsPaginatedResultDto;
use Sherl\Sdk\Calendar\Dto\UpdateCalendarEventInputDto;
use Sherl\Sdk\Calendar\Dto\UpdateCalendarInputDto;
use Sherl\Sdk\Calendar\Dto\GetCalendarEventByOwnerInputDto;
use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\SerializerFactory;

class UserProvider
{
  public const DOMAIN = "Calendar";

  private Client $client;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }

  private function throwSherlUserException(ResponseInterface $response)
  {
    throw new SherlException(UserProvider::DOMAIN, $response->getBody()->getContents(), $response->getStatusCode());
  }


  // Calendar

  /**
   * Creates a calendar request.
   *
   * @param CreateCalendarInputDto $calendarData The calendar data.
   * @throws SherlException If there is an error on creating the calendar.
   * @return CalendarDto The created calendar.
   */
  public function createCalendardRequest(CreateCalendarInputDto $calendarData): CalendarDto
  {
    $response = $this->client->post('/api/calendar', [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => [
        "aboutUri" => $calendarData->aboutUri,
        "ownerUri" => $calendarData->ownerUri,
        "availabilities" => $calendarData->availabilities,
        "metadatas" => $calendarData->metadatas,
      ]
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      CalendarDto::class,
      'json'
    );
  }

  /**
   * Updates a calendar request.
   *
   * @param string $calendarId The ID of the calendar to be updated.
   * @param UpdateCalendarInputDto $calendarData The data to update the calendar with.
   * @throws SherlException If there is an error on updating the calendar.
   * @return CalendarDto The updated calendar.
   */
  public function updateCalendarRequest(string $calendarId, UpdateCalendarInputDto $calendarData): CalendarDto
  {
    $response = $this->client->put('/api/calendar/' + $calendarId, [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => [
        "aboutUri" => $calendarData->aboutUri,
        "ownerUri" => $calendarData->ownerUri,
        "availabilities" => $calendarData->availabilities,
        "metadatas" => $calendarData->metadatas,
        "enabled" => $calendarData->enabled
      ]
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      CalendarDto::class,
      'json'
    );
  }

  /**
   * Delete a calendar.
   *
   * @param string $calendarId The ID of the calendar to delete.
   * @throws SherlException If there is an error on deleting the calendar.
   * @return bool Returns a boolean indicating whether the calendar was successfully deleted.
   */
  public function deleteCalendar(string $calendarId): bool
  {
    $response = $this->client->delete('/api/calendar/' + $calendarId, [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => []
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
  }

  /**
   * Retrieves a calendar by its ID.
   *
   * @param string $calendarId The ID of the calendar to retrieve.
   * @throws SherlException If there is an error on retrieving the calendar.
   * @return CalendarDto The retrieved calendar.
   */
  public function getCalendarById(string $calendarId): CalendarDto
  {
    $response = $this->client->get('/api/calendar/' + $calendarId, [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => []
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      CalendarDto::class,
      'json'
    );
  }

  /**
   * Find calendar availabilities.
   *
   * @param FindAvailabilitiesInputDto $filters The filters to apply for finding availabilities.
   * @throws SherlException If there is an error on finding availabilities.
   * @return FindAvailabilitiesOutputDto[] The array of filtered availabilities.
   */
  public function findCalendarAvailabilities(FindAvailabilitiesInputDto $filters): array
  {
    $response = $this->client->get('/api/calendar/find-availabilities', [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => [
        "ownerUri" => $filters->ownerUri,
        "aboutUri" => $filters->aboutUri,
        "userPlaceUri" => $filters->userPlaceUri,
        "metadatas" => $filters->metadatas,
        "startDate" => $filters->startDate,
        "endDate" => $filters->endDate,
        "scale" => $filters->scale,
        "scaleValue" => $filters->scaleValue,
        "available" => $filters->available,
      ]
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }


    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      "array<Sherl\Sdk\Calendar\Dto\$response->getStatusCode() >= 400>",
      'json'
    );
  }

  /**
   * Retrieves the availabilities for a given set of dates.
   *
   * @param CheckDatesInputDto $dates The input data containing the owner URI, metadata, and dates.
   * @throws SherlException If there is an error on retrieving the availabilities.
   * @return AvailabilityDto[] An array of AvailabilityDto objects representing the availabilities for the given dates.
   */
  public function checksDateAvailabilities(CheckDatesInputDto $dates): array
  {
    $response = $this->client->get('/api/user/password/forgot-validate', [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => [
        "ownerUri" => $dates->ownerUri,
        "metadatas" => $dates->metadatas,
        "dates" => $dates->dates

      ]
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      "array<Sherl\Sdk\Calendar\Dto\AvailabilityDto>",
      'json'
    );
  }

  /**
   * Check the availabilities of a location.
   *
   * @param CheckLocationInputDto $location The location to check.
   * @throws SherlException If there is an error on checking the location availability.
   * @return bool The availability status of the location.
   */
  public function checkLocationAvailabilities(CheckLocationInputDto $location): bool
  {
    $response = $this->client->get('//api/calendar/check-location', [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => [
        "calendarOwnerUri" => $location->calendarOwnerUri,
        "country" => $location->country,
        "locality" => $location->locality,
        "region" => $location->region,
        "postalCode" => $location->postalCode,
        "streetAddress" => $location->streetAddress,

      ]
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
  }



  /**
   * Finds a calendar with a given filter.
   *
   * @param CalendarFilterInputDto $calendarFilter The filter to apply when searching for a calendar.
   * @throws SherlException If there is an error on finding a calendar.
   * @return CalendarDto The calendar that matches the filter.
   */
  public function findCalendarWithFilter(CalendarFilterInputDto $calendarFilter): CalendarDto
  {
    $response = $this->client->get('/api/calendar/find-one', [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => [
        "id" => $calendarFilter->id,
        "uri" => $calendarFilter->uri,
        "aboutUri" => $calendarFilter->aboutUri,
        "ownerUri" => $calendarFilter->ownerUri
      ]
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      CalendarDto::class,
      'json'
    );
  }

  // Calendar Events

  /**
   * Creates a calendar event request.
   *
   * @param CreateCalendarEventInputDto $calendarData The input data for creating a calendar event.
   * @throws SherlException If there is an error on creating a calendar event.
   * @return CalendarEventDto The created calendar event.
   */
  public function createCalendarEventRequest(CreateCalendarEventInputDto $calendarData): CalendarEventDto
  {
    $response = $this->client->post('/api/calendar', [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => [
        "uri" => $calendarData->uri,
        "aboutUri" => $calendarData->aboutUri,
        "ownerUri" => $calendarData->ownerUri,
        "startDate" => $calendarData->startDate,
        "endDate" => $calendarData->endDate,
        "metadatas" => $calendarData->metadatas,
      ]
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      CalendarEventDto::class,
      'json'
    );
  }

  /**
   * Updates a calendar event request.
   *
   * @param string $calendarId The ID of the calendar.
   * @param string $eventId The ID of the event.
   * @param UpdateCalendarEventInputDto $calendarEventData The data for updating the calendar event.
   * @throws SherlException If there is an error on updating a calendar event.
   * @return CalendarEventDto The updated calendar event.
   */
  public function updateCalendarEventRequest(string $calendarId, string $eventId, UpdateCalendarEventInputDto $calendarEventData): CalendarEventDto
  {
    $response = $this->client->put('/api/calendar/' + $calendarId + '/event/' + $eventId, [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => [
        "aboutUri" => $calendarEventData->aboutUri,
        "ownerUri" => $calendarEventData->ownerUri,
        "calendarUri" => $calendarEventData->calendarUri,
        "startDate" => $calendarEventData->startDate,
        "endDate" => $calendarEventData->endDate
      ]
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      CalendarEventDto::class,
      'json'
    );
  }

  /**
   * Deletes a calendar event request.
   *
   * @param string $calendarId The ID of the calendar.
   * @param string $calendarEventId The ID of the calendar event.
   * @throws SherlException If there is an error on deleting a calendar event.
   * @return bool Returns true on success.
   */
  public function deleteCalendarEventRequest(string $calendarId, string $calendarEventId): bool
  {
    $response = $this->client->delete('/api/calendar/' + $calendarId + '/event/' + $calendarEventId, [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => []
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
  }

  /**
   * Retrieves all calendar events based on the provided calendar ID and filters.
   *
   * @param string $calendarId The ID of the calendar to retrieve events from.
   * @param GetCalendarEventForCalendarInputDto $filters The filters to apply when retrieving calendar events.
   * @throws SherlException If there is an error retrieving calendar events.
   * @return GetCalendarEventForCalendarResultsDto[] An array of GetCalendarEventForCalendarResultsDto objects representing the retrieved calendar events.
   */
  public function getAllCalendarEvents(string $calendarId, GetCalendarEventForCalendarInputDto $filters): array
  {
    $response = $this->client->get('/api/calendar/' + $calendarId + 'events', [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => [
        "page" => $filters->page,
        "itemsPerPage" => $filters->itemsPerPage,
        "aboutUri" => $filters->aboutUri,
        "ownerUri" => $filters->ownerUri,
        "startDate" => $filters->startDate,
        "endDate" => $filters->endDate,
        "calendarUri" => $filters->calendarUri,
        "consumerId" => $filters->consumerId,
      ]
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      "array<Sherl\Sdk\Calendar\Dto\GetCalendarEventForCalendarResultsDto>",
      'json'
    );
  }

  /**
   * Retrieves a calendar event request by its ID.
   *
   * @param string $calendarEventId The ID of the calendar event.
   * @throws SherlException If there is an error retrieving the calendar event.
   * @return CalendarEventDto The retrieved calendar event.
   */
  public function getCalendarEventRequest(string $calendarEventId): CalendarEventDto
  {
    $response = $this->client->put('/api/calendar-event/' + $calendarEventId, [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => []
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      CalendarEventDto::class,
      'json'
    );
  }

  /**
   * Retrieves a calendar event for the current person.
   *
   * @param GetCalendarEventForCurrentPersonInputDto $input The input parameters for retrieving the calendar event.
   * @throws SherlException If there is an error retrieving the calendar events.
   * @return CalendarEventsPaginatedResultDto The paginated result of calendar events.
   */
  public function getCalendarEventForCurrentPersonRequest(GetCalendarEventForCurrentPersonInputDto $input): CalendarEventsPaginatedResultDto
  {
    $response = $this->client->get('/api/calendar-events', [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => [
        "page" => $input->page,
        "itemsPerPage" => $input->itemsPerPage,
        "uri" => $$input->uri,
        "aboutUri" => $input->aboutUri,
        "ownerUri" => $input->ownerUri,
        "startDate" => $input->startDate,
        "endDate" => $input->endDate,
      ]
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      CalendarEventsPaginatedResultDto::class,
      'json'
    );
  }

  /**
   * Retrieves all calendar events for a specific owner.
   *
   * @param GetCalendarEventByOwnerInputDto $input The input data for retrieving calendar events.
   * @throws SherlException If there is an error retrieving the calendar events.
   * @return CalendarEventsPaginatedResultDto The paginated result of calendar events.
   */
  public function getAllCalendarEventsForOwner(GetCalendarEventByOwnerInputDto $input): CalendarEventsPaginatedResultDto
  {
    $response = $this->client->get('/api/calendar/owner', [
      "headers" => [
        "Content-Type" => "application/json",
      ],
      RequestOptions::JSON => [
        "page" => $input->page,
        "itemsPerPage" => $input->itemsPerPage,
        "calendarOwnerUri" => $input->calendarOwnerUri,
        "calendarAboutUri" => $input->calendarAboutUri,
        "aboutUri" => $input->aboutUri,
        "ownerUri" => $input->ownerUri,
        "startDate" => $input->startDate,
        "endDate" => $input->endDate,
      ]
    ]);

    if ($response->getStatusCode() >= 400) {
      return $this->throwSherlUserException($response);
    }

    return SerializerFactory::getInstance()->deserialize(
      $response->getBody()->getContents(),
      CalendarEventsPaginatedResultDto::class,
      'json'
    );
  }
}
