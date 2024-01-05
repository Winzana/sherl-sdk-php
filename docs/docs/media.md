---
id: media
title: Media
---

## Get file by id

<span class="badge badge--warning">Require authentication</span>

Retrieve file informations.

```php
$file = $sherlClient->media->getFile(string $id, string $domain, $type = null);
```

This call returns an [ImageObjectOutputDto](media-types#ImageObjectOutputDto) object.

## Upload file

<span class="badge badge--warning">Require authentication</span>

Upload a file.

```php
$file = $sherlClient->media->uploadFile(array $formData, array $query);
```

This call returns an [ImageObjectOutputDto](media-types#ImageObjectOutputDto) object.

## Delete file

<span class="badge badge--warning">Require authentication</span>

Delete a file.

```php
$deleteResponse = $sherlClient->media->deleteFile(string $mediaId);
```

This call returns a string indicating the deletion status.

```

"Media successfully deleted: {$mediaId}"
```
