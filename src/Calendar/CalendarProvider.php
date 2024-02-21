<?php

namespace Sherl\Sdk\Calendar;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Common\Error\SherlException;
use Sherl\Sdk\Common\Error\ErrorFactory;
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
    public function createCalendar(CreateCalendarInputDto $calendarData): ?CalendarDto
    {
        try {
            $response = $this->client->post('/api/calendar', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $calendarData
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                CalendarDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::CREATE_CALENDAR_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(CalendarErr::CREATE_CALENDAR_FAILED);
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
    public function updateCalendar(string $calendarId, UpdateCalendarInputDto $calendarData): ?CalendarDto
    {
        try {
            $response = $this->client->put("api/calendar/$calendarId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $calendarData
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                CalendarDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::UPDATE_CALENDAR_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CalendarErr::CALENDAR_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(CalendarErr::UPDATE_CALENDAR_FAILED);
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
            $response = $this->client->delete("/api/calendar/$calendarId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::DELETE_CALENDAR_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CalendarErr::CALENDAR_NOT_FOUND);
                }
            }
             throw  $this->errorFactory->create(CalendarErr::DELETE_CALENDAR_FAILED);
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
            $response = $this->client->get("/api/calendar/$calendarId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                CalendarDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::GET_ONE_CALENDAR_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CalendarErr::CALENDAR_NOT_FOUND);
                }
            }
            throw $this->errorFactory->create(CalendarErr::GET_ONE_CALENDAR_FAILED);

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
        try {
            $response = $this->client->get('/api/calendar/find-availabilities', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $filters
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                "array<Sherl\Sdk\Calendar\Dto\FindAvailabilitiesOutputDto>",
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::FIND_CALENDAR_AVAILABILITIES_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CalendarErr::CALENDAR_NOT_FOUND);
                }
            }
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
        try {
            $response = $this->client->get('/api/user/password/forgot-validate', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $dates
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                "array<Sherl\Sdk\Calendar\Dto\AvailabilityDto>",
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::CHECK_DATES_FORBIDDEN);
                }
            }
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
        try {
            $response = $this->client->get('/api/calendar/check-location', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $location
            ]);

            return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::CHECK_LOCATION_FORBIDDEN);
                }
            }
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
        try {
            $response = $this->client->get('/api/calendar/find-one', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $calendarFilter
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                CalendarDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::FIND_ONE_CALENDAR_FORBIDDEN);
                }
            }
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
    public function createCalendarEvent(CreateCalendarEventInputDto $calendarData): CalendarEventDto
    {
        try {
            $response = $this->client->post('/api/calendar', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $calendarData
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                CalendarEventDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::CREATE_CALENDAR_EVENT_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CalendarErr::CALENDAR_NOT_FOUND);
                }
            }
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
    public function updateCalendarEvent(string $calendarId, string $eventId, UpdateCalendarEventInputDto $calendarEventData): CalendarEventDto
    {
        try {
            $response = $this->client->put("/api/calendar/$calendarId/event/$eventId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $calendarEventData
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                CalendarEventDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::UPDATE_CALENDAR_EVENT_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CalendarErr::CALENDAR_OR_CALENDAR_EVENT_NOT_FOUND);
                }
            }
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
        try {
            $response = $this->client->delete("/api/calendar/$calendarId/event/$calendarEventId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);
            return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::DELETE_CALENDAR_EVENT_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CalendarErr::CALENDAR_OR_CALENDAR_EVENT_NOT_FOUND);
                }
            }
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
        try {
            $response = $this->client->get("/api/calendar/$calendarId/events", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $filters
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                "array<Sherl\Sdk\Calendar\Dto\GetCalendarEventForCalendarResultsDto>",
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::GET_ALL_CALENDAR_EVENTS_WITH_FILTER_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CalendarErr::CALENDAR_NOT_FOUND);
                }
            }
            throw  $this->errorFactory->create(CalendarErr::GET_ALL_CALENDAR_EVENTS_WITH_FILTER_FAILED);
        }
    }

    /**
     * Retrieves a calendar event request by its ID.
     *
     * @param string $calendarEventId The ID of the calendar event.
     * @throws SherlException If there is an error retrieving the calendar event.
     * @return CalendarEventDto | null The retrieved calendar event.
     */
    public function getCalendarEvent(string $calendarEventId): ?CalendarEventDto
    {
        try {
            $response = $this->client->get("/api/calendar-event/$calendarEventId", [
              "headers" => [
                "Content-Type" => "application/json",
              ],
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                CalendarEventDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::GET_CALENDAR_EVENT_BY_ID_FORBIDDEN);
                    case 404:
                        throw $this->errorFactory->create(CalendarErr::CALENDAR_NOT_EXIST);
                }
            }
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
    public function getCalendarEventForCurrentPerson(GetCalendarEventForCurrentPersonInputDto $input): CalendarEventsPaginatedResultDto
    {
        try {
            $response = $this->client->get('/api/calendar-events', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::JSON => $input
            ]);

            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                CalendarEventsPaginatedResultDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::GET_CALENDAR_EVENTS_FOR_CURRENT_USER_FORBIDDEN);
                }
            }
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
        try {
            $response = $this->client->get('/api/calendar/owner', [
              "headers" => [
                "Content-Type" => "application/json",
              ],
              RequestOptions::QUERY => $input
            ]);
            return SerializerFactory::getInstance()->deserialize(
                $response->getBody()->getContents(),
                CalendarEventsPaginatedResultDto::class,
                'json'
            );
        } catch (Exception $err) {
            if ($err instanceof \GuzzleHttp\Exception\ClientException) {
                $response = $err->getResponse();
                $statusCode = $response->getStatusCode();

                switch ($statusCode) {
                    case 403:
                        throw $this->errorFactory->create(CalendarErr::GET_CALENDAR_EVENTS_FOR_OWNER_FORBIDDEN);
                }
            }
            throw $this->errorFactory->create(CalendarErr::GET_CALENDAR_EVENTS_FOR_OWNER_FAILED);
        }
    }
}
