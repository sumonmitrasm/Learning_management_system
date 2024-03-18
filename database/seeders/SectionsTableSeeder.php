<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectionRecords = [
            ['id'=>1,'name'=>'Clothing','status'=>1],
            ['id'=>2,'name'=>'Electronics','status'=>1],
            ['id'=>3,'name'=>'Appliances','status'=>1],
            ['id'=>4,'name'=>'Mobile','status'=>1],
            ['id'=>5,'name'=>'Newspaper','status'=>1],
            ['id'=>6,'name'=>'Pathway','status'=>1],
            ['id'=>7,'name'=>'Given short time to complete CRUD_
            It is persecution','status'=>1],
        ];
        Section::insert($sectionRecords);
    }
}
