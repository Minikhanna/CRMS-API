<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = [
        'product_id',
        'rate',
        'initial_stock',
        'tags',
        'attribute_option_name1', 
        'attribute_option_name2', 
        'attribute_option_name3',
        'attribute_option_data1',
        'attribute_option_data2',
        'attribute_option_data3',
        'label_rate',
        'document_ids',
        'sku',
        'custom_fields',
        'customfield_id',
        'value',
        'reorder_level',
        'package_details',
        'height',
        'weight',
        'length',
        'width', 
        'ean',
        'upc',
        'isbn',
        'part_number',
        'hsn_or_sac',
        'avatax_tax_code',
    ];
     protected $casts =[
        'document_ids'=>'array',
        'custom_fields'=>'array',
        'package_details'=>'array',
     ];
}
