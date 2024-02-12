---
id: config-types
title: Config types
---

## ConfigOutputDto

| Fields        |  Type   | Description                              |
| :------------ | :-----: | :--------------------------------------- |
| **id**        | string  | Unique identifier                        |
| **code**      | string  | Code used to identify config             |
| **value**     |  mixed  | Config value                             |
| **consumer**  | string  | Linked consumer                          |
| **position**  | integer | Config priority                          |
| **appliedTo** | string  | Application field for the current config |
| **isPublic**  | boolean | Indicates the config's public status     |
