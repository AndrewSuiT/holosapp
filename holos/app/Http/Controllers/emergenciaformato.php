<?php

namespace App\Http\Controllers;

use App\Models\libroemergencia;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class emergenciaformato extends Controller
{
    function generalXls(Request $request){
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $query = libroemergencia::query();

        if ($startDate && $endDate) {
            $query->whereBetween('FICHAFAM', [$startDate, $endDate]);
        }

        $libroemergencia = $query->get();


        $titulo = "Libro de Emergencias";

        $bodyStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_HAIR, // Establecer el estilo del borde
                    'color' => ['rgb' => '000000'], // Establecer el color del borde (en este caso, negro)
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, // Tipo de relleno sólido
                'startColor' => ['argb' => '#CFE2F3'], // Color de fondo (en este caso, verde claro)
            ],
            'font' => [
                'bold' => false,
                'size' => 10
            ]
            
        ];
        $headerStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_HAIR, // Establecer el estilo del borde
                    'color' => ['rgb' => '000000'], // Establecer el color del borde (en este caso, negro)
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Centrar texto
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // Centrar Vertical
                'wrapText' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, // Tipo de relleno sólido
                'startColor' => ['argb' => '4ED7F5'], // Color de fondo (en este caso, verde claro)
            ],
            'font' => [
                'bold' => false,
                'size' => 10
            ]
        ];

        $ini = 1;

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setTitle('LibroEmergencia');
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(11);
        $sheet->getColumnDimension('C')->setWidth(18);
        $sheet->getColumnDimension('D')->setWidth(10);
        $sheet->getColumnDimension('E')->setWidth(10);
        $sheet->getColumnDimension('F')->setWidth(5);
        $sheet->getColumnDimension('G')->setWidth(10);
        $sheet->getColumnDimension('H')->setWidth(10);
        $sheet->getColumnDimension('I')->setWidth(25);
        $sheet->getColumnDimension('J')->setWidth(4);
        $sheet->getColumnDimension('K')->setWidth(5);
        $sheet->getColumnDimension('L')->setWidth(10);
        $sheet->getColumnDimension('M')->setWidth(10);
        $sheet->getColumnDimension('N')->setWidth(30);
        $sheet->getColumnDimension('O')->setWidth(4);
        $sheet->getColumnDimension('P')->setWidth(10);
        $sheet->getColumnDimension('Q')->setWidth(10);
        $sheet->getColumnDimension('R')->setWidth(10);
        $sheet->getColumnDimension('S')->setWidth(25);
        $sheet->getColumnDimension('T')->setWidth(25);
        $sheet->getColumnDimension('U')->setWidth(10);

        $sheet->getStyle('A'.$ini.':U'.$ini+1)->applyFromArray($headerStyle);
        $ini += 2;
        $sheet->getStyle('A'.$ini.':U'.$ini+100)->applyFromArray($bodyStyle);
        $ini -= 2;

        $sheet->mergeCells('A'.$ini.':A'.$ini+1)->setCellValue('A'.$ini,'N°');
        $sheet->mergeCells('B'.$ini.':B'.$ini+1)->setCellValue('B'.$ini,'DNI');
        $sheet->mergeCells('C'.$ini.':C'.$ini+1)->setCellValue('C'.$ini,'FICHA FAM');
        $sheet->mergeCells('D'.$ini.':D'.$ini+1)->setCellValue('D'.$ini,'NHCL');
        $sheet->mergeCells('E'.$ini.':E'.$ini+1)->setCellValue('E'.$ini,'COD. SIS');
        $sheet->mergeCells('F'.$ini.':F'.$ini+1)->setCellValue('F'.$ini,'PLAN');
        $sheet->mergeCells('G'.$ini.':G'.$ini+1)->setCellValue('G'.$ini,'SERV');
        $sheet->mergeCells('H'.$ini.':H'.$ini+1)->setCellValue('H'.$ini,'EMERGENCIA');
        $sheet->mergeCells('I'.$ini.':I'.$ini+1)->setCellValue('I'.$ini,'APELLIDOS Y NOMBRES');
        $sheet->mergeCells('J'.$ini.':J'.$ini+1)->setCellValue('J'.$ini,'NCR');
        $sheet->mergeCells('K'.$ini.':K'.$ini+1)->setCellValue('K'.$ini,'EDAD');
        $sheet->mergeCells('L'.$ini.':L'.$ini+1)->setCellValue('L'.$ini,'SEXO');
        $sheet->mergeCells('M'.$ini.':M'.$ini+1)->setCellValue('M'.$ini,'DIRECCION');
        $sheet->mergeCells('N'.$ini.':N'.$ini+1)->setCellValue('N'.$ini,'DIAGNOSTICO');
        $sheet->mergeCells('O'.$ini.':O'.$ini+1)->setCellValue('O'.$ini,'PDR');
        $sheet->mergeCells('P'.$ini.':P'.$ini+1)->setCellValue('P'.$ini,'TRATAMIENTO');
        $sheet->mergeCells('Q'.$ini.':Q'.$ini+1)->setCellValue('Q'.$ini,'INYECT');
        $sheet->mergeCells('R'.$ini.':R'.$ini+1)->setCellValue('R'.$ini,'CURAC');
        $sheet->mergeCells('S'.$ini.':S'.$ini+1)->setCellValue('S'.$ini,'RESPONSABLE');
        $sheet->mergeCells('T'.$ini.':T'.$ini+1)->setCellValue('T'.$ini,'RESPONSABLE MEDICO');
        $sheet->mergeCells('U'.$ini.':U'.$ini+1)->setCellValue('U'.$ini,'OBSV.');       

        $ini += 2;

        foreach ($libroemergencia as $item) {
            
            $sheet->setCellValue('A'.$ini, $item->id)
                    ->setCellValue('B'.$ini, $item->DNI)
                    ->setCellValue('C'.$ini, \Carbon\Carbon::parse($item->FICHAFAM)->format('d-m-Y H:i'))
                    ->setCellValue('D'.$ini, $item->NHCL)
                    ->setCellValue('E'.$ini, $item->CODSIS)
                    ->setCellValue('F'.$ini, $item->PLAN)
                    ->setCellValue('G'.$ini, $item->SERV)
                    ->setCellValue('H'.$ini, $item->EMERGENCIA2)
                    ->setCellValue('I'.$ini, $item->APELLIDOSYNOMBRES)
                    ->setCellValue('J'.$ini, $item->NCR)
                    ->setCellValue('K'.$ini, $item->EDAD)
                    ->setCellValue('L'.$ini, $item->SEXO)
                    ->setCellValue('M'.$ini, $item->DIRECCIÓN)
                    ->setCellValue('N'.$ini, $item->diagnosticoId)
                    ->setCellValue('O'.$ini, $item->PDR)
                    ->setCellValue('P'.$ini, $item->TRATAMIENTO)
                    ->setCellValue('Q'.$ini, $item->INYECT)
                    ->setCellValue('R'.$ini, $item->CURAC)
                    ->setCellValue('S'.$ini, $item->RESPONSABLE)
                    ->setCellValue('T'.$ini, $item->RESPONSABLE_MED)
                    ->setCellValue('U'.$ini, $item->OBSERV);               
                
            $ini++;
        }




        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$titulo.'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
