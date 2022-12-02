<?php

namespace App\Traits;

use App\Models\User;

use Illuminate\Support\Facades\File;

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
        public function deleteFile(User $users)
        {
            try {
                $imagepath = public_path('images/' .$users->avatar);
                if (File::exists($imagepath)) {
                    unlink($imagepath);
                }
                
                return $imagepath;
            } catch (\Throwable $th) {
                report($th);
    
                return $th->getMessage();
            }
        }
  
}