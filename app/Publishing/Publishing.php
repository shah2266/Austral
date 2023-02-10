<?php

namespace App\Publishing;
use DB;

class Publishing
{	
    public static function publishSingle($tableName,$id) {
        $companyPublish = DB::table($tableName)
                            ->where('id', $id)
                            ->update(
                                [
                                    'status' => 1,
                                ]
                            );

            if($companyPublish) {
                DB::table($tableName)
                    ->where('id','!=', $id)
                    ->update(
                        [
                            'status' => 0,
                        ]
                    );
            }      
    }

	public static function publish($tableName,$id) {

        DB::table($tableName)
            ->where('id', $id)
            ->update(
                [
                    'status' => 1,
                ]
            );
		return true;        
    }

    public static function unpublish($tableName,$id) {
        DB::table($tableName)
            ->where('id', $id)
            ->update(
                [
                    'status' => 0,
                ]
            );
			
		return true;
    }
	
}
