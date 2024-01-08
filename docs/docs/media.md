---
id: media
title: Media
---

## Get file by id

<span class="badge badge--warning">Require authentication</span>

Retrieve file informations.

```php
$file = $sherlClient->media->getFile(string $id, MediaQueryDto $query);
```

<details>
<summary><b>MediaQueryDto</b></summary>

|   Fields   |   Type   |      Required      |             Description              |
| :--------: | :------: | :----------------: | :----------------------------------: |
|   **id**   |  string  | :white_check_mark: | The unique identifier for the media  |
| **domain** |  string  | :white_check_mark: | The domain associated with the media |
|  **type**  | TypeEnum |        :x:         |   The type of the media (optional)   |

</details>

This call returns an [ImageObjectOutputDto](media-types#ImageObjectOutputDto) object.

## Upload file

<span class="badge badge--warning">Require authentication</span>

Upload a file.

```php
$file = $sherlClient->media->uploadFile(\Psr\Http\Message\UploadedFileInterface $formData, MediaQueryDto $query);
```

<details>
<summary><b>MediaQueryDto</b></summary>

|   Fields   |   Type   |      Required      |             Description              |
| :--------: | :------: | :----------------: | :----------------------------------: |
|   **id**   |  string  | :white_check_mark: | The unique identifier for the media  |
| **domain** |  string  | :white_check_mark: | The domain associated with the media |
|  **type**  | TypeEnum |        :x:         |   The type of the media (optional)   |

</details>

This call returns an [ImageObjectOutputDto](media-types#ImageObjectOutputDto) object.

## Delete file

<span class="badge badge--warning">Require authentication</span>

Delete a file.

```php
$deleteResponse = $sherlClient->media->deleteFile(string $id);
```

This call returns a string indicating the deletion status.

```

"Media successfully deleted: {$id}"
```
