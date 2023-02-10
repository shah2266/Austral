<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\ImageHandler\ImageManipulation;
use App\InputChecker\InputCheck;
use App\Publishing\Publishing;
use Illuminate\Http\Request;
use Image;
use DB;


class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    private function basePath(){
        //return base_path();
        return public_path();
    }

    private function originalEventSaveDir() {
        return '/frontendStyle/img/event/thumb/big/';
    }

    private function resizeEventSaveDir() {
        return '/frontendStyle/img/event/thumb/small/';
    }

    /**
     * Event Section
     */

    //Event manage view
    public function index() {
        $events = DB::table('events')->orderBy('id', 'desc')->get();
        return view('admin.event.manage',['events'=>$events]);
    }

    //Event form
    public function eventAddForm() {
        return view('admin.event.add');
        
    }
    
    //Event Add
    public function eventAdd(Request $request){
        $this->validate($request,[
            'name'          => 'required|string|max:100|unique:events',
            'address'       => 'required|string|max:120',
            'from_date'     => 'required|string|max:30',
            'to_date'       => 'required|string|max:30',
            'description'   => 'required|string',
            'image'         => 'required|mimes:jpeg,jpg,png|max:1024',
            'status'        => 'required|numeric',
        ]);
        
        //Image Upload
        $uploadImage	        = $request->file('image');
        $imageUniqueName        = ImageManipulation::generatedImageUploadName('events','image', $uploadImage, $request->id);
        $resizeImagePage 	    = $this->basePath().$this->resizeEventSaveDir().$imageUniqueName;
        $originalImagePath 	    = $this->basePath().$this->originalEventSaveDir().$imageUniqueName;

        //Uploaded image resize
        Image::make($uploadImage)->resize(340,346)->save($resizeImagePage);
        Image::make($uploadImage)->resize(750,375)->save($originalImagePath);

        //$originalImagePath 	= $this->basePath().$this->originalEventSaveDir();
        //$image->move($originalImagePath,$imageUniqueName);

        DB::table('events')->insert([
            'name'                  => InputCheck::cleanString($request->name),
            'address'               => InputCheck::cleanString($request->address),
            'from_date'             => \Carbon\Carbon::parse($request->from_date)->format('Ymd'),
            'to_date'               => \Carbon\Carbon::parse($request->to_date)->format('Ymd'),
            'description'           => InputCheck::cleanString($request->description),
            'original_image_path'   => $this->originalEventSaveDir(),
            'resize_image_path'     => $this->resizeEventSaveDir(),
            'image'                 => $imageUniqueName,
            'status'                => $request->status,
            'created_at'            => \Carbon\Carbon::now()
        ]);

        //$this->setUserValue($request, $imageUniqueName);
        return redirect('/controlpanel/admin/event/manage')->with('success','Event info save successfully');
    }
    
    
    //Display event for edit
    public function eventEdit($id){
        $event = DB::table('events')
                    ->where('id', $id)
                    ->first();
        return view('admin.event.edit',['event'=>$event]);
    }
    
    //event update
    public function eventUpdate(Request $request){

        //dd($request->id);
        $this->validate($request,[
            'name'          => 'required|string|max:100',
            'address'       => 'required|string|max:120',
            'from_date'     => 'required|string|max:30',
            'to_date'       => 'required|string|max:30',
            'description'   => 'required|string',
            'image'         => 'mimes:jpeg,jpg,png|max:1024',
            'status'        => 'required|numeric',
        ]);
        
        if($request->hasFile('image')) {
            //Image upload
            $uploadImage	        = $request->file('image');
            $imageUniqueName        = ImageManipulation::generatedImageUploadName('events','image', $uploadImage, $request->id);
            $resizeImagePage 	    = $this->basePath().$this->resizeEventSaveDir().$imageUniqueName;
            $originalImagePath 	    = $this->basePath().$this->originalEventSaveDir().$imageUniqueName;
            
            //Uploaded image resize
            Image::make($uploadImage)->resize(340,346)->save($resizeImagePage);
            Image::make($uploadImage)->resize(750,375)->save($originalImagePath);

            $image = $imageUniqueName;
            ImageManipulation::imageDeleteFromMultiDir('events','id','image',$request->id);
            
        } else {
            $event = DB::table('events')
                        ->where('id', $request->id)
                        ->first();
            
            $image = $event->image;
            
        }
        //dd($image);
        $test = DB::table('events')
            ->where('id','=',$request->id)
            ->update([
                        'name'                  => InputCheck::cleanString($request->name),
                        'address'               => InputCheck::cleanString($request->address),
                        'from_date'             => \Carbon\Carbon::parse($request->from_date)->format('Ymd'),
                        'to_date'               => \Carbon\Carbon::parse($request->to_date)->format('Ymd'),
                        'description'           => InputCheck::cleanString($request->description),
                        'image'                 => $image,
                        'status'                => $request->status,
                        'updated_at'            => \Carbon\Carbon::now()
                    ]
            );

        return redirect('/controlpanel/admin/event/manage')->with('success','Event info update successfully');
    }

    public function eventDelete($id) {
        $event = DB::table('events')->where('id', $id)->where('status', '!=', 1)->first();
        if(empty($event)) {
            return redirect('/controlpanel/admin/event/manage')->with('danger','You can\'t delete publish Item');
        } else {
            ImageManipulation::imageDeleteFromMultiDir('events','id','image',$id);
            DB::table('events')->where('id', $id)->where('status', '!=', 1)->delete();
            return redirect('/controlpanel/admin/event/manage')->with('success','Event info delete successfully');
        }
    }

    public function eventPublish($id) {
        Publishing::publish('events',$id);
        return redirect('/controlpanel/admin/event/manage')->with('success','Event info published');
    }

    public function eventUnpublish($id) {
        Publishing::unpublish('events',$id);
        return redirect('/controlpanel/admin/event/manage')->with('info','Event info Unpublished');;
        
    }
}
