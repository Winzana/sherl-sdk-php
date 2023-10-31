---
id: calendar-type
title: Calendar Types
---

### CalendatOutputDto
| Fields           | Type                     | Description                          |
|------------------|:------------------------:|--------------------------------------|
| id               | string                   | The id of the calendar               |
| uri              | string                   | The uri of the calendar              |
| availabilities   | OpenHoursSpecification[] | The availabilities of the calendar   |
| unavailabilities | OpenHoursSpecification[] | The unavailabilities of the calendar |
| ownerUri         | string                   | The uri of the owner                 |
| aboutUri         | string                   | TODO                                 |
| enabled          | boolean                  | Indicates if the calendar is enabled |
| consumerId       | string                   | TODO                                 |
| createdAt        | string                   | The creation date of the calendar    |
| UpdatedAt        | string                   | The last update date of the calendar |
| metadatas        | mixed                    | Metadata about the calendar          |

### CalendarEventOutputDto
| Fields      | Type            | Description                                |
|-------------|:---------------:|--------------------------------------------|
| id          | string          | The id of the calendar event               |
| uri         | string          | The uri of the calendar event              |
| aboutUri    | string          | TODO                                       |
| ownerUri    | string          | The uri of the owner                       |
| calendarUri | string          | The uri of the associated calendar         |
| startDate   | string          | The start date of the event                |
| endDate     | boolean         | The end date of the event                  |
| location    | IGeoCoordinates | The coordinates of the event               |
| consumerId  | string          | TODO                                       |
| createdAt   | string          | The creation date of the calendar event    |
| UpdatedAt   | string          | The last update date of the calendar event |
| metadatas   | mixed           | Metadata about the calendar event          |

### IAvailability

| Fields    | Type    | Description                                       |
|-----------|:-------:|---------------------------------------------------|
| from      | string  | The start of the availability                     |
| to        | string  | The end of the availability                       |
| available | boolean | The status of the availability                    |
| isRoaming | boolean | Specify if the availability is a roaming or not   |
| place     | [PlaceOutputDto](place-types#placeoutputdto)  | The place associated to the calendar availability |

### GetCalendarEventForCalendarInputDto


### GetCalendarEventForCalendarOutputDto

| Field   | Type                                                             | Description             |
|---------|------------------------------------------------------------------|-------------------------|
| results | [CalendarEventOutputDto[]](calendar-types#calendareventoutputdto) | Array of Calendar Event |
| view    | pagination#viewoutputdto)                                        | View information        |

### GetCalendarEventForCurrentPersonInputDto
