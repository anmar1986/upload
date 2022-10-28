<?php

namespace App\Exports;

use App\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;

class ContactExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contact::all();
    }
    public function headings(): array
    {
        return [
            '#',
            'Filmtitel',
            'Filmemacher_innen',
            'Alter der Filmemacher_innen ',
            'Vorname',
            'Nachname',
            'Straße',
            'plz',
            'ort',
            'land',
            'E-mail Adresse',
            'Filmlänge',
            'Produktionszeitrum (von - bis)',
            'Kurzinhaltsangabe',
            'Zu deiner/eurer Person: Wer bist du/seid ihr',
            'Hat dir/euch jemand bei der Umsetzung geholfen?',
            'Planst du/plant ihr weitere Projekte? ',
            'E-Mail Adresse/Webadresse als Kontakt im Programmheft?',
            'Video title',
            'Unterschrift',
            'newsletter',
            'Teilnahmebedienung',
            'Created At',
            'Updated At'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:Z1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(18);
                $event->sheet->getDelegate()->getStyle($cellRange);  
            },
        ];
    }
    
}
