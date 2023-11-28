---
id: calendar-types
title: Calendar Types
---

### CalendarDto

| Fields           |                                           Type                                            | Description                                       |
| ---------------- | :---------------------------------------------------------------------------------------: | ------------------------------------------------- |
| id               |                                          string                                           | The id of the calendar                            |
| uri              |                                          string                                           | The uri of the calendar                           |
| availabilities   | [OpeningHoursSpecificationOutputDto[]](calendar-types#OpeningHoursSpecificationOutputDto) | The availabilities of the calendar                |
| unavailabilities | [OpeningHoursSpecificationOutputDto[]](calendar-types#OpeningHoursSpecificationOutputDto) | The unavailabilities of the calendar              |
| ownerUri         |                                          string                                           | The uri of the owner                              |
| aboutUri         |                                          string                                           | The uri to a resources associated to the calendar |
| enabled          |                                          boolean                                          | Indicates if the calendar is enabled              |
| createdAt        |                                          string                                           | The creation date of the calendar                 |
| UpdatedAt        |                                          string                                           | The last update date of the calendar              |
| metadatas        |                                           mixed                                           | Metadata about the calendar                       |

### CalendarEventDto

| Fields      |                     Type                     | Description                                       |
| ----------- | :------------------------------------------: | ------------------------------------------------- |
| id          |                    string                    | The id of the calendar event                      |
| uri         |                    string                    | The uri of the calendar event                     |
| aboutUri    |                    string                    | The uri to a resources associated to the calendar |
| ownerUri    |                    string                    | The uri of the owner                              |
| calendarUri |                    string                    | The uri of the associated calendar                |
| startDate   |                    string                    | The start date of the event                       |
| endDate     |                    string                    | The end date of the event                         |
| location    | [AddressInfoDto](place-types#AddressInfoDto) | The address of the event                          |
| createdAt   |                    string                    | The creation date of the calendar event           |
| UpdatedAt   |                    string                    | The last update date of the calendar event        |
| metadatas   |                    mixed                     | Metadata about the calendar event                 |

### IAvailability

| Fields    |                     Type                     | Description                                       |
| --------- | :------------------------------------------: | ------------------------------------------------- |
| from      |                    string                    | The start of the availability                     |
| to        |                    string                    | The end of the availability                       |
| available |                   boolean                    | The status of the availability                    |
| isRoaming |                   boolean                    | Specify if the availability is a roaming or not   |
| place     | [PlaceOutputDto](place-types#placeoutputdto) | The place associated to the calendar availability |

### GetCalendarEventForCalendarOutputDto

| Field   | Type                                                  | Description             |
| ------- | ----------------------------------------------------- | ----------------------- |
| results | [CalendarEventDto[]](calendar-types#CalendarEventDto) | Array of Calendar Event |
| view    | pagination#viewoutputdto)                             | View information        |

### OpeningHoursSpecificationOutputDto

| Field                         |                                     Type                                     | Description                                                 |
| ----------------------------- | :--------------------------------------------------------------------------: | ----------------------------------------------------------- |
| id                            |                                    string                                    | Array of Calendar Event                                     |
| daysOfWeek                    |                                    string                                    | The concerned day                                           |
| weekDays                      |                                   string[]                                   | List of concerned days                                      |
| closes                        |                                    string                                    | The closing time                                            |
| opens                         |                                    string                                    | The opening time                                            |
| validFrom                     |                                    string                                    | The start date of this opening hours specification          |
| validFromMonthDay             |                                    number                                    | The month day number which this opening specification start |
| validThrough                  |                                    string                                    | The end date of this opening hours specification            |
| validThroughMonthDay          |                                    string                                    | The month day number which this opening specification stop  |
| HoursSpecificationRulesetEnum | [HoursSpecificationRulesetEnum](calendar-enum#HoursSpecificationRulesetEnum) | The rules to apply to the opening hours specification       |
