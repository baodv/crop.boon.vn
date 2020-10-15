<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class UploadImageService
{
    const TEMP_IMAGE = 'uploads';

    public function handelUploadImage($request, $fileName='images')
    {
        $uploadPath = self::TEMP_IMAGE;
        $image = $request->file($fileName);
        $save_name = $image[0]->hashName();
        $full_path = $uploadPath .'/' .$save_name;
        if (Storage::disk()->exists($uploadPath)) {
            Storage::disk()->makeDirectory($uploadPath);
        }
        Storage::disk()->put($full_path, file_get_contents($image[0]));
        return $save_name;
    }
}
