<?php

namespace App\Imports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\ToModel;

class ReportsImport implements ToModel
{
    /**
     * Define how each row should be mapped to the `reports` table.
     */
    public function model(array $row)
    {
        // Skip rows that contain headers or invalid data
        if ($row[0] == 'item_name') {
            return null;
        }

        return new Report([
            'item_name'         => $row[0],
            'item_code'         => $row[1],
            'generic_item_name' => $row[2],
            'item_category'     => $row[3],
            'department'        => $row[4],
            'machine'           => $row[5],
            'test_code'         => $row[6],
            'test_name'         => $row[7],
            'supplier_name'     => $row[8],
            'address'           => $row[9],
            'manufacture'       => $row[10],
            'hsn_code'          => $row[11],
            'unit_of_purchase'  => $row[12],
            'pack_size'         => $row[13],
            'test'              => $row[14],
            'unit_price'        => $row[15],
            'cgst'              => $row[16],
            'sgst'              => $row[17],
            'price_gst'         => $row[18],
        ]);
    }
}

