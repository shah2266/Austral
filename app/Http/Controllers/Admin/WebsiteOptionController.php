<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ImageHandler\ImageManipulation;
use Illuminate\Support\Str;
use App\InputChecker\InputCheck;
use App\Publishing\Publishing;
use Illuminate\Http\Request;
use App\Contacts;
use Image;
use DB;

class WebsiteOptionController extends Controller
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

    /**
     * Company Section
     */

    //Company view
    public function company() {
        $companyinfo = DB::table('companies')->orderBy('id', 'desc')->get();
        return view('admin.company.manage',['companyinfo'=>$companyinfo]);
    }


    //Company form
    public function companyAddForm() {
        return view('admin.company.add');
        
    }

    //Company Add
    public function companyAdd(Request $request){

		$this->validate($request,[
            'company_name'      => 'required|string|max:100|unique:companies',
            'address'           => 'required|string|max:100',
            'email'             => 'required|string|max:100',
            'phone'             => 'string|max:60',
            'telephone'         => 'string|max:60',
            'copy_right_text'   => 'string|max:150',
            'logo'              => 'required|mimes:jpeg,jpg,png|max:250',
            'latitude'          => 'numeric',
            'longitude'         => 'numeric',
            'map_content'       => 'string|max:100',
        ]);
        
        $logo	            = $request->file('logo');
        //$imageName 		= $logo->getClientOriginalName();
        $extension          = $logo->getClientOriginalExtension();
        //$datetime           = \Carbon\Carbon::now()->format('YmdHi');
        //Image Unique Name
        $imageUniqueName    = Str::random(40).'.'.$extension;
        $uploadPath 	    = $this->basePath().'/frontendStyle/img/company/'.$imageUniqueName;
        
        //Uploaded image resize
        Image::make($logo)->resize(150,80)->save($uploadPath);
        //dd($imageUniqueName);

        DB::table('companies')->insert([
            'company_name'          => InputCheck::cleanString($request->company_name),
            'address'               => InputCheck::cleanString($request->address),
            'email'                 => $request->email,
            'phone'                 => InputCheck::cleanString($request->phone),
            'telephone'             => InputCheck::cleanString($request->telephone),
            'copy_right_text'       => InputCheck::cleanString($request->copy_right_text),
            'logo'                  => '/frontendStyle/img/company/'.$imageUniqueName,
            'social_link_icon_1'    => $request->social_link_icon_1,
            'social_link_icon_2'    => $request->social_link_icon_2,
            'social_link_icon_3'    => $request->social_link_icon_3,
            'social_link_icon_4'    => $request->social_link_icon_4,
            'social_link_icon_5'    => $request->social_link_icon_5,
            'social_link1'          => $request->social_link1,
            'social_link2'          => $request->social_link2,
            'social_link3'          => $request->social_link3,
            'social_link4'          => $request->social_link4,
            'social_link5'          => $request->social_link5,
            'latitude'              => $request->latitude,
            'longitude'             => $request->longitude,
            'map_content'           => InputCheck::cleanString($request->map_content),
            'created_at'            => \Carbon\Carbon::now()
        ]);

        //$this->setUserValue($request, $imageUniqueName);
		return redirect('/controlpanel/admin/company/manage')->with('success','Company info save successfully');
    }

    //Display company for edit
	public function companyEdit($id){
        $company = DB::table('companies')
                    ->where('id', $id)
                    ->first();
		return view('admin.company.edit',['company'=>$company]);
    }
    
    //Company update
    public function companyUpdate(Request $request){

		$this->validate($request,[
            'company_name'      => 'required|string|max:100',
            'address'           => 'required|string|max:100',
            'email'             => 'string|email|max:100',
            'phone'             => 'string|max:60',
            'telephone'         => 'string|max:60',
            'copy_right_text'   => 'string|max:150',
            'logo'              => 'mimes:jpeg,jpg,png|max:250',
            'latitude'          => 'numeric',
            'longitude'         => 'numeric',
            'map_content'       => 'string|max:100',
        ]);
        
        if($request->hasFile('logo')) {
            $uploadImage	     = $request->file('logo');
            $imageUniqueName     = ImageManipulation::generatedImageUploadName('companies','logo', $uploadImage, $request->id);
            $uploadPath 	     = $this->basePath().'/frontendStyle/img/company/'.$imageUniqueName;
            $uploadName          = '/frontendStyle/img/company/'.$imageUniqueName;
            Image::make($request->file('logo'))->resize(150,80)->save($uploadPath);
            $logo = $uploadName;
            ImageManipulation::previousImageDelete('companies','logo',$request->id);
        } else {
            $company = DB::table('companies')
                    ->where('id', $request->id)
                    ->first();
            $logo = $company->logo;
        }

        DB::table('companies')
            ->where('id', '=', $request->id)
            ->update([
                        'company_name'          => InputCheck::cleanString($request->company_name),
                        'address'               => InputCheck::cleanString($request->address),
                        'email'                 => $request->email,
                        'phone'                 => InputCheck::cleanString($request->phone),
                        'telephone'             => InputCheck::cleanString($request->telephone),
                        'copy_right_text'       => InputCheck::cleanString($request->copy_right_text),
                        'logo'                  => $logo,
                        'social_link_icon_1'    => $request->social_link_icon_1,
                        'social_link_icon_2'    => $request->social_link_icon_2,
                        'social_link_icon_3'    => $request->social_link_icon_3,
                        'social_link_icon_4'    => $request->social_link_icon_4,
                        'social_link_icon_5'    => $request->social_link_icon_5,
                        'social_link1'          => $request->social_link1,
                        'social_link2'          => $request->social_link2,
                        'social_link3'          => $request->social_link3,
                        'social_link4'          => $request->social_link4,
                        'social_link5'          => $request->social_link5,
                        'latitude'              => $request->latitude,
                        'longitude'             => $request->longitude,
                        'map_content'           => InputCheck::cleanString($request->map_content),
                        'updated_at'            => \Carbon\Carbon::now()
                    ]
            );
		return redirect('/controlpanel/admin/company/manage')->with('success','Company info update successfully');
    }

    public function companyPublish($id) {
        Publishing::publishSingle('companies',$id);
        return redirect('/controlpanel/admin/company/manage')->with('success','Company info published');;
        
    }

    public function companyDelete($id) {
        $company = DB::table('companies')->where('id', $id)->where('status', '!=', 1)->first();
        if(empty($company)) {
            return redirect('/controlpanel/admin/company/manage')->with('danger','You can\'t delete published company');
        } else {
            ImageManipulation::previousImageDelete('companies','logo',$id);
            DB::table('companies')->where('id', $id)->where('status', '!=', 1)->delete();
            return redirect('/controlpanel/admin/company/manage')->with('success','Company info delete successfully');
        }
    }
    /**
     * End Company section
     */

    /**
     * Slider Section Start
     */
    
    public function slider() {
        $sliders = DB::table('sliders')->orderBy('id', 'desc')->get();
        return view('admin.slider.manage',['sliders'=>$sliders]);
    }


    //Slider form
    public function sliderAddForm() {
        return view('admin.slider.add');
        
    }

    //Slider Add
    public function sliderAdd(Request $request){

        $this->validate($request,[
            'caption'       => 'required|string|max:100|unique:sliders',
            'sub_title'     => 'nullable|string|max:100',
            'btn_label'     => 'nullable|string|max:50',
            'btn'           => 'nullable|url',
            'image'         => 'required|mimes:jpeg,jpg,png|max:1024',
        ]);
        
        $image	    = $request->file('image');
        $extension          = $image->getClientOriginalExtension();
        //$datetime           = \Carbon\Carbon::now()->format('YmdHi');
        //Image Unique Name
        $imageUniqueName    = Str::random(40).'.'.$extension;
        $uploadPath 	    = $this->basePath().'/frontendStyle/img/slider/'.$imageUniqueName;
        
        //Uploaded image resize
        Image::make($image)->resize(1400,776)->save($uploadPath);
        //dd($imageUniqueName);

        DB::table('sliders')->insert([
            'caption'     => InputCheck::cleanString($request->caption),
            'sub_title'   => InputCheck::cleanString($request->sub_title),
            'btn_label'   => InputCheck::cleanString($request->btn_label),
            'btn'         => $request->btn,
            'image'       => '/frontendStyle/img/slider/'.$imageUniqueName,
            'created_at'  => \Carbon\Carbon::now()
        ]);

        //$this->setUserValue($request, $imageUniqueName);
        return redirect('/controlpanel/admin/company/slider/manage')->with('success','Slider info save successfully');
    }


    //Display slider for edit
	public function sliderEdit($id){
        $slider = DB::table('sliders')
                    ->where('id', $id)
                    ->first();
		return view('admin.slider.edit',['slider'=>$slider]);
    }
    
    //Slider update
    public function sliderUpdate(Request $request){

		$this->validate($request,[
            'caption'     => 'required|string|max:100',
            'sub_title'   => 'nullable|string|max:100',
            'btn_label'   => 'nullable|string|max:50',
            'btn'         => 'nullable|url',
            'image'       => 'mimes:jpeg,jpg,png|max:1024',
        ]);
        
        if($request->hasFile('image')) {
            $uploadImage	     = $request->file('image');
            $imageUniqueName     = ImageManipulation::generatedImageUploadName('sliders','image', $uploadImage, $request->id);
            $uploadPath 	     = $this->basePath().'/frontendStyle/img/slider/'.$imageUniqueName;
            $uploadName          = '/frontendStyle/img/slider/'.$imageUniqueName;
            Image::make($request->file('image'))->resize(1400,776)->save($uploadPath);
            $image = $uploadName;
            ImageManipulation::previousImageDelete('sliders','image', $request->id);
        } else {
            $slider = DB::table('sliders')
                    ->where('id', $request->id)
                    ->first();
            $image = $slider->image;
        }

        DB::table('sliders')
            ->where('id', $request->id)
            ->update([
                        'caption'     => InputCheck::cleanString($request->caption),
                        'sub_title'   => InputCheck::cleanString($request->sub_title),
                        'btn_label'   => InputCheck::cleanString($request->btn_label),
                        'btn'         => $request->btn,
                        'image'       => $image,
                        'updated_at'  => \Carbon\Carbon::now()
                    ]
            );

        //$this->setUserValue($request, $imageUniqueName);
		return redirect('/controlpanel/admin/company/slider/manage')->with('success','Slider info update successfully');
    }

    public function sliderDelete($id) {
        $slider = DB::table('sliders')->where('id', $id)->where('status', '!=', 1)->first();
        if(empty($slider)) {
            return redirect('/controlpanel/admin/company/slider/manage')->with('danger','You can\'t delete publish Item');
        } else {
            ImageManipulation::previousImageDelete('sliders','image',$id);
            DB::table('sliders')->where('id', $id)->where('status', '!=', 1)->delete();
            return redirect('/controlpanel/admin/company/slider/manage')->with('success','Slider info delete successfully');
        }
    }

    public function sliderPublish($id) {
        Publishing::publish('sliders',$id);
        return redirect('/controlpanel/admin/company/slider/manage')->with('success','Slider info published');
    }

    public function sliderUnpublish($id) {
        Publishing::unpublish('sliders',$id);
        return redirect('/controlpanel/admin/company/slider/manage')->with('info','Slider info Unpublished');;
        
    }
    /**
     * End Slider Section
     */

    //Display chairman message for edit
	public function chairmanMessage(){
        $message = DB::table('chairman_messages')->first();
		return view('admin.company.chairman.index',['message'=>$message]);
    }

    //Chairman update
    public function chairmanMessageUpdate(Request $request){

		$this->validate($request,[
            'name'          => 'nullable|string|max:100',
            'designation'   => 'nullable|string|max:100',
            'description'   => 'nullable|string',
            'image'         => 'nullable|mimes:jpeg,jpg,png|max:1024',
        ]);
        
        if($request->hasFile('image')) {
            $uploadImage	     = $request->file('image');
            $imageUniqueName     = ImageManipulation::generatedImageUploadName('chairman_messages','image', $uploadImage, $request->id);
            $uploadPath 	     = $this->basePath().'/frontendStyle/img/chairman/'.$imageUniqueName;
            $uploadName          = '/frontendStyle/img/chairman/'.$imageUniqueName;
            Image::make($request->file('image'))->resize(500,560)->save($uploadPath);
            $image = $uploadName;
            ImageManipulation::previousImageDelete('chairman_messages','image', $request->id);
        } else {
            $slider = DB::table('chairman_messages')
                    ->where('id', $request->id)
                    ->first();
            $image = $slider->image;
        }

        DB::table('chairman_messages')
            ->where('id', $request->id)
            ->update([
                        'name'          => InputCheck::cleanString($request->name),
                        'designation'   => InputCheck::cleanString($request->designation),
                        'description'   => InputCheck::cleanString($request->description),
                        'image'       => $image,
                        'updated_at'  => \Carbon\Carbon::now()
                    ]
            );

		return redirect('/controlpanel/admin/company/chairman/message')->with('success','Update successfully');
    }

    /**
     * Mission vision Section
     */
    public function mv() {
        $mvs = DB::table('company_themes')->orderBy('id', 'desc')->get();
        return view('admin.company.others.manage',['mvs'=>$mvs]);
    }

    //Mission vision form
    public function mvAddForm() {
        return view('admin.company.others.add');
    }

    //Mission vision Add
    public function mvAdd(Request $request){

        $this->validate($request,[
            'title'         => 'nullable|required|string|max:100|unique:company_themes',
            'description'   => 'nullable|required|string',
            'status'        => 'nullable|required|numeric',
        ]);
        
        DB::table('company_themes')->insert([
            'title'       => InputCheck::cleanString($request->title),
            'description' => InputCheck::cleanString($request->description),
            'status'      => $request->status, 
            'created_at'  => \Carbon\Carbon::now()
        ]);

        //$this->setUserValue($request, $imageUniqueName);
        return redirect('/controlpanel/admin/company/others/manage')->with('success','Content save successfully');
    }


    //Display Mission vision for edit
    public function mvEdit($id){
        $mv = DB::table('company_themes')
                    ->where('id', $id)
                    ->first();
        return view('admin.company.others.edit',['mv'=>$mv]);
    }
    
    //Mission vision update
    public function mvUpdate(Request $request){
        $this->validate($request,[
            'title'         => 'nullable|required|string|max:100',
            'description'   => 'nullable|required|string',
            'status'        => 'nullable|required|numeric',
        ]);
        
        DB::table('company_themes')
            ->where('id', $request->id)
            ->update([
                        'title'       => InputCheck::cleanString($request->title),
                        'description' => InputCheck::cleanString($request->description),
                        'status'      => $request->status,
                        'updated_at'  => \Carbon\Carbon::now()
                    ]
            );
        return redirect('/controlpanel/admin/company/others/manage')->with('success','Content update successfully');
    }

    public function mvDelete($id) {
        $mv = DB::table('company_themes')->where('id', $id)->where('status', '!=', 1)->first();
        if(empty($mv)) {
            return redirect('/controlpanel/admin/company/others/manage')->with('danger','You can\'t delete publish Item');
        } else {
            DB::table('company_themes')->where('id', $id)->where('status', '!=', 1)->delete();
            return redirect('/controlpanel/admin/company/others/manage')->with('success','Content delete successfully');
        }
    }
    
    public function mvPublish($id) {
        Publishing::publish('company_themes',$id);
        return redirect('/controlpanel/admin/company/others/manage')->with('success','Content published');
    }

    public function mvUnpublish($id) {
        Publishing::unpublish('company_themes',$id);
        return redirect('/controlpanel/admin/company/others/manage')->with('info','Content Unpublished');;
        
    }
    /**
     * End Mission vision
     */

     /**
      * Contact 
      */
    public function contactList()
    {
        $contacts =Contacts::orderBy('id','desc')->get();
        return view('admin.contact.manage',compact('contacts'));
    }

    public function contactDelete($id)
    {
        $contacts =Contacts::where('id','=', $id)->delete();
        return redirect('/controlpanel/admin/contact/manage')->with('success','Delete this info');;
    }
}
