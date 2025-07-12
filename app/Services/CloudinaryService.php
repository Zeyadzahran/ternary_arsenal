<?php

namespace App\Services;

use Cloudinary\Cloudinary;

class CloudinaryService
{


    protected Cloudinary $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);
    }


    public function uploadImage($file, $folder = 'products'): string
    {
        $uploaded = $this->cloudinary->uploadApi()->upload($file->getRealPath(), [
            'folder' => $folder,
            'quality' => 'auto',
            'fetch_format' => 'auto', 
        ]);

        return $uploaded['public_id'];
    }

    public function deleteImage(string $publicId): void
    {
        $this->cloudinary->uploadApi()->destroy($publicId);
    }

    public function getImageUrl(string $publicId): string
    {
        return $this->cloudinary->image($publicId)->toUrl();
    }
}
