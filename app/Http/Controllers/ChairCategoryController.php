<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChairCategory\StoreChairCategoryRequest;
use App\Http\Requests\ChairCategory\UpdateChairCategoryRequest;
use App\Models\ChairCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChairCategoryController extends Controller
{
    public function index()
    {
        $collection = ChairCategory::paginate();

        return view('chair-category.index', compact('collection'));
    }

    public function create()
    {
        return view('chair-category.create');
    }


    public function store(StoreChairCategoryRequest $request)
    {
        $item = ChairCategory::create([
            'name' => $request->name,
            'color' => $request->color,
            'text_color' => $request->text_color,
            'image' => $request->image->store('chair-category', 'public'),
        ]);

        return redirect()->route('dashboard.chair-category.index')->with('success', 'تم انشاء السجل بنجاح');
    }

    public function edit($id)
    {
        $item = ChairCategory::findOrFail($id);

        return view('chair-category.edit', compact('item'));
    }


    public function update(UpdateChairCategoryRequest $request, $id)
    {
        $item = ChairCategory::findOrFail($id);

        if ($item->image && Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }

        $item->update([
            'name' => $request->name,
            'color' => $request->color,
            'text_color' => $request->text_color,
            'image' => $request->image ? $request->image->store('chair-category', 'public') : $item->image,
        ]);

        return redirect()->route('dashboard.chair-category.index')->with('success', 'تم العديل على السجل بنجاح');
    }

    public function show($id)
    {
        $item = ChairCategory::findOrFail($id);
        return view('chair-category.show', compact('item'));
    }

    public function destroy($id)
    {
        $item = ChairCategory::findOrFail($id);
        if ($item->image && Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();
        return redirect()->route('dashboard.chair-category.index')->with('success', 'تم حذف السجل بنجاح');
    }
}
