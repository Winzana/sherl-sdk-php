---
id: calendar
title: Calendar
---

## Create a calendar

Create a calendar entry in database.
<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->createCalendar(CreateCalendarInputDto $createCalendar);
```

<details>
 <summary><b>CreateCalendarInputDto</b></summary>

| Fields             |                                           Type                                            |      Required      | Description                                |
| :----------------- | :---------------------------------------------------------------------------------------: | :----------------: | :----------------------------------------- |
| **id**             |                                          string                                           | :white_check_mark: | The calendar id                            |
| **aboutUri**       |                                          string                                           | :white_check_mark: | The uri for the associated custom resource |
| **ownerUri**       |                                          string                                           | :white_check_mark: | The uri of the owner                       |
| **availabilities** | [OpeningHoursSpecificationOutputDto[]](calendar-types#OpeningHoursSpecificationOutputDto) | :white_check_mark: | Availabilities of the calendar             |
| **metadatas**      |                                           mixed                                           |        :x:         | Metadata information about the calendar    |

</details>

This call returns a [CalendarDto](calendar-types#CalendarDto) class.

## Update calendar by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->updateCalendar(string $calendarId, UpdateCalendarInputDto $calendarData);
```

<details>
 <summary><b>UpdateCalendarInputDto</b></summary>

