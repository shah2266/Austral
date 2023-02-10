<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\InputChecker\InputCheck;
use App\Publishing\Publishing;
use Illuminate\Http\Request;
use DB;

class ServiceController extends Controller
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
     * Service Section
     */
    public function service() {
        $services = DB::table('services')->orderBy('id', 'desc')->get();
        return view('admin.service.manage',['services'=>$services]);
    }

    //Service form
    public function serviceAddForm() {
        return view('admin.service.add');
    }

    //Service Add
    public function serviceAdd(Request $request){

        $this->validate($request,[
            'icon'          => 'required|string|max:100',
            'heading'       => 'required|string|max:100|unique:services',
            'description'   => 'required|string',
            'status'        => 'required|numeric',
        ]);
        
        DB::table('services')->insert([
            'icon'        => InputCheck::cleanString($request->icon),
            'heading'     => InputCheck::cleanString($request->heading),
            'description' => InputCheck::cleanString($request->description),
            'status'      => $request->status, 
            'created_at'  => \Carbon\Carbon::now()
        ]);

        //$this->setUserValue($request, $imageUniqueName);
        return redirect('/controlpanel/admin/service/manage')->with('success','Service content save successfully');
    }


    //Display service for edit
    public function serviceEdit($id){
        $service = DB::table('services')
                    ->where('id', $id)
                    ->first();
        return view('admin.service.edit',['service'=>$service]);
    }
    
    //Service update
    public function serviceUpdate(Request $request){
        $this->validate($request,[
            'icon'          => 'required|string|max:100',
            'heading'       => 'required|string|max:100',
            'description'   => 'required|string',
            'status'        => 'required|numeric',
        ]);
        
        DB::table('services')
            ->where('id', $request->id)
            ->update([
                        'icon'        => InputCheck::cleanString($request->icon),
                        'heading'     => InputCheck::cleanString($request->heading),
                        'description' => InputCheck::cleanString($request->description),
                        'status'      => $request->status,
                        'updated_at'  => \Carbon\Carbon::now()
                    ]
            );
        return redirect('/controlpanel/admin/service/manage')->with('success','Service content update successfully');
    }

    public function serviceDelete($id) {
        $service = DB::table('services')->where('id', $id)->where('status', '!=', 1)->first();
        if(empty($service)) {
            return redirect('/controlpanel/admin/service/manage')->with('danger','You can\'t delete publish Item');
        } else {
            DB::table('services')->where('id', $id)->where('status', '!=', 1)->delete();
            return redirect('/controlpanel/admin/service/manage')->with('success','Service content delete successfully');
        }
    }
    
    public function servicePublish($id) {
        Publishing::publish('services',$id);
        return redirect('/controlpanel/admin/service/manage')->with('success','Service content published');
    }

    public function serviceUnpublish($id) {
        Publishing::unpublish('services',$id);
        return redirect('/controlpanel/admin/service/manage')->with('info','Service content Unpublished');;
        
    }
    /**
     * End Services
     */
}
