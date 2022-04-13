<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;


/**
 * Handle Image
 */
trait HandleImage
{
    protected $imageDefault = 'default.png';
    protected $path = 'uploads/products';

    public function verifyImage($request)
    {
        return $request->hasFile('image');
    }

    public function saveImage($request)
    {
        if($this->verifyImage($request)) {
            $file = $request->image;
            $filename = time() . $file->getClientOriginalName();
            $location = $this->path . '/' . $filename;
            $image = image::make($file);
            $image->resize(150,150)->save($location);
            return $filename;
        }
        
        return $this->imageDefault;
    }

    public function deleteImage($imageName)
    {
        $pathName = $this->path . $imageName;
        if (file_exists($pathName) && $imageName != $this->imageDefault) {
            unlink($pathName);
        }
    }

    public function updateImage($request, $currentImage)
    {
        if($this->verifyImage($request)) {
            $this->deleteImage($currentImage);
            return $this->saveImage($request);
        }
        return $currentImage;
    }
}
