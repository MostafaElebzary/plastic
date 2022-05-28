<?php

namespace App\Exports;

use App\Models\Subscriber;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubscriberExport implements FromCollection,WithHeadings
{

    public function headings():array {
        return [
            'id',
            'name',
            'phone',
            'phone2',
            'address',
            'age',


        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Subscriber::getSubscriber());
        // return Subscriber::all();
    }
}
