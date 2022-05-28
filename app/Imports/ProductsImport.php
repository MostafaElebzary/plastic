<?php

namespace App\Imports;

use App\Models\Subscriber;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\Facades\DNS2DFacade;
use Illuminate\Support\Facades\Hash;

class ProductsImport implements ToCollection,  WithChunkReading, ShouldQueue
{

    use Importable, RegistersEventListeners;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $pass = rand(00000,99999);
            $password = Hash::make($pass);

            $data = new Subscriber;
            $data->name = $row[0];
            $data->phone = $row[1];
            $data->phone2 = $row[2];
            $data->email = $row[3];
            $data->age = $row[4];
            $data->address = $row[5];
            $data->item_code = $row[6];
            $data->pass = $pass;
            $data->password = $password ;
            try {
                $data->save(); 
                $qr_image_name = $row[6] . '.png';
                $idString = (string)$row[6].'$'.(string)$pass;
                Storage::disk('public')->put($qr_image_name, base64_decode(DNS2DFacade::getBarcodePNG($idString, "QRCODE", 12, 12)));       
            } catch (\Exception $e) {
                return response()->json(['msg' => 'Failed']);
            }

        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
