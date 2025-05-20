<?php

namespace App\Exports;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
{
    return Product::select(
            'products.name',
            'categories.name as category_name',
            'products.price',
           
        )
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->get();
}
    public function headings():array
    {
        return [
            'Name',
            'Category',
            'price'    
        ];
    }
}
