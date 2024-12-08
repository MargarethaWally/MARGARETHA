<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\News;


class CategoriesController extends Controller

{
    public function create()
    {
        return view('category.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        DB::table('categories')->insert([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('category.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('category.tampil', ['categories' => $categories]);
    }

    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
            ]);
        return redirect('/categories')->with('success', 'Data berhasil Diedit');
    }

    public function destroy($id)
    {
        if (News::where('category_id', $id)->exists()) {
            return redirect('/categories')->with('error', 'Data tidak dapat dihapus karena masih digunakan di berita.');
        }
        DB::table('categories')->where('id', $id)->delete();
        return redirect('/categories')->with('success', 'Data berhasil Didelete');
    }

    public function show($id)
    {
        $categories = Categories::find($id);
        return view('category.detail', ['categories' => $categories]);
    }
}