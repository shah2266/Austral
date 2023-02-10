<?php

namespace App\ImageHandler;
use Illuminate\Support\Str;
use DB;

class ImageManipulation
{
    private static function basePath(){
        //return base_path();
        //return public_path();
        return false;
    }

    //Image check
	public static function generatedImageUploadName($getTableName,$getColumnName, $uploadImage, $id){

		$query = DB::table($getTableName)->select($getColumnName)->where('id','=', $id)->first();
        //If upload single image
		if(file_exists($uploadImage)) {
            $extension  = $uploadImage->getClientOriginalExtension();
            //Image Unique Name
            $imageUrl   = Str::random(40).'.'.$extension;
		}else{
            $imageUrl = $query->$getColumnName;
        }

        //dd($imageUrl);
		return $imageUrl;
	}

    //Unlink existing image
    public static function previousImageDelete($getTableName,$getColumnName,$id) {
        $query = DB::table($getTableName)->select($getColumnName)->where('id', $id)->first();
        if(!empty($query)) {
            //$imageUrl = self::basePath().'/'.$query->$getColumnName; //Previous line
            $imageUrl = $query->$getColumnName;
            if(file_exists($imageUrl) == true ) {
                unlink($imageUrl);
            } else {
                return true;
            }
        }
    }

    //Unlink image from multiple dir
    public static function imageDeleteFromMultiDir($getTableName,$conditionalColumn, $getColumnName,$id) {
        
        $query = DB::table($getTableName)
                            ->where($conditionalColumn,'=', $id)
                            ->select('resize_image_path','original_image_path',$getColumnName,'id')
                            ->first();
        //dd($query);
        if(!empty($query)) {
           // $resizeImagePath    = self::basePath().$query->resize_image_path.$query->image;
            //$originalImagePath  = self::basePath().$query->original_image_path.$query->image;
            $resizeImagePath    = $query->resize_image_path.$query->image;
            $originalImagePath  = $query->original_image_path.$query->image;
            if((file_exists($resizeImagePath) == true) && file_exists($originalImagePath) == true) {
                unlink($resizeImagePath);
                unlink($originalImagePath);
            }
        }
    }

    //Unlink multiple existing image
    public static function multipleImageDelete($getTableName,$getColumnName,$id) {
        //$query = DB::table($getTableName)->select($getColumnName)->where('id', $id)->first();

        $query = DB::table('project_diagrams')
                            ->where('project_id','=', $id)
                            ->select('resize_image_path','original_image_path','image')
                            ->get();
        if(!empty($query)) {
            foreach($query as $imageName) {
                //$resizeImagePath    = self::basePath().$imageName->resize_image_path.$imageName->image;
                //$originalImagePath  = self::basePath().$imageName->original_image_path.$imageName->image;
                $resizeImagePath    = $imageName->resize_image_path.$imageName->image;
                $originalImagePath  = $imageName->original_image_path.$imageName->image;

                if((file_exists($resizeImagePath) == true) && file_exists($originalImagePath) == true) {
                    unlink($resizeImagePath);
                    unlink($originalImagePath);
                }
            }
        }
    }
}
