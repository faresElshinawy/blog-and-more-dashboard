<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait ImageUpload {

    public function imageUpload($request,$path,$image_name = null)
    {
        if($request->has('image') && $request->image)
        {
            $this->remove($path,$image_name);
            $image = $request->file('image');
            $image_name = uniqid('',true) . '_' . $image->getClientOriginalName();
            $image->move(public_path($path),$image_name);
        }

        return $image_name;
    }


    public function remove($path,$image = null)
    {
        $old_image = public_path($path.'/'.$image);
        if(File::exists(public_path($old_image)))
        {
            File::delete($old_image);
        }
    }
}
