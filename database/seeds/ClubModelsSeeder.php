<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
            "id"=> 1,
            "name"=> "Barcelona",
            "model_id"=> 108,
            "logo"=> "108.png"
            ],
            [
            "id"=> 2,
            "name"=> "MADRID CHAMARTIN B",
            "model_id"=> 109,
            "logo"=> "109.png"
            ],
            [
            "id"=> 3,
            "name"=> "Liverpool R",
            "model_id"=> 103,
            "logo"=> "103.png"
            ],
            [
            "id"=> 4,
            "name"=> "Manchester B",
            "model_id"=> 173,
            "logo"=> "173.png"
            ],
            [
            "name"=> "FC BAYERN",
            "model_id"=> 127,
            "logo"=> "127.png"
            ],
            [
            "name"=> "PARIS SAINT JERMEY",
            "model_id"=> 114,
            "logo"=> "yRkBkQGzJsktdX8eyHckIlwZKK8rttWl8ad79Yhk.png"
            ],
            [
            "name"=> "NAPOLI",
            "model_id"=> 327,
            "logo"=> "VF2gcgujr9F3w5hNmceTK5QSCQ0SBHGLpYMdCNCd.png"
            ],
            [
            "name"=> "MILAN",
            "model_id"=> 121,
            "logo"=> "rosGFk5tSEBy2gvmv878hWiOA6yhHBXalcf6S4SG.png"
            ]
            ];
        foreach($datas as $data){
            
            DB::table('club_models')->insert([
              'name' => $data['name'], 
              'model_id' => $data['model_id'], 
              'logo' => $data['logo'], 

            ]);
        }
    }
}
