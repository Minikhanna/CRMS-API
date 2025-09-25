<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'name',
        'url',
        'variant_type',
        'product_short_description',
        'product_description',
        'show_in_storefront',
        'attribute_name1','attribute_name2','attribute_name3',
        'attribute_type1','attribute_type2','attribute_type3',
        'category_id',
        'tags',
        'brand',
        'is_returnable',
        'is_featured',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'specificationset_id',
        'specifications',
        'specification_id',
        'specification_value_id',
        'variants',
        'rate',
        'initial_stock',
        'attribute_option_name1', 'attribute_option_name2', 'attribute_option_name3',
        'attribute_option_data1','attribute_option_data2','attribute_option_data3',
        'label_rate',
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
    protected $casts=[
      'tags'=>'array',
       'specifications'=>'array',
       'variants'=>'array',
       'custom_fields' =>'array',
       'package_details' =>'array',
    ];
}
