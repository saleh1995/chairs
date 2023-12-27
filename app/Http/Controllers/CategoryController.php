<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
      $collection = Category::paginate();

      return view('category.index', compact('collection'));
    }

    public function create(){
      return view('category.create');
    }


    public function store(StoreCategoryRequest $request){
      $item = Category::create([
        'name' => $request->name,
        'color' => $request->color,
      ]);

      return redirect()->route('dashboard.category.index')->with('success', 'تم انشاء السجل بنجاح');
    }

    public function edit($id){
      $item = Category::findOrFail($id);

      return view('category.edit', compact('item'));
    }


    public function update(UpdateCategoryRequest $request, $id){
      $item = Category::findOrFail($id);

      $item->update([
        'name' => $request->name,
        'color' => $request->color,
      ]);

      return redirect()->route('dashboard.category.index')->with('success', 'تم العديل على السجل بنجاح');
    }

    public function show($id){
      $item = Category::findOrFail($id);
      return view('category.show', compact('item'));
    }

    public function destroy($id){
      $item = Category::findOrFail($id);
      $item->delete();
      return redirect()->route('dashboard.category.index')->with('success', 'تم حذف السجل بنجاح');
    }
}
