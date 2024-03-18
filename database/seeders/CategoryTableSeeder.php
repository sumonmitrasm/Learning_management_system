<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryRecords = [
            ['id'=>1,'parent_id'=>0,'section_id'=>1,'category_name'=>'Men','description'=>'','url'=>'test1','url_structure'=>'test1','heading_tag'=>'test1','schema_markup'=>'test1','meta_title'=>'test1','meta_data'=>'test1','meta_description'=>'test1','meta_keywords'=>'test1','meta_robot'=>'test1','status'=>1],
            ['id'=>2,'parent_id'=>0,'section_id'=>2,'category_name'=>'Women','description'=>'','url'=>'test1','url_structure'=>'test1','heading_tag'=>'test1','schema_markup'=>'test1','meta_title'=>'test1','meta_data'=>'test1','meta_description'=>'test1','meta_keywords'=>'test1','meta_robot'=>'test1','status'=>1],
            ['id'=>3,'parent_id'=>0,'section_id'=>1,'category_name'=>'Kids','description'=>'','url'=>'test1','url_structure'=>'test1','heading_tag'=>'test1','schema_markup'=>'test1','meta_title'=>'test1','meta_data'=>'test1','meta_description'=>'test1','meta_keywords'=>'test1','meta_robot'=>'test1','status'=>1]
        ];
        Category::insert($categoryRecords);
    }
}
