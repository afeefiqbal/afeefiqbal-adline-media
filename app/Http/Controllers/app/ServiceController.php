<?php

namespace App\Http\Controllers\app;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceFaq;
use DB;

class ServiceController extends Controller
{
    public function service()
    {
        $title = "Service List";
        $serviceList = Service::where('parent_id',0)->latest()->get();
        $type='service';
        return view('app.services.list',compact('serviceList','title','type'));
    }

    public function display_to_home(Request $request){
        $state = $request->state;
        if($state=='true'){
            $status = "Yes";
        }else{
            $status = "No";
        }
        $portfolio = Service::find($request->id);
        if($portfolio){
            $portfolio->display_to_home = $status;
            if($portfolio->save()){
                echo(json_encode(array('status'=>true,'message'=>'Successfully updated')));        
            }else{
                echo(json_encode(array('status'=>false,'message'=>'Error while updating the content')));    
            }
        }else{
            echo(json_encode(array('status'=>false,'message'=>'Invalid Service')));
      } 
    }

    public function service_create()
    {
        $key = "Create";
        $title = "Create Service";
        $type = "service";
        return view('app.services.form',compact('key','title','type'));
    }

    public function service_store(Request $request)
    {
        DB::beginTransaction();
        $valid = $third_valid = true;
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url' => 'required',
            'home_description'=>'required',
            'description'=>'required'
        ]);
        $serviceShortExist = Service::where('title',$request->title)->count();
        if($serviceShortExist>0){
            return back()->withInput($request->input())->withErrors("Service '".$request->title."' already exist");
        }else{
            $service = new Service;
            if ($request->hasFile('thumbnail_image')) {                
                $service->thumbnail_image = uploadFile($request->thumbnail_image, 'service-thumbnail-image', 'uploads/service/thumbnail_image/');
            }
            if ($request->hasFile('image')) {                
                $service->image = uploadFile($request->image, 'service-image', 'uploads/service/image/');
            }
            if ($request->hasFile('banner')) {                
                $service->banner = uploadFile($request->banner, 'service-banner', 'uploads/service/banner/');
            }
            $service->title = $validatedData['title'];
            $service->short_url = $validatedData['short_url'];
            $service->home_description = $validatedData['home_description'];
            $service->description = $validatedData['description'];
            $service->thumbnail_image_meta_tag = ($request->thumbnail_image_meta_tag)?$request->thumbnail_image_meta_tag:'';
            $service->image_meta_tag = ($request->image_meta_tag)?$request->image_meta_tag:'';
            $service->banner_meta_tag = ($request->banner_meta_tag)?$request->banner_meta_tag:'';
            $service->meta_title = ($request->meta_title) ? $request->meta_title : '';
            $service->meta_description = ($request->meta_description) ? $request->meta_description : '';
            $service->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
            $service->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';
            $sort_order = Service::where('parent_id','0')->orderBy('sort_order', 'DESC')->first();
            if ($sort_order) {
                $sort_number = ($sort_order->sort_order + 1);
            } else {
                $sort_number = 1;
            }
            $service->sort_order = $sort_number;
            if($service->save()){
                session()->flash('success', "Service '".$service->title."' has been added successfully");
                DB::commit();
                return redirect(sitePrefix().'service');
            }else{
                DB::rollBack();
                return back()->withInput($request->input())->withErrors("Error while updating the service");  
            }
        }
    }
    
    public function service_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Service";
        $service = Service::find($id);
        if($service){
            $type="service";
            $services = Service::where('status','Active')->get();
            return view('app.services.form', compact('key','title','service','type'));
        }else{
            return view('app.error.404');  
        }
      
    }

    public function service_update(Request $request, $id)
    {
        DB::beginTransaction();
        $serviceShortExist = Service::where([['title',$request->title],['id','!=',$id]])->count();
        if($serviceShortExist>0){
            return back()->withInput($request->input())->withErrors("Service '".$request->title."' already exist");
        }else{
            $service =  Service::find($id);
            $valid = $second_valid = true;
            $validatedData = $request->validate([
                'title' => 'required|min:2|max:255',
                'home_description'=>'required',
                'description'=>'required',
                'short_url' => 'required'
            ]);
            if ($request->hasFile('image')) {
                if (File::exists($service->image)) {
                    File::delete($service->image);
                }
                $service->image = uploadFile($request->image, 'service-image', 'uploads/service/image/');
            }
            if ($request->hasFile('thumbnail_image')) {  
                if (File::exists($service->thumbnail_image)) {
                    File::delete($service->thumbnail_image);
                }              
                $service->thumbnail_image = uploadFile($request->thumbnail_image, 'service-thumbnail-image', 'uploads/service/thumbnail_image/');
            }
            if ($request->hasFile('banner')) {  
                if (File::exists($service->banner)) {
                    File::delete($service->banner);
                }              
                $service->banner = uploadFile($request->banner, 'service-banner', 'uploads/service/banner/');
            }
            $service->title = $validatedData['title'];
            $service->short_url = $validatedData['short_url'];
            $service->home_description = $validatedData['home_description'];
            $service->description = $validatedData['description'];
            $service->thumbnail_image_meta_tag = ($request->thumbnail_image_meta_tag)?$request->thumbnail_image_meta_tag:'';
            $service->image_meta_tag = ($request->image_meta_tag)?$request->image_meta_tag:'';
            $service->banner_meta_tag = ($request->banner_meta_tag)?$request->banner_meta_tag:'';
            $service->meta_title = ($request->meta_title) ? $request->meta_title : '';
            $service->meta_description = ($request->meta_description) ? $request->meta_description : '';
            $service->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
            $service->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';
            $service->updated_at = date('Y-m-d h:i:s');
            if($service->save()){
                session()->flash('success', "Service '".$service->title."' has been updated successfully");
                DB::commit();
                return redirect(sitePrefix().'service');
            }else{
                DB::rollBack();
                return back()->withInput($request->input())->withErrors("Error while updating the service");    
            }
            
        }               
    }

    public function service_delete(Request $request){
        if (isset($request->id) && $request->id != null) {
            $service = Service::find($request->id);
            if ($service) {
                $parentService = Service::where('parent_id',$request->id)->count();
                if($parentService==0){
                    if (File::exists($service->image)) {
                        File::delete($service->image);
                    }
                    if (File::exists($service->thumbnail_image)) {
                        File::delete($service->thumbnail_image);
                    }
                    if (File::exists($service->banner)) {
                        File::delete($service->banner);
                    }
                    $deleted = $service->delete();
                    if ($deleted == true) {
                        echo (json_encode(array('status' => true)));
                    } else {
                        echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                    }
                }else{
                    echo (json_encode(array('status' => false, 'message' => "Not allowed : Service '".$service->title."' have child entries")));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function sub_service()
    {
        $title = "Sub-service List";
        $serviceList = Service::where('parent_id','!=',0)->latest()->get();
        $type='sub-service';
        return view('app.services.list',compact('serviceList','title','type'));
    }

    public function sub_service_create()
    {
        $key = "Create";
        $title = "Create Sub-service";
        $type = "sub-service";
        $parentServices = Service::where([['parent_id',0],['status','Active']])->get();
        $services = Service::where('status','Active')->get();
        return view('app.services.form',compact('key','title','services','type','parentServices'));
    }

    public function sub_service_store(Request $request)
    {
        DB::beginTransaction();
        $valid = $third_valid = true;
        $validatedData = $request->validate([
            'parent_id'=>'required',
            'title' => 'required|min:2|max:255',
            'short_url'=>'required',
            'description'=>'required'
        ]);
        $serviceShortExist = Service::where('short_url',$request->short_url)->count();
        if($serviceShortExist>0){
            return back()->withInput($request->input())->withErrors("Short url '".$request->short_url."' already exist");
        }else{
            $service = new Service;
            if ($request->hasFile('image')) {                
                $service->image = uploadFile($request->image, 'service-image', 'uploads/service/image/');
            }
            if ($request->hasFile('banner')) {                
                $service->banner = uploadFile($request->banner, 'service-banner', 'uploads/service/banner/');
            }
            $service->title = $validatedData['title'];
            $service->parent_id = $validatedData['parent_id'];
            $service->short_url = $validatedData['short_url'];
            $service->description = $validatedData['description'];
            $service->image_meta_tag = ($request->image_meta_tag)?$request->image_meta_tag:'';
            $service->banner_meta_tag = ($request->banner_meta_tag)?$request->banner_meta_tag:'';
            $service->meta_title = ($request->meta_title) ? $request->meta_title : '';
            $service->meta_description = ($request->meta_description) ? $request->meta_description : '';
            $service->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
            $service->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';
            $sort_order = Service::where('parent_id',$request->parent_id)->orderBy('sort_order', 'DESC')->first();
            if ($sort_order) {
                $sort_number = ($sort_order->sort_order + 1);
            } else {
                $sort_number = 1;
            }
            $service->sort_order = $sort_number;
            if($service->save()){
                session()->flash('success', "Sub-service '".$service->title."' has been added successfully");
                DB::commit();
                return redirect(sitePrefix().'service/sub');
            }else{
                DB::rollBack();
                return back()->withInput($request->input())->withErrors("Error while updating the sub-service");  
            }
        }
    }
    
    public function sub_service_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Sub-service";
        $service = Service::find($id);
        if($service){
            $type="sub-service";
            $parentServices = Service::where([['parent_id',0],['status','Active']])->get();
            return view('app.services.form', compact('key','title','parentServices','type','service'));
        }else{
            return view('app.error.404');  
        }
      
    }

    public function sub_service_update(Request $request, $id)
    {
        DB::beginTransaction();
        $serviceShortExist = Service::where([['short_url',$request->short_url],['id','!=',$id]])->count();
        if($serviceShortExist>0){
            return back()->withInput($request->input())->withErrors("Short url '".$request->short_url."' already exist");
        }else{
            $service =  Service::find($id);
            $valid = $second_valid = true;
            $validatedData = $request->validate([
                'parent_id'=>'required',
                'title' => 'required|min:2|max:255',
                'short_url'=>'required',
                'description'=>'required',
            ]);
            if ($request->hasFile('image')) {
                if (File::exists($service->image)) {
                    File::delete($service->image);
                }
                $service->image = uploadFile($request->image, 'service-image', 'uploads/service/image/');
            }
            if ($request->hasFile('banner')) {  
                if (File::exists($service->banner)) {
                    File::delete($service->banner);
                }              
                $service->banner = uploadFile($request->banner, 'service-banner', 'uploads/service/banner/');
            }
            $service->title = $validatedData['title'];
            $service->parent_id = $validatedData['parent_id'];
            $service->short_url = $validatedData['short_url'];
            $service->description = $validatedData['description'];
            $service->image_meta_tag = ($request->image_meta_tag)?$request->image_meta_tag:'';
            $service->banner_meta_tag = ($request->banner_meta_tag)?$request->banner_meta_tag:'';
            $service->meta_title = ($request->meta_title) ? $request->meta_title : '';
            $service->meta_description = ($request->meta_description) ? $request->meta_description : '';
            $service->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
            $service->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';
            $service->updated_at = date('Y-m-d h:i:s');
            if($service->save()){
                session()->flash('success', "Sub-service '".$service->title."' has been updated successfully");
                DB::commit();
                return redirect(sitePrefix().'service/sub');
            }else{
                DB::rollBack();
                return back()->withInput($request->input())->withErrors("Error while updating the sub-service");    
            }
            
        }               
    }

    public function delete_sub_service(Request $request){
        if (isset($request->id) && $request->id != null) {
            $service = Service::find($request->id);
            if ($service) {
                if (File::exists($service->image)) {
                    File::delete($service->image);
                }
                if (File::exists($service->banner)) {
                    File::delete($service->banner);
                }
                if (File::exists($service->thumbnail_image)) {
                    File::delete($service->thumbnail_image);
                }
                $deleted = $service->delete();
                if ($deleted == true) {
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    protected function findServiceOrFail($serviceId)
    {
        $service = Service::find($serviceId);
        if (!$service) {
            abort(404);
        }

        return $service;
    }

    public function service_faq_list($serviceId)
    {
        $service = $this->findServiceOrFail($serviceId);
        $title = 'Service FAQ List';
        $faqList = ServiceFaq::where('service_id', $service->id)->orderBy('sort_order')->get();

        return view('app.services.faq.list', compact('service', 'faqList', 'title'));
    }

    public function service_faq_create($serviceId)
    {
        $service = $this->findServiceOrFail($serviceId);
        $key = 'Create';
        $title = 'Create';

        return view('app.services.faq.form', compact('service', 'key', 'title'));
    }

    public function service_faq_store(Request $request, $serviceId)
    {
        $service = $this->findServiceOrFail($serviceId);
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = new ServiceFaq;
        $faq->service_id = $service->id;
        $faq->question = $validatedData['question'];
        $faq->answer = $validatedData['answer'];
        $sortOrder = ServiceFaq::where('service_id', $service->id)->orderBy('sort_order', 'DESC')->first();
        $faq->sort_order = $sortOrder ? ($sortOrder->sort_order + 1) : 1;

        if ($faq->save()) {
            session()->flash('success', 'FAQ has been added successfully');
            return redirect(sitePrefix().'service/faq/'.$service->id);
        }

        return back()->withInput($request->input())->withErrors('Error while adding the FAQ');
    }

    public function service_faq_edit($serviceId, $id)
    {
        $service = $this->findServiceOrFail($serviceId);
        $faq = ServiceFaq::where('service_id', $service->id)->find($id);
        if (!$faq) {
            return view('app/errors/404');
        }

        $key = 'Update';
        $title = 'Update';

        return view('app.services.faq.form', compact('service', 'faq', 'key', 'title'));
    }

    public function service_faq_update(Request $request, $serviceId, $id)
    {
        $service = $this->findServiceOrFail($serviceId);
        $faq = ServiceFaq::where('service_id', $service->id)->find($id);
        if (!$faq) {
            return view('app/errors/404');
        }

        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq->question = $validatedData['question'];
        $faq->answer = $validatedData['answer'];
        $faq->updated_at = date('Y-m-d h:i:s');

        if ($faq->save()) {
            session()->flash('success', 'FAQ has been updated successfully');
            return redirect(sitePrefix().'service/faq/'.$service->id);
        }

        return back()->withInput($request->input())->withErrors('Error while updating the FAQ');
    }

    public function delete_service_faq(Request $request, $serviceId)
    {
        if (isset($request->id) && $request->id != null) {
            $faq = ServiceFaq::where('service_id', $serviceId)->find($request->id);
            if ($faq) {
                $deleted = $faq->delete();
                if ($deleted) {
                    echo json_encode(['status' => true]);
                } else {
                    echo json_encode(['status' => false, 'message' => 'Some error occured,please try after sometime']);
                }
            } else {
                echo json_encode(['status' => false, 'message' => 'Model class not found']);
            }
        } else {
            echo json_encode(['status' => false, 'message' => 'Empty value submitted']);
        }
    }
}


