<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->map(function ($product) {
            $product->images = $product->images ? [$product->images[0]] : [];
            return $product;
        });
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required|string',
            'price' => 'required|numeric',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $images[] = $path;
            }
        }

        $product = Product::create([
            'description' => $request->description,
            'price' => $request->price,
            'images' => $images,
        ]);

        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required|string',
            'price' => 'required|numeric',
            'newImages' => 'array',
            'newImages.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'deletedImages' => 'array',
            'deletedImages.*' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::findOrFail($id);

        // Handle deleted images
        $deletedImages = $request->input('deletedImages', []);
        $images = $product->images;
        foreach ($deletedImages as $image) {
            // Delete the image file from storage
            Storage::disk('public')->delete($image);
            // Remove the image from the images array
            if (($key = array_search($image, $images)) !== false) {
                unset($images[$key]);
            }
        }

        //return response()->json($images);

        // Handle new images
        if ($request->hasFile('newImages')) {
            foreach ($request->file('newImages') as $image) {
                $path = $image->store('images', 'public');
                $images[] = $path;
            }
        }

        // Reindex the images array
        $images = array_values($images);

        $product->update([
            'description' => $request->description,
            'price' => $request->price,
            'images' => $images,
        ]);

        return response()->json($product);
    }
}
