<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MetaTag;
use App\Models\ExtraTag;

class TagController extends Controller
{
    public function tag($type)
    {
            $type = trim(ucfirst($type));
            $key = "Update";
            $title = "Update '".$type."'";
            $tag = MetaTag::where('page_name',$type)->first();
            return view('app.tags.tags_form',compact('key','title','tag','type'));
        
    }
    
    public function tag_store(Request $request)
    {
        $type_array = array('Home','About','Portfolio','Blog','Contact','Privacy','Terms');
        if(in_array($request->page_name,$type_array)){
            $validatedData = $request->validate([
                'page_name' => 'required|min:2',               
            ]);
            if($request->id==0){
                $tag = new MetaTag;
            }else{
                $tag = MetaTag::find($request->id);
                $tag->updated_at = date('Y-m-d h:i:s');
            }
            $tag->page_name = $validatedData['page_name'];
            $tag->meta_title = ($request->meta_title)?$request->meta_title:'';
            $tag->meta_description = ($request->meta_description)?$request->meta_description:'';
            $tag->meta_keyword = ($request->meta_keyword)?$request->meta_keyword:'';
            $tag->other_meta_tag = isset($request->other_meta_tag)?$request->other_meta_tag:'';
            if($tag->save()){
                session()->flash('success', 'Tag content '.$request->page_name.' has been updated successfully');
                return redirect(sitePrefix().'tag/'.strtolower($request->page_name));
            }else{
                return back()->with('error', 'Error while updating the tag content');
            }
        }else{
            abort(403, 'You are requested type '.$request->page_name.' does not exist'); 
        }
    }
    
    public function other_meta_tag()
    {
        $key = "Update";
        $title = "Update Extra Tags";
        $tag = ExtraTag::first();
        return view('app.tags.extra_tag_form',compact('key','title','tag'));
    }
    
    public function other_meta_tag_store(Request $request)
    {
        if($request->id==0){
            $tag = new ExtraTag;
        }else{
            $tag = ExtraTag::find($request->id);
            $tag->updated_at = date('Y-m-d h:i:s');
        }
        $tag->header_tag = isset($request->header_tag)?$request->header_tag:'';
        $tag->footer_tag = isset($request->footer_tag)?$request->footer_tag:'';  
        $tag->body_tag = isset($request->body_tag)?$request->body_tag:'';  
        if($tag->save()){
            session()->flash('message', 'Tag content has been updated successfully');
            return redirect(sitePrefix().'other-meta-tag/');
        }else{
            return back()->with('message', 'Error while updating the tag content');
        }
    }
}
