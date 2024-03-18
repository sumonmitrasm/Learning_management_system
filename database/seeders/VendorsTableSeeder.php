<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;
class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorRecords = [
            ['id'=>1,'name'=>'Test Mitra','address'=>'satkhira','city'=>'dhaka','state'=>'dhaka','country'=>'bangladesh','pincode'=>'9400','mobile'=>'01734845200','email'=>'bcompsumon@gmail.com','status'=>1],
        ];
        Vendor::insert($vendorRecords);
    }
}
