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

class ProjectController extends Controller
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

    private function originalProjectSaveDir() {
        return 'frontendStyle/img/project/thumb/big/';
    }

    private function resizeProjectSaveDir() {
        return 'frontendStyle/img/project/thumb/small/';
    }

    private function originalDiagramSaveDir() {
        return 'frontendStyle/img/project/thumb/diagram/big/';
    }

    private function resizeDiagramSaveDir() {
        return 'frontendStyle/img/project/thumb/diagram/small/';
    }
    
    private function originalFeaturedImageSaveDir() {
        return 'frontendStyle/img/project/thumb/featured/big/';
    }

    private function resizeFeaturedImageSaveDir() {
        return 'frontendStyle/img/project/thumb/featured/small/';
    }

    /**
     * Project Section
     */

    //Project manage view
    public function index() {
        $projects = DB::table('projects')->orderBy('id', 'desc')->get();
        return view('admin.project.manage',['projects'=>$projects]);
    }

    public function details($id) {
        $project   = DB::table('projects')->where('id','=', $id)->first();
        $diagrams  = DB::table('project_diagrams')->where('project_id','=', $id)->get();
        $images    = DB::table('project_featured_images')->where('project_id','=', $id)->get();
        return view('admin.project.details',['project'=>$project, 'diagrams'=>$diagrams, 'images'=> $images]);
    }

    //Project form
    public function projectAddForm() {
        return view('admin.project.add');
    }

    //Project Add
    public function projectAdd(Request $request){

        $this->validate($request,[
            'project_type'      => 'required|numeric',
            'project_name'      => 'required|string|max:100|unique:projects',
            'address'           => 'required|string|max:100',
            'total_area'        => 'required|numeric',
            'number_of_unit'    => 'required|numeric',
            'flat'              => 'required|numeric',
            'lift'              => 'required|numeric',
            'parking_space'     => 'required|numeric',
            'features'          => 'nullable|string',
            'handover_date_time'=> 'required|string|max:150',
            'description'       => 'required|string',
            'image'             => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);
        
        //Image Upload
        $uploadImage	        = $request->file('image');
        $imageUniqueName        = ImageManipulation::generatedImageUploadName('projects','image', $uploadImage, $request->id);
        $uploadPath 	        = $this->resizeProjectSaveDir().$imageUniqueName;
        $originalImagePath 	    = $this->originalProjectSaveDir().$imageUniqueName;

        //Uploaded image resize
        Image::make($uploadImage)->resize(375,355)->save($uploadPath);
        Image::make($uploadImage)->resize(1150,550)->save($originalImagePath);

        //$originalImagePath 	= $this->originalProjectSaveDir();
        //$uploadImage->move($originalImagePath,$imageUniqueName);

        DB::table('projects')->insert([
            'project_type'          => $request->project_type,
            'project_name'          => InputCheck::cleanString($request->project_name),
            'address'               => InputCheck::cleanString($request->address),
            'total_area'            => $request->total_area,
            'number_of_unit'        => $request->number_of_unit,
            'flat'                  => $request->flat,
            'lift'                  => $request->lift,
            'parking_space'         => $request->parking_space,
            'features'              => InputCheck::cleanString($request->features),
            'handover_date_time'    => \Carbon\Carbon::parse($request->handover_date_time)->format('Ymd'),
            'description'           => InputCheck::cleanString($request->description),
            'original_image_path'   => $this->originalProjectSaveDir(),
            'resize_image_path'     => $this->resizeProjectSaveDir(),
            'image'                 => $imageUniqueName,
            'status'                => $request->status,
            'created_at'            => \Carbon\Carbon::now()
        ]);

        //$this->setUserValue($request, $imageUniqueName);
        return redirect('/controlpanel/admin/project/manage')->with('success','Project info save successfully');
    }

    //Display project for edit
	public function projectEdit($id){
        $project = DB::table('projects')
                    ->where('id', $id)
                    ->first();
		return view('admin.project.edit',['project'=>$project]);
    }
    
    //Project update
    public function projectUpdate(Request $request){

		$this->validate($request,[
            'project_type'      => 'required|numeric',
            'project_name'      => 'required|string|max:100',
            'address'           => 'required|string|max:100',
            'total_area'        => 'required|numeric',
            'number_of_unit'    => 'required|numeric',
            'flat'              => 'required|numeric',
            'lift'              => 'required|numeric',
            'parking_space'     => 'required|numeric',
            'features'          => 'nullable|string',
            'handover_date_time'=> 'required|string|max:150',
            'description'       => 'required|string',
            'image'             => 'nullable|mimes:jpeg,jpg,png|max:2048',
        ]);
        
        if($request->hasFile('image')) {
            //Image upload
            $uploadImage	        = $request->file('image');
            $imageUniqueName        = ImageManipulation::generatedImageUploadName('projects','image', $uploadImage, $request->id);
            $uploadPath 	        = $this->resizeProjectSaveDir().$imageUniqueName;
            $originalImagePath 	    = $this->originalProjectSaveDir().$imageUniqueName;

            //Uploaded image resize
            Image::make($uploadImage)->resize(375,355)->save($uploadPath);
            Image::make($uploadImage)->resize(1150,550)->save($originalImagePath);
            //$originalImagePath 	= $this->originalProjectSaveDir();
            //$uploadImage->move($originalImagePath,$imageUniqueName);

            $image = $imageUniqueName;
            ImageManipulation::imageDeleteFromMultiDir('projects','id','image',$request->id);
        } else {
            $project = DB::table('projects')
                    ->where('id', $request->id)
                    ->first();
            $image = $project->image;
        }

        DB::table('projects')
            ->where('id','=', $request->id)
            ->update([
                        'project_type'          => $request->project_type,
                        'project_name'          => InputCheck::cleanString($request->project_name),
                        'address'               => InputCheck::cleanString($request->address),
                        'total_area'            => $request->total_area,
                        'number_of_unit'        => $request->number_of_unit,
                        'flat'                  => $request->flat,
                        'lift'                  => $request->lift,
                        'parking_space'         => $request->parking_space,
                        'features'              => InputCheck::cleanString($request->features),
                        'handover_date_time'    => \Carbon\Carbon::parse($request->handover_date_time)->format('Ymd'),
                        'description'           => InputCheck::cleanString($request->description),
                        'image'                 => $image,
                        'status'                => $request->status,
                        'updated_at'            => \Carbon\Carbon::now()
                    ]
            );
		return redirect('/controlpanel/admin/project/manage')->with('success','Project info update successfully');
    }

    public function projectPublish($id) {
        Publishing::publish('projects',$id);
        return redirect('/controlpanel/admin/project/manage')->with('success','Project content published');
    }

    public function projectUnpublish($id) {
        Publishing::unpublish('projects',$id);
        return redirect('/controlpanel/admin/project/manage')->with('info','Project content Unpublished');;
        
    }

    public function projectDelete($id) {
        $project = DB::table('projects')->where('id', $id)->where('status', '!=', 1)->first();
        if(empty($project)) {
            return redirect('/controlpanel/admin/project/manage')->with('danger','You can\'t delete published project');
        } else {
            ImageManipulation::imageDeleteFromMultiDir('projects','id','image',$id);
            DB::table('projects')->where('id', $id)->where('status', '!=', 1)->delete();
            return redirect('/controlpanel/admin/project/manage')->with('success','Project info delete successfully');
        }
    }

    /**
     * End project section
     */

    /**
     * Project diagram
     */
    //Diagram form
    public function diagramView($id) {
        $project = DB::table('projects')
                        ->where('id', $id)
                        ->first();
        $diagrams = DB::table('project_diagrams')
                        ->join('projects','projects.id','=','project_diagrams.project_id')
                        ->select('project_diagrams.*','projects.project_name')
                        ->where('project_diagrams.project_id','=', $id)
                        ->get();
        return view('admin.project.diagram.add', ['project'=>$project, 'diagrams' => $diagrams]);
    }

    public function diagramAdd(Request $request) {

        $this->validate($request,[
            'project_id'    => 'required|numeric',
            'caption'       => 'required|string|max:100',
            'description'   => 'nullable|string',
            'image'         => 'required|mimes:jpeg,jpg,png|max:2048',
            'status'        => 'required|numeric'
        ]);

        //Image Upload
        $uploadImage	        = $request->file('image');
        $imageUniqueName        = ImageManipulation::generatedImageUploadName('project_diagrams','image', $uploadImage, $request->id);
        $uploadPath 	        = $this->resizeDiagramSaveDir().$imageUniqueName;
        $originalImagePath 	    = $this->originalDiagramSaveDir().$imageUniqueName;

        //Uploaded image resize
        Image::make($uploadImage)->resize(450,245)->save($uploadPath);
        Image::make($uploadImage)->resize(750,375)->save($originalImagePath);
        
        //$originalImagePath 	= $this->originalDiagramSaveDir();
        //$uploadImage->move($originalImagePath,$imageUniqueName);

        DB::table('project_diagrams')->insert([
            'project_id'            => $request->project_id,
            'caption'               => InputCheck::cleanString($request->caption),
            'description'           => InputCheck::cleanString($request->description),
            'original_image_path'   => $this->originalDiagramSaveDir(),
            'resize_image_path'     => $this->resizeDiagramSaveDir(),
            'image'                 => $imageUniqueName,
            'status'                => $request->status,
            'created_at'            => \Carbon\Carbon::now()
        ]);

        return redirect('/controlpanel/admin/project/diagram/add/'.$request->project_id)->with('success','Diagram image add successfully');
    }

    public function diagramDelete($project_id, $id) {
        $diagram = DB::table('project_diagrams')->where('id', $id)->where('status', '!=', 1)->first();
        if(empty($diagram)) {
            return Redirect::to('/controlpanel/admin/project/diagram/add/'.$project_id)->with('danger','You can\'t delete publish Item');
        } else {
            ImageManipulation::imageDeleteFromMultiDir('project_diagrams','id','image',$id);
            DB::table('project_diagrams')->where('id', $id)->where('status', '!=', 1)->delete();
            return Redirect::to('/controlpanel/admin/project/diagram/add/'.$diagram->project_id)->with('success','Diagram delete successfully');
        }
    }
    
    public function diagramPublish($project_id, $id) {
        Publishing::publish('project_diagrams',$id);
        return redirect('/controlpanel/admin/project/diagram/add/'.$project_id)->with('success','Diagram content published');
    }

    public function diagramUnpublish($project_id, $id) {
        Publishing::unpublish('project_diagrams',$id);
        return redirect('/controlpanel/admin/project/diagram/add/'.$project_id)->with('info','Diagram content Unpublished');;
    }
    /**
     * End project diagram
     */

    /**
     * Featured image
     */

    //Featured form
    public function featuredView($id) {
        $project = DB::table('projects')
                        ->where('id', $id)
                        ->first();
        $images = DB::table('project_featured_images')
                        ->join('projects','projects.id','=','project_featured_images.project_id')
                        ->select('project_featured_images.*','projects.project_name')
                        ->where('project_featured_images.project_id','=', $id)
                        ->get();
        return view('admin.project.featured.add', ['project'=>$project, 'images' => $images]);
    }

    public function featuredAdd(Request $request) {

        $this->validate($request,[
            'project_id'    => 'required|numeric',
            'caption'       => 'required|string|max:100',
            'image'         => 'required|mimes:jpeg,jpg,png|max:2048',
            'status'        => 'required|numeric'
        ]);

        //Image Upload
        $uploadImage	        = $request->file('image');
        $imageUniqueName        = ImageManipulation::generatedImageUploadName('project_featured_images','image', $uploadImage, $request->id);
        $uploadPath 	        = $this->resizeFeaturedImageSaveDir().$imageUniqueName;
        $originalImagePath 	    = $this->originalFeaturedImageSaveDir().$imageUniqueName;

        //Uploaded image resize
        Image::make($uploadImage)->resize(450,245)->save($uploadPath);
        Image::make($uploadImage)->resize(750,375)->save($originalImagePath);
        //$originalImagePath 	= $this->originalFeaturedImageSaveDir();
        //$uploadImage->move($originalImagePath,$imageUniqueName);

        DB::table('project_featured_images')->insert([
            'project_id'            => $request->project_id,
            'caption'               => InputCheck::cleanString($request->caption),
            'original_image_path'   => $this->originalFeaturedImageSaveDir(),
            'resize_image_path'     => $this->resizeFeaturedImageSaveDir(),
            'image'                 => $imageUniqueName,
            'status'                => $request->status,
            'created_at'            => \Carbon\Carbon::now()
        ]);

        return redirect('/controlpanel/admin/project/featured/add/'.$request->project_id)->with('success','Featured image add successfully');
    }

    public function featuredDelete($project_id, $id) {
        $diagram = DB::table('project_featured_images')->where('id', $id)->where('status', '!=', 1)->first();
        if(empty($diagram)) {
            return Redirect::to('/controlpanel/admin/project/featured/add/'.$project_id)->with('danger','You can\'t delete publish Item');
        } else {
            ImageManipulation::imageDeleteFromMultiDir('project_featured_images','id','image',$id);
            DB::table('project_featured_images')->where('id', $id)->where('status', '!=', 1)->delete();
            return Redirect::to('/controlpanel/admin/project/featured/add/'.$diagram->project_id)->with('success','Featured image delete successfully');
        }
    }
    
    public function featuredPublish($project_id, $id) {
        Publishing::publish('project_featured_images',$id);
        return redirect('/controlpanel/admin/project/featured/add/'.$project_id)->with('success','Featured content published');
    }

    public function featuredUnpublish($project_id, $id) {
        Publishing::unpublish('project_featured_images',$id);
        return redirect('/controlpanel/admin/project/featured/add/'.$project_id)->with('info','Featured content Unpublished');;
    }
    /**
     * End featured image
     */
}
