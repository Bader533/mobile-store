<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Product;
use App\Traits\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    use image;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('Read-Products')) {
            abort(403);
        } else {

            $products = Product::orderBy('id', 'desc')->paginate(10);
            $logtrack =  Helper::logTracking('show all product');
            return view('dashboard.product.index', ['products' => $products]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('Create-Product')) {
            abort(403);
        } else {

            $logtrack =  Helper::logTracking('open create product page');
            return view('dashboard.product.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('Create-Product')) {
            abort(403);
        } else {

            $validator = Validator($request->all(), [
                'name' => 'required | string | min:3 | max:40',
                'name_ar' => 'required | string | min:3 | max:40',
                // 'serial_number' => 'required | numeric | digits:10 | unique:products,serial_number',
                'price' => 'required | numeric',
                'note' => 'required | string ',
                'avatar' => 'required | mimes:jpg,png,jpeg',
            ]);
            if (!$validator->fails()) {
                $product = new Product();
                $product->name_en = $request->input('name');
                $product->name_ar = $request->input('name_ar');
                // $product->serial_number = $request->input('serial_number');
                $product->price = $request->input('price');
                $product->note = $request->input('note');
                $isSaved = $product->save();
                //images
                if ($request->hasFile('avatar')) {
                    $this->saveImage($request->avatar, 'images/product', $product);
                }
                $logtrack =  Helper::logTracking('store new product :' . $product->name);

                return response()->json(['message' => $isSaved ? 'Saved successfully' : 'Failed to save'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if (!Gate::allows('Update-Product')) {
            abort(403);
        } else {

            $logtrack =  Helper::logTracking('show edit product page');
            return view('dashboard.product.edit', ['product' => $product]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if (!Gate::allows('Update-Product')) {
            abort(403);
        } else {

            $validator = Validator($request->all(), [
                'name' => 'required | string | min:3 | max:40',
                'name_ar' => 'required | string | min:3 | max:40',
                // 'serial_number' => 'required | numeric | digits:10 | unique:products,serial_number,' . $product->id,
                'price' => 'required | numeric',
                'note' => 'required | string ',
                // 'avatar' => 'required | mimes:jpg,png,jpeg',
            ]);
            if (!$validator->fails()) {
                $product->name_en = $request->input('name');
                $product->name_ar = $request->input('name_ar');
                // $product->serial_number = $request->input('serial_number');
                $product->price = $request->input('price');
                $product->note = $request->input('note');
                $isSaved = $product->save();
                //images
                if ($request->hasFile('avatar')) {
                    $product->images[0]->delete();
                    $this->saveImage($request->avatar, 'images/product', $product);
                }
                $logtrack =  Helper::logTracking('update product : ' . $product->name);
                return response()->json(['message' => $isSaved ? 'Updated successfully' : 'Failed to update'], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    // advanced search on products
    public function search(Request $request)
    {
        if (!Gate::allows('Read-Products')) {
            abort(403);
        } else {
            $query = $request->get('search');
            $products = Product::where('name_en', 'like', '%' . $query . '%')
                ->orWhere('name_ar', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')->get();
            return view('dashboard.product.search', ['products' => $products]);
        }
    }
}
