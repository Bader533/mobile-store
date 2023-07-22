<?php

namespace App\Traits;

use App\Models\Customer;
use App\Models\Image as ModelsImage;
use Illuminate\Support\Str;



trait  image
{
    function saveImage($image, $path, $obj,  $imageName = null)
    {

        $file_name = str::random(10) . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move($path, $file_name);
        $imageModel = new ModelsImage();
        if ($obj instanceof Customer) {
            $imageModel->name = $imageName;
        } else {
            $imageModel->name = $file_name;
        }

        $imageModel->url = $path . '/' . $file_name;
        $obj->images()->save($imageModel);
    }
}
