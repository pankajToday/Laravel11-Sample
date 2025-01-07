<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductImageObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        $webUrl ="";

        if(request('image')  ){
            $imageData = request('image')['preview']; // data:image/png;base64,iVBORw0KGgoAAA....
            $file = request('image')['name'];

            // Generate a unique filename to prevent overwriting
            $uniqueFileName = uniqid() . '_' . $file;
            $publicPath = 'upload/product-image/' . $uniqueFileName;
            $fullPublicPath = public_path($publicPath);

            // Ensure the directory exists
            if (!File::exists(public_path('upload'))) {
                File::makeDirectory(public_path('upload'), 0755, true);
            }
            // Ensure the directory exists
            if (!File::exists(public_path('upload/product-image'))) {
                File::makeDirectory(public_path('upload/product-image'), 0755, true);
            }

            // Remove the data URL prefix if present
            if (strpos($imageData, 'data:image') === 0) {
                $imageData = substr($imageData, strpos($imageData, ',') + 1);
            }

            // Decode base64 image data
            $decodedImageData = base64_decode($imageData);

            // Save the file in the public directory
            File::put($fullPublicPath, $decodedImageData);

            // Return the web-accessible URL of the uploaded image
            $webUrl = asset($publicPath);
        }

        $product->baseImage()->updateOrCreate(["product_id" => $product->id ],[
            "product_id" => $product->id,
            "type" => 'primary',
            'url' => request('image')? $webUrl : "/assets/img/dummy-product-5.jpg"
        ]);
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        $webUrl ="";
        $imageData =@ request('image')['preview']; // data:image/png;base64,iVBORw0KGgoAAA....
        $file =  @request('image')['name'];

        if( $imageData && $file ){
           
            // Generate a unique filename to prevent overwriting
            $uniqueFileName = uniqid() . '_' . $file;
            $publicPath = 'upload/product-image/' . $uniqueFileName;
            $fullPublicPath = public_path($publicPath);

            // Ensure the directory exists
            if (!File::exists(public_path('upload'))) {
                File::makeDirectory(public_path('upload'), 0755, true);
            }
            // Ensure the directory exists
            if (!File::exists(public_path('upload/product-image'))) {
                File::makeDirectory(public_path('upload/product-image'), 0755, true);
            }

            // Remove the data URL prefix if present
            if (strpos($imageData, 'data:image') === 0) {
                $imageData = substr($imageData, strpos($imageData, ',') + 1);
            }

            // Decode base64 image data
            $decodedImageData = base64_decode($imageData);

            // Save the file in the public directory
            File::put($fullPublicPath, $decodedImageData);

            // Return the web-accessible URL of the uploaded image
            $webUrl = asset($publicPath);

            $product->baseImage()->updateOrCreate(["product_id" => $product->id ],[
                "product_id" => $product->id,
                "type" => 'primary',
                'url' => request('image')? $webUrl : "/assets/img/dummy-product-5.jpg"
            ]);
        }

    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
