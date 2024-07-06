<?php

namespace App\Http\Controllers;

// import model product
use App\Models\Product;

// import return type View
use Illuminate\View\View;

// import return type redirectResponse
use Illuminate\Http\RedirectResponse;

// import Http Request
use Illuminate\Http\Request;

// import Facades Storage
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * index - display a listing of the resource.
     *
     * @return void
     */
    public function index(): View
    {
        // jumlah data yang ditampilkan per paginasi halaman
        $max_data = 5;
        // breadcrumb
        $breadcrumb = "Data";

        if (request('search')) {
            // menampilkan pencarian data
            $products = Product::where('title', 'like', '%' . request('search') . '%')->paginate($max_data)->withQueryString();
        } else {
            // menampilkan semua data
            $products = Product::latest()->paginate($max_data);
        }

        // tampilkan data ke view
        return view('products.index', compact('products', 'breadcrumb'));
    }

    /**
     * create - show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        // breadcrumb
        $breadcrumb = "Add";

        // tampilkan form add data
        return view('products.create', compact('breadcrumb'));
    }

    /**
     * store - store a newly created resource in storage.
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // validasi form
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'category'    => 'required',
            'price'       => 'required|numeric',
            'image'       => 'required|image|mimes: jpeg,jpg,png|max:1024'
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        // create data
        Product::create([
            'title'       => $request->title,
            'description' => $request->description,
            'category'    => $request->category,
            'price'       => $request->price,
            'image'       => $image->hashName()
        ]);

        // redirect ke halaman index dan tampilkan pesan berhasil simpan data
        return redirect()->route('products.index')->with(['success' => 'The new product has been saved.']);
    }

    /**
     * show - display the specified resource.
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        // get data by ID
        $product = Product::findOrFail($id);
        // breadcrumb
        $breadcrumb = "Detail";

        // tampilkan form detail data
        return view('products.show', compact('product', 'breadcrumb'));
    }

    /**
     * edit - show the form for editing the specified resource.
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        // get data by ID
        $product = Product::findOrFail($id);
        // breadcrumb
        $breadcrumb = "Edit";

        // tampilkan form edit data
        return view('products.edit', compact('product', 'breadcrumb'));
    }

    /**
     * update - update the specified resource in storage.
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // validasi form
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'category'    => 'required',
            'price'       => 'required|numeric',
            'image'       => 'image|mimes: jpeg,jpg,png|max:1024'
        ]);

        // get data by ID
        $product = Product::findOrFail($id);

        // cek jika image diubah
        if ($request->hasFile('image')) {
            // upload image baru
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

            // delete image lama
            Storage::delete('public/products/' . $product->image);

            // update data
            $product->update([
                'title'       => $request->title,
                'description' => $request->description,
                'category'    => $request->category,
                'price'       => $request->price,
                'image'       => $image->hashName()
            ]);
        }
        // jika image tidak diubah
        else {
            // update data
            $product->update([
                'title'       => $request->title,
                'description' => $request->description,
                'category'    => $request->category,
                'price'       => $request->price
            ]);
        }

        // redirect ke halaman index dan tampilkan pesan berhasil ubah data
        return redirect()->route('products.index')->with(['success' => 'The product has been updated!']);
    }

    /**
     * destroy - remove the specified resource from storage.
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        // get data by ID
        $product = Product::findOrFail($id);

        // delete image
        Storage::delete('public/products/' . $product->image);

        // delete data
        $product->delete();

        // redirect ke halaman index dan tampilkan pesan berhasil hapus data
        return redirect()->route('products.index')->with(['success' => 'The product has been deleted!']);
    }
}