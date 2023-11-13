<?php

namespace Sherl\Sdk\Calendar;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

use Psr\Http\Message\ResponseInterface;

use Sherl\Sdk\Calendar\Dto\CalendarOutputDto;

use Sherl\Sdk\Calendar\Dto\AvailabilityOutputDto;
use Sherl\Sdk\Calendar\Dto\CalendarEventOutputDto;
use Sherl\Sdk\Calendar\Dto\CalendarFilterInputDto;
use Sherl\Sdk\Calendar\Dto\CheckDatesInputDto;
use Sherl\Sdk\Calendar\Dto\CheckLocationInputDto;
use Sherl\Sdk\Calendar\Dto\CreateCalendarEventInputDto;
use Sherl\Sdk\Calendar\Dto\CreateCalendarInputDto;
use Sherl\Sdk\Calendar\Dto\FindAvailabilitiesInputDto;
use Sherl\Sdk\Calendar\Dto\GetCalendarEventForCalendarInputDto;
use Sherl\Sdk\Calendar\Dto\GetCalendarEventForCurrentPersonInputDto;
use Sherl\Sdk\Calendar\Dto\GetCalendarEventForCurrentPersonOutputDto;
use Sherl\Sdk\Calendar\Dto\UpdateCalendarEventInputDto;
use Sherl\Sdk\Calendar\Dto\UpdateCalendarInputDto;
use Sherl\Sdk\Calendat\Dto\GetCalendarEventByOwnerInputDto as DtoGetCalendarEventByOwnerInputDto;
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
    public function createCalendardRequest(CreateCalendarInputDto $calendarData): ?CalendarOutputDto
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CalendarOutputDto::class,
            'json'
        );
    }

    public function updateCalendarRequest(string $calendarId, UpdateCalendarInputDto $calendarData): ?CalendarOutputDto
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CalendarOutputDto::class,
            'json'
        );
    }

    public function deleteCalendar(string $calendarId): ?bool
    {
        $response = $this->client->delete('/api/calendar/' + $calendarId, [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => [

          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
    }

    public function getCalendarById(string $calendarId): ?CalendarOutputDto
    {
        $response = $this->client->get('/api/calendar/' + $calendarId, [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => [
          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CalendarOutputDto::class,
            'json'
        );
    }

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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }


        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            "array<FindAvailabilitiesOutputDto>",
            'json'
        );
    }

    public function checksDateAvailabilities(CheckDatesInputDto $dates): ?array
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            "array<AvailabilityOutputDto>",
            'json'
        );
    }

    public function checkLocationAvailabilities(CheckLocationInputDto $location): ?array
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
    }



    public function findCalendarWithFilter(CalendarFilterInputDto $calendarFilter): ?CalendarOutputDto
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CalendarOutputDto::class,
            'json'
        );
    }

    // Calendar Events
    public function createCalendarEventRequest(CreateCalendarEventInputDto $calendarData): ?CalendarEventOutputDto
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CalendarEventOutputDto::class,
            'json'
        );
    }

    public function updateCalendarEventRequest(string $calendarId, string $eventId, UpdateCalendarEventInputDto $calendarEventData): ?CalendarEventOutputDto
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CalendarEventOutputDto::class,
            'json'
        );
    }

    public function deleteCalendarEventRequest(string $calendarId, string $calendarEventId): ?bool
    {
        $response = $this->client->delete('/api/calendar/' + $calendarId + '/event/' + $calendarEventId, [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => [

          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return filter_var($response->getBody()->getContents(), FILTER_VALIDATE_BOOLEAN);
    }

    public function getAllCalendarEvents(string $calendarId, GetCalendarEventForCalendarInputDto $filters): ?array
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            "array<GetCalendarEventForCalendarOutputDto>",
            'json'
        );
    }

    public function getCalendarEventRequest(string $calendarEventId): ?CalendarEventOutputDto
    {
        $response = $this->client->put('/api/calendar-event/' + $calendarEventId, [
          "headers" => [
            "Content-Type" => "application/json",
          ],
          RequestOptions::JSON => [
          ]
        ]);

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            CalendarEventOutputDto::class,
            'json'
        );
    }

    public function getCalendarEventForCurrentPersonRequest(GetCalendarEventForCurrentPersonInputDto $input): ?GetCalendarEventForCurrentPersonOutputDto
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            GetCalendarEventForCurrentPersonOutputDto::class,
            'json'
        );
    }

    public function getAllCalendarEventsForOwner(DtoGetCalendarEventByOwnerInputDto $input): ?array
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

        if ($response->getStatusCode() >= 300) {
            return $this->throwSherlUserException($response);
        }

        return SerializerFactory::getInstance()->deserialize(
            $response->getBody()->getContents(),
            "array<GetCalendarEventForCalendarOutputDto>",
            'json'
        );
    }
}
