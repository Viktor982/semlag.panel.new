<?php

namespace NPDashboard\Services;

use Slim\Http\UploadedFile;
use Mimey\MimeTypes;

class ImagesService
{
    /**
     * @var \Mimey\MimeTypes
     */
    private $mime;

    public function __construct()
    {
        $this->mime = new MimeTypes;
    }

    /**
     * @param UploadedFile $file
     * @return mixed
     */
    public function create(UploadedFile $file)
    {
        $image = \NPDashboard\Models\Image::create([
            'slug' => md5(mt_rand(1, 999) . str_random(32) . mt_rand(1, 999)) . '.' . $this->mime->getExtension($file->getClientMediaType()),
            'blob' => base64_encode(file_get_contents($file->file)),
            'header' => $file->getClientMediaType()
        ]);
        return $image->url;
    }

    public function createBanner(UploadedFile $file)
    {
        $image = \NPDashboard\Models\Image::create([
            'slug' => md5(mt_rand(1, 999) . str_random(32) . mt_rand(1, 999)) . '.' . $this->mime->getExtension($file->getClientMediaType()),
            'blob' => base64_encode(file_get_contents($file->file)),
            'header' => $file->getClientMediaType()
        ]);
        return $image;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $img = \NPDashboard\Models\Image::find($id);
        return ($img) ? $img->delete() : true;
    }
}