<?php

namespace App\Http\Controllers;

use App\Exports\OrderItemsExport;
use App\Exports\OrdersExport;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class CartController extends Controller
{
    public function addToCart()
    {
        $items = CartItem::where('user_id',  Auth::user()->id)->get();
        return view('pages.Products.productcart', compact('items'));
    }

    public function cartitem(Request $request)
    {
        $productId = $request->input('product_id');
        $cartItem = CartItem::firstOrNew([
            'user_id' =>  Auth::user()->id,
            'product_id' => $productId,
        ]);
        $cartItem->quantity = ($cartItem->exists ? $cartItem->quantity + 1 : 1);
        $cartItem->save();
        return redirect()->route('cart.add');
    }

    public function update(Request $request, $id)
    {
        $item = CartItem::with('product')->findOrFail($id);
        $action = $request->input('action');

        if ($action === 'increase') {
            $item->quantity += 1;
        } elseif ($action === 'decrease' && $item->quantity > 1) {
            $item->quantity -= 1;
        }
        $item->save();

        //caculate total
        $itemTotal = $item->quantity * $item->product->price;
        $grandTotal = CartItem::with('product')->get()->reduce(function ($carry, $cartItem) {
            return $carry + ($cartItem->quantity * $cartItem->product->price);
        }, 0);


        return response()->json([
            'success' => true,
            'quantity' => $item->quantity,
            'itemTotal' => $itemTotal,
            'grandTotal' => $grandTotal
        ]);

        // return back()->with('success', 'Cart updated!');
    }

    public function view()
    {
        $items = CartItem::with('product')->where('user_id', Auth::id())->get();

        return view('pages.Products.productcart', compact('items'));
    }
    public function placeOrder()
    {

        // $items = CartItem::with('product')->where('user_id', Auth::id())->get();
        $items = CartItem::where('user_id', Auth::id())->get();
        $totalPrice = $items->sum(function ($item) {

            return $item->product->price * $item->quantity;
        });

        $orders = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,

        ]);


        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $orders->id,
                'product_id'  => $item->product_id,
                'quantity'    => $item->quantity,
                'price' => $item->product->price,
            ]);
        }
        //  dd($item->product->price );
        // $orders = Order::with('product')->where('user_id', Auth::id())->get();

        session()->flash('success', 'Your products have been ordered');
        return view('pages.Products.orderlist', compact('orders'));
    }


    // public function orderlist(){

    //     $orders = Order::with('orderItems.product')->where('user_id', Auth::id())->get();

    //     return view('pages.Products.orderlist', compact('orders'));
    // }

    public function adminOrderHistory(Request $request)
    {
        $query = Order::with('user', 'orderItems.product');

        if ($request->filled('customer')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->customer . '%');
            });
        }

        // $orders = $query->get();
        $orders = $query->paginate(5)->appends($request->all());
        return view('pages.admin.orders', compact('orders'));
    }
    public function destroy($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();
        return redirect()->route('cart.add');
    }
    public function showForm()
    {
        dd('hi');
        return view('orderform');  
    }
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'pin_code' => 'required|string',
            'state'=>   'required|string',

        ]);
        $items = CartItem::where('user_id', Auth::id())->get();
        $totalPrice = $items->sum(function ($item) {

            return $item->product->price * $item->quantity;
        });

        $order = Order::create([
            'user_id' => Auth::id(), 
            'total_price' => $totalPrice,
            'address' => $request->address,
            'city' => $request->city,
            'pin_code' => $request->pin_code,
            'state'=> $request->state,
            'status' => 'pending',
        ]);

        return redirect()->route('order.status', $order->id);
    }

    // View order status
    public function showStatus($id)
    {
        $order = Order::findOrFail($id);
        return view('order_status', compact('order'));
    }

    // Admin update order status
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('order.status', $order->id);
    }
}