| Fields             |                                          Type                                           | Required | Description                                  |
| :----------------- | :-------------------------------------------------------------------------------------: | :------: | :------------------------------------------- |
| **aboutUri**       |                                         string                                          |   :x:    | The uri for the associated custom resource   |
| **ownerUri**       |                                         string                                          |   :x:    | The uri of the owner                         |
| **availabilities** | [OpeningHoursSpecificationOutputDto](calendar-types#OpeningHoursSpecificationOutputDto) |   :x:    | Availabilities of the calendar               |
| **enabled**        |                                         boolean                                         |   :x:    | Indicates if the calendar is enabled or not. |
| **metadatas**      |                                          mixed                                          |   :x:    | Metadata information about the calendar      |

</details>

This call returns the updated [CalendarDto](calendar-types#CalendarDto).

## Delete calendar by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->deleteCalendar(string $calendarId);
```

| Fields         |  Type  |      Required      | Description                      |
| :------------- | :----: | :----------------: | :------------------------------- |
| **calendarId** | string | :white_check_mark: | The id of the calendar to delete |

This call returns true if calendar calendar is successfully deleted.

## Get calendar by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->getCalendarWithId(string $calendarId);
```

| Fields         |  Type  |      Required      | Description                      |
| :------------- | :----: | :----------------: | :------------------------------- |
| **calendarId** | string | :white_check_mark: | The id of the calendar to delete |

This call returns a [CalendarDto](calendar-types#CalendarDto) class.

## Find calendar availabilities

<span class="badge badge--warning">Require authentication</span>

Check availabilities of a specific calendar with filters.

```php
$sherlClient->calendar->findCalendarAvailabilities(FindAvailabilitiesInputDto $filters);
```

<details>
 <summary><b>FindAvailabilitiesInputDto</b></summary>

| Fields       |                         Type                         | Required | Description                          |
| ------------ | :--------------------------------------------------: | :------: | ------------------------------------ |
| ownerUri     |                        string                        |   :x:    | Uri of the owner project             |
| aboutUri     |                        string                        |   :x:    | The uri of the event resource        |
| userPlaceUri |                        string                        |   :x:    | The uri of the user place            |
| metadatas    |                        mixed                         |   :x:    | Other metadata to filter             |
| startDate    |                        string                        |   :x:    | Start date of the calendar to find   |
| endDate      |                        string                        |   :x:    | End date of the calendar to find     |
| scale        | [AvailabilityScale](calendar-enum#availabilityscale) |   :x:    | The kind of period                   |
| scaleValue   |                                                      |   :x:    | The number of period                 |
| available    |                       boolean                        |   :x:    | Availability of the calendar to find |

</details>

This call returns a array of [IAvailability](calendar-types#iavailability) class.

## Check Dates Availability

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->checksDateAvailabilities(CheckDatesInputDto $dates);
```

<details>
 <summary><b>CheckDatesInputDto</b></summary>

| Fields         |  Type  | Description                               |
| :------------- | :----: | :---------------------------------------- |
| **id**         | string | calendar's id                             |
| **personId**   | string | ID of person which associated to calendar |
| **orderId**    | string | ID of order which associated to calendar  |
| **consumerId** | string | Internal API ID to identify a project     |

</details>

This call returns a array of [IAvailability](calendar-types#iavailability) class.

## Check for location availability

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->checkLocationAvailabilities(CheckLocationInputDto $location);
```

<details>
 <summary><b>CheckLocationInputDto</b></summary>

| Fields           |  Type  |      Required      | Description                 |
| ---------------- | :----: | :----------------: | --------------------------- |
| calendarOwnerUri | string | :white_check_mark: | The calendar owner's uri    |
| country          | string |        :x:         | The country to check        |
| locality         | string |        :x:         | The locality to check       |
| region           | string |        :x:         | The region to check         |
| postalCode       | string |        :x:         | The plostal code to checkk  |
| streetAddress    | string |        :x:         | The street address to check |

</details>

This call returns a boolean to indicate the availability of the location.

# Calendar Event

## Create calendar event

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->createCalendarEvent(CreateCalendarEventInputDto $createCalendarEvent);
```

<details>
 <summary><b>CreateCalendarEventInputDto</b></summary>

| Fields    |  Type  | Required | Description                                |
| --------- | :----: | :------: | ------------------------------------------ |
| id        | string |   :x:    | The id of the calendar event               |
| uri       | string |   :x:    | The uri of the calendar event              |
| aboutUri  | string |   :x:    | The uri for the associated custom resource |
| ownerUri  | string |   :x:    | The uri of the owner                       |
| startDate | string |   :x:    | The start date of the event                |
| endDate   | string |   :x:    | The end date of the event                  |
| metadatas | mixed  |   :x:    | metadata about the event                   |

</details>

This call returns a [CalendarEventDto](calendar-types#CalendarEventDto) class.

## Update calendar event by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->updateCalendarEvent(string $calendarId, string $eventId,UpdateCalendarEventInputDto $calendarEventData);
```

<details>
 <summary><b>UpdateCalendarEventInputDto</b></summary>

| Fields      |  Type   | Required | Description                                |
| ----------- | :-----: | :------: | ------------------------------------------ |
| aboutUri    | string  |   :x:    | The uri for the associated custom resource |
| ownerUri    | string  |   :x:    | The uri of the owner                       |
| calendarUri | string  |   :x:    | The uri of the associated calendar         |
| startDate   | string  |   :x:    | The start date of the event                |
| endDate     | boolean |   :x:    | The end date of the event                  |

</details>

This call returns the updated [CalendarEventDto](calendar-types#CalendarEventDto).

## Delete calendar event by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->deleteCalendarEventRequest(string $calendarEventId);
```

This call returns true if calendar calendar with id was successfully deleted.

## Get calendar by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->getCalendarEvent(string $eventId);
```

This call returns a [CalendarEventDto](calendar-types#CalendarEventDto) class.

## Get all calendar events

<span class="badge badge--warning">Require authentication</span>

Get all calendar events from a specific calendar with the possibility to filter the results.

```php
$sherlClient->calendar->getAllCalendarEvents(string $eventId, GetCalendarEventForCalendarInputDto $filters );
```

<details>
 <summary><b>GetCalendarEventForCalendarInputDto</b></summary>

| Fields       | ^cType                                                 | ^cRequired | Description                                |
| ------------ | ------------------------------------------------------ | ---------- | ------------------------------------------ |
| itemsPerPage | integer                                                | :x:        | Number of items per pages                  |
| page         | integer                                                | :x:        | Current page                               |
| id           | string                                                 | :x:        | The id of event                            |
| uri          | string                                                 | :x:        | The uri of the event                       |
| aboutUri     | string                                                 | :x:        | The uri for the associated custom resource |
| ownerUri     | string                                                 | :x:        | The uri of the owner                       |
| startDate    | [DateFilterOutputDto](date-filter#datefilteroutputdto) | :x:        | Start date of the event                    |
| endDate      | [DateFilterOutputDto](date-filter#datefilteroutputdto) | :x:        | End date of the event                      |

</details>

This call returns a [GetCalendarEventForCalendarResultsDto](calendar-types#GetCalendarEventForCalendarResultsDto) class.

## Get all calendar events for current person

<span class="badge badge--warning">Require authentication</span>

Get all calendar events for the current person

```php
$sherlClient->calendar->getCalendarEventForCurrentPerson(GetCalendarEventForCurrentPersonInputDto $input);
```

<details>
 <summary><b>GetCalendarEventForCurrentPersonInputDto</b></summary>

GetCalendarEventForCurrentPersonInputDto extends [PaginationFilterInputDto](pagination#PaginationFilterInputDto)

| Fields       | ^cType                                                 | ^cRequired | Description                                |
| ------------ | ------------------------------------------------------ | ---------- | ------------------------------------------ |
| itemsPerPage | integer                                                | :x:        | Number of items per pages                  |
| page         | integer                                                | :x:        | Current page                               |
| id           | string                                                 | :x:        | The id of event                            |
| uri          | string                                                 | :x:        | The uri of the event                       |
| aboutUri     | string                                                 | :x:        | The uri for the associated custom resource |
| ownerUri     | string                                                 | :x:        | The uri of the owner                       |
| startDate    | [DateFilterOutputDto](date-filter#datefilteroutputdto) | :x:        | Start date of the event                    |
| endDate      | [DateFilterOutputDto](date-filter#datefilteroutputdto  | :x:        | End date of the event                      |

</details>

This call returns a [GetCalendarEventForCalendarResultsDto](calendar-types#GetCalendarEventForCalendarResultsDto) class.

## Get all calendar events for owner

<span class="badge badge--warning">Require authentication</span>

Get all calendar events for a calendar owner

```php
$sherlClient->calendar->getAllCalendarEventsForOwner(DtoGetCalendarEventByOwnerInputDto $input);
```

<details>
 <summary><b>DtoGetCalendarEventByOwnerInputDto</b></summary>

DtoGetCalendarEventByOwnerInputDto extends [PaginationFilterInputDto](pagination#PaginationFilterInputDto)

| Fields            |                          Type                          | Required | Description                                                    |
| ----------------- | :----------------------------------------------------: | :------: | -------------------------------------------------------------- |
| calendarOwnerUri  |                         string                         |   :x:    | The uri of the calendar owner                                  |
| calendarAboutUri  |                         string                         |   :x:    | The uri for a custom resource associated to the calendar owner |
| calendarMetadatas |                         string                         |   :x:    | Calendar metadata                                              |
| aboutUri          |                         string                         |   :x:    | The uri for the associated custom resource                     |
| ownerUri          |                         string                         |   :x:    | The uri of the calendar event owner                            |
| startDate         | [DateFilterOutputDto](date-filter#datefilteroutputdto) |   :x:    | Start date of the events                                       |
| endDate           | [DateFilterOutputDto](date-filter#datefilteroutputdto) |   :x:    | End date of the events                                         |

</details>

This call returns a [GetCalendarEventForCalendarResultsDto](calendar-types#GetCalendarEventForCalendarResultsDto) class.
