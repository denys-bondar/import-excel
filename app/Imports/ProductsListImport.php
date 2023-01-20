<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class ProductsListImport implements ToModel, WithChunkReading, WithStartRow, ShouldQueue
{
    use Importable;

    private $rows = 0;

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $categoryParent = Category::query()
            ->create([
                'name' => ($row[0] ? $row[0] : $row[1]),
            ]);

        $categoryChild = Category::query()
            ->create([
                'name' => ($row[1] ?? $row[1]),
                'parent_id' => $categoryParent->id,
            ]);

        $categoryGrandChild = Category::query()
            ->create([
                'name' => ($row[2] ?? $row[2]),
                'parent_id' => $categoryChild->id,
            ]);


//        $products = Product::query()
//            ->firstOrCreate(
//                [
//                    'article' => $row[5]
//                ],
//                [
//                    'brand' => $row[3],
//                    'name' => $row[4],
//                    'article' => $row[2],
//                    'description' => $row[6],
//                    'price' => $row[7],
//                    'guarantee' => ((int)$row[8] ??  $row[8]),
//                    'availability' => $row[9],
//                    'category_id' => $categoryGrandChild->id ? $categoryGrandChild->id : $categoryChild->id ,
//                ]
//            );

    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}
