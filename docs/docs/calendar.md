---
id: calendar
title: Calendar
---

## Create calendar

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->createCalendar(CreateCalendarInputDto $createCalendar);
```

<details>
 <summary><b>CreateClaimInput</b></summary>

| Fields           |                        Type                        |      Required      | Description                       |
| :--------------- | :------------------------------------------------: | :----------------: | :-------------------------------- |
| **id**           |                       string                       | :x: | The calendar id             |
| **aboutUri**   |                       string                       | :x: | TODO                    |
| **ownerUri** |                       string                       | :x: | The uri of the owner                   |
| **availabilities**     |                       [OpenHoursSpecification](calendar-types#openHoursSpecification)                       | :x: | Availabilities of the calendar |
| **metadatas**    | TODO | :white_check_mark: | Metadata information about the calendar                 |

</details>

This call returns a [CalendarOutputDto](calendar-types#calendaroutputdto) class.

## Update calendar by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->claim->updateClaim(string $claimId, UpdateClaimInputDto $updateClaim);
```

<details>
 <summary><b>UpdateCalendarInputDto</b></summary>

| Fields      |                  Type                  |      Required      | Description                 |
| :---------- | :------------------------------------: | :----------------: | :-------------------------- |
| **aboutUri**   |                       string                       | :white_check_mark: | TODO                    |
| **ownerUri** |                       string                       | :white_check_mark: | The uri of the owner                   |
| **availabilities**     |                       [OpenHoursSpecification](calendar-types#openHoursSpecification)                       | :white_check_mark: | Availabilities of the calendar |
| **metadatas**    | TODO | :white_check_mark: | Metadata information about the calendar                 |

</details>

This call returns the updated [CalendarOutputDto](calendar-types#calendaroutputdto).

## Delete calendar by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->claim->deleteCalendar(string $calendarId);
```
| Fields      |                  Type                  |      Required      | Description                 |
| :---------- | :------------------------------------: | :----------------: | :-------------------------- |
| **calendarId**   |                       string                       | :white_check_mark: | The id of the calendar to delete                    |
This call returns true if calendar calendar is successfully deleted.

## Get calendar by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->claim->getCalendarWithId(string $calendarId);
```

This call returns a [CalendarOutputDto](claim-types#claimoutputdto) class.

## Find calendar availabilities

<span class="badge badge--warning">Require authentication</span>

Check availabilities of a specific calendar with filters.
```php
$sherlClient->calendar->findCalendarAvailabilities(FindAvailabilitiesInputDto $filters);
```

<details>
 <summary><b>FindAvailabilitiesInputDto</b></summary>

| Fields       | Type    | Required | Description                          |
|--------------|:-------:|:--------:|--------------------------------------|
| ownerUri     | string  | :x:      | Uri of the owner project             |
| aboutUri     | string  | :x:      | TODO                                 |
| userPlaceUri | string  | :x:      | TODO                                 |
| metadatas    | mixed   | :x:      | Other metadata to filter             |
| startDate    | string  | :x:      | Start date of the calendar to find   |
| endDate      | string  | :x:      | End date of the calendar to find     |
| scale   |   [AvailabilityScale](calendar-enum#availabilityscale)      | :x:      | TODO                                 |
| scaleValue   |         | :x:      | TODO                                 |
| available    | boolean | :x:      | Availability of the calendar to find |

</details>

This call returns a array of [IAvailability](calendar-type#iavailability) class.

## Check Dates Availability

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->checksDateAvailabilities(CheckDatesInputDto $dates);
```

<details>
 <summary><b>CheckDatesInputDto</b></summary>

| Fields         |  Type  | Description                            |
| :------------- | :----: | :------------------------------------- |
| **id**         | string | Claim's id                             |
| **personId**   | string | ID of person which associated to claim |
| **orderId**    | string | ID of order which associated to claim  |
| **consumerId** | string | Internal API ID to identify a project  |

</details>

This call returns a boolean

## Check for location availability

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->checkLocationAvailabilities(CheckLocationInputDto $location);
```

<details>
 <summary><b>CheckLocationInputDto</b></summary>

| Fields           | Type   | Required           | Description                 |
|------------------|:------:|:------------------:|-----------------------------|
| calendarOwnerUri | string | :white_check_mark: | The calendar owner's uri    |
| country          | string | :x:                | The country to check        |
| locality         | string | :x:                | The locality to check       |
| region           | string | :x:                | The region to check         |
| postalCode       | string | :x:                | The plostal code to checkk  |
| streetAddress    | string | :x:                | The street address to check |

</details>

This call returns a [ClaimOutputDto](claim-types#claimoutputdto) class.



# Calendar Event

## Create calendar event

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->calendar->createCalendarEvent(CreateCalendarEventInputDto $createCalendarEvent);
```

<details>
 <summary><b>CreateCalendarEventInputDto</b></summary>

| Fields    | Type   | Required           | Description                   |
|-----------|:------:|:------------------:|-------------------------------|
| id        | string | :white_check_mark: | The id of the calendar event  |
| uri       | string | :x:                | The uri of the calendar event |
| aboutUri  | string | :x:                | TODO                          |
| ownerUri  | string | :x:                | The uri of the owner          |
| startDate | string | :x:                | The start date of the event   |
| endDate   | string | :x:                | The end date of the event     |
| metadatas | mixed  | :x:                | metadata about the event      |
</details>

This call returns a [CalendarEventOutputDto](calendar-types#calendareventoutputdto) class.

## Update calendar by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->claim->updateClaim(string $claimId, UpdateClaimInputDto $updateClaim);
```

<details>
 <summary><b>UpdateCalendarInputDto</b></summary>

| Fields      |                  Type                  |      Required      | Description                 |
| :---------- | :------------------------------------: | :----------------: | :-------------------------- |
| **aboutUri**   |                       string                       | :white_check_mark: | TODO                    |
| **ownerUri** |                       string                       | :white_check_mark: | The uri of the owner                   |
| **availabilities**     |                       [OpenHoursSpecification](calendar-types#openHoursSpecification)                       | :white_check_mark: | Availabilities of the calendar |
| **metadatas**    | TODO | :white_check_mark: | Metadata information about the calendar                 |

</details>

This call returns the updated [CalendarOutputDto](calendar-types#calendaroutputdto).

## Delete calendar by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->claim->deleteCalendar(string $calendarId);
```
| Fields      |                  Type                  |      Required      | Description                 |
| :---------- | :------------------------------------: | :----------------: | :-------------------------- |
| **calendarId**   |                       string                       | :white_check_mark: | The id of the calendar to delete                    |
This call returns true if calendar calendar is successfully deleted.

## Get calendar by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->claim->getCalendarWithId(string $calendarId);
```

This call returns a [CalendarOutputDto](claim-types#claimoutputdto) class.

## Find calendar availabilities

<span class="badge badge--warning">Require authentication</span>

Check availabilities of a specific calendar with filters.
```php
$sherlClient->calendar->findCalendarAvailabilities(FindAvailabilitiesInputDto $filters);
```

<details>
 <summary><b>FindAvailabilitiesInputDto</b></summary>

| Fields       | Type    | Required | Description                          |
|--------------|:-------:|:--------:|--------------------------------------|
| ownerUri     | string  | :x:      | Uri of the owner project             |
| aboutUri     | string  | :x:      | TODO                                 |
| userPlaceUri | string  | :x:      | TODO                                 |
| metadatas    | mixed   | :x:      | Other metadata to filter             |
| startDate    | string  | :x:      | Start date of the calendar to find   |
| endDate      | string  | :x:      | End date of the calendar to find     |
| scale   |   [AvailabilityScale](calendar-enum#availabilityscale)      | :x:      | TODO                                 |
| scaleValue   |         | :x:      | TODO                                 |
| available    | boolean | :x:      | Availability of the calendar to find |

</details>

This call returns a array of [IAvailability](calendar-type#iavailability) class.
