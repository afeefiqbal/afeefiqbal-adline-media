<?php

namespace App\Http\Controllers\app;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioGallery;
use DB;

class PortfolioController extends Controller
{
    public function portfolio()
    {
        $title = "Portfolio";
        $portfolioList = Portfolio::get();
        $categoryList = PortfolioCategory::where('status','Active')->get();
        return view('app.portfolio.portfolio.list',compact('portfolioList','title','categoryList'));
    }

    public function display_to_home(Request $request){
        $state = $request->state;
        if($state=='true'){
            $status = "Yes";
        }else{
            $status = "No";
        }
        $portfolio = Portfolio::find($request->id);
        if($portfolio){
            $portfolio->display_to_home = $status;
            if($portfolio->save()){
                echo(json_encode(array('status'=>true,'message'=>'Successfully updated')));        
            }else{
                echo(json_encode(array('status'=>false,'message'=>'Error while updating the content')));    
            }
        }else{
            echo(json_encode(array('status'=>false,'message'=>'Invalid Portfolio')));
      } 
    }

    public function portfolio_create()
    {
        $key = "Create";
        $title = "Create Portfolio";
        $categories = PortfolioCategory::where('status','Active')->get();
        return view('app.portfolio.portfolio.form',compact('key','title','categories'));        
    }

