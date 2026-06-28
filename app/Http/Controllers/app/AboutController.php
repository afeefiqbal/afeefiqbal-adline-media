<?php

namespace App\Http\Controllers\app;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\OurTeamHeading;
use App\Models\OurTeam;

class AboutController extends Controller
{ 
    public function about_us()
    {
        $key = "Update";
        $title = "About us";
        $about = AboutUs::first();
        return view('app.about._form',compact('key','title','about'));
    }
    
    public function about_us_store(Request $request)
    {
        if($request->id==0){
            $about = new AboutUs;
        }else{
            $about = AboutUs::find($request->id);
            $about->updated_at = date('Y-m-d h:i:s');
        }
        if ($request->hasFile('image')) {
            if (File::exists($about->image)) {
                File::delete($about->image);
            }
            $about->image = uploadFile($request->image, 'about-us', 'uploads/about_us/image/');
        }
        if ($request->hasFile('image_2')) {
            if (File::exists($about->image_2)) {
                File::delete($about->image_2);
            }
            $about->image_2 = uploadFile($request->image_2, 'about-us-2', 'uploads/about_us/image/');
        }
        if ($request->hasFile('mission_image')) {
            if (File::exists($about->mission_image)) {
                File::delete($about->mission_image);
            }
            $about->mission_image = uploadFile($request->mission_image, 'mission-image', 'uploads/about_us/mission_image/');
            // echo $about->mission_image;die;
        }
        if ($request->hasFile('vision_image')) {
            if (File::exists($about->vision_image)) {
                File::delete($about->vision_image);
            }
            $about->vision_image = uploadFile($request->vision_image, 'vision-image', 'uploads/about_us/vision_image/');
        }
        if ($request->hasFile('values_image')) {
            if (File::exists($about->values_image)) {
                File::delete($about->values_image);
            }
            $about->values_image = uploadFile($request->values_image, 'values-image', 'uploads/about_us/values_image/');
        }
        if ($request->hasFile('goal_image')) {
            if (File::exists($about->goal_image)) {
                File::delete($about->goal_image);
            }
            $about->goal_image = uploadFile($request->goal_image, 'goal-image', 'uploads/about_us/goal_image/');
        }
        $about->title = $request->title ?? '';
        $about->description = $request->description ?? '';
        $about->image_attribute = $request->image_attribute ?? '';
        $about->image_2_attribute = $request->image_2_attribute ?? '';
        $about->count = $request->count ?? '';
        $about->mv_section_title = $request->mv_section_title ?? '';
        $about->mv_section_sub_title = $request->mv_section_sub_title ?? '';
        $about->mv_section_description = $request->mv_section_description ?? '';
        $about->mission_title = $request->mission_title ?? '';
        $about->mission_image_meta_tag = $request->mission_image_meta_tag ?? '';
        $about->mission = $request->mission ?? '';
        $about->vision_title = $request->vision_title ?? '';
        $about->vision_image_meta_tag = $request->vision_image_meta_tag ?? '';
        $about->vision = $request->vision ?? '';
        $about->values_title = $request->values_title ?? '';
        $about->values_image_meta_tag = $request->values_image_meta_tag ?? '';
        $about->values = $request->values ?? '';
        $about->goal_title = $request->goal_title ?? '';
        $about->goal_image_meta_tag = $request->goal_image_meta_tag ?? '';
        $about->goal = $request->goal ?? '';
        if($about->save()){
            session()->flash('success', 'About content has been updated successfully');
            return redirect(sitePrefix().'about-us');
        }else{
            return back()->with('error', 'Error while updating the about content');
        }
    }

    public function our_team()
    {
        $key = "Update";
        $title = "Our Team";
        $ourTeam = OurTeamHeading::first();
        return view('app.about.our_team._form',compact('key','title','ourTeam'));
    }
    
    public function our_team_store(Request $request)
    {
        if($request->id==0){
            $our_team = new OurTeamHeading;
        }else{
            $our_team = OurTeamHeading::find($request->id);
            $our_team->updated_at = date('Y-m-d h:i:s');
        }
        $our_team->title = ($request->title)?$request->title:'';
        $our_team->sub_title = ($request->sub_title)?$request->sub_title:'';
        $our_team->description = ($request->description)?$request->description:'';
        if($our_team->save()){
            session()->flash('success', 'Our-team content has been updated successfully');
            return redirect(sitePrefix().'about-us/our-team');
        }else{
            return back()->with('error', 'Error while updating the our-team');
        }
    }

    public function list()
    {
        $title = "Our Team";
        $list = OurTeam::get();
        return view('app.about.our_team.list.list',compact('list','title'));
    }

    public function list_create()
    {
        $key = "Add";
        $title = "Add Team";
        return view('app.about.our_team.list.form',compact('key','title'));
    }
    
    public function list_store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'designation'=>'required'
        ]);
        $list = new OurTeam;
        if ($request->hasFile('image')) {
            $list->image = uploadFile($request->image, 'list', 'uploads/our-team/image/');
        }
        $list->title = $validatedData['title'];
        $list->designation = $validatedData['designation'];
        $sort_order = OurTeam::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $list->sort_order = $sort_number;
        if($list->save()){
            session()->flash('success', "Team '".$request->title."' has been added successfully");
            return redirect(sitePrefix().'about-us/our-team/list');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function list_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Team";
        $list = OurTeam::find($id);
        if($list){
            return view('app.about.our_team.list.form', compact('list','title','key'));
        }else{
            return view('app/errors/404');
        }
    }
    
    public function list_update(Request $request, $id)
    {
        $list =  OurTeam::find($id);
        $validatedData = $request->validate([
            'title'=>'required',
            'designation'=>'required'
        ]);
        if ($request->hasFile('image')) {
            if (File::exists($list->image)) {
                File::delete($list->image);
            }
            $list->image = uploadFile($request->image, 'list', 'uploads/our-team/list/image/');
        }
        $list->image_attribute = ($request->image_attribute)?$request->image_attribute:'';
        $list->title = $validatedData['title'];
        $list->designation = $validatedData['designation'];
        $list->updated_at = date('Y-m-d h:i:s');
        if($list->save()){
            session()->flash('success', "Team '".$request->title."' has been updated successfully");
            return redirect(sitePrefix().'about-us/our-team/list');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_list(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $list = OurTeam::find($request->id);
            if($list){
                if (File::exists($list->image)) {
                    File::delete($list->image);
                }
                $deleted = $list->delete();
                if($deleted==true){
                    echo(json_encode(array('status'=>true)));
                }else{
                    echo(json_encode(array('status'=>false,'message'=>'Some error occured,please try after sometime')));
                }
            }else{
                DB::rollBack();
                echo(json_encode(array('status'=>false,'message'=>'Model class not found')));
            }
        }else{
            echo(json_encode(array('status'=>false,'message'=>'Empty value submitted')));
        }
    }
}
