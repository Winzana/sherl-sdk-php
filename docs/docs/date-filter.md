---
id: date-filter
name : Date Filter
---

### DateFilterOutputDto

| Fields         | Type    | Required | Description                                                 |
|----------------|:-------:|:--------:|-------------------------------------------------------------|
| after          | integer | :x:      | Filter events occured at the date or after the date         |
| strictlyAfter  | integer | :x:      | Filter events occured after this date                       |
| before         | string  | :x:      | Filter events corresponding at the date or before this date |
| strictlyBefore | string  | :x:      | Filter events occured before this date                      |
