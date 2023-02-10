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
        return '/frontendStyle/img/project/thumb/big/';
    }

    private function resizeProjectSaveDir() {
        return '/frontendStyle/img/project/thumb/small/';
    }

    private function originalDiagramSaveDir() {
        return '/frontendStyle/img/project/thumb/diagram/big/';
    }

    private function resizeDiagramSaveDir() {
        return '/frontendStyle/img/project/thumb/diagram/small/';
    }
    
    private function originalFeaturedImageSaveDir() {
        return '/frontendStyle/img/project/thumb/featured/big/';
    }

    private function resizeFeaturedImageSaveDir() {
        return '/frontendStyle/img/project/thumb/featured/small/';
    }

    /**
     * Project Section
     */

    public function index() {
       $projects = $this->projectRender();
       $totalProjects = DB::table('projects')->count();
       return view('admin.project.manage',compact('projects', 'totalProjects'));
    }

    //Project render
    private function projectRender() {
        $projectsList = "";
        $projects = DB::table('projects')->orderBy('id', 'desc')->get();

        foreach($projects as $key => $data) {
            $projectsList .= "<tr>";
            $projectsList .= "<td>".++$key."</td>";
            $projectsList .= "<td><img src='".asset($data->resize_image_path.$data->image)."' alt='image' class='image__resize'></td>";
            $projectsList .= "<td>".$data->project_name."<br>";
                                if($this->hasDiagram($data->id) != 0) {
                                    $projectsList .= "<a href='".url('/controlpanel/admin/project/diagram/add/'.$data->id.'#diagram')."' class='btn btn-default btn-badge-link'>
                                        <span>Diagram</span>
                                        <span class='pull-right-container'>
                                            <small class='label pull-right bg-red'>".$this->hasDiagram($data->id)."</small>
                                        </span>
                                    </a>";
                                }
                                if($this->hasFeaturedImage($data->id) != 0) {
                                    $projectsList .= "<br><a href='".url('/controlpanel/admin/project/featured/add/'.$data->id.'#featured')."' class='btn btn-default btn-badge-link'>
                                            <span>Featured Image</span>
                                            <span class='pull-right-container'>
                                                <small class='label pull-right bg-yellow'>".$this->hasFeaturedImage($data->id)."</small>
                                            </span>
                                        </a>";
                                }                 
            $projectsList .= "</td>";
            $projectsList .= "<td>";
                            if($data->project_type == 1) {
                                $projectsList .='Completed';
                            } elseif($data->project_type == 2) {
                                $projectsList .='Running';
                            } else {
                                $projectsList .='Upcoming';
                            }
            $projectsList .= "</td>";
            $projectsList .= "<td>
                                <b>Address</b>: ".$data->address."<br>
                                <b>Total area</b>: ". $data->total_area."<br>
                                <b>Number of unit</b>: ".$data->number_of_unit."<br>
                                <b>Flat</b>: ".$data->flat."<br>
                                <b>Lift</b>: ".$data->lift."<br>
                                <b>Parking space</b>: ".$data->parking_space."<br>";
            $projectsList .= "</td>";
            $projectsList .= "<td>".\Carbon\Carbon::parse($data->handover_date_time)->format('d M Y')."</td>";
                            if($data->status == 1) {
                                $projectsList .= "<td><div class='margin'><span class='badge bg-green'>Published</span></div></td>";
                            } else {
                                $projectsList .= "<td><div class='margin'><span class='badge bg-blue'>Unpublished</span></div></td>";
                            }
            $projectsList .= "<td style='min-width:200px; text-align:center;'>
                                <div class='margin'>
                                    <div class='btn-group'>
                                        <button type='button' class='btn bg-purple'>Action</button>
                                        <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
                                            <span class='caret'></span>
                                            <span class='sr-only'>Toggle Dropdown</span>
                                        </button>
                                        <ul class='dropdown-menu dropdown-menu-right' role='menu'>
                                            <li>
                                                <a href='".url('/controlpanel/admin/project/publish/'.$data->id)."'><i class='fa fa-eye'></i> Publish this info</a>
                                            </li>
                                            <li>
                                                <a href='".url('/controlpanel/admin/project/unpublished/'.$data->id)."'><i class='fa fa-eye-slash'></i> Unpublished this info</a>
                                            </li>
                                            <li>
                                                <a href='".url('/controlpanel/admin/project/edit/'.$data->id)."'><i class='fa fa-pencil'></i> Edit this info</a>
                                            </li>
                                            <li>
                                                <a href='".url('/controlpanel/admin/project/edit/'.$data->id)."'><i class='fa fa-plus-square-o'></i> Add additional information</a>
                                            </li>
                                            <li>
                                                <a href='".url('/controlpanel/admin/project/diagram/add/'.$data->id)."'><i class='fa fa-plus-square-o'></i> Add block diagram</a>
                                            </li>
                                            <li>
                                                <a href='".url('/controlpanel/admin/project/featured/add/'.$data->id)."'><i class='fa fa-plus-square-o'></i> Add featured image</a>
                                            </li>
                                            <li>
                                                <a href='".url('/controlpanel/admin/project/details/'.$data->id)."'><i class='fa fa-eye'></i> View project details</a>
                                            </li>
                                            <li>
                                                <a href='".url('/controlpanel/admin/project/delete/'.$data->id)."'><i class='fa fa-trash'></i> Delete this info</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>";
            $projectsList .= "</tr>";
        }

        return $projectsList;
    }

    private function hasDiagram($id) {
        $diagrams  = DB::table('project_diagrams')->where('project_id','=', $id)->count();
        if($diagrams != 0) {
            return $diagrams;
        }
    }

    private function hasFeaturedImage($id) {
        $images  = DB::table('project_featured_images')->where('project_id','=', $id)->count();
        if($images != 0) {
            return $images;
        }
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
        $uploadPath 	        = $this->basePath().$this->resizeProjectSaveDir().$imageUniqueName;
        $originalImagePath 	    = $this->basePath().$this->originalProjectSaveDir().$imageUniqueName;

        //Uploaded image resize
        Image::make($uploadImage)->resize(375,355)->save($uploadPath);
        Image::make($uploadImage)->resize(1150,550)->save($originalImagePath);

        //$originalImagePath 	= $this->basePath().$this->originalProjectSaveDir();
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
            $uploadPath 	        = $this->basePath().$this->resizeProjectSaveDir().$imageUniqueName;
            $originalImagePath 	    = $this->basePath().$this->originalProjectSaveDir().$imageUniqueName;

            //Uploaded image resize
            Image::make($uploadImage)->resize(375,355)->save($uploadPath);
            Image::make($uploadImage)->resize(1150,550)->save($originalImagePath);
            //$originalImagePath 	= $this->basePath().$this->originalProjectSaveDir();
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
        $uploadPath 	        = $this->basePath().$this->resizeDiagramSaveDir().$imageUniqueName;
        $originalImagePath 	    = $this->basePath().$this->originalDiagramSaveDir().$imageUniqueName;

        //Uploaded image resize
        Image::make($uploadImage)->resize(450,245)->save($uploadPath);
        Image::make($uploadImage)->resize(750,375)->save($originalImagePath);
        
        //$originalImagePath 	= $this->basePath().$this->originalDiagramSaveDir();
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
        $uploadPath 	        = $this->basePath().$this->resizeFeaturedImageSaveDir().$imageUniqueName;
        $originalImagePath 	    = $this->basePath().$this->originalFeaturedImageSaveDir().$imageUniqueName;

        //Uploaded image resize
        Image::make($uploadImage)->resize(450,245)->save($uploadPath);
        Image::make($uploadImage)->resize(750,375)->save($originalImagePath);
        //$originalImagePath 	= $this->basePath().$this->originalFeaturedImageSaveDir();
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
