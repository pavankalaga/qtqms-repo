<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
            'item_name' ,
            'item_code' ,
            'generic_item_name' ,
            'item_category' ,
            'department' ,
            'machine' ,
            'test_code' ,
            'test_name' ,
            'supplier_name' ,
            'address' ,
            'manufacture' ,
            'hsn_code' ,
            'unit_of_purchase' ,
            'pack_size' ,
            'test' ,
            'unit_price' ,
            'cgst' ,
            'sgst' ,
            'price_gst'];
    protected $table = 'reports';
}
