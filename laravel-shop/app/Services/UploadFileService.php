<?php

namespace App\Services;

use Illuminate\support\Str;

class UploadFileService {
    public $file;
    public $path;
   

    public function __construct($file, $path)
    {
        $this->file = $file;
        $this->path = $path;
    }


    public function getFileExtension($file)
    {
        return $file->extension();
    }


    public function save()
    {
        $fileName = time(). '-' . Str::random(5) . '-' . rand(1, 100000)     . '.' . $this->file->getFileExtension();
        $this->file->move($this->path, $fileName);
    }
}



$uploadedFile = new UploadFileService('img.png');