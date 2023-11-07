---
id: media-types
title: media types
---

## ImageObjectOutputDto

| Fields         |  Type   | Description                                   |
| :------------- | :-----: | :-------------------------------------------- |
| **id**         | string  | Unique identifier of the image                |
| **consumerId** | string  | Identifier for the consumer of the image      |
| **domain**     | string  | Domain associated with the image              |
| **uri**        | string  | URI where the image can be accessed           |
| **width**      | integer | Width of the image in pixels                  |
| **height**     | integer | Height of the image in pixels                 |
| **caption**    | object  | Media object representing the image's caption |
| **thumbnail**  | object  | Image object for the thumbnail representation |
| **createdAt**  |  date   | Date when the image was created               |

## MediaObjectOutputDto

| Fields             |  Type   | Description                                |
| :----------------- | :-----: | :----------------------------------------- |
| **contentUrl**     | string  | URL of the media content                   |
| **description**    | string  | Description of the media (optional)        |
| **duration**       | string  | Duration of the media content (optional)   |
| **encodingFormat** | string  | Format of the media encoding               |
| **size**           | integer | Size of the media file in bytes (optional) |
| **name**           | string  | Name of the media                          |
| **id**             | string  | Unique identifier of the media             |

## MediaQueryDto

| Fields     |   Type   | Description                          |
| :--------- | :------: | :----------------------------------- |
| **id**     |  string  | The unique identifier for the media  |
| **domain** |  string  | The domain associated with the media |
| **type**   | TypeEnum | The type of the media (optional)     |

## UploadDataDto

| Fields     | Type  | Description                                            |
| :--------- | :---: | :----------------------------------------------------- |
| **upload** | mixed | The data to be uploaded. This can be any type of data. |
