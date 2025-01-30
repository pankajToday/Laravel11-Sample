<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\productDetail;
use App\Models\MasterGlossary;
use Illuminate\Database\Seeder;
use App\Models\MasterGlossaryItem;
use Illuminate\Support\Facades\DB;

class MasterGlossarySeeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $particulars=[
            [
               
                'user_id'=> User::where('role_id',2)->inRandomOrder()->first()->id,
                'kirana_vendor_id' => User::where('role_id',5)->inRandomOrder()->first()->id,
                 "name" => "Monthly Kirana List", 
                 'is_default' => true,
                'status' => 1
            ],
            [
                'user_id'=> User::where('role_id',2)->inRandomOrder()->first()->id,
                'kirana_vendor_id' => User::where('role_id',5)->inRandomOrder()->first()->id,
                 "name" => "Monthly Rashan List", 
                 'is_default' => true,
                'status' => 1
            ],
            [
                'user_id'=> User::where('role_id',2)->inRandomOrder()->first()->id,
                'kirana_vendor_id' => User::where('role_id',5)->inRandomOrder()->first()->id,
                 "name" => "Master Rashan", 
                 'is_default' => true,
                'status' => 1
            ],
           

        ];

        foreach ( $particulars as $particular ){
           try{
            DB::beginTransaction();
            $glossary =  MasterGlossary::create( $particular );

            $this->glossaryList( $glossary );
            DB::commit();
           }
           catch (\Exception $e){
            DB::rollBack();
               dd($e);
           }
        }
    }

    function glossaryList( $glossary ){
        $productDetails = productDetail::with('product')->inRandomOrder()->get();

       foreach ( $productDetails as $productDetail ){
            MasterGlossaryItem::updateOrCreate([
                'master_glossary_id' => $glossary->id,
                'product_id' =>  $productDetail->product->id,
                'item_id' => $productDetail->id,
                'custom_unit' => false,
                'quantity' => 1,
                'price' => $productDetail->mrp_price,
            ]);
        }

    }
}
