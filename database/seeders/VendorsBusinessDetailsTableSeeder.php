<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;
class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorbusnessRecords = [
            ['id'=>1,'vendor_id'=>1,'shop_name'=>'blood_shop','shop_address'=>'dhaka','shop_city'=>'dhaka','shop_state'=>'bangladesh','shop_country'=>'dhaka','shop_mobile'=>'01734845200','shop_email'=>'bcompsumon@gmail.com'],
        ];
        VendorsBusinessDetail::insert($vendorbusnessRecords);
    }
}
