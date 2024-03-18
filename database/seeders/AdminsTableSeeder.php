<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords = [
            //['id'=>1,'name'=>'Sumon Mitra','slug'=>'sumon-mitra','type'=>'superadmin','vendor_id'=>0,'mobile'=>'01734845200','email'=>'admin@gmail.com','password'=>'$2a$12$y/k2ZsYP0k7wm1b/PvcRo.E.V7vkH2Jg/ZrrYlfuvaNS.2DZeubRa','image'=>'','district'=>'dhaka','position'=>'1','description'=>'','status'=>1],
            ['id'=>2,'name'=>'Test Mitra','slug'=>'test-mitra','type'=>'vendor','vendor_id'=>1,'mobile'=>'01734845200','email'=>'bcompsumon@gmail.com','password'=>'$2a$12$y/k2ZsYP0k7wm1b/PvcRo.E.V7vkH2Jg/ZrrYlfuvaNS.2DZeubRa','image'=>'','district'=>'dhaka','position'=>'1','description'=>'','status'=>1],
        ];
        Admin::insert($adminRecords);
    }
}
