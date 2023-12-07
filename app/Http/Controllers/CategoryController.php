<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Language;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
class CategoryController extends Controller
{
  protected $active_lang = 'en';
    public function index()
    {
        $cat = Category::with(['cat_translation' => function($query){
          $query->where('language_code', App::getLocale());
        }])->get();
        return view('category.index', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_languages = Language::where('status', '1')->orderBy('id', 'asc')->get();
        $active_lang = $this->active_lang;
        return view('category.add_category', compact('all_languages', 'active_lang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name.*' => 'required',
            'descr.*' => 'required',
        ]);

        $name = $request->name;
        $descr = $request->descr;

      DB::beginTransaction();
      try {
        $create = Category::create();
        $last_id = $create->id;
        foreach($name as $key=>$value){
          CategoryTranslation::create([
            'category_id' => $last_id,
            'language_code' => $key,
            'name' => $name[$key],
            'descr' => $descr[$key],
          ]);
        }
        DB::commit();

        return redirect()->route('categories.index')->withSuccess(trans('site.cat.add_success'));
      } catch (\Throwable $th) {
        DB::rollBack();
        return back()->withError(trans('site.cat.add_error'))->withInput();
      }

   }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Category::with('cat_translation')->find($id);
        $active_lang = $this->active_lang;
        $all_languages = Language::where('status', '1')->orderBy('id', 'asc')->get();
        foreach ( $edit->cat_translation as $row ) {
          $edit_name[ $row->language_code ] = $row->name;
          $edit_descr[ $row->language_code ] = $row->descr;
         
      }

        return view('category.add_category', compact('edit','edit_name','edit_descr', 'active_lang', 'all_languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $request->validate([
        'name.*' => 'required',
        'descr.*' => 'required',
    ]);

    $name = $request->name;
    $descr = $request->descr;

  DB::beginTransaction();
  try {
   
    foreach($name as $key=>$value){
      CategoryTranslation::updateOrCreate(
        [
        'category_id' => $id,
        'language_code' => $key,
        ],
        [
        'name' => $name[$key],
        'descr' => $descr[$key],
        ]
      );
    }
    DB::commit();

    return redirect()->route('categories.index')->withSuccess(trans('site.cat.update_success'));
  } catch (\Throwable $th) {
    DB::rollBack();
    return back()->withError(trans('site.cat.update_error'))->withInput();
  }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
