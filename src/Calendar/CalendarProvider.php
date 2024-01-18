<?php

namespace Sherl\Sdk\Calendar;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Error\ErrorFactory;
use Sherl\Sdk\Common\Error\ErrorHelper;
use Sherl\Sdk\Calendar\Errors\CalendarErr;
use Exception;
use Sherl\Sdk\Common\SerializerFactory;

// DTOS
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

class UserProvider
{
    public const DOMAIN = "Calendar";

    private Client $client;

    private ErrorFactory $errorFactory;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->errorFactory = new ErrorFactory(self::DOMAIN, CalendarErr::$errors);
    }

    // Calendar

    /**
     * Creates a calendar request.
     *
     * @param CreateCalendarInputDto $calendarData The calendar data.
     * @throws SherlException If there is an error on creating the calendar.
     * @return CalendarDto|null The created calendar.
     */
    public function createCalendardRequest(CreateCalendarInputDto $calendarData): ?CalendarDto
    {
        try {
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

            switch ($response->getStatusCode()) {
                case 201:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        CalendarDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CalendarErr::CREATE_CALENDAR_FORBIDDEN);
                default:
                    throw $this->errorFactory->create(CalendarErr::CREATE_CALENDAR_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CalendarErr::CREATE_CALENDAR_FAILED));
        }
    }

    /**
     * Updates a calendar request.
     *
     * @param string $calendarId The ID of the calendar to be updated.
     * @param UpdateCalendarInputDto $calendarData The data to update the calendar with.
     * @throws SherlException If there is an error on updating the calendar.
     * @return CalendarDto|null The updated calendar.
     */
    public function updateCalendarRequest(string $calendarId, UpdateCalendarInputDto $calendarData): ?CalendarDto
    {
        try {
            $response = $this->client->put('/api/calendar/' . $calendarId, [
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

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        CalendarDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CalendarErr::UPDATE_CALENDAR_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(CalendarErr::CALENDAR_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(CalendarErr::UPDATE_CALENDAR_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CalendarErr::UPDATE_CALENDAR_FAILED));
        }
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
        try {
            $response = $this->client->delete('/api/calendar/' . $calendarId, [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => [
                "calendarId" => $calendarId
              ]
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
                case 403:
                    throw $this->errorFactory->create(CalendarErr::DELETE_CALENDAR_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(CalendarErr::CALENDAR_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(CalendarErr::DELETE_CALENDAR_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CalendarErr::DELETE_CALENDAR_FAILED));
        }
    }

    /**
     * Retrieves a calendar by its ID.
     *
     * @param string $calendarId The ID of the calendar to retrieve.
     * @throws SherlException If there is an error on retrieving the calendar.
     * @return CalendarDto|null The retrieved calendar.
     */
    public function getCalendarById(string $calendarId): ?CalendarDto
    {
        try {
            $response = $this->client->get('/api/calendar/' . $calendarId, [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => [
                "calendarId" => $calendarId
              ]
            ]);

            switch ($response->getStatusCode()) {
                case 200:
                    return SerializerFactory::getInstance()->deserialize(
                        $response->getBody()->getContents(),
                        CalendarDto::class,
                        'json'
                    );
                case 403:
                    throw $this->errorFactory->create(CalendarErr::GET_ONE_CALENDAR_FORBIDDEN);
                case 404:
                    throw $this->errorFactory->create(CalendarErr::CALENDAR_NOT_FOUND);
                default:
                    throw $this->errorFactory->create(CalendarErr::GET_ONE_CALENDAR_FAILED);
            }
        } catch (Exception $err) {
            throw ErrorHelper::getSherlError($err, $this->errorFactory->create(CalendarErr::GET_ONE_CALENDAR_FAILED));
        }
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

        switch ($response->getStatusCode()) {
            case 200:
                return SerializerFactory::getInstance()->deserialize(
                    $response->getBody()->getContents(),
                    "array<Sherl\Sdk\Calendar\Dto\FindAvailabilitiesOutputDto>",
                    'json'
                );
            case 403:
                throw $this->errorFactory->create(CalendarErr::FIND_CALENDAR_AVAILABILITIES_FORBIDDEN);
            default:
                throw $this->errorFactory->create(CalendarErr::FIND_CALENDAR_AVAILABILITIES_FAILED);
        }
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


        switch ($response->getStatusCode()) {
            case 200:
                return SerializerFactory::getInstance()->deserialize(
                    $response->getBody()->getContents(),
                    "array<Sherl\Sdk\Calendar\Dto\AvailabilityDto>",
                    'json'
                );
            case 403:
                throw $this->errorFactory->create(CalendarErr::CHECK_DATES_FORBIDDEN);
            default:
                throw $this->errorFactory->create(CalendarErr::CHECK_DATES_FAILED);
        }
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

        switch ($response->getStatusCode()) {
            case 200:
                return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
            case 403:
                throw $this->errorFactory->create(CalendarErr::CHECK_LOCATION_FORBIDDEN);
            default:
                throw $this->errorFactory->create(CalendarErr::CHECK_LOCATION_FAILED);
        }
    }



    /**
     * Finds a calendar with a given filter.
     *
     * @param CalendarFilterInputDto $calendarFilter The filter to apply when searching for a calendar.
     * @throws SherlException If there is an error on finding a calendar.
     * @return CalendarDto | null The calendar that matches the filter.
     */
    public function findCalendarWithFilter(CalendarFilterInputDto $calendarFilter): ?CalendarDto
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

        switch ($response->getStatusCode()) {
            case 200:
                return SerializerFactory::getInstance()->deserialize(
                    $response->getBody()->getContents(),
                    CalendarDto::class,
                    'json'
                );
            case 403:
                throw $this->errorFactory->create(CalendarErr::FIND_ONE_CALENDAR_FORBIDDEN);
            default:
                throw $this->errorFactory->create(CalendarErr::FIND_ONE_CALENDAR_FAILED);
        }
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

        switch ($response->getStatusCode()) {
            case 200:
                return SerializerFactory::getInstance()->deserialize(
                    $response->getBody()->getContents(),
                    CalendarEventDto::class,
                    'json'
                );
            case 403:
                throw $this->errorFactory->create(CalendarErr::CREATE_CALENDAR_EVENT_FORBIDDEN);
            case 404:
                throw $this->errorFactory->create(CalendarErr::CALENDAR_NOT_FOUND);
            default:
                throw $this->errorFactory->create(CalendarErr::CREATE_CALENDAR_EVENT_FAILED);
        }
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
        $response = $this->client->put('/api/calendar/' . $calendarId . '/event/' . $eventId, [
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

        switch ($response->getStatusCode()) {
            case 200:
                return SerializerFactory::getInstance()->deserialize(
                    $response->getBody()->getContents(),
                    CalendarEventDto::class,
                    'json'
                );
            case 403:
                throw $this->errorFactory->create(CalendarErr::UPDATE_CALENDAR_EVENT_FORBIDDEN);
            case 404:
                throw $this->errorFactory->create(CalendarErr::CALENDAR_OR_CALENDAR_EVENT_NOT_FOUND);
            default:
                throw $this->errorFactory->create(CalendarErr::UPDATE_CALENDAR_EVENT_FAILED);
        }
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
        $response = $this->client->delete('/api/calendar/' . $calendarId . '/event/' . $calendarEventId, [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => []
        ]);

        switch ($response->getStatusCode()) {
            case 200:
                return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
            case 403:
                throw $this->errorFactory->create(CalendarErr::DELETE_CALENDAR_EVENT_FORBIDDEN);
            case 404:
                throw $this->errorFactory->create(CalendarErr::CALENDAR_OR_CALENDAR_EVENT_NOT_FOUND);
            default:
                throw $this->errorFactory->create(CalendarErr::DELETE_CALENDAR_EVENT_FAILED);
        }
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
        $response = $this->client->get('/api/calendar/' . $calendarId . '/events', [
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

        switch ($response->getStatusCode()) {
            case 200:
                return SerializerFactory::getInstance()->deserialize(
                    $response->getBody()->getContents(),
                    "array<Sherl\Sdk\Calendar\Dto\GetCalendarEventForCalendarResultsDto>",
                    'json'
                );
            case 403:
                throw $this->errorFactory->create(CalendarErr::GET_ALL_CALENDAR_EVENTS_WITH_FILTER_FORBIDDEN);
            case 404:
                throw $this->errorFactory->create(CalendarErr::CALENDAR_NOT_FOUND);
            default:
                throw $this->errorFactory->create(CalendarErr::GET_ALL_CALENDAR_EVENTS_WITH_FILTER_FAILED);
        }
    }

    /**
     * Retrieves a calendar event request by its ID.
     *
     * @param string $calendarEventId The ID of the calendar event.
     * @throws SherlException If there is an error retrieving the calendar event.
     * @return CalendarEventDto | null The retrieved calendar event.
     */
    public function getCalendarEventRequest(string $calendarEventId): ?CalendarEventDto
    {
        $response = $this->client->put('/api/calendar-event/' . $calendarEventId, [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => []
        ]);

        switch ($response->getStatusCode()) {
            case 200:
                return SerializerFactory::getInstance()->deserialize(
                    $response->getBody()->getContents(),
                    CalendarEventDto::class,
                    'json'
                );
            case 403:
                throw $this->errorFactory->create(CalendarErr::GET_CALENDAR_EVENT_BY_ID_FORBIDDEN);
            case 404:
                throw $this->errorFactory->create(CalendarErr::CALENDAR_NOT_EXIST);
            default:
                throw $this->errorFactory->create(CalendarErr::GET_CALENDAR_EVENT_BY_ID_FAILED);
        }
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

        switch ($response->getStatusCode()) {
            case 200:
                return SerializerFactory::getInstance()->deserialize(
                    $response->getBody()->getContents(),
                    CalendarEventsPaginatedResultDto::class,
                    'json'
                );
            case 403:
                throw $this->errorFactory->create(CalendarErr::GET_CALENDAR_EVENTS_FOR_CURRENT_USER_FORBIDDEN);
            default:
                throw $this->errorFactory->create(CalendarErr::GET_CALENDAR_EVENTS_FOR_CURRENT_USER_FAILED);
        }
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

        switch ($response->getStatusCode()) {
            case 200:
                return SerializerFactory::getInstance()->deserialize(
                    $response->getBody()->getContents(),
                    CalendarEventsPaginatedResultDto::class,
                    'json'
                );
            case 403:
                throw $this->errorFactory->create(CalendarErr::GET_CALENDAR_EVENTS_FOR_OWNER_FORBIDDEN);
            default:
                throw $this->errorFactory->create(CalendarErr::GET_CALENDAR_EVENTS_FOR_OWNER_FAILED);
        }
    }
}
