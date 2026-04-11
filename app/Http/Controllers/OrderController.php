<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $search = $request->search;

        if ($search == null) {
            $order = Order::with(['user'])->paginate(5);
        } else {
            $order = Order::with(['user'])
                ->where(function ($query) use ($search) {
                    $query->where('status', 'like', "%$search%")
                        ->orWhere('total_amount', 'like', "%$search%");
                })
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                })
                ->paginate(5);
        }
        return view('admin_order', ['order' => $order]);
    }

    public function showForm()
    {
        $order = Order::get();
        $users = User::get();

        return view('addorder', ['order' => $order, 'users' => $users]);
    }

    public function create(Request $request)
    {
        Order::create([
            'user_id' => $request->name,
            'status' => $request->status,
            'total_amount' => $request->total_amount,
            'created_at' => now()
        ]);
        return redirect()->route('admin.order')->with('success', 'Order created successfully!');
    }

    public function editorder(string $id)
    {
        $order = Order::where('id', $id)->first();
        $users = User::get();

        return view('editorder', ['data' => $order, 'users' => $users]);
    }

    public function updateorder(Request $request)
    {
        // dd($request->id);
        $order = Order::where('id', $request->id)
            ->update([
                'user_id' => $request->name,
                'status' => $request->status,
                'total_amount' => $request->total_amount,
                'updated_at' => now()
            ]);
        return redirect()->route('admin.order')->with('success', 'User updated successfully!');
    }

    public function deleteorder($id)
    {
        // dd($id);
        $order = Order::where('id', $id)
            ->delete();
        return redirect()->route('admin.order')->with('success', 'Order deleted successfully!');
    }
}
