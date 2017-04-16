<?php

use Illuminate\Database\Seeder;

class ProducerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("producers")->insert(array(
            array("name" => str_random(14) , "slug" => "dell"),
            array("name" => str_random(14) , "slug" => "hp"),
            array("name" => str_random(14) , "slug" => "hp"),
            array("name" => str_random(14) , "slug" => "hp"),
            array("name" => str_random(14) , "slug" => "hp"),
            array("name" => str_random(14) , "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
            array("name" => str_random(10)."1", "slug" => "hp"),
           
        ));
    }
}
