<?php

namespace App\Http\Controllers;
use Spatie\TemporaryDirectory\TemporaryDirectory;

use Illuminate\Http\Request;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use ZipArchive;
use App\Models\QrCodeModel;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Response;

class QrCodeController extends Controller
{


    
    public function downloadQRCodesAsZip()
    {
        $zip = new ZipArchive;
        $fileName = 'qr_codes.zip';
        $temporaryDirectory = (new TemporaryDirectory('app/public/qrcodes/'))->create();

        // Get a path inside the temporary directory
        $tempFile=   $temporaryDirectory->path($fileName);
        // Geçici bir dosya oluştur
     

        if ($zip->open($tempFile, ZipArchive::CREATE) === TRUE) {
            for ($i = 1; $i <= 10; $i++) { // Örnek olarak 10 QR kodu oluşturulacak
                $qrContent = 'Bu QR kodu numarası: ' . $i;
                $qrCode = QrCode::format('png')->size(200)->generate($qrContent);

                // QR kodunu ZIP dosyasına ekle
                $zip->addFromString('qrcode_' . $i . '.png', $qrCode);
            }

            $zip->close();
        }

        // Dosyayı kullanıcıya indir ve indirme sonrasında geçici dosyayı sil
        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);

    }
    public function download()
    {
        return response()->streamDownload(
            function () {
                echo QrCode::size(200)
                    ->format('png')
                    ->generate('https://harrk.dev');
            },
            'qr-code.png',
            [
                'Content-Type' => 'image/png',
            ]
        );
    }
}
