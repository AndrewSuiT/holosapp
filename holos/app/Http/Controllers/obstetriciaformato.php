<?php

namespace App\Http\Controllers;

use App\Models\libroobstetricia;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class obstetriciaformato extends Controller
{
    function general2Xls(Request $request){
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $query = libroobstetricia::query();

        if ($startDate && $endDate) {
            $query->whereBetween('fecha_parto', [$startDate, $endDate]);
        }

        $librodeobstetricia = $query->get();


        $titulo = "Libro de Obstetricia";

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
                'startColor' => ['argb' => 'B092FF'], // Color de fondo (en este caso, morado claro)
            ],
            'font' => [
                'bold' => false,
                'size' => 10
            ]
        ];

        $ini = 1;

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setTitle('LibroObstetricia');
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(11);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(6);
        $sheet->getColumnDimension('E')->setWidth(2);
        $sheet->getColumnDimension('F')->setWidth(2);
        $sheet->getColumnDimension('G')->setWidth(2);
        $sheet->getColumnDimension('H')->setWidth(7);
        $sheet->getColumnDimension('I')->setWidth(7);
        $sheet->getColumnDimension('J')->setWidth(6);
        $sheet->getColumnDimension('K')->setWidth(8);
        $sheet->getColumnDimension('L')->setWidth(20);
        $sheet->getColumnDimension('M')->setWidth(10);
        $sheet->getColumnDimension('N')->setWidth(10);
        $sheet->getColumnDimension('O')->setWidth(10);
        $sheet->getColumnDimension('P')->setWidth(5);
        $sheet->getColumnDimension('Q')->setWidth(5);
        $sheet->getColumnDimension('R')->setWidth(5);
        $sheet->getColumnDimension('S')->setWidth(5);
        $sheet->getColumnDimension('T')->setWidth(3);
        $sheet->getColumnDimension('U')->setWidth(5);
        $sheet->getColumnDimension('V')->setWidth(3);
        $sheet->getColumnDimension('W')->setWidth(3);
        $sheet->getColumnDimension('X')->setWidth(5);
        $sheet->getColumnDimension('Y')->setWidth(8);
        $sheet->getColumnDimension('Z')->setWidth(8);
        $sheet->getColumnDimension('AA')->setWidth(10);
        $sheet->getColumnDimension('AB')->setWidth(8);
        $sheet->getColumnDimension('AC')->setWidth(20);
        $sheet->getColumnDimension('AD')->setWidth(20);
        $sheet->getColumnDimension('AE')->setWidth(10);


        $sheet->getStyle('A'.$ini.':AE'.$ini+1)->applyFromArray($headerStyle);
        $ini += 2;
        $sheet->getStyle('A'.$ini.':AE'.$ini+100)->applyFromArray($bodyStyle);
        $ini -= 2;

        $sheet->mergeCells('A'.$ini.':A'.$ini+1)->setCellValue('A'.$ini,'N° DE ORDEN');
        $sheet->mergeCells('B'.$ini.':B'.$ini+1)->setCellValue('B'.$ini,'N° DE HC');
        $sheet->mergeCells('C'.$ini.':C'.$ini+1)->setCellValue('C'.$ini,'APELLIDOS Y NOMBRES');
        $sheet->mergeCells('D'.$ini.':D'.$ini+1)->setCellValue('D'.$ini,'EDAD');
        $sheet->mergeCells('E'.$ini.':E'.$ini+1)->setCellValue('E'.$ini,'G');
        $sheet->mergeCells('F'.$ini.':F'.$ini+1)->setCellValue('F'.$ini,'P');
        $sheet->mergeCells('G'.$ini.':G'.$ini+1)->setCellValue('G'.$ini,'A');
        $sheet->mergeCells('H'.$ini.':H'.$ini+1)->setCellValue('H'.$ini,'HIJOS VIVOS');
        $sheet->mergeCells('I'.$ini.':I'.$ini+1)->setCellValue('I'.$ini,'HIJOS FALLEC.');
        $sheet->mergeCells('J'.$ini.':J'.$ini+1)->setCellValue('J'.$ini,'EDAD GESTACIÓN');
        $sheet->mergeCells('K'.$ini.':K'.$ini+1)->setCellValue('K'.$ini,'N° DE CONTROL');
        $sheet->mergeCells('L'.$ini.':L'.$ini+1)->setCellValue('L'.$ini,'DOMICILIO');
        $sheet->mergeCells('M'.$ini.':M'.$ini+1)->setCellValue('M'.$ini,'Fecha. PARTO');
        $sheet->mergeCells('N'.$ini.':N'.$ini+1)->setCellValue('N'.$ini,'Hora. PARTO');
        $sheet->mergeCells('O'.$ini.':O'.$ini+1)->setCellValue('O'.$ini,'TIPO DE PARTO');
        $sheet->mergeCells('P'.$ini.':R'.$ini)->setCellValue('P'.$ini,'DURACIÓN DE PARTO');
        $sheet->mergeCells('S'.$ini.':S'.$ini+1)->setCellValue('S'.$ini,'EPISIOTONIA');
        $sheet->mergeCells('T'.$ini.':T'.$ini+1)->setCellValue('T'.$ini,'SEXO');
        $sheet->mergeCells('U'.$ini.':U'.$ini+1)->setCellValue('U'.$ini,'PESO R.N.');
        $sheet->mergeCells('V'.$ini.':W'.$ini)->setCellValue('V'.$ini,'APGAR');
        $sheet->mergeCells('X'.$ini.':X'.$ini+1)->setCellValue('X'.$ini,'TALLA');
        $sheet->mergeCells('Y'.$ini.':Y'.$ini+1)->setCellValue('Y'.$ini,'P. CEFALICO');
        $sheet->mergeCells('Z'.$ini.':Z'.$ini+1)->setCellValue('Z'.$ini,'P. TORAXICO');
        $sheet->mergeCells('AA'.$ini.':AA'.$ini+1)->setCellValue('AA'.$ini,'P. ABDOMINAL');
        $sheet->mergeCells('AB'.$ini.':AB'.$ini+1)->setCellValue('AB'.$ini,'H. CL. R.N.');
        $sheet->mergeCells('AC'.$ini.':AC'.$ini+1)->setCellValue('AC'.$ini,'RESP.');
        $sheet->mergeCells('AD'.$ini.':AD'.$ini+1)->setCellValue('AD'.$ini,'RESP. MEDICO');
        $sheet->mergeCells('AE'.$ini.':AE'.$ini+1)->setCellValue('AE'.$ini,'OBSERVACIONES');
        
        $sheet->setCellValue('P'.$ini+1,'1°');
        $sheet->setCellValue('Q'.$ini+1,'2°');
        $sheet->setCellValue('R'.$ini+1,'3°');

        $sheet->setCellValue('V'.$ini+1,"1'");
        $sheet->setCellValue('W'.$ini+1,"5'");

        $ini += 2;

        foreach ($librodeobstetricia as $item) {
            
            $sheet->setCellValue('A'.$ini, $item->id)
                    ->setCellValue('B'.$ini, $item->n_hc)
                    ->setCellValue('C'.$ini, $item->apellidosynombres)
                    ->setCellValue('D'.$ini, $item->edad)
                    ->setCellValue('E'.$ini, $item->g)
                    ->setCellValue('F'.$ini, $item->p)
                    ->setCellValue('G'.$ini, $item->a)
                    ->setCellValue('H'.$ini, $item->hijos_vivos)
                    ->setCellValue('I'.$ini, $item->hijos_fallec)
                    ->setCellValue('J'.$ini, $item->edad_gestacion)
                    ->setCellValue('K'.$ini, $item->n_control)
                    ->setCellValue('L'.$ini, $item->domicilio)
                    ->setCellValue('M'.$ini, \Carbon\Carbon::parse($item->fecha_parto)->format('d-m-Y'))
                    ->setCellValue('N'.$ini, \Carbon\Carbon::parse($item->hora_parto)->format('H:i'))
                    ->setCellValue('O'.$ini, $item->tipo_parto)
                    ->setCellValue('P'.$ini, $item->duracion_parto1)
                    ->setCellValue('Q'.$ini, $item->duracion_parto2)
                    ->setCellValue('R'.$ini, $item->duracion_parto3)
                    ->setCellValue('S'.$ini, $item->episiotonia)
                    ->setCellValue('T'.$ini, $item->sexo)
                    ->setCellValue('U'.$ini, $item->peso_rn)
                    ->setCellValue('V'.$ini, $item->apgar1)
                    ->setCellValue('W'.$ini, $item->apgar5)
                    ->setCellValue('X'.$ini, $item->talla)
                    ->setCellValue('Y'.$ini, $item->p_cefalico)
                    ->setCellValue('Z'.$ini, $item->p_toraxico)
                    ->setCellValue('AA'.$ini, $item->p_abdominal)
                    ->setCellValue('AB'.$ini, $item->h_cl_rn)
                    ->setCellValue('AC'.$ini, $item->encargado)
                    ->setCellValue('AD'.$ini, $item->medico_encargado)
                    ->setCellValue('AE'.$ini, $item->observaciones);               
                
            $ini++;
        }




        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$titulo.'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}