---
id: calendar-enum
title: Calendar enums
---

### AvailabilityScale

Indicates the time scale for availabilities

```php
enum AvailabilityScale: string
{
    case HOUR = 'hour';
    case DAY = 'day';
    case MINUTE = 'minute';
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

### HoursSpecificationRulesetEnum

Opening Rules

```php
enum HoursSpecificationRulesetEnum: string {
  case OPEN_EVERY_DAY = 'OPEN_EVERY_DAY';
  case OPEN_EXCEPT_WEEK_DAYS = 'OPEN_EXCEPT_WEEK_DAYS';
  case OPEN_WEEK_DAYS = 'OPEN_WEEK_DAYS';
}
```
