<?php

namespace App\Http\View\Composers;
use Illuminate\View\View;
use Illuminate\Support\Str;
use DB;
use Tracker;
use PragmaRX\Tracker\Vendor\Laravel\Support\Session;

class ViewComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */

    public function compose(View $view) {
        $view->with('company', $this->company());
        $view->with('recent_projects', $this->recentProjects());
        $view->with('about_short_content', $this->about());
        $view->with('recent_events', $this->topEventList());
        $view->with('upcoming_projects', $this->upcomingProjects());
        $view->with('visitor', $this->visitors());
    }


    private function company() {
        return DB::table('companies')->where('status','=',1)->first();
    }

    private function about() {
        $about    = DB::table('page_contents')->where('page_id','=', 2)->where('status','=',1)->first(); //Used about page id 2
        $about_description = Str::limit($about->description, 100);
        return $about_description;
    }

    private function topEventList() {
        return DB::table('events')->where('status','=',1)->orderBy('id','DESC')->limit(3)->get();
    }

    private function recentProjects() {
        return DB::table('projects')->where('status','=',1)->orderBy('id','DESC')->limit(10)->get();
    }

    private function upcomingProjects() {
        return DB::table('projects')->where('status','=',1)->where('project_type', '=', 3)->orderBy('id','DESC')->limit(3)->get();
    }

    private function visitors() 
    {
        return Tracker::currentSession();
    }
}