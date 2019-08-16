<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $products;

    public function __construct()
    {
        $this->products = Product::all('id', 'title', 'is_available');
    }

    public function headings(): array
    {
        return [
            'ID продукта',
            'Название продукта',
            'Наличие',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->products;
    }
}
