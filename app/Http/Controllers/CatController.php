<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CatController extends Controller
{
    private $rulse = [
        'name'=> 'required|string|min:3|max:50',
        'desc'=> 'required|string|min:150'
    ];
    public function geatAllCats(){
        $cats=Cat::all();
        $somCats = Cat::paginate(4);
        return view('categories/allCategories',[
            'catsData'=>$cats,
            'somCats'=>$somCats
        ]);
    }

    public function getCatById($id){
        $cats=Cat::all();
        $category=Cat::findorfail($id);
        return view('categories/catbyid',[
            'category'=> $category,
            'catsData'=>$cats
        ]);
    }

    public function createCategory(){
        $cats=Cat::all();
        return view('categories/create',[
            'catsData'=>$cats
        ]);
    }

    public function pushCat(Request $request){

        $Validator= Validator::make($request->all(), $this->rulse);
        $cats=Cat::all();
        if($Validator->fails()){
            
            return redirect(url('/create/category'),[
                'catsData'=>$cats
            ])
            ->withInput()
            ->withErrors($Validator);
        }
        else {
            Cat::create([
                'name'=> $request->name,
                'desc'=> $request->desc
            ]);
            return redirect(url('create/category'),[
                'catsData'=>$cats
            ])
            ->with('status', 'inserted successfuly');
        }
    }

    public function editPage($id){
        $cats=Cat::all();
        $cat = Cat::find($id);
        return view('categories/edit',[
            'catigory'=> $cat,
            'catsData'=>$cats
        ]);
    }

    public function submitEdit($id, Request $request){
        $cats=Cat::all();
        $Validator= Validator::make($request->all(), $this->rulse);
        if($Validator->fails()){
            
            return redirect(url('/create/category'),[
                'catsData'=>$cats
            ])
            ->withInput()
            ->withErrors($Validator);
        }
        else {
            Cat::findorfail($id)->update([
                'name'=> $request->name,
                'desc'=> $request->desc
            ]);
            return redirect(url('AllCategories'),[
                'catsData'=>$cats
            ])->with('status', "$request->name category Updated successfuly");
        }
    }

    public function deleteCat($id, Request $request){
        Cat::findorfail($id)->delete();
        return redirect(url('AllCategories'))->with('status', "$request->name category Deleted successfuly");
    }

    public function search(Request $request){
        $cats=Cat::all();
        $keyword = $request->keyword;
        $categories = Cat::where('name','like',"%$keyword%")->paginate(4);
        return view('categories/search',[
            'categories'=> $categories,
            'catsData'=>$cats,
            'keyword'=> $keyword
        ]);
    }
}
