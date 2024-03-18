<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetail;
class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorBankRecords = [
            ['id'=>1,'vendor_id'=>1,'account_holder_name'=>'test_shop','bank_name'=>'dusbangla','account_number'=>'213425712349','confirm_account_number'=>'213425712349','bank_ifsc_code'=>'3245'],
        ];
        VendorsBankDetail::insert($vendorBankRecords);
    }
}
