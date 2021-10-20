<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CatController extends Controller
{
    private $rulse = [
        'name' => 'required|string|min:3|max:50',
        'desc' => 'required|string|min:10',
        'img'=> 'image|required|mimes:jpeg,jpg,png,gif|max:10000'
    ];
    public function geatAllCats()
    {
        $cats = Cat::all();
        $somCats = Cat::paginate(4);
        return view('categories/allCategories', [
            'catsData' => $cats,
            'somCats' => $somCats
        ]);
    }

    public function getCatById($id)
    {
        $cats = Cat::all();
        $category = Cat::findorfail($id);
        return view('categories/catbyid', [
            'category' => $category,
            'catsData' => $cats
        ]);
    }

    public function createCategory()
    {
        $cats = Cat::all();
        return view('categories/create', [
            'catsData' => $cats
        ]);
    }

    public function pushCat(Request $request)
    {

        $Validator = Validator::make($request->all(), $this->rulse);
        if ($Validator->fails()) {

            return redirect(url('/create/category'))
                ->withInput()
                ->withErrors($Validator);
        } else {
            $filPath = Storage::putFile('catigories', $request->img);
            Cat::create([
                'name' => $request->name,
                'desc' => $request->desc,
                'img' => $filPath
            ]);
            return redirect(url('create/category'))
                ->with('status', 'inserted successfuly');
        }
    }

    public function editPage($id)
    {
        $cats = Cat::all();
        $cat = Cat::find($id);
        return view('categories/edit', [
            'catigory' => $cat,
            'catsData' => $cats
        ]);
    }

    public function submitEdit(Request $request, $id)
    {
        $Validator = Validator::make($request->all(), $this->rulse);
        if ($Validator->fails()) {
            
            return redirect(url('/create/category'))
            ->withInput()
            ->withErrors($Validator);
        } else {
            $cat = Cat::findorfail($id);
            $imgPath = $cat->img;
            $deletePath = $cat->img;
            if($request->hasFile('img')){
                $imgPath = Storage::putFile('catigories', $request->img);
                Storage::delete($deletePath);;
            }
            $cat->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'img' => $imgPath
            ]);
            return redirect(url()->previous())
            ->with('status', "$request->name category Updated successfuly");
        }
    }

    public function deleteCat($id, Request $request)
    {
        $cat = Cat::findorfail($id);
        Storage::delete($cat->img);
        $cat->delete();
        return redirect(url('AllCategories'))->with('status', "$request->name category Deleted successfuly");
    }

    public function search(Request $request)
    {
        $cats = Cat::all();
        $keyword = $request->keyword;
        $categories = Cat::where('name', 'like', "%$keyword%")->paginate(4);
        return view('categories/search', [
            'categories' => $categories,
            'catsData' => $cats,
            'keyword' => $keyword
        ]);
    }
}
