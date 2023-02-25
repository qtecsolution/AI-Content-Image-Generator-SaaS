<?php
use Illuminate\Support\Str;

function fileUpload($file, $folder, $name='')
{
    if($name==''){
        $name = date('Ymd');
    }
    $imageName = Str::slug($name) . rand(0, 9999) . '.' . $file->extension();
    $file->move(public_path('uploads/' . $folder), $imageName);
    $path = 'uploads/' . $folder . '/' . $imageName;
    return $path;
}