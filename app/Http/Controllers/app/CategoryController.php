<?php

namespace App\Http\Controllers\app;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioCategory;
use DB;

class CategoryController extends Controller
{
    public function category()
    {
        $title = "Category List";
        $categoryList = PortfolioCategory::get();
        return view('app.portfolio.category.list',compact('categoryList','title'));
    }

    public function category_create()
    {
        $key = "Create";
        $title = "Create Category";
        return view('app.portfolio.category.form',compact('key','title'));
    }
    
    public function category_store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',            
            'short_url' => 'required',
        ]);
        $categoryExist = PortfolioCategory::where('short_url', $request->short_url)->count();
        if($categoryExist>0){
            return back()->withInput($request->input())->withErrors("Category shorturl '".$request->short_url."' already exist");
        }else{
            $category = new PortfolioCategory;
            $category->title = $validatedData['title'];
            $category->short_url = $validatedData['short_url'];
            $sort_order = PortfolioCategory::latest()->first();
            if ($sort_order) {
                $sort_number = ($sort_order->sort_order + 1);
            } else {
                $sort_number = 1;
            }
            $category->sort_order = $sort_number;
            if($category->save()){
                session()->flash('message', "Category '".$category->title."' has been added successfully");
                return redirect(sitePrefix().'portfolio/category');
            }else{
                return back()->withInput($request->input())->withErrors("Error while updating the content");
            }
        }
    }
    
    public function category_edit(Request $request, $id)
    {
        $key = "Update";
        $category = PortfolioCategory::find($id);
        if($category){
            $title = "Update Category";
            return view('app.portfolio.category.form', compact('key','category','title'));
        }else{
            return view('app.error.404'); 
        }
    }
    
    public function category_update(Request $request, $id)
    {
        $category =  PortfolioCategory::find($id);
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:255',
            'short_url' => 'required',
        ]);
        $categoryExist = PortfolioCategory::where([['short_url',$request->short_url],['id','!=',$id]])->count();
        if($categoryExist>0){
            return back()->withInput($request->input())->withErrors("Category shorturl '".$request->short_url."' already exist");
        }else{
            $category->title = $validatedData['title'];
            $category->short_url = $validatedData['short_url'];
            $category->updated_at = date('Y-m-d h:i:s');
            if($category->save()){
                session()->flash('message', "Category '".$category->title."' has been updated successfully");
                return redirect(sitePrefix().'portfolio/category');
            }else{
                return back()->withInput($request->input())->withErrors("Error while updating the content");
            }
        }
    }

    public function delete_category(Request $request){
        if(isset($request->id) && $request->id!=NULL){
            $category = PortfolioCategory::find($request->id);
            if($category){
                $deleted = $category->delete();
                if($deleted==true){
                    echo(json_encode(array('status'=>true)));
                }else{
                    echo(json_encode(array('status'=>false,'message'=>'Some error occured,please try after sometime')));
                }
            }else{
                echo(json_encode(array('status'=>false,'message'=>'Model class not found')));
            }
        }else{
            echo(json_encode(array('status'=>false,'message'=>'Empty value submitted')));
        }
    }
}


