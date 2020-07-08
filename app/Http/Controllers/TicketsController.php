<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Sqits\UserStamps\Tests\Models\User;

class TicketsController extends Controller
{

    public function index(Request $request)
    {
//        $user=auth()->user();
//
//        $tickets=Ticket::where()
        // dd($products);
        return view('dashboard.tickets.index');

    }//end of index


    public function create()
    {
        $users = DB::table('users')->get();
        return view('dashboard.tickets.create', compact('users'));

    }//end of create

    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'required'
        ];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => 'required|unique:product_translations,name'];
            // $rules += [$locale . '.description' => 'required'];

        }//end of  for each

        // $rules += [
        //     'purchase_price' => 'required',
        //     'sale_price' => 'required',
        //     'stock' => 'required',
        // ];

        $request->validate($rules);

        $request_data = $request->all();

        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/product_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if

        Product::create($request_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of store

    public function edit(Product $product)
    {
        $categories = Category::all();
        // dd($product->stock());

        return view('dashboard.products.edit', compact('categories', 'product'));

    }//end of edit

    public function update(Request $request, Product $product)
    {
        $rules = [
            'category_id' => 'required'
        ];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('product_translations', 'name')->ignore($product->id, 'product_id')]];
            //  $rules += [$locale . '.description' => 'required'];

        }//end of  for each

        // $rules += [
        //     'purchase_price' => 'required',
        //     'sale_price' => 'required',
        //     'stock' => 'required',
        // ];

        $request->validate($rules);

        $request_data = $request->all();

        if ($request->image) {

            if ($product->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/product_images/' . $product->image);

            }//end of if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/product_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if

        $product->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of update

    public function destroy(Product $product)
    {
        if ($product->image != 'default.png') {

            Storage::disk('public_uploads')->delete('/product_images/' . $product->image);

        }//end of if

        $product->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of destroy














}//End Of Controller

