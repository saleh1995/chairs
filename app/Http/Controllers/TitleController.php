<?php

namespace App\Http\Controllers;

use App\Http\Requests\Title\StoreTitleRequest;
use App\Http\Requests\Title\UpdateTitleRequest;
use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    public function index(){
      $collection = Title::paginate();

      return view('first-title.index', compact('collection'));
    }

    public function create(){
      return view('first-title.create');
    }


    public function store(StoreTitleRequest $request){
      $item = Title::create([
        'ar' => ['name' => $request->name_ar],
        'en' => ['name' => $request->name_en],
      ]);

      return redirect()->route('dashboard.first-title.index')->with('success', 'تم انشاء السجل بنجاح');
    }

    public function edit($id){
      $item = Title::findOrFail($id);

      return view('first-title.edit', compact('item'));
    }


    public function update(UpdateTitleRequest $request, $id){
      $item = Title::findOrFail($id);

      $item->update([
        'ar' => ['name' => $request->name_ar],
        'en' => ['name' => $request->name_en],
      ]);

      return redirect()->route('dashboard.first-title.index')->with('success', 'تم العديل على السجل بنجاح');
    }

    public function show($id){
      $item = Title::findOrFail($id);
      return view('first-title.show', compact('item'));
    }

    public function destroy($id){
      $item = Title::findOrFail($id);
      $item->delete();
      return redirect()->route('dashboard.first-title.index')->with('success', 'تم حذف السجل بنجاح');
    }
}
