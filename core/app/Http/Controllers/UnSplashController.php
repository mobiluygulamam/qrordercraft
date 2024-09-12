<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Image; // Bu satırı ekleyin
class UnSplashController extends Controller
{
    private $unsplashApiBaseUrl = 'https://api.unsplash.com/';

    private function getUnSplashOptions()
    {
        return Http::withHeaders([
            'Authorization' => 'Client-ID ' . env('UNSPLASH_ACCESS_KEY'),
            'Accept-Version' => 'v1'
        ]);
    }

    public function loadImages(Request $request)
    {
        $query = $request->input('query');
        $response = $this->getUnSplashOptions()
            ->get($this->unsplashApiBaseUrl . 'search/photos', [
                'query' => $query,
                'per_page' => 12,
                'orientation' => 'landscape'
            ]);

        $data = json_decode($response->getBody()->getContents(), true);
        $smallImageUrls = [];

        foreach ($data['results'] as $photo) {
            $smallImageUrls[] = $photo['urls']['small'];
        }

        return response()->json($smallImageUrls);

    }

    public function saveImage(Request $request)
    {
        $imageUrl = $request->input('imageUrl');

        // Resmi indir ve storage klasörüne kaydet
        $imageContents = file_get_contents($imageUrl);
        $filename = basename($imageUrl); 
        $filePath = 'public/uploads/' . $filename;

        $filePath = 'uploads/' . $filename;
       
        
        // Veritabanına kaydet
        $image = Image::create([
          'filename' => $filename,
          'original_url' => $imageUrl
      ]);

      return response()->json(['message' => 'Image saved successfully', 'image' => $image]);


    }
}
