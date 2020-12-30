<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = [
            [
            "id"=> 1,
            "name"=> "L. MESSI",
            "model_id"=> 7511,
            "position"=> "RWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 2,
            "name"=> "C. RONALDO",
            "model_id"=> 4522,
            "position"=> "LWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 3,
            "name"=> "R. LEWANDOWSKI",
            "model_id"=> 40002,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 4,
            "name"=> "NEYMAR",
            "model_id"=> 40352,
            "position"=> "LWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 5,
            "name"=> "K. DE BRUYNE",
            "model_id"=> 44379,
            "position"=> "AMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 6,
            "name"=> "J. OBLAK",
            "model_id"=> 44104,
            "position"=> "GK",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 7,
            "name"=> "V. VAN DIJK",
            "model_id"=> 44840,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 8,
            "name"=> "K. MBAPPÉ",
            "model_id"=> 110718,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 9,
            "name"=> "SERGIO RAMOS",
            "model_id"=> 7329,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 10,
            "name"=> "S. AGÜERO",
            "model_id"=> 33702,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 11,
            "name"=> "S. MANÉ",
            "model_id"=> 57304,
            "position"=> "LWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 12,
            "name"=> "ALISSON",
            "model_id"=> 63474,
            "position"=> "GK",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 13,
            "name"=> "M. NEUER",
            "model_id"=> 33185,
            "position"=> "GK",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 14,
            "name"=> "L. SUÁREZ",
            "model_id"=> 34881,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 15,
            "name"=> "CASEMIRO",
            "model_id"=> 42669,
            "position"=> "DMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 16,
            "name"=> "H. KANE",
            "model_id"=> 47287,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 17,
            "name"=> "M. SALAH",
            "model_id"=> 57123,
            "position"=> "RWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 18,
            "name"=> "M. TER STEGEN",
            "model_id"=> 61672,
            "position"=> "GK",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 19,
            "name"=> "K. BENZEMA",
            "model_id"=> 8944,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 20,
            "name"=> "T. KROOS",
            "model_id"=> 36770,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 21,
            "name"=> "E. HAZARD",
            "model_id"=> 36998,
            "position"=> "LWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 22,
            "name"=> "BUSQUETS",
            "model_id"=> 38568,
            "position"=> "DMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 23,
            "name"=> "P. AUBAMEYANG",
            "model_id"=> 40323,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 24,
            "name"=> "DAVID DE GEA",
            "model_id"=> 40571,
            "position"=> "GK",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 25,
            "name"=> "THIAGO",
            "model_id"=> 41126,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 26,
            "name"=> "A. GRIEZMANN",
            "model_id"=> 42316,
            "position"=> "LWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 27,
            "name"=> "R. VARANE",
            "model_id"=> 43076,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 28,
            "name"=> "T. COURTOIS",
            "model_id"=> 44383,
            "position"=> "GK",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 29,
            "name"=> "R. STERLING",
            "model_id"=> 45268,
            "position"=> "LWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 30,
            "name"=> "EDERSON",
            "model_id"=> 46815,
            "position"=> "GK",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 31,
            "name"=> "P. DYBALA",
            "model_id"=> 47179,
            "position"=> "SS",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 32,
            "name"=> "N. KANTÉ",
            "model_id"=> 101334,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 33,
            "name"=> "J. KIMMICH",
            "model_id"=> 109005,
            "position"=> "DMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 34,
            "name"=> "PIQUÉ",
            "model_id"=> 8639,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 35,
            "name"=> "S. HANDANOVIČ",
            "model_id"=> 8978,
            "position"=> "GK",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 36,
            "name"=> "Á. DI MARÍA",
            "model_id"=> 37106,
            "position"=> "RWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 37,
            "name"=> "W. SZCZĘSNY",
            "model_id"=> 40937,
            "position"=> "GK",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 38,
            "name"=> "C. IMMOBILE",
            "model_id"=> 41066,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 39,
            "name"=> "D. ALABA",
            "model_id"=> 41124,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 40,
            "name"=> "SON HEUNG-MIN",
            "model_id"=> 43063,
            "position"=> "LMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 41,
            "name"=> "MARQUINHOS",
            "model_id"=> 45993,
            "position"=> "DMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 42,
            "name"=> "M. VERRATTI",
            "model_id"=> 46003,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 43,
            "name"=> "BRUNO FERNANDES",
            "model_id"=> 60512,
            "position"=> "AMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 44,
            "name"=> "S. GNABRY",
            "model_id"=> 60884,
            "position"=> "LWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 45,
            "name"=> "SAÚL",
            "model_id"=> 63497,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 46,
            "name"=> "K. KOULIBALY",
            "model_id"=> 102757,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 47,
            "name"=> "BERNARDO SILVA",
            "model_id"=> 104226,
            "position"=> "RWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 48,
            "name"=> "ROBERTO FIRMINO",
            "model_id"=> 105029,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 49,
            "name"=> "F. DE JONG",
            "model_id"=> 108662,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 50,
            "name"=> "T. ALEXANDER-ARNOLD",
            "model_id"=> 113405,
            "position"=> "RB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 51,
            "name"=> "H. LLORIS",
            "model_id"=> 8574,
            "position"=> "GK",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 52,
            "name"=> "G. CHIELLINI",
            "model_id"=> 8851,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 53,
            "name"=> "L. MODRIĆ",
            "model_id"=> 34098,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 54,
            "name"=> "M. PJANIĆ",
            "model_id"=> 37422,
            "position"=> "DMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 55,
            "name"=> "DANI PAREJO",
            "model_id"=> 38779,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 56,
            "name"=> "THIAGO SILVA",
            "model_id"=> 39173,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 57,
            "name"=> "R. LUKAKU",
            "model_id"=> 40122,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 58,
            "name"=> "T. MÜLLER",
            "model_id"=> 40714,
            "position"=> "SS",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 59,
            "name"=> "S. DE VRIJ",
            "model_id"=> 40875,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 60,
            "name"=> "KOKE",
            "model_id"=> 41082,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 61,
            "name"=> "J. ILIČIĆ",
            "model_id"=> 42888,
            "position"=> "SS",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 62,
            "name"=> "P. POGBA",
            "model_id"=> 45023,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 63,
            "name"=> "B. LENO",
            "model_id"=> 45144,
            "position"=> "GK",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 64,
            "name"=> "M. ICARDI",
            "model_id"=> 46637,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 65,
            "name"=> "H. ZIYECH",
            "model_id"=> 47002,
            "position"=> "AMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 66,
            "name"=> "A. LAPORTE",
            "model_id"=> 47522,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 67,
            "name"=> "J. GIMÉNEZ",
            "model_id"=> 58839,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 68,
            "name"=> "R. MAHREZ",
            "model_id"=> 61725,
            "position"=> "RWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 69,
            "name"=> "LUIS ALBERTO",
            "model_id"=> 63457,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 70,
            "name"=> "FABINHO",
            "model_id"=> 63607,
            "position"=> "DMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 71,
            "name"=> "J. VARDY",
            "model_id"=> 100159,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 72,
            "name"=> "L. SANÉ",
            "model_id"=> 102901,
            "position"=> "LWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 73,
            "name"=> "C. LENGLET",
            "model_id"=> 104418,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 74,
            "name"=> "S. MILINKOVIĆ-SAVIĆ",
            "model_id"=> 109375,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 75,
            "name"=> "M. ŠKRINIAR",
            "model_id"=> 111174,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 76,
            "name"=> "M. DE LIGT",
            "model_id"=> 114105,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 77,
            "name"=> "N. SÜLE",
            "model_id"=> 116136,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 78,
            "name"=> "T. WERNER",
            "model_id"=> 116652,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 79,
            "name"=> "J. SANCHO",
            "model_id"=> 118007,
            "position"=> "RWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 80,
            "name"=> "FERNANDINHO",
            "model_id"=> 31052,
            "position"=> "DMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 81,
            "name"=> "L. BONUCCI",
            "model_id"=> 33079,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 82,
            "name"=> "DAVID SILVA",
            "model_id"=> 33237,
            "position"=> "AMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 83,
            "name"=> "G. WIJNALDUM",
            "model_id"=> 36288,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 84,
            "name"=> "I. RAKITIĆ",
            "model_id"=> 36625,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 85,
            "name"=> "E. DŽEKO",
            "model_id"=> 37638,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 86,
            "name"=> "A. WITSEL",
            "model_id"=> 37827,
            "position"=> "DMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 87,
            "name"=> "P. GULÁCSI",
            "model_id"=> 38784,
            "position"=> "GK",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 88,
            "name"=> "T. ALDERWEIRELD",
            "model_id"=> 38796,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 89,
            "name"=> "K. NAVAS",
            "model_id"=> 39777,
            "position"=> "GK",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 90,
            "name"=> "D. MERTENS",
            "model_id"=> 40065,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 91,
            "name"=> "K. MANOLAS",
            "model_id"=> 40097,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 92,
            "name"=> "J. HENDERSON",
            "model_id"=> 40295,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 93,
            "name"=> "JORDI ALBA",
            "model_id"=> 40425,
            "position"=> "LB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 94,
            "name"=> "C. ERIKSEN",
            "model_id"=> 40871,
            "position"=> "AMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 95,
            "name"=> "R. NAINGGOLAN",
            "model_id"=> 41046,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 96,
            "name"=> "W. BEN YEDDER",
            "model_id"=> 42296,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 97,
            "name"=> "ISCO",
            "model_id"=> 42556,
            "position"=> "AMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 98,
            "name"=> "A. GÓMEZ",
            "model_id"=> 42630,
            "position"=> "AMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 99,
            "name"=> "P. COUTINHO",
            "model_id"=> 42641,
            "position"=> "AMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 100,
            "name"=> "F. ACERBI",
            "model_id"=> 44676,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 101,
            "name"=> "S. UMTITI",
            "model_id"=> 45330,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 102,
            "name"=> "İ. GÜNDOĞAN",
            "model_id"=> 45945,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 103,
            "name"=> "L. INSIGNE",
            "model_id"=> 46235,
            "position"=> "LWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 104,
            "name"=> "IAGO ASPAS",
            "model_id"=> 46666,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 105,
            "name"=> "M. DEPAY",
            "model_id"=> 46879,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 106,
            "name"=> "M. BROZOVIĆ",
            "model_id"=> 47396,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 107,
            "name"=> "R. JIMÉNEZ",
            "model_id"=> 57330,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 108,
            "name"=> "CARVAJAL",
            "model_id"=> 57353,
            "position"=> "RB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 109,
            "name"=> "JORGINHO",
            "model_id"=> 59458,
            "position"=> "DMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 110,
            "name"=> "L. GORETZKA",
            "model_id"=> 60380,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 111,
            "name"=> "A. ROBERTSON",
            "model_id"=> 101028,
            "position"=> "LB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 112,
            "name"=> "T. PARTEY",
            "model_id"=> 101615,
            "position"=> "DMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 113,
            "name"=> "ARTHUR",
            "model_id"=> 106614,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 114,
            "name"=> "GABRIEL JESUS",
            "model_id"=> 108200,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 115,
            "name"=> "L. MARTÍNEZ",
            "model_id"=> 108657,
            "position"=> "CF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 116,
            "name"=> "H. MAGUIRE",
            "model_id"=> 109329,
            "position"=> "CB",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 117,
            "name"=> "O. DEMBÉLÉ",
            "model_id"=> 110626,
            "position"=> "LWF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 118,
            "name"=> "RODRI",
            "model_id"=> 110815,
            "position"=> "DMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 119,
            "name"=> "ANDRES INIESTA",
            "model_id"=> 1073745897,
            "position"=> "CMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 120,
            "name"=> "Ł. FABIAŃSKI",
            "model_id"=> 34437,
            "position"=> "GK",
            "type"=> 2,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 121,
            "name"=> "D. PAYET",
            "model_id"=> 34611,
            "position"=> "LWF",
            "type"=> 2,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 122,
            "name"=> "RUI PATRÍCIO",
            "model_id"=> 34868,
            "position"=> "GK",
            "type"=> 2,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 123,
            "name"=> "J. VERTONGHEN",
            "model_id"=> 34905,
            "position"=> "CB",
            "type"=> 2,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 124,
            "name"=> "JAVI MARTÍNEZ",
            "model_id"=> 35108,
            "position"=> "DMF",
            "type"=> 2,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 125,
            "name"=> "G. BALE",
            "model_id"=> 35496,
            "position"=> "RWF",
            "type"=> 2,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 126,
            "name"=> "Y. SOMMER",
            "model_id"=> 36627,
            "position"=> "GK",
            "type"=> 2,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 127,
            "name"=> "WILLIAN",
            "model_id"=> 38297,
            "position"=> "RWF",
            "type"=> 2,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 128,
            "name"=> "A. LACAZETTE",
            "model_id"=> 40507,
            "position"=> "CF",
            "type"=> 2,
            "image"=> null,
            "created_at"=> null,
            "updated_at"=> null
            ],
            [
            "id"=> 129,
            "name"=> "D. MARADONA",
            "model_id"=> 2453,
            "position"=> "SS",
            "type"=> 1,
            "image"=> null,
            "created_at"=> "2020-10-20T15=>29=>06.000000Z",
            "updated_at"=> "2020-10-20T15=>29=>06.000000Z"
            ],
            [
            "id"=> 130,
            "name"=> "RONALDINHO G.",
            "model_id"=> 1631,
            "position"=> "AMF",
            "type"=> 1,
            "image"=> null,
            "created_at"=> "2020-10-20T15=>32=>19.000000Z",
            "updated_at"=> "2020-10-20T15=>32=>19.000000Z"
            ]
            ];

        foreach($models as $model){
            
            DB::table('playermodels')->insert([
                'name'=>$model['name'],
                'model_id'=>$model['model_id'],
                'position'=>$model['position'],
                'image'=>$model['model_id'].'.png',

            ]);

        }
    }
}
