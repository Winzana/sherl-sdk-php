---
id: bug-report
title: Bug report
---

## Create bug report

<span class="badge badge--success">Public</span>

```php
$sherlClient->bugReport->createBugReport(CreateBugReportInputDto $createBugReportInput);
```

<details>
<summary><b>CreateBugReportInputDto</b></summary>

| Fields           |  Type   |      Required      | Description                                        |
| :--------------- | :-----: | :----------------: | :------------------------------------------------- |
| **osName**       | string  | :white_check_mark: | Operating system name where the problem occurred   |
| **browserName**  | string  | :white_check_mark: | Browser name where the problem occurred            |
| **contactEmail** | string  | :white_check_mark: | Email to contact to discuss about the problem      |
| **message**      | string  | :white_check_mark: | Message to explain bug                             |
| **windowHeight** | integer | :white_check_mark: | Height of the window where the problem is detected |
| **windowWidth**  | integer | :white_check_mark: | Width of the window where the problem is detected  |

</details>

This call returns a [BugReportOutputDto](bug-report-types#bugreportoutputdto) class.

## Get bug report by id

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->bugReport->getBugReportById(string $bugReportId);
```

This call returns a [BugReportOutputDto](bug-report-types#bugreportoutputdto) class.

## Get all bug reports

<span class="badge badge--warning">Require authentication</span>

```php
$sherlClient->bugReport->getBugReports(BugReportListInputDto $bugReportListInput);
```

<details>
<summary><b>BugReportListInputDto</b></summary>

| Fields           |  Type   | Required | Description                                        |
| :--------------- | :-----: | :------: | :------------------------------------------------- |
| **osName**       | string  |   :x:    | Operating system name where the problem occurred   |
| **browserName**  | string  |   :x:    | Browser name where the problem occurred            |
| **contactEmail** | string  |   :x:    | Email to contact to discuss about the problem      |
| **windowHeight** | integer |   :x:    | Height of the window where the problem is detected |
| **windowWidth**  | integer |   :x:    | Width of the window where the problem is detected  |

</details>

This call returns a [BugReportListOutputDto](bug-report-types#bugreportlistoutputdto) class.
