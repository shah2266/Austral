<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\InputChecker\InputCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Illuminate\Support\Facades\URL;
use DB;

class FrontPageController extends Controller
{

   private $services;
   private $sliders;
   private $projects;
   private $about;
   private $about_heading;
   private $about_description;
   private $container;
   private $variable_array;

   private function checkUrlRequestId($id) {

      if(preg_match("/^[1-9][0-9]*$/", $id)) {
        return true;
      } else {
        return abort(404);
      }

   }
   public function home()
   {

      //dd(URL::current());
     $this->variable_array = array('services','projects','about_heading','about_description');
     $this->container = $this->homeDataRetrieve();

     $sliders            = $this->container[0];
     $services           = $this->container[1];
     $projects           = $this->container[2];
     $about_heading      = $this->container[3];
     $about_description  = $this->container[4];
     
     return view('website.pages.aus_home', compact('sliders','services','projects','about_heading','about_description'));
   }

   private function homeDataRetrieve() {
     $this->sliders  = DB::table('sliders')->where('status','=',1)->orderBy('id','DESC')->limit(3)->get();
     $this->services = DB::table('services')->where('status','=',1)->orderBy('id','DESC')->limit(3)->get();
     $this->projects = DB::table('projects')->where('project_type','=',1)->where('status','=',1)->orderBy('id','DESC')->limit(3)->get();
     $this->about    = DB::table('page_contents')->where('page_id','=', 2)->where('status','=',1)->first(); //Used about page id 2
     $this->about_heading = $this->about->heading;
     $this->about_description = Str::limit($this->about->description, 350);

     return [$this->sliders, $this->services, $this->projects, $this->about_heading, $this->about_description];
   }
   

   public function about()
   {
     $about     = DB::table('page_contents')->where('page_id','=', 2)->where('status','=',1)->first(); //Used about page id 2
     $teams     = DB::table('employees')->where('status','=',1)->orderBy('id','DESC')->get();
     $mvs       = DB::table('company_themes')->where('status','=',1)->orderBy('id','asc')->get();
     $chairman  = DB::table('chairman_messages')->first();
     return view('website.pages.aus_about', compact('about','teams','mvs','chairman'));
   }

   public function projects()
   {
      $projects_completed   = DB::table('projects')->where('project_type','=', 1)->where('status','=',1)->orderBy('id','DESC')->get();
      $projects_running     = DB::table('projects')->where('project_type','=', 2)->where('status','=',1)->orderBy('id','DESC')->get();
      $projects_upcoming    = DB::table('projects')->where('project_type','=', 3)->where('status','=',1)->orderBy('id','DESC')->get();
      return view('website.pages.aus_project', compact('projects_completed', 'projects_running', 'projects_upcoming'));
   }

   public function singleProject($id)
   {
      $this->checkUrlRequestId($id); //Check request url id
      $project = DB::table('projects')->where('id','=', $id)->where('status','=',1)->first();
      $diagrams = DB::table('project_diagrams')->where('project_id','=', $id)->where('status','=',1)->get();
      $featured = DB::table('project_featured_images')->where('project_id','=', $id)->where('status','=',1)->get();
      
      if(!empty($project)) {
        return view('website.pages.aus_single_project', compact('project','diagrams', 'featured'));
      } else {
        return abort(404);
      }
   }

   public function events()
   {
      $events = DB::table('events')->where('status','=',1)->paginate(2);
      $recent_events = DB::table('events')->where('status','=',1)->orderBy('id','desc')->limit(4)->get();
      $projects = DB::table('projects')->where('status','=',1)->orderBy('id','desc')->limit(5)->get();
      return view('website.pages.aus_event', compact('events','recent_events','projects'));
   }

   public function singleEvent($id)
   {
      $this->checkUrlRequestId($id); //Check request url id
      $event          = DB::table('events')->where('id','=', $id)->where('status','=',1)->first();
      $recent_events  = DB::table('events')->where('status','=',1)->orderBy('id','desc')->limit(4)->get();
      $projects       = DB::table('projects')->where('status','=',1)->orderBy('id','desc')->limit(5)->get();
      $event_prev     = DB::table('events')->where('status','=',1)->orderBy('created_at', 'asc')->take(1)->first();
      $event_next     = DB::table('events')->where('status','=',1)->orderBy('created_at', 'desc')->skip(1)->take(1)->first();
      $totalEvents    = DB::table('events')->count();

      if(!empty($event)) {
        return view('website.pages.aus_single_event', compact('event','recent_events','projects','totalEvents','event_prev','event_next'));
      } else {
        return abort(404);
      }
   }

   public function contacts()
   {
    return view('website.pages.aus_inquire');
   }

   public function storeContacts(Request $request)
   {
      $this->validator($request->all())->validate();
      $send = $this->store($request->all());
      if(!empty($send)) {
        return redirect('/contact#thanks')->with('success','Thanks for your information.');
      }
   }

   protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'    => 'required|string|max:20',
            'number'  => 'required|numeric|min:10',
            'email'   => 'required|email|email:rfc,dns,spoof,filter|string|max:30|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'subject' => 'required|string|max:80',
            'message' => 'required|string|max:160'
        ]);
    }

   protected function store(array $data) {
     
      return DB::table('contacts')->insert([
          'name'       => InputCheck::clean($data['name']),
          'number'     => InputCheck::clean($data['number']),
          'email'      => $data['email'],
          'subject'    => InputCheck::clean($data['subject']),
          'message'    => InputCheck::clean($data['message']),
          'created_at' => \Carbon\Carbon::now()
      ]);
   }
}
