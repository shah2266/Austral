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

class EmployeeController extends Controller
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

    private function originalEmployeeSaveDir() {
        return '/frontendStyle/img/employee/thumb/big/';
    }

    private function resizeEmployeeSaveDir() {
        return '/frontendStyle/img/employee/thumb/small/';
    }

    /**
     * employee Section
     */

    //employee manage view
    public function index() {
        $employees = DB::table('employees')->orderBy('id', 'desc')->get();
        return view('admin.employee.manage',['employees'=>$employees]);
    }

    //employee form
    public function employeeAddForm() {
        return view('admin.employee.add');
        
    }
    
    //employee Add
    public function employeeAdd(Request $request){
        $this->validate($request,[
            'name'          => 'required|string|max:100',
            'designation'   => 'required|string|max:50',
            'id_card'       => 'required|string|max:30|unique:employees',
            'email'         => 'required|string|email|max:30',
            'contact'       => 'numeric|max:20',
            'address'       => 'max:120',
            // 'gender'        => 'numeric',
            // 'description'   => 'string',
            'image'         => 'required|mimes:jpeg,jpg,png|max:1024',
            'status'        => 'required|numeric',
        ]);
        
        //Image Upload
        $uploadImage	        = $request->file('image');
        $imageUniqueName        = ImageManipulation::generatedImageUploadName('employees','image', $uploadImage, $request->id);
        $uploadPath 	        = $this->basePath().$this->resizeEmployeeSaveDir().$imageUniqueName;
        $originalImagePath 	    = $this->basePath().$this->originalEmployeeSaveDir().$imageUniqueName;
        
        //Uploaded image resize
        Image::make($uploadImage)->resize(277,320)->save($uploadPath);
        Image::make($uploadImage)->resize(477,520)->save($originalImagePath);
        //$originalImagePath 	= $this->basePath().$this->originalEmployeeSaveDir();
        //$uploadImage->move($originalImagePath,$imageUniqueName);
        
        DB::table('employees')->insert([
            'name'                  => InputCheck::cleanString($request->name),
            'designation'           => InputCheck::cleanString($request->designation),
            'id_card'               => InputCheck::cleanString($request->id_card),
            'email'                 => $request->email,
            'contact'               => $request->contact,
            'address'               => InputCheck::cleanString($request->address),
            'gender'                => $request->gender,
            'description'           => InputCheck::cleanString($request->description),
            'original_image_path'   => $this->originalEmployeeSaveDir(),
            'resize_image_path'     => $this->resizeEmployeeSaveDir(),
            'image'                 => $imageUniqueName,
            'status'                => $request->status,
            'created_at'            => \Carbon\Carbon::now()
        ]);

        //$this->setUserValue($request, $imageUniqueName);
        return redirect('/controlpanel/admin/employee/manage')->with('success','Employee info save successfully');
    }
    
    
    //Display employee for edit
    public function employeeEdit($id){
        $employee = DB::table('employees')
                    ->where('id', $id)
                    ->first();
        return view('admin.employee.edit',['employee'=>$employee]);
    }
    
    //employee update
    public function employeeUpdate(Request $request){
        //dd(InputCheck::cleanString($request->description));
        $this->validate($request,[
            'name'          => 'required|string|max:100',
            'designation'   => 'required|string|max:50',
            'id_card'       => 'required|string|max:30',
            'email'         => 'required|string|email|max:30',
            'contact'       => 'numeric',
            'address'       => 'max:120',
            //'gender'        => 'numeric',
            //'description'   => 'string',
            'image'         => 'mimes:jpeg,jpg,png|max:1024',
            'status'        => 'required|numeric',
        ]);
        
        if($request->hasFile('image')) {
            //Image upload
            $uploadImage	        = $request->file('image');
            $imageUniqueName        = ImageManipulation::generatedImageUploadName('employees','image', $uploadImage, $request->id);
            $uploadPath 	        = $this->basePath().$this->resizeEmployeeSaveDir().$imageUniqueName;
            $originalImagePath 	    = $this->basePath().$this->originalEmployeeSaveDir().$imageUniqueName;

            //Uploaded image resize
            Image::make($uploadImage)->resize(277,320)->save($uploadPath);
            Image::make($uploadImage)->resize(477,520)->save($originalImagePath);
            
            //$originalImagePath 	= $this->basePath().$this->originalEmployeeSaveDir();
            //$uploadImage->move($originalImagePath,$imageUniqueName);

            $image = $imageUniqueName;
            ImageManipulation::imageDeleteFromMultiDir('employees','id','image',$request->id);
        } else {
            $employee = DB::table('employees')
                    ->where('id', $request->id)
                    ->first();
            $image = $employee->image;
        }

        DB::table('employees')
            ->where('id','=', $request->id)
            ->update([
                        'name'          => InputCheck::cleanString($request->name),
                        'designation'   => InputCheck::cleanString($request->designation),
                        'id_card'       => InputCheck::cleanString($request->id_card),
                        'email'         => $request->email,
                        'contact'       => $request->contact,
                        'address'       => InputCheck::cleanString($request->address),
                        'gender'        => $request->gender,
                        'description'   => InputCheck::cleanString($request->description),
                        'image'         => $image,
                        'status'        => $request->status,
                        'updated_at'    => \Carbon\Carbon::now()
                    ]
            );

        return redirect('/controlpanel/admin/employee/manage')->with('success','Employee info update successfully');
    }

    public function employeeDelete($id) {
        $employee = DB::table('employees')->where('id', $id)->where('status', '!=', 1)->first();
        if(empty($employee)) {
            return redirect('/controlpanel/admin/employee/manage')->with('danger','You can\'t delete publish Item');
        } else {
            ImageManipulation::imageDeleteFromMultiDir('employees','id','image',$id);
            DB::table('employees')->where('id', $id)->where('status', '!=', 1)->delete();
            return redirect('/controlpanel/admin/employee/manage')->with('success','Employee info delete successfully');
        }
    }

    public function employeePublish($id) {
        Publishing::publish('employees',$id);
        return redirect('/controlpanel/admin/employee/manage')->with('success','Employee info published');
    }

    public function employeeUnpublish($id) {
        Publishing::unpublish('employees',$id);
        return redirect('/controlpanel/admin/employee/manage')->with('info','Employee info Unpublished');;
        
    }
}
