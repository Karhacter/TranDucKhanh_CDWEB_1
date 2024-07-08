<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        if (count($orders) == 0) {
            $result = [
                "status" => false,
                "message" => "Không tìm thấy dữ liệu",
                "orders" => null
            ];
        } else {
            $result = [
                "status" => true,
                "message" => "Tải dữ liệu thành công",
                "orders" => $orders
            ];
        }

        return view('backend.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Order::find($id);
        if ($row == null) {
            return redirect()->route('admin.order.index');
        }

        $orderdetails = Orderdetail::where('order_id', $row->id)->get();
        $user = User::find($row->user_id);

        $totalAmount = 0;
        $products = [];
        foreach ($orderdetails as $orderdetail) {
            $product = Product::find($orderdetail->product_id);
            if ($product) {
                $product->qty = $orderdetail->qty; // Assign the quantity to the product
                $products[] = $product;
                $totalAmount += $orderdetail->qty * $product->price; // Update calculation to use qty
            }
        }

        return view('backend.order.show', compact('row', 'user', 'products', 'orderdetails', 'totalAmount'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Order::find($id);
        if ($row == null) {
            return redirect()->route('admin.order.index');
        }

        $orderdetails = Orderdetail::where('order_id', '=', $row->id)->get();
        $user = User::find($row->user_id);

        return view('backend.order.edit', compact('row', 'orderdetails', 'user'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Order::find($id);
        if ($row == null) {
            return redirect()->route('admin.order.index');
        }

        $row->delivery_name = $request->delivery_name;
        $row->delivery_gender = $request->delivery_gender;
        $row->delivery_phone = $request->delivery_phone;
        $row->delivery_email = $request->delivery_email;
        $row->delivery_address = $request->delivery_address;
        $row->note = $request->note;
        $row->type = $request->type;
        $row->status = $request->status;
        $row->save();

        if ($request->has('orderdetails')) {
            foreach ($request->orderdetails as $orderdetail) {
                if (isset($orderdetail['id'])) {
                    $orderDetailRow = Orderdetail::find($orderdetail['id']);
                    if ($orderDetailRow) {
                        $orderDetailRow->qty = $orderdetail['qty'];
                        $orderDetailRow->save();
                    }
                }
            }
        }

        return redirect()->route('admin.order.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi Thành Công']);
    }






    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $row = Order::find($id);
        if ($row == null) {
            return redirect()->route('admin.category.index');
        }
        $row->delete();
        return redirect()->route('admin.order.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa thành công']);
    }
    public function status(string $id)
    {
        //
        $row = Order::find($id);
        if ($row == null) {
            return redirect()->route('admin.order.index');
        }
        $row->status = ($row->status == 2) ? 1 : 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.order.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi thành công']);
    }
    public function trash()
    {
        //
        $orders = Order::where('status', '=', 0)->orderBy('created_at', 'desc')
            ->get();
        return view('backend.order.trash', compact('orders'));
    }
    public function restore(string $id)
    {
        //
        $row = Order::find($id);
        if ($row == null) {
            return redirect()->route('admin.order.index');
        }
        $row->status = 2;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        if (count(Order::where('status', '==', 0)->get()) < 1) {
            return redirect()->route('admin.order.index')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thanh cong']);
        } else {
            return redirect()->route('admin.order.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);
        }
    }
    public function delete(string $id)
    {
        //
        $row = Order::find($id);
        if ($row == null) {
            return redirect()->route('admin.order.index');
        }
        $row->status = 0;
        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by = Auth::id() ?? 1;
        $row->save();
        return redirect()->route('admin.order.index')->with('message', ['type' => 'warning', 'msg' => 'Xóa thành công']);
    }
}