    public function portfolio_store(Request $request)
    {
        DB::beginTransaction();
        $valid = $third_valid = true;
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url'=>'required',
            'category_id' => 'required'
        ]);
        $portfolioShortExist = Portfolio::where('short_url',$request->short_url)->count();
        if($portfolioShortExist>0){
            return back()->withInput($request->input())->withErrors("Short url '".$request->short_url."' already exist");
        }else{
            $portfolio = new Portfolio;
            if ($request->hasFile('banner')) {
                $portfolio->banner = uploadFile($request->banner, $request->title, 'uploads/portfolio/banner/');
            }
            $portfolio->title = $validatedData['title'];
            $portfolio->short_url = $validatedData['short_url'];
            $portfolio->category_id = $validatedData['category_id'];
            $portfolio->location = ($request->location)?$request->location:'';
            $portfolio->type = ($request->type)?$request->type:'';
            $portfolio->attendees = ($request->attendees)?$request->attendees:'';
            $portfolio->description = ($request->description)?$request->description:'';
            $portfolio->banner_attribute = ($request->banner_attribute)?$request->banner_attribute:'';
            $portfolio->meta_title = ($request->meta_title) ? $request->meta_title : '';
            $portfolio->meta_description = ($request->meta_description) ? $request->meta_description : '';
            $portfolio->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
            $portfolio->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';
            $sort_order = Portfolio::latest()->first();
            if ($sort_order) {
                $sort_number = ($sort_order->sort_order + 1);
            } else {
                $sort_number = 1;
            }
            $portfolio->sort_order = $sort_number;
            if($portfolio->save()){
                session()->flash('success', "Portfolio '".$portfolio->title."' has been added successfully");
                DB::commit();
                return redirect(sitePrefix().'portfolio/item');
            }else{
                DB::rollBack();
                return back()->withInput($request->input())->withErrors("Error while updating the portfolio");  
            }
        }
    }
    
    public function portfolio_edit(Request $request, $id)
    {
        $key = "Update";
        $portfolio = Portfolio::find($id);
        if($portfolio){
            $title = "Update Portfolio";
            $categories = PortfolioCategory::where('status','Active')->get();
            return view('app.portfolio.portfolio.form',compact('key','title','categories','portfolio'));
        }else{
            return view('app.error.404');  
        }
      
    }

    public function portfolio_update(Request $request, $id)
    {
        DB::beginTransaction();
        $portfolioShortExist = Portfolio::where([['short_url',$request->short_url],['id','!=',$id]])->count();
        if($portfolioShortExist>0){
            return back()->withInput($request->input())->withErrors("Short url '".$request->short_url."' already exist");
        }else{
            $portfolio =  Portfolio::find($id);
            if($portfolio!=NULL){
                $valid = $second_valid = true;
                $validatedData = $request->validate([
                    'title' => 'required|min:2|max:255',
                    'short_url'=>'required',
                    'category_id' => 'required'
                ]);
                if ($request->hasFile('banner')) {
                    if (File::exists($portfolio->banner)) {
                        File::delete($portfolio->banner);
                    }
                    $portfolio->banner = uploadFile($request->banner, $request->short_url, 'uploads/portfolio/banner/');
                }
                $portfolio->title = $validatedData['title'];
                $portfolio->short_url = $validatedData['short_url'];
                $portfolio->category_id = $validatedData['category_id'];
                $portfolio->location = ($request->location)?$request->location:'';
                $portfolio->type = ($request->type)?$request->type:'';
                $portfolio->attendees = ($request->attendees)?$request->attendees:'';
                $portfolio->description = ($request->description)?$request->description:'';
                $portfolio->banner_attribute = ($request->banner_attribute)?$request->banner_attribute:'';
                $portfolio->meta_title = ($request->meta_title) ? $request->meta_title : '';
                $portfolio->meta_description = ($request->meta_description) ? $request->meta_description : '';
                $portfolio->meta_keyword = ($request->meta_keyword) ? $request->meta_keyword : '';
                $portfolio->other_meta_tag = ($request->other_meta_tag) ? $request->other_meta_tag : '';
                $portfolio->updated_at = date('Y-m-d h:i:s');
                if($portfolio->save()){
                    session()->flash('success', "Portfolio '".$portfolio->title."' has been updated successfully");
                    DB::commit();
                    return redirect(sitePrefix().'portfolio/item');
                }else{
                    DB::rollBack();
                    return back()->withInput($request->input())->withErrors("Error while updating the portfolio");    
                }
            }else{
                DB::rollBack();
                return back()->withInput($request->input())->withErrors("Portfolio not found");
            }
        }               
    }

    public function delete_portfolio(Request $request){
        if (isset($request->id) && $request->id != null) {
            $portfolio = Portfolio::find($request->id);
            if ($portfolio) {
                if (File::exists($portfolio->banner)) {
                    File::delete($portfolio->banner);
                }
                $deleted = $portfolio->delete();
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

    public function gallery($portfolio_id)
    {
        $portfolio = Portfolio::find($portfolio_id);
        $title = "Gallery List";
        $galleriesList = PortfolioGallery::where('portfolio_id', $portfolio_id)->get();
        return view('app.portfolio.gallery.list', compact('galleriesList', 'title', 'portfolio'));
    }

    public function gallery_create($portfolio_id)
    {
        $portfolio = Portfolio::find($portfolio_id);
        $key = "Create";
        $title = "Create Gallery";
        return view('app.portfolio.gallery.form', compact('key', 'title','portfolio'));
    }

    public function gallery_store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required',
            'portfolio_id' => 'required',
            'image' => 'required',
            'image_attribute' => 'required',
        ]);
        $gallery = new PortfolioGallery;
        if ($request->hasFile('image')) {
            $gallery->image = uploadFile($request->image, $request->title, 'uploads/portfolio/'.$request->portfolio_id.'/gallery/');
        }
        $gallery->portfolio_id = $request->portfolio_id;
        $gallery->type = $request->type;
        if($request->type=="Video"){
            $gallery->video_url = $request->video_url;
        }
        $gallery->image_attribute = $validatedData['image_attribute'];
        if ($gallery->save()) {
            session()->flash('message', ucfirst($request->type)." has been added successfully");
            return redirect(sitePrefix() . 'portfolio/item/gallery/' .$request->portfolio_id);
        } else {
            return back()->with('message', 'Error while creating the '.$request->type);
        }
    }

    public function gallery_edit(Request $request, $id)
    {
        $key = "Update";
        $gallery = PortfolioGallery::with('package')->find($id);
        $title = "Update - Gallery";
        if ($gallery) {
            $portfolio = Portfolio::find($gallery->portfolio_id);
            return view('app.portfolio.gallery.form', compact('key', 'gallery', 'title','portfolio'));
        } else {
            return view('app.error.404');
        }

    }
    public function gallery_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'type' => 'required',
            'portfolio_id' => 'required'
        ]);
        $gallery = PortfolioGallery::find($id);
        if ($request->hasFile('image')) {
            if (File::exists($gallery->image)) {
                File::delete($gallery->image);
            }
            $gallery->image = uploadFile($request->image, $request->title, 'uploads/portfolio/'.$request->portfolio_id.'/gallery/');
        }
        $gallery->portfolio_id = $request->portfolio_id;
        $gallery->type = $request->type;
        if($request->type=="Video"){
            $gallery->video_url = $request->video_url;
        }
        $gallery->image_attribute = $request->image_attribute;
        $gallery->updated_at = date('Y-m-d h:i:s');
        if ($gallery->save()) {
            session()->flash('message', ucfirst($request->type)." has been updated successfully");
            return redirect(sitePrefix() . 'portfolio/item/gallery/' .$request->portfolio_id);
        } else {
            return back()->with('message', 'Error while updating the '.$request->type);
        }
    }

    public function gallery_delete(Request $request)
    {
        if (isset($request->id) && $request->id != null) {
            $gallery = PortfolioGallery::find($request->id);
            if ($gallery) {
                if (File::exists($gallery->image)) {
                    File::delete($gallery->image);
                }
                $deleted = $gallery->delete();
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
}


