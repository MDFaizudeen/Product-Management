<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)

    {
               
        return new Product([
            'name' => $row['name'],
            'category_id' => $row['category'],
            'price' => $row['price'],
        ]);
        
    }
    public function rules(){
      return [
        'name' => 'required|min:3|max:20',
        'category_id'  =>'required',
        'price'  =>'required'
      ];

    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        
    }
}
