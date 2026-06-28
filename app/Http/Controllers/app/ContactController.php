<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\ContactFormRequest;
use App\Models\Contact;
use App\Models\GetQuote;
use App\Models\OfficeAddress;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function contact_list()
    {
        $title = "Contact List";
        $contactList = ContactFormRequest::orderBy('id', 'desc')->get();
        return view('app.contact_us.contact_list', compact('contactList', 'title'));

    }

    public function contact_view($id)
    {
        $title = "View Request";
        $contact = ContactFormRequest::find($id);
        return view('app.contact_us.contact_view', compact('contact', 'title'));

    }

    public function replay_to_contact(Request $request)
    {
        if (isset($request->replay) && $request->replay != null) {
            $contact = ContactFormRequest::find($request->id);
            if ($contact) {
                DB::beginTransaction();
                $contact->replay = $request->replay;
                $contact->replay_date = date('Y-m-d h:i:s');
                if ($contact->save()) {
                    if (SendContactReply($contact)) {
                        DB::commit();
                        echo (json_encode(array('status' => true, 'message' => 'Replay saved successfully')));
                    } else {
                        DB::rollBack();
                        echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                    }
                } else {
                    DB::rollBack();
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function delete_contact(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contact = ContactFormRequest::find($request->id);
            if ($contact) {
                $deleted = $contact->delete();
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

    public function delete_multi_contact(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contactArray = explode(',', $request->id);
            $successArray = array();
            foreach ($contactArray as $con) {
                $contact = ContactFormRequest::find($con);
                $deleted = $contact->delete();
                if ($deleted == true) {
                    $successArray[] = '1';
                }
            }
            if ($successArray) {
                echo (json_encode(array('status' => true)));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function contact_page()
    {
        $key = "Update";
        $title = "Contact Page";
        $contact = Contact::first();
        return view('app.contact_us.contact_form',compact('key','title','contact'));
    }
    
    public function contact_page_store(Request $request)
    {
        if($request->id==0){
            $contact = new Contact;
        }else{
            $contact = Contact::find($request->id);
            $contact->updated_at = date('Y-m-d h:i:s');
        }
        $contact->email_id = ($request->email_id)?$request->email_id:'';
        $contact->email_recepient = ($request->email_recepient)?$request->email_recepient:'';
        $contact->phone_number = ($request->phone_number)?$request->phone_number:'';
        $contact->whatsapp_number = ($request->whatsapp_number)?$request->whatsapp_number:'';
        $contact->contact_form_title = ($request->contact_form_title)?$request->contact_form_title:'';
        if ($request->hasFile('contact_image')) {
            if (!empty($contact->contact_image) && File::exists(public_path($contact->contact_image))) {
                File::delete(public_path($contact->contact_image));
            }
            $contact->contact_image = uploadFile($request->contact_image, 'contact-us', 'uploads/contact/image/');
        }
        $contact->contact_image_attribute = $request->contact_image_attribute ?? '';
        $contact->google_map = ($request->google_map)?$request->google_map:'';
        $contact->form_captcha_enabled = $request->form_captcha_enabled ?? 'Yes';
        $contact->form_captcha_type = $request->form_captcha_type ?? 'random';
        if($contact->save()){
            session()->flash('success', 'Contact page details has been updated successfully');
            return redirect(sitePrefix().'contact/page');
        }else{
            return back()->with('error', 'Error while updating the contact page details');
        }
    }

    public function site_information()
    {
        $key = "Update";
        $title = "Site Informations";
        $contact = Contact::first();
        return view('app.contact_us.site_form',compact('key','title','contact'));
    }
    
    public function site_information_store(Request $request)
    {
        if($request->id==0){
            $contact = new Contact;
        }else{
            $contact = Contact::find($request->id);
            $contact->updated_at = date('Y-m-d h:i:s');
        }
        $contact->facebook_url = ($request->facebook_url)?$request->facebook_url:'';
        $contact->instagram_url = ($request->instagram_url)?$request->instagram_url:'';
        $contact->twitter_url = ($request->twitter_url)?$request->twitter_url:'';
        $contact->linkedin_url = ($request->linkedin_url)?$request->linkedin_url:'';
        $contact->privacy_policy = ($request->privacy_policy)?$request->privacy_policy:'';
        $contact->terms_conditions = ($request->terms_conditions)?$request->terms_conditions:'';
        $contact->footer_description = $request->footer_description ?? '';
        $contact->site_logo_attribute = $request->site_logo_attribute ?? '';
        $contact->footer_logo_attribute = $request->footer_logo_attribute ?? '';
        $contact->favicon_attribute = $request->favicon_attribute ?? '';
        $contact->error_page_image_attribute = $request->error_page_image_attribute ?? '';
        foreach (['site_logo' => 'site-logo', 'footer_logo' => 'footer-logo', 'favicon' => 'favicon', 'error_page_image' => 'error-page'] as $field => $prefix) {
            if ($request->hasFile($field)) {
                if (!empty($contact->$field) && File::exists(public_path($contact->$field))) {
                    File::delete(public_path($contact->$field));
                }
                $contact->$field = uploadFile($request->file($field), $prefix, 'uploads/site/branding/');
            }
        }
        if($contact->save()){
            session()->flash('success', 'Site information has been updated successfully');
            return redirect(sitePrefix().'site-information');
        }else{
            return back()->with('error', 'Error while updating the site information');
        }
    }
    
    public function quote_list()
    {
        $title = "Quote List";
        $contactList = GetQuote::orderBy('id', 'desc')->get();
        return view('app.contact_us.quote_list', compact('contactList', 'title'));

    }

    public function replay_to_quote(Request $request)
    {
        if (isset($request->replay) && $request->replay != null) {
            $contact = GetQuote::find($request->id);
            if ($contact) {
                DB::beginTransaction();
                $contact->reply = $request->replay;
                $contact->reply_date = date('Y-m-d h:i:s');
                if ($contact->save()) {
                    if (sendQuoteReply($contact)) {
                        DB::commit();
                        echo (json_encode(array('status' => true, 'message' => 'Replay saved successfully')));
                    } else {
                        DB::rollBack();
                        echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                    }
                } else {
                    DB::rollBack();
                    echo (json_encode(array('status' => false, 'message' => 'Some error occured,please try after sometime')));
                }
            } else {
                echo (json_encode(array('status' => false, 'message' => 'Model class not found')));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function delete_quote(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contact = GetQuote::find($request->id);
            if ($contact) {
                $deleted = $contact->delete();
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

    public function delete_multi_quote(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $contactArray = explode(',', $request->id);
            $successArray = array();
            foreach ($contactArray as $con) {
                $contact = GetQuote::find($con);
                $deleted = $contact->delete();
                if ($deleted == true) {
                    $successArray[] = '1';
                }
            }
            if ($successArray) {
                echo (json_encode(array('status' => true)));
            }
        } else {
            echo (json_encode(array('status' => false, 'message' => 'Empty value submitted')));
        }
    }

    public function office_address()
    {
        $title = "Address List";
        $officeAddress = OfficeAddress::get();
        return view('app.contact_us.office_address.list',compact('officeAddress','title'));
    }

    public function office_address_create()
    {
        $key = "Add";
        $title = "Add Address";
        return view('app.contact_us.office_address.form',compact('key','title'));
    }
    
    public function office_address_store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'mobile'=>'required',
            'address'=>'required',
        ]);
        $office_address = new OfficeAddress;
        $office_address->title = $validatedData['title'];
        $office_address->mobile = $validatedData['mobile'];
        $office_address->address = $validatedData['address'];
        $sort_order = OfficeAddress::orderBy('sort_order', 'DESC')->first();
        if ($sort_order) {
            $sort_number = ($sort_order->sort_order + 1);
        } else {
            $sort_number = 1;
        }
        $office_address->sort_order = $sort_number;
        if($office_address->save()){
            session()->flash('success', "Address '".$request->title."' has been added successfully");
            return redirect(sitePrefix().'contact/office-address');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function office_address_edit(Request $request, $id)
    {
        $key = "Update";
        $title = "Update Address";
        $office_address = OfficeAddress::find($id);
        if($office_address){
            return view('app.contact_us.office_address.form', compact('office_address','title','key'));
        }else{
            return view('app/errors/404');
        }
    }
    
    public function office_address_update(Request $request, $id)
    {
        $office_address =  OfficeAddress::find($id);
        $validatedData = $request->validate([
            'title'=>'required',
            'address'=>'required',
            'mobile'=>'required',
        ]);     
        $office_address->title = $validatedData['title'];
        $office_address->mobile = $validatedData['mobile'];
        $office_address->address = $validatedData['address'];
        $office_address->updated_at = date('Y-m-d h:i:s');
        if($office_address->save()){
            session()->flash('success', "Address '".$request->title."' has been updated successfully");
            return redirect(sitePrefix().'contact/office-address');
        }else{
            return back()->withInput($request->input())->withErrors("Error while updating the content");
        }
    }

    public function delete_office_address(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $office_address = OfficeAddress::find($request->id);
            if($office_address){
                DB::beginTransaction();
                $deleted = $office_address->delete();
                if($deleted==true){
                    DB::commit();
                    echo(json_encode(array('status'=>true)));
                }else{
                    echo(json_encode(array('status'=>false,'address'=>'Some error occured,please try after sometime')));
                }
            }else{
                DB::rollBack();
                echo(json_encode(array('status'=>false,'address'=>'Model class not found')));
            }
        }else{
            echo(json_encode(array('status'=>false,'address'=>'Empty value submitted')));
        }
    }
}
