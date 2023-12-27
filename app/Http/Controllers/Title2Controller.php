<?php

namespace App\Http\Controllers;

use App\Http\Requests\Title2\StoreTitle2Request;
use App\Http\Requests\Title2\UpdateTitle2Request;
use App\Models\Title2;
use Illuminate\Http\Request;

class Title2Controller extends Controller
{
    public function index(){
      $collection = Title2::paginate();

      return view('second-title.index', compact('collection'));
    }

    public function create(){
      return view('second-title.create');
    }


    public function store(StoreTitle2Request $request){
      $item = Title2::create([
        'ar' => ['name' => $request->name_ar],
        'en' => ['name' => $request->name_en],
      ]);

      return redirect()->route('dashboard.second-title.index')->with('success', 'تم انشاء السجل بنجاح');
    }

    public function edit($id){
      $item = Title2::findOrFail($id);

      return view('second-title.edit', compact('item'));
    }


    public function update(UpdateTitle2Request $request, $id){
      $item = Title2::findOrFail($id);

      $item->update([
        'ar' => ['name' => $request->name_ar],
        'en' => ['name' => $request->name_en],
      ]);

      return redirect()->route('dashboard.second-title.index')->with('success', 'تم العديل على السجل بنجاح');
    }

    public function show($id){
      $item = Title2::findOrFail($id);
      return view('second-title.show', compact('item'));
    }

    public function destroy($id){
      $item = Title2::findOrFail($id);
      $item->delete();
      return redirect()->route('dashboard.second-title.index')->with('success', 'تم حذف السجل بنجاح');
    }
}
