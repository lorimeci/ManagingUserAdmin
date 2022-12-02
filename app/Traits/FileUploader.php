<?php

namespace App\Traits;

use App\Models\User;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait FileUploader
{
   // private $filedir = 'public/images/';
    public function uploadFile($request, User $users)
    {
        $inputName='avatar';
        $requestFile = $request->file($inputName); 
        try {
            if ($requestFile) {
                $dir = 'public/images/'.$users->avatar; 
                if(File::exists($dir)){
                    File::delete($dir);
                }
                $file = $request->file($inputName);
                $name = time() .'-' .$request->name . '.' . $request->avatar->extension();
                $file = $file->move(public_path('images') ,$name);
                $users ->avatar = $name;
                $users->update();
            
            }

            return $name;//kthe pathin 
        } catch (\Throwable $th) {
            report($th);

            return $th->getMessage();
        }
    }
        // delete file
        public function deleteFile($fileName = 'images')
        {
            try {
                if ($fileName) {
                    Storage::delete('public/images/'.$fileName);
                }
    
                return true;
            } catch (\Throwable $th) {
                report($th);
    
                return $th->getMessage();
            }
        }
  
}