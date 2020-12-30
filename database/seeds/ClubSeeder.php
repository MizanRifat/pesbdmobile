<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clubs = [
            [
            "id"=> 1,
            "name"=> "FC RED RANGERS",
            "slug"=> "fcredrangers",
            "owner_user_id"=> 1,
            "model_id"=> 4,
            "owner_id"=> "888-888-999",
            "approved"=> 1,
            "created_at"=> "2020-08-03T21=>21=>27.000000Z",
            "updated_at"=> "2020-10-19T05=>57=>30.000000Z"
            ],
            [
            "id"=> 2,
            "name"=> "FC BARCELONA",
            "slug"=> "fcbarcelona",
            "owner_user_id"=> 2,
            "model_id"=> 1,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 3,
            "name"=> "REAL MADRID",
            "slug"=> "realmadrid",
            "owner_user_id"=> 3,
            "model_id"=> 3,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 4,
            "name"=> "Valencia",
            "slug"=> "valencia",
            "owner_user_id"=> 4,
            "model_id"=> 1,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 5,
            "name"=> "Atletico Madrid",
            "slug"=> "atleticomadrid",
            "owner_user_id"=> 5,
            "model_id"=> 4,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 6,
            "name"=> "Athletic Bilbao",
            "slug"=> "athleticbilbao",
            "owner_user_id"=> 6,
            "model_id"=> 3,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 7,
            "name"=> "SEVILLA",
            "slug"=> "sevilla",
            "owner_user_id"=> 7,
            "model_id"=> 3,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 8,
            "name"=> "LEVANTE",
            "slug"=> "levante",
            "owner_user_id"=> 8,
            "model_id"=> 1,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 9,
            "name"=> "VILLAREAL",
            "slug"=> "villareal",
            "owner_user_id"=> 9,
            "model_id"=> 2,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>27=>03.000000Z"
            ],
            [
            "id"=> 10,
            "name"=> "REAL BETIS",
            "slug"=> "realbetis",
            "owner_user_id"=> 10,
            "model_id"=> 1,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 11,
            "name"=> "MANCHESTER UNITED",
            "slug"=> "manchesterunited",
            "owner_user_id"=> 11,
            "model_id"=> 1,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 12,
            "name"=> "MANCHESTER CITY",
            "slug"=> "manchestercity",
            "owner_user_id"=> 12,
            "model_id"=> 4,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 13,
            "name"=> "LIVERPOOL",
            "slug"=> "liverpool",
            "owner_user_id"=> 13,
            "model_id"=> 2,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>27=>03.000000Z"
            ],
            [
            "id"=> 14,
            "name"=> "ARSENAL",
            "slug"=> "arsenal",
            "owner_user_id"=> 14,
            "model_id"=> 2,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>27=>03.000000Z"
            ],
            [
            "id"=> 15,
            "name"=> "CHELSEA",
            "slug"=> "chelsea",
            "owner_user_id"=> 15,
            "model_id"=> 2,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>27=>03.000000Z"
            ],
            [
            "id"=> 16,
            "name"=> "TOTTENHAM",
            "slug"=> "tottenham",
            "owner_user_id"=> 16,
            "model_id"=> 1,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 17,
            "name"=> "FULLHAM",
            "slug"=> "fullham",
            "owner_user_id"=> 17,
            "model_id"=> 2,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>27=>03.000000Z"
            ],
            [
            "id"=> 18,
            "name"=> "NEW CASTLE",
            "slug"=> "newcastle",
            "owner_user_id"=> 18,
            "model_id"=> 2,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>27=>03.000000Z"
            ],
            [
            "id"=> 19,
            "name"=> "EVERTON",
            "slug"=> "everton",
            "owner_user_id"=> 19,
            "model_id"=> 4,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 20,
            "name"=> "CRYSTAL PALACE",
            "slug"=> "crystalpalace",
            "owner_user_id"=> 20,
            "model_id"=> 1,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 21,
            "name"=> "Atalanta",
            "slug"=> "atalanta",
            "owner_user_id"=> 21,
            "model_id"=> 3,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 22,
            "name"=> "Bologna",
            "slug"=> "bologna",
            "owner_user_id"=> 22,
            "model_id"=> 3,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 23,
            "name"=> "Brescia",
            "slug"=> "brescia",
            "owner_user_id"=> 23,
            "model_id"=> 1,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 24,
            "name"=> "Cagliari",
            "slug"=> "cagliari",
            "owner_user_id"=> 24,
            "model_id"=> 2,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>27=>04.000000Z"
            ],
            [
            "id"=> 25,
            "name"=> "Juventus",
            "slug"=> "juventus",
            "owner_user_id"=> 25,
            "model_id"=> 2,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>27=>04.000000Z"
            ],
            [
            "id"=> 26,
            "name"=> "Fiorentina",
            "slug"=> "fiorentina",
            "owner_user_id"=> 26,
            "model_id"=> 4,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 27,
            "name"=> "Lazio",
            "slug"=> "lazio",
            "owner_user_id"=> 27,
            "model_id"=> 1,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 28,
            "name"=> "INTER MILAN",
            "slug"=> "intermilan",
            "owner_user_id"=> 28,
            "model_id"=> 1,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 29,
            "name"=> "AC MILAN",
            "slug"=> "acmilan",
            "owner_user_id"=> 29,
            "model_id"=> 4,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 30,
            "name"=> "NAPOLI",
            "slug"=> "napoli",
            "owner_user_id"=> 30,
            "model_id"=> 3,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 31,
            "name"=> "BAYERN MUNICH",
            "slug"=> "bayernmunich",
            "owner_user_id"=> 31,
            "model_id"=> 3,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 32,
            "name"=> "FORTUNA",
            "slug"=> "fortuna",
            "owner_user_id"=> 32,
            "model_id"=> 1,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>27.000000Z"
            ],
            [
            "id"=> 33,
            "name"=> "BORUSSIA DORTMUND",
            "slug"=> "borussiadortmund",
            "owner_user_id"=> 33,
            "model_id"=> 3,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>28.000000Z"
            ],
            [
            "id"=> 34,
            "name"=> "FC SHALKE",
            "slug"=> "fcshalke",
            "owner_user_id"=> 34,
            "model_id"=> 4,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>28.000000Z"
            ],
            [
            "id"=> 35,
            "name"=> "LEVERKUSEN",
            "slug"=> "leverkusen",
            "owner_user_id"=> 35,
            "model_id"=> 3,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>28.000000Z"
            ],
            [
            "id"=> 36,
            "name"=> "HOFFENHEIM",
            "slug"=> "hoffenheim",
            "owner_user_id"=> 36,
            "model_id"=> 4,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>28.000000Z"
            ],
            [
            "id"=> 37,
            "name"=> "WOLFSBURG",
            "slug"=> "wolfsburg",
            "owner_user_id"=> 37,
            "model_id"=> 3,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>28.000000Z"
            ],
            [
            "id"=> 38,
            "name"=> "FRANKFURT",
            "slug"=> "frankfurt",
            "owner_user_id"=> 38,
            "model_id"=> 1,
            "owner_id"=> "",
            "approved"=> 1,
            "created_at"=> null,
            "updated_at"=> "2020-09-04T06=>28=>28.000000Z"
            ],
            [
            "id"=> 39,
            "name"=> "FC BARCE",
            "slug"=> "fcbarce",
            "owner_user_id"=> 39,
            "model_id"=> 2,
            "owner_id"=> "887-888-841",
            "approved"=> 1,
            "created_at"=> "2020-09-05T16=>24=>06.000000Z",
            "updated_at"=> "2020-09-06T15=>58=>14.000000Z"
            ],
            [
            "id"=> 40,
            "name"=> "NEWYORK",
            "slug"=> "newyork",
            "owner_user_id"=> 40,
            "model_id"=> 1,
            "owner_id"=> "887-888-887",
            "approved"=> 1,
            "created_at"=> "2020-09-07T06=>12=>56.000000Z",
            "updated_at"=> "2020-09-07T06=>14=>01.000000Z"
            ],
            ];

        foreach($clubs as $key => $club){
            DB::table('clubs')->insert([
                'name' => $club['name'],
                'slug' => $club['slug'],
                'owner_user_id'=>$club['owner_user_id'],
                'model_id' => $club['model_id'],
                'owner_id' => '887-888-88'.$key,
                'approved' => $club['approved']
            ]);
        }
    }
}
