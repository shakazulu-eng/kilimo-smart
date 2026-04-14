<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Crop;
use App\Models\CropRegion;

class CropSeeder extends Seeder
{
    public function run(): void
    {
        // ---------------------
        // CROP LIST
        // ---------------------
        $crops = [
            ['name'=>'Mpunga','min_temp'=>20,'max_temp'=>32,'min_rain'=>15,'max_rain'=>40],
            ['name'=>'Mahindi','min_temp'=>18,'max_temp'=>35,'min_rain'=>10,'max_rain'=>35],
            ['name'=>'Viazi','min_temp'=>15,'max_temp'=>30,'min_rain'=>10,'max_rain'=>30],
            ['name'=>'Ngano','min_temp'=>10,'max_temp'=>25,'min_rain'=>5,'max_rain'=>20],
            ['name'=>'Miwa','min_temp'=>22,'max_temp'=>35,'min_rain'=>20,'max_rain'=>50],
            ['name'=>'Uwele','min_temp'=>18,'max_temp'=>35,'min_rain'=>10,'max_rain'=>35],
            ['name'=>'Pamba','min_temp'=>20,'max_temp'=>32,'min_rain'=>15,'max_rain'=>35],
            ['name'=>'Nyanya','min_temp'=>20,'max_temp'=>30,'min_rain'=>10,'max_rain'=>25],
            ['name'=>'Pilipili','min_temp'=>20,'max_temp'=>32,'min_rain'=>10,'max_rain'=>25],
            ['name'=>'Karoti','min_temp'=>15,'max_temp'=>25,'min_rain'=>5,'max_rain'=>20],
           ['name'=>'Kahawa','min_temp'=>15,'max_temp'=>30,'min_rain'=>10,'max_rain'=>30],
        ];

        $cropModels = [];

        foreach($crops as $c){
            $cropModels[$c['name']] = Crop::create($c);
        }

        // ---------------------
        // REGION MAPPING (all Tanzania regions)
        // ---------------------
        $regionMapping = [
            'Arusha'    => ['Mahindi','Uwele','Pamba'],
            'Dar es Salaam' => ['Nyanya','Pilipili','Miwa'],
            'Dodoma'    => ['Mtama','Mahindi','Uwele'],
            'Geita'     => ['Mahindi','Uwele','Miwa'],
            'Iringa'    => ['Mahindi','Ngano','Viazi'],
            'Kagera'    => ['Mpunga','Mahindi','Uwele'],
            'Katavi'    => ['Mahindi','Uwele','Pamba'],
            'Kigoma'    => ['Mahindi','Mpunga','Uwele'],
            'Kilimanjaro' => ['Mpunga','Mahindi','Miwa'],
            'Lindi'     => ['Miwa','Mpunga','Uwele'],
            'Manyara'   => ['Mahindi','Mpunga','Pamba'],
            'Mara'      => ['Mahindi','Uwele','Mpunga'],
            'Mbeya'     => ['Mahindi','Viazi','Miwa','Kahawa'],
            'Morogoro'  => ['Mpunga','Mahindi','Miwa'],
            'Mtwara'    => ['Miwa','Mpunga','Uwele'],
            'Mwanza'    => ['Mahindi','Mpunga','Uwele'],
            'Njombe'    => ['Mahindi','Viazi','Mpunga'],
            'Pwani'     => ['Miwa','Mpunga','Nyanya'],
            'Rukwa'     => ['Mahindi','Uwele','Pamba'],
            'Ruvuma'    => ['Mpunga','Mahindi','Miwa'],
            'Shinyanga' => ['Mahindi','Uwele','Pamba'],
            'Simiyu'    => ['Mahindi','Uwele','Pamba'],
            'Singida'   => ['Mtama','Mahindi','Uwele'],
            'Tabora'    => ['Mahindi','Uwele','Pamba'],
            'Tanga'     => ['Mpunga','Mahindi','Miwa'],
            'Zanzibar'  => ['Mpunga','Nyanya','Miwa'],
        ];

        foreach($regionMapping as $region => $cropsArr){
            foreach($cropsArr as $cropName){
                if(isset($cropModels[$cropName])){
                    CropRegion::create([
                        'crop_id' => $cropModels[$cropName]->id,
                        'region'  => $region
                    ]);
                }
            }
        }
    }
}
