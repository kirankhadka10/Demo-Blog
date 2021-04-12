<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Support\Str;

class MediaService
{
  public static function upload($file, $folder = "upload")
  {
    // File Name (Original Name)
    $name = Str::slug($file->getClientOriginalName());

    // File Extension
    $ext = $file->extension();

    // File Type (Mime Type)
    $type = $file->getMimeType();

    // Random File Name
    $path = Str::random(10) . mt_rand(1, 100) . "." . $ext;

    // Upload
    $file->storeAs("public/" . $folder, $path);

    // Store to media table
    $media = Media::create([
      'name' => $name,
      'path' => $folder . "/" . $path,
      'type' => $type,
    ]);

    // Return media ID
    return $media->id;
  }
}
