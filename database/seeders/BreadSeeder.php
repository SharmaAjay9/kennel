<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PetBread;
use App\Models\Pet;

class BreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pet::create(['pet_name'=>"dog"]);


        $ar = ['Akita','Australian Shepherd'
										,'Basset Hound'
										,'Beagle'
										,'Belgian Malinois'
										,'Bernese Mountain Dog'
										,'Bichon Frise'
										,'Border Collie'
										,'Boston Terrier'
										,'Boxer'
										,'Brittany Spaniel'
										,'Bulldog'
										,'Cane Corso'
										,'Chesapeake Bay Retriever'
										,'Dalmatian'
										,'Dachshund'
										,'Dobermann'
										,'English Setter'
										,'Finnish Spitz'
										,'French Bulldog'
										,'Golden Retriever'
										,'German Pointing Dog'
										,'German Shepherd'
										,'Great Dane'
										,'Havanese'
										,'Husky'
										,'Indian Spitz'
										,'Labrador'
										,'Maltese'
										,'Mastiff'
										,'Miniature American Shepherd'
										,'Miniature Schnauzer'
										,'Pembroke Welsh Corgi'
										,'Cultural Pomeranian'
										,'Pug'
										,'Rhodesian Ridgeback'
										,'Rottweiler'
										,'Shetland Sheepdog'
										,'Shiba Inu'
										,'Shih Tzu'
										,'Soft-coated Wheaten Terrier'
										,'Spaniel'
										,'Springer Spaniel'
										,'St BernardSt Bernard'
										,'Staffordshire Bull Terrier'
										,'Vizsla'
										,'Weimaraner'
										,'Others'];

        foreach($ar as $r){
            PetBread::create(['breads_name'=>$r,'pet_id'=>1]);
        } 

    }
}
