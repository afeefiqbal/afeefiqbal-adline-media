<?php

namespace app\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\MetaData;
use App\Models\HomeSetting;
use App\Models\KeyFeature;
use App\Models\WhatWeDo;
use App\Models\WhyChooseHeading;
use App\Models\WhyChooseUs;
use App\Models\WhoWeAre;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\OurClientHeading;
use App\Models\FaqHeading;
use App\Models\Faq;
use App\Models\PortfolioCategory;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $title = "Dashboard";
        return view('app.landing', compact('title'));
    }

    public function hero_settings()
    {
        $title = 'Hero Section';
        $homeSettings = HomeSetting::firstOrCreate(['id' => 1]);

        return view('app.home.hero.settings', compact('title', 'homeSettings'));
    }

    public function hero_content_update(Request $request)
    {
        $settings = HomeSetting::firstOrCreate(['id' => 1]);
        $settings->hero_title = $request->hero_title ?? '';
        $settings->hero_sub_title = $request->hero_sub_title ?? '';
        $settings->hero_button_text = $request->hero_button_text ?? '';
        $settings->hero_button_url = $request->hero_button_url ?? '';
        $settings->save();

        session()->flash('success', 'Hero content updated successfully');

        return redirect(sitePrefix().'home/hero');
    }

    public function hero_video_update(Request $request)
    {
        $request->validate([
            'hero_video' => 'required|mimes:mp4,webm|max:51200',
        ]);

        $settings = HomeSetting::firstOrCreate(['id' => 1]);

        if ($request->hasFile('hero_video')) {
            if ($settings->hero_video && File::exists(public_path($settings->hero_video))) {
                File::delete(public_path($settings->hero_video));
            }

            $settings->hero_video = uploadFile($request->hero_video, 'hero-video', 'uploads/home/hero/video/');
            $settings->save();
        }

        session()->flash('success', 'Hero video updated successfully');
        return redirect(sitePrefix().'home/hero');
    }

    public function working_hours_update(Request $request)
    {
        $request->validate([
            'working_hours' => 'required|string|max:2000',
        ]);

        $settings = HomeSetting::firstOrCreate(['id' => 1]);
        $settings->working_hours = $request->working_hours;
        $settings->save();

        session()->flash('success', 'Working hours updated successfully');
        return redirect(sitePrefix().'home/hero');
    }

    public function cta_icons_update(Request $request)
    {
        $settings = HomeSetting::firstOrCreate(['id' => 1]);
        $iconFields = [
            'cta_contact_icon' => 'cta-contact',
            'cta_location_icon' => 'cta-location',
            'cta_working_hours_icon' => 'cta-hours',
            'testimonial_quote_icon' => 'testimonial-quote',
        ];
        $iconAltFields = [
            'cta_contact_icon_attribute',
            'cta_location_icon_attribute',
            'cta_working_hours_icon_attribute',
            'testimonial_quote_icon_attribute',
        ];

        foreach ($iconAltFields as $altField) {
            $settings->$altField = $request->$altField ?? '';
        }

        foreach ($iconFields as $field => $prefix) {
            if ($request->hasFile($field)) {
                if ($settings->$field && File::exists(public_path($settings->$field))) {
                    File::delete(public_path($settings->$field));
                }
                $settings->$field = uploadFile($request->file($field), $prefix, 'uploads/home/icons/');
            }
        }

        $settings->save();
        session()->flash('success', 'Section icons updated successfully');
        return redirect(sitePrefix().'home/hero');
    }

    public function key_feature()
    {
        $title = "Key Feature List";
        $featureList = KeyFeature::get();
        return view('app.home.key_feature.list',compact('featureList','title'));
    }

    public function key_feature_create()
    {
        $key = "Add";
        $title = "Add Key Feature";
        return view('app.home.key_feature.form',compact('key','title'));
    }
    
    public function key_feature_store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'count' => 'required'
        ]);
        $key_feature = new KeyFeature;
        if ($request->hasFile('image')) {
            $key_feature->image = uploadFile($request->image, 'KeyFeature', 'uploads/key_feature/image/');
        }
        $key_feature->image_attribute = ($request->image_attribute)?$request->image_attribute:'';
        $key_feature->title = $validatedData['title'];
        $key_feature->count = $validatedData['count'];
        $sort_order = KeyFeature::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $key_feature->sort_order = $sort_number;
        if($key_feature->save()){
            session()->flash('message', 'Key Feature has been added successfully');
            return redirect(sitePrefix().'home/key-feature');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function key_feature_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Key Feature";
        $key_feature = KeyFeature::find($id);
        if($key_feature){
            return view('app.home.key_feature.form', compact('key_feature','title','key'));
        }else{
            return view('app/errors/404');
        }
    }
    
    public function key_feature_update(Request $request, $id)
    {
        $key_feature =  KeyFeature::find($id);
        $validatedData = $request->validate([
            'title'=>'required',
            'count' => 'required'
        ]);     
        if ($request->hasFile('image')) {
            if (File::exists($key_feature->image)) {
                File::delete($key_feature->image);
            }
            $key_feature->image = uploadFile($request->image, 'KeyFeature', 'uploads/key_feature/image/');
        }
        $key_feature->image_attribute = ($request->image_attribute)?$request->image_attribute:'';
        $key_feature->count = $validatedData['count'];
        $key_feature->title = $validatedData['title'];
        $key_feature->updated_at = date('Y-m-d h:i:s');
        if($key_feature->save()){
            session()->flash('message', 'Key Feature has been updated successfully');
            return redirect(sitePrefix().'home/key-feature');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_key_feature(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $key_feature = KeyFeature::find($request->id);
            if($key_feature){
                $image = $key_feature->image;
                DB::beginTransaction();
                $deleted = $key_feature->delete();
                if($deleted==true){
                    if (File::exists($image)) {
                        File::delete($image);
                    }
                    DB::commit();
                    echo(json_encode(array('status'=>true)));
                }else{
                    echo(json_encode(array('status'=>false,'description'=>'Some error occured,please try after sometime')));
                }
            }else{
                DB::rollBack();
                echo(json_encode(array('status'=>false,'description'=>'Model class not found')));
            }
        }else{
            echo(json_encode(array('status'=>false,'description'=>'Empty value submitted')));
        }
    }

    public function what_we_do()
    {
        $key = "Update";
        $title = "What we do";
        $what_we_do = WhatWeDo::first();
        return view('app.home.what_we_do._form',compact('key','title','what_we_do'));
    }
    
    public function what_we_do_store(Request $request)
    {
        if($request->id==0){
            $what_we_do = new WhatWeDo;
        }else{
            $what_we_do = WhatWeDo::find($request->id);
            $what_we_do->updated_at = date('Y-m-d h:i:s');
        }
        if ($request->hasFile('image')) {
            if (File::exists($what_we_do->image)) {
                File::delete($what_we_do->image);
            }
            $what_we_do->image = uploadFile($request->image, 'what-we-do', 'uploads/home/what_we_do/');
        }
        $what_we_do->title = ($request->title)?$request->title:'';
        $what_we_do->sub_title = ($request->sub_title)?$request->sub_title:'';
        $what_we_do->description = ($request->description)?$request->description:'';
        $what_we_do->image_attribute = ($request->image_attribute)?$request->image_attribute:'';
        if($what_we_do->save()){
            session()->flash('success', 'What we do has been updated successfully');
            return redirect(sitePrefix().'home/what-we-do');
        }else{
            return back()->with('error', 'Error while updating the what we do');
        }
    }

    public function why_choose_us()
    {
        $key = "Update";
        $title = "Why choose us";
        $why_choose_us = WhyChooseHeading::first();
        return view('app.home.why_choose_us._form',compact('key','title','why_choose_us'));
    }
    
    public function why_choose_us_store(Request $request)
    {
        if($request->id==0){
            $why_choose_us = new WhyChooseHeading;
        }else{
            $why_choose_us = WhyChooseHeading::find($request->id);
            $why_choose_us->updated_at = date('Y-m-d h:i:s');
        }
        $why_choose_us->title = ($request->title)?$request->title:'';
        $why_choose_us->sub_title = ($request->sub_title)?$request->sub_title:'';
        $why_choose_us->description = ($request->description)?$request->description:'';
        if($why_choose_us->save()){
            session()->flash('success', 'Why choose us content has been updated successfully');
            return redirect(sitePrefix().'home/why-choose-us');
        }else{
            return back()->with('error', 'Error while updating the why-choose-us');
        }
    }

    public function list()
    {
        $title = "Why choose us";
        $list = WhyChooseUs::get();
        return view('app.home.why_choose_us.list.list',compact('list','title'));
    }

    public function list_create()
    {
        $key = "Add";
        $title = "Add";
        return view('app.home.why_choose_us.list.form',compact('key','title'));
    }
    
    public function list_store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        $list = new WhyChooseUs;
        if ($request->hasFile('image')) {
            $list->image = uploadFile($request->image, 'list', 'uploads/why-choose-us/image/');
        }
        $list->title = $validatedData['title'];
        $list->description = $validatedData['description'];
        $list->image_attribute = $request->image_meta_tag ?? '';
        $sort_order = WhyChooseUs::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $list->sort_order = $sort_number;
        if($list->save()){
            session()->flash('success', 'Why choose us has been added successfully');
            return redirect(sitePrefix().'home/why-choose-us/list');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function list_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update";
        $list = WhyChooseUs::find($id);
        if($list){
            return view('app.home.why_choose_us.list.form', compact('list','title','key'));
        }else{
            return view('app/errors/404');
        }
    }
    
    public function list_update(Request $request, $id)
    {
        $list =  WhyChooseUs::find($id);
        $validatedData = $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        if ($request->hasFile('image')) {
            if (File::exists($list->image)) {
                File::delete($list->image);
            }
            $list->image = uploadFile($request->image, 'list', 'uploads/why-choose-us/list/image/');
        }
        $list->image_attribute = $request->image_meta_tag ?? '';
        $list->title = $validatedData['title'];
        $list->description = $validatedData['description'];
        $list->updated_at = date('Y-m-d h:i:s');
        if($list->save()){
            session()->flash('success', 'Why choose us has been updated successfully');
            return redirect(sitePrefix().'home/why-choose-us/list');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_list(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $list = WhyChooseUs::find($request->id);
            if($list){
                $image = $list->image;
                DB::beginTransaction();
                $deleted = $list->delete();
                if($deleted==true){
                    DB::commit();
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

    public function who_we_are()
    {
        $key = "Update";
        $title = "Who we are";
        $who_we_are = WhoWeAre::first();
        return view('app.home.who_we_are._form',compact('key','title','who_we_are'));
    }
    
    public function who_we_are_store(Request $request)
    {
        if($request->id==0){
            $who_we_are = new WhoWeAre;
        }else{
            $who_we_are = WhoWeAre::find($request->id);
            $who_we_are->updated_at = date('Y-m-d h:i:s');
        }
        if ($request->hasFile('image')) {
            if($request->id!=0){
                if (File::exists($who_we_are->image)) {
                    File::delete($who_we_are->image);
                }
            }
            $who_we_are->image = uploadFile($request->image, 'list', 'uploads/who-we-are/image/');
        }
        if ($request->hasFile('image_2')) {
            if($request->id!=0 && $who_we_are->image_2 && File::exists($who_we_are->image_2)) {
                File::delete($who_we_are->image_2);
            }
            $who_we_are->image_2 = uploadFile($request->image_2, 'list-2', 'uploads/who-we-are/image/');
        }
        if ($request->hasFile('count_icon')) {
            if($request->id!=0 && $who_we_are->count_icon && File::exists($who_we_are->count_icon)) {
                File::delete($who_we_are->count_icon);
            }
            $who_we_are->count_icon = uploadFile($request->count_icon, 'count-icon', 'uploads/who-we-are/image/');
        }
        $who_we_are->title = ($request->title)?$request->title:'';
        $who_we_are->sub_title = ($request->sub_title)?$request->sub_title:'';
        $who_we_are->description = ($request->description)?$request->description:'';
        $who_we_are->count = ($request->count)?$request->count:'';
        $who_we_are->button_text = ($request->button_text)?$request->button_text:'';
        $who_we_are->button_url = ($request->button_url)?$request->button_url:'';
        $who_we_are->image_attribute = $request->image_meta_tag ?? '';
        $who_we_are->image_2_attribute = $request->image_2_meta_tag ?? '';
        $who_we_are->count_icon_attribute = $request->count_icon_attribute ?? '';
        if($who_we_are->save()){
            session()->flash('success', 'Who we are content has been updated successfully');
            return redirect(sitePrefix().'home/who-we-are');
        }else{
            return back()->with('error', 'Error while updating the who-we-are');
        }
    }

    public function testimonial()
    {
        $title = "Testimonial List";
        $testimonialList = Testimonial::get();
        return view('app.home.testimonial.list',compact('testimonialList','title'));
    }

    public function testimonial_create()
    {
        $key = "Add";
        $title = "Add Testimonial";
        return view('app.home.testimonial.form',compact('key','title'));
    }
    
    public function testimonial_store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'designation'=>'required',
            'message'=>'required',
        ]);
        $testimonial = new Testimonial;
        $testimonial->title = $validatedData['title'];
        $testimonial->designation = $validatedData['designation'];
        $testimonial->message = $validatedData['message'];
        $sort_order = Testimonial::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $testimonial->sort_order = $sort_number;
        if($testimonial->save()){
            session()->flash('message', 'Testimonial has been added successfully');
            return redirect(sitePrefix().'home/testimonial');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function testimonial_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Testimonial";
        $testimonial = Testimonial::find($id);
        if($testimonial){
            return view('app.home.testimonial.form', compact('testimonial','title','key'));
        }else{
            return view('app/errors/404');
        }
    }
    
    public function testimonial_update(Request $request, $id)
    {
        $testimonial =  Testimonial::find($id);
        $validatedData = $request->validate([
            'title'=>'required',
            'designation'=>'required',
            'message'=>'required',
        ]);
        $testimonial->title = $validatedData['title'];
        $testimonial->designation = $validatedData['designation'];
        $testimonial->message = $validatedData['message'];
        $testimonial->updated_at = date('Y-m-d h:i:s');
        if($testimonial->save()){
            session()->flash('message', 'Testimonial has been updated successfully');
            return redirect(sitePrefix().'home/testimonial');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_testimonial(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $testimonial = Testimonial::find($request->id);
            if($testimonial){
                DB::beginTransaction();
                $deleted = $testimonial->delete();
                if($deleted==true){
                    DB::commit();
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

    public function our_client()
    {
        $key = "Update";
        $title = "Our Partner";
        $ourPartner = OurClientHeading::first();
        return view('app.home.our_clients._heading_form',compact('key','title','ourPartner'));
    }
    
    public function our_client_store(Request $request)
    {
        if($request->id==0){
            $our_team = new OurClientHeading;
        }else{
            $our_team = OurClientHeading::find($request->id);
            $our_team->updated_at = date('Y-m-d h:i:s');
        }
        $our_team->title = ($request->title)?$request->title:'';
        $our_team->sub_title = ($request->sub_title)?$request->sub_title:'';
        $our_team->description = ($request->description)?$request->description:'';
        if($our_team->save()){
            session()->flash('success', 'Our-partner content has been updated successfully');
            return redirect(sitePrefix().'home/our-client');
        }else{
            return back()->with('error', 'Error while updating the our-team');
        }
    }

    public function client()
    {
        $title = "Client List";
        $clientList = Client::get();
        return view('app.home.our_clients.list', compact('clientList', 'title'));
    }
    public function client_create()
    {
        $key = "Create";
        $title = "Create Client";
        return view('app.home.our_clients.form', compact('key', 'title'));
    }
    public function client_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
        ]);
        $client = new Client;
        if ($request->hasFile('image')) {
            $client->image = uploadFile($request->image, 'client', 'uploads/client/image/');
        }
        $client->title = $validatedData['title'];
        $client->image_meta_tag = ($request->image_meta_tag)?$request->image_meta_tag:'';
        if ($client->save()) {
            session()->flash('success', "Client '" . $request->title . "' has been added successfully");
            return redirect(sitePrefix().'home/our-client/list');
        } else {
            return back()->with('error', 'Error while creating the client');
        }
    }

    public function client_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Client";
        $client = Client::find($id);
        if ($client) {
            return view('app.home.our_clients.form', compact('key', 'client', 'title'));
        } else {
            return view('app.error.404');
        }
    }

    public function client_update(Request $request, $id)
    {
        $client = Client::find($id);
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',            
        ]);
        if ($request->hasFile('image')) {
            if (File::exists($client->image)) {
                File::delete($client->image);
            }
            $client->image = uploadFile($request->image, 'client', 'uploads/client/image/');
        }
        $client->title = $validatedData['title'];
        $client->image_meta_tag = ($request->image_meta_tag)?$request->image_meta_tag:'';
        $client->updated_at = date('Y-m-d h:i:s');
        if ($client->save()) {
            session()->flash('success', "Client '" . $request->title . "' has been updated successfully");
            return redirect(sitePrefix().'home/our-client/list');
        } else {
            return back()->with('error', 'Error while updating the client');
        }
    }

    public function delete_client(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $client = Client::find($request->id);
            if ($client) {
                if (File::exists($client->image)) {
                    File::delete($client->image);
                }
                $deleted = $client->delete();
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

    public function faq()
    {
        $key = 'Update';
        $title = 'FAQ Section';
        $faqHeading = FaqHeading::first();
        return view('app.home.faq._heading_form', compact('key', 'title', 'faqHeading'));
    }

    public function faq_store(Request $request)
    {
        if ($request->id == 0) {
            $faqHeading = new FaqHeading;
        } else {
            $faqHeading = FaqHeading::find($request->id);
            $faqHeading->updated_at = date('Y-m-d h:i:s');
        }
        $faqHeading->title = $request->title ?? '';
        $faqHeading->sub_title = $request->sub_title ?? '';
        $faqHeading->description = $request->description ?? '';
        $faqHeading->button_text = $request->button_text ?? '';
        $faqHeading->button_url = $request->button_url ?? '';
        if ($faqHeading->save()) {
            session()->flash('success', 'FAQ section content has been updated successfully');
            return redirect(sitePrefix().'home/faq');
        }
        return back()->with('error', 'Error while updating the FAQ section');
    }

    public function faq_list()
    {
        $title = 'FAQ List';
        $faqList = Faq::orderBy('sort_order')->get();
        return view('app.home.faq.list', compact('faqList', 'title'));
    }

    public function faq_create()
    {
        $key = 'Add';
        $title = 'Add';
        return view('app.home.faq.form', compact('key', 'title'));
    }

    public function faq_item_store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faq = new Faq;
        $faq->question = $validatedData['question'];
        $faq->answer = $validatedData['answer'];
        $sort_order = Faq::orderBy('sort_order', 'DESC')->first();
        $faq->sort_order = $sort_order ? ($sort_order->sort_order + 1) : 1;
        if ($faq->save()) {
            session()->flash('success', 'FAQ has been added successfully');
            return redirect(sitePrefix().'home/faq/list');
        }
        return back()->withInput($request->input())->withErrors('Error while adding the FAQ');
    }

    public function faq_edit(Request $request, $id)
    {
        $key = 'Update';
        $title = 'Update';
        $faq = Faq::find($id);
        if ($faq) {
            return view('app.home.faq.form', compact('faq', 'title', 'key'));
        }
        return view('app/errors/404');
    }

    public function faq_item_update(Request $request, $id)
    {
        $faq = Faq::find($id);
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faq->question = $validatedData['question'];
        $faq->answer = $validatedData['answer'];
        $faq->updated_at = date('Y-m-d h:i:s');
        if ($faq->save()) {
            session()->flash('success', 'FAQ has been updated successfully');
            return redirect(sitePrefix().'home/faq/list');
        }
        return back()->withInput($request->input())->withErrors('Error while updating the FAQ');
    }

    public function delete_faq(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $faq = Faq::find($request->id);
            if ($faq) {
                DB::beginTransaction();
                $deleted = $faq->delete();
                if ($deleted == true) {
                    DB::commit();
                    echo (json_encode(array('status' => true)));
                } else {
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                DB::rollBack();
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function sort_order(Request $request)
    {
        if (isset($request->id) && $request->id != NULL) {
            $table = $request->table;
            $appPrefix = 'App';
            $model = $appPrefix . '\\Models\\' . $table;
            $data = $model::find($request->id);
            if($table=="Portfolio"){
                // echo $data->category_id."=>".$request->id."=>".$request->sort_order;die;
                $sortOrder = $model::where([['category_id', $data->category_id], ['id', '!=', $request->id],['sort_order', $request->sort_order]])->count();
            }else{
                if ($request->extra != NULL) {
                    $sortOrder = $model::where([['sort_order', $request->sort_order], [$request->extra, $request->extra_key], ['id', '!=', $request->id]])->count();
                } else {
                    $sortOrder = $model::where([['sort_order', $request->sort_order], ['id', '!=', $request->id]])->count();
                }
            }
            if ($sortOrder) {
                return response()->json(['status' => false, 'message' => 'Sort order "' . $request->sort_order . '" has been already taken']);
            } else {
                $data->sort_order = $request->sort_order;
                if ($data->save()) {
                    return response()->json(['status' => true, 'message' => 'Sort order updated successfully']);
                } else {
                    return response()->json(['status' => false, 'message' => 'Error while updating the sort order']);
                }
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Empty value submitted']);
        }
    }

    public function status_change(Request $request)
    {
        $table = $request->table;
        $state = $request->state;
        $primary_key = $request->primary_key;
        if ($state == 'true') {
            $status = "Active";
        } else {
            $status = "Inactive";
        }
        $appPrefix = 'App';
        $model = $appPrefix . '\\Models\\' . $table;
        $data = $model::find($primary_key);
        $data->status = $status;
        if ($data->save()) {
            echo "1";
        } else {
            echo "2";
        }
    }
}
