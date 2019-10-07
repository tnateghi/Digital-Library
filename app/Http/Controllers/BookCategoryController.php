<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BookCategory::all();
        return view('admin.book.categories', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:book_categories,name',
        ], [
            'name.required' => 'لطفا نام دسته بندی را وارد کنید',
            'name.unique' => 'دسته بندی وارد شده از قبل وجود دارد',
        ]);

        BookCategory::create([
            'name' => $request->input('name'),
        ]);

        session()->flash('message', 'عملیات با موفقیت انجام شد');
        return redirect(route('book-categories.index'));
    }

    public function destroy(Request $request)
    {
        $this->validate($request, [
            'delete-category' => 'required|exists:book_categories,id',
            'replace-category' => 'required|exists:book_categories,id|different:delete-category',
        ], [
            'delete-category.required' => 'لطفا دسته بندی برای حذف را انتخاب کنید',
            'delete-category.exists' => 'دسته بندی وارد شده برای حذف موجود نیست',
            'replace-category.required' => 'لطفا دسته بندی جایگزین را انتخاب کنید',
            'replace-category.exists' => 'دسته بندی جایگزین وارد شده موجود نیست',
            'replace-category.different' => 'دسته بندی جایگزین نباید با دسته بندی انتخاب شده برای حذف یکی باشد',
        ]);

        Book::where('category_id', $request->input('delete-category'))->update([
            'category_id' => $request->input('replace-category'),
        ]);

        BookCategory::find($request->input('delete-category'))->delete();

        session()->flash('message', 'عملیات با موفقیت انجام شد');
        return redirect(route('book-categories.index'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'update-category' => 'required|exists:book_categories,id',
            'update-category-name' => 'required|unique:book_categories,name',
        ], [
            'update-category.required' => 'لطفا دسته بندی برای ویرایش را انتخاب کنید',
            'update-category.exists' => 'دسته بندی وارد شده برای ویرایش موجود نیست',
            'update-category-name.required' => 'لطفا نام جدید دسته بندی را انتخاب کنید',
            'update-category-name.unique' => 'نام دسته بندی وارد شده از قبل وجود دارد',
        ]);

        BookCategory::find($request->input('update-category'))->update([
            'name' => $request->input('update-category-name'),
        ]);

        session()->flash('message', 'عملیات با موفقیت انجام شد');
        return redirect(route('book-categories.index'));
    }
}
