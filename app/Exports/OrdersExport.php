<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::with('orderItems.product')->get();
    }

    // Define headings for the export
    public function headings(): array
    {
        return [
            'Order ID',
            'Customer Name',
            'Product Name',
            'Price',
            'Quantity',
            'Total'
        ];
    }

    // Map data for each row
    public function map($order): array
    {
        $rows = [];
        foreach ($order->orderItems as $orderItem) {
            $rows[] = [
                'Order ID' => $order->id,
                'Customer Name' => $order->user->name,
                'Product Name' => $orderItem->product->name,
                'Price' => $orderItem->price,
                'Quantity' => $orderItem->quantity,
                'Total' => $orderItem->price * $orderItem->quantity,
            ];
        }
        return $rows;
    }
}
