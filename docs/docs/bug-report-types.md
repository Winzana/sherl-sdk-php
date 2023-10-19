---
id: bug-report-types
title: Bug reports types
---

## BugReportOutputDto

| Fields           |  Type   | Description                                        |
| :--------------- | :-----: | :------------------------------------------------- |
| **id**           | string  | Unique identifier of the bug report.               |
| **osName**       | string  | Operating system name where the problem occurred   |
| **browserName**  | string  | Browser name where the problem occurred            |
| **windowHeight** | integer | Height of the window where the problem is detected |
| **windowWidth**  | integer | Width of the window where the problem is detected  |
| **contactEmail** | string  | Email to contact to discuss about the problem      |
| **message**      | string  | Message to explain bug                             |
| **uri**          | string  | Bug report uri (/api/bug-reports/{id})             |
| **consumerId**   | string  | Internal API ID to identify a project              |
| **createdAt**    | string  | Date where Bug has been created                    |

## BugReportListOutputDto

| Fields           |                                  Type                                   | Description                                  |
| :--------------- | :---------------------------------------------------------------------: | :------------------------------------------- |
| **results**      |               [BugReportOutputDto](#bugreportoutputdto)[]               | Array of bug reports                         |
| **view**         |                [ViewOutputDto](pagination#viewoutputdto)                | View information                             |
| **aggregations** | array<string,[AggregationsOutputDto](pagination#aggregationsoutputdto)> | Aggregation information (related to MongoDB) |
