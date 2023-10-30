---
id: calendar-enum
title: Calendar enums
---

### AvailabilityScale
Indicates the step to check an availability for a period
```php
enum AvailabilityScale: string
{
    case HOUR = 'hour';
    case DAY = 'day';
    case MINUTE = 'minute';
}
```

### CalendarConfig
The calendar configuration
```php
enum CalendarConfig: string
{
    case MAX_DISTANCE_FROM_OWNER = 'CALENDAR_MAX_DISTANCE_FROM_OWNER';
    case MAX_DISTANCE_BETWEEN_EVENTS = 'CALENDAR_MAX_DISTANCE_BETWEEN_EVENTS';
    case LOCATION_RESTRICTION_TYPE = 'CALENDAR_LOCATION_RESTRICTION_TYPE';
    case ALLOWED_LOCALITIES = 'CALENDAR_ALLOWED_LOCALITIES';
}
```
### RecurrenceType
```php

The king of recurence for an event
enum RecurrenceType: string
{
    case day = 'day';
    case week = 'week';
}
```
### Restriction

Kind of localisation restriction.
```php
enum Restriction: string
{
    case RADIUS = 'radius';
    case LOCALITIES = 'localities';
}
```
