---
id: pagination
title: Pagination
---

This page list all classes in relation to pagination.

## ViewOutputDto

| Fields           |  Type   | Description              |
| :--------------- | :-----: | :----------------------- |
| **page**         | integer | Current page             |
| **itemsPerPage** | integer | Number of items per page |
| **total**        | integer | Total number of items    |

## AggregationsOutputDto

| Fields    |                                 Type                                 | Description |
| :-------- | :------------------------------------------------------------------: | :---------- |
| **count** |                               integer                                | TODO        |
| **key**   |                                string                                | TODO        |
| **id**    |                                string                                | TODO        |
| **sub**   | array<string, [AggregationKeysOutputDto](#aggregationkeysoutputdto)> | TODO        |

## AggregationKeysOutputDto

| Fields    |  Type   | Description |
| :-------- | :-----: | :---------- |
| **count** | integer | TODO        |
| **key**   | string  | TODO        |
| **id**    | string  | TODO        |
