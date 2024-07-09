<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request)
    {
        $data = new Category;
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Category Added Successfully');
        return redirect()->back();

    }
    public function delete_category($id)
    {
        $data=Category::find($id);
        $data->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Category Deleted Successfully');
        return redirect()->back();
    }
    public function update_category($id)
    {
        $data=Category::find($id);
        return view('admin.edit_category',compact('data'));

    }
    public function edit_category(Request $request,$id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Category Updated Successfully');
        return redirect('/view_category');
    }
    public function add_product(Request $request)
    {
        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }
    public function upload_product(Request $request)
    {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->quantity = $request->quantity;

        $image = $request->image;
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Product Added Successfully');
        return redirect()->back();

    }
    public function view_product()
    {
        $product = Product::paginate(3);
        return view('admin.view_product',compact('product'));
    }
    public function delete_product($id)
    {
        $product = Product::find($id);
        $image_path = public_path('products/'.$product->image);
        if (file_exists($image_path)) {
           unlink($image_path);
        }
        $product->delete();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Product Deleted Successfully');
        return redirect()->back();
    }
    public function update_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.update_product',compact('product','category'));

    }
    public function edit_product(Request $request, $id)
    {
        $product_data = Product::find($id);
        $product_data->title = $request->title;
        $product_data->description = $request->description;
        $product_data->price = $request->price;
        $product_data->category = $request->category;
        $product_data->quantity = $request->quantity;

        $image = $request->image;
        if ($image) {
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$image_name);
            $product_data->image = $image_name;
        }
        $product_data->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Product Updated Successfully');
        return redirect('/view_product');
    }
    public function search_product(Request $request)
    {
        $search_data = $request->search;

        $product = Product::where('title','LIKE','%'.$search_data.'%')->orWhere('category','LIKE','%'.$search_data.'%')->paginate(3);
        return view('admin.view_product',compact('product'));

    }
    public function view_orders()
    {
        $order = Order::all();
        return view('admin.view_orders',compact('order'));
    }
    public function on_the_way($id)
    {
        $data=Order::find($id);
        $data->status = 'On the Way';
        $data->save();
        return redirect('/view_orders');
    }
    public function delivered($id)
    {
        $data =  Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        return redirect('/view_orders');
    }
    public function print_pdf($id)
    {
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
