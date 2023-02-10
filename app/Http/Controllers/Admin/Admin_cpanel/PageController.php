<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ImageHandler\ImageManipulation;
use App\InputChecker\InputCheck;
use App\Publishing\Publishing;
use Illuminate\Http\Request;
use Image;
use DB;

class PageController extends Controller
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
    
    /**
     * Page content Section
     */
    public function page() {
        $pages = DB::table('pages')->get();
        return view('admin.page.manage',['pages'=>$pages]);
    }

    //Page form
    public function pageAddForm() {
        return view('admin.page.add');
        
    }

    //Page Add
    public function pageAdd(Request $request){

        $this->validate($request,[
            'page_name' => 'required|string|max:20|unique:pages',
            'title'     => 'required|string|max:100',
            'status'    => 'required|numeric',
        ]);
        
        DB::table('pages')->insert([
            'page_name'     => InputCheck::cleanString($request->page_name),
            'title'         => InputCheck::cleanString($request->title),
            'status'        => $request->status, 
            'created_at'    => \Carbon\Carbon::now()
        ]);
        return redirect('/controlpanel/admin/page/manage')->with('success','Page save successfully');
    }


    //Display Page for edit
    public function pageEdit($id){
        $page = DB::table('pages')
                    ->where('id', $id)
                    ->first();
        return view('admin.page.edit',['page'=>$page]);
    }
    
    //Page update
    public function pageUpdate(Request $request){
        $this->validate($request,[
            'page_name'     => 'required|string|max:20',
            'title'         => 'required|string|max:100',
            'status'        => 'required|numeric',
        ]);
        
        DB::table('pages')
            ->where('id', $request->id)
            ->update([
                        'page_name'   => InputCheck::cleanString($request->page_name),
                        'title'       => InputCheck::cleanString($request->title),
                        'status'      => $request->status,
                        'updated_at'  => \Carbon\Carbon::now()
                    ]
            );
        return redirect('/controlpanel/admin/page/manage')->with('success','Page update successfully');
    }

    //Page delete
    public function pageDelete($id) {
        $page = DB::table('pages')->where('id', $id)->where('status', '!=', 1)->first();
        if(empty($page)) {
            return redirect('/controlpanel/admin/page/manage')->with('danger','You can\'t delete publish Item');
        } else {
            DB::table('pages')->where('id', $id)->where('status', '!=', 1)->delete();
            return redirect('/controlpanel/admin/page/manage')->with('success','Page delete successfully');
        }
    }
    
    //Page publish
    public function pagePublish($id) {
        Publishing::publish('pages',$id);
        return redirect('/controlpanel/admin/page/manage')->with('success','Page published');
    }

    //Page unpublish
    public function pageUnpublish($id) {
        Publishing::unpublish('pages',$id);
        return redirect('/controlpanel/admin/page/manage')->with('info','Page Unpublished');;
        
    }
    /**
     * End Page section
     */


    /**
     * Page content Section
     */
    public function pageContent() {
        $page_contents  = DB::table('page_contents')
                        ->join('pages','page_contents.page_id', '=', 'pages.id')
                        ->select('page_contents.*', 'pages.page_name')
                        ->get();
        return view('admin.page.content.manage',['page_contents'=>$page_contents]);
    }

    //Page form
    public function pageContentAddForm() {
        $activePages    = DB::table('pages')->where('status','=',1)->get();
        return view('admin.page.content.add', ['activePages'=>$activePages]);
        
    }

    //Page content Add
    public function pageContentAdd(Request $request){

        $this->validate($request,[
            'page_id'       => 'required|numeric|max:100|unique:page_contents',
            'heading'       => 'required|string|max:100',
            'description'   => 'required|string',
            'status'        => 'required|numeric',
        ]);
        
        DB::table('page_contents')->insert([
            'page_id'     => $request->page_id,
            'heading'     => InputCheck::cleanString($request->heading),
            'description' => InputCheck::cleanString($request->description),
            'status'      => $request->status, 
            'created_at'  => \Carbon\Carbon::now()
        ]);

        //$this->setUserValue($request, $imageUniqueName);
        return redirect('/controlpanel/admin/page/content/manage')->with('success','Page content save successfully');
    }


    //Display page content for edit
    public function pageContentEdit($id){
        $activePages = DB::table('pages')->where('status','=',1)->get();
        $pageContent = DB::table('page_contents')
                            ->where('id', $id)
                            ->first();
        return view('admin.page.content.edit',['pageContent'=>$pageContent,'activePages'=>$activePages]);
    }
    
    //Page content update
    public function pageContentUpdate(Request $request){
        $this->validate($request,[
            'page_id'       => 'required|numeric|max:100',
            'heading'       => 'required|string|max:100',
            'description'   => 'required|string',
            'status'        => 'required|numeric',
        ]);
        
        DB::table('page_contents')
            ->where('id', $request->id)
            ->update([
                        'page_id'     => $request->page_id,
                        'heading'     => InputCheck::cleanString($request->heading),
                        'description' => InputCheck::cleanString($request->description),
                        'status'      => $request->status,
                        'updated_at'  => \Carbon\Carbon::now()
                    ]
            );
        return redirect('/controlpanel/admin/page/content/manage')->with('success','Page content update successfully');
    }

    //Page content delete
    public function pageContentDelete($id) {
        $pageContent = DB::table('page_contents')->where('id', $id)->where('status', '!=', 1)->first();
        if(empty($pageContent)) {
            return redirect('/controlpanel/admin/page/content/manage')->with('danger','You can\'t delete publish Item');
        } else {
            DB::table('page_contents')->where('id', $id)->where('status', '!=', 1)->delete();
            return redirect('/controlpanel/admin/page/content/manage')->with('success','Page content delete successfully');
        }
    }
    
    //Page content publish
    public function pageContentPublish($id) {
        Publishing::publish('page_contents',$id);
        return redirect('/controlpanel/admin/page/content/manage')->with('success','Page content published');
    }

    //Page content unpublish
    public function pageContentUnpublish($id) {
        Publishing::unpublish('page_contents',$id);
        return redirect('/controlpanel/admin/page/content/manage')->with('info','Page content Unpublished');;
        
    }

    /**
     * End Page content section
     */
}
