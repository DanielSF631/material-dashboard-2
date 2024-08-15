<?php
// Aquí irían las conexiones a la base de datos y otras configuraciones necesarias

require '../../vendor/autoload.php';

include("../../php/bd.php");
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

// Aquí irían las conexiones a la base de datos y otras configuraciones necesarias

if (isset($_GET['materia'])) {
    $materia = $_GET['materia'];

    // Crear un nuevo objeto Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Agregar encabezado con imagen y texto
    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing->setName('Encabezado');
    $drawing->setDescription('Encabezado');
    $drawing->setPath('../img/LogoLoginCeti.jpeg'); // Ruta a tu imagen
    $drawing->setCoordinates('C1'); // Posición de la imagen
    $drawing->setWidth(200); // Ancho de la imagen en píxeles
    $drawing->setHeight(100);
    $drawing->setWorksheet($sheet);

    // Texto personalizado
    $sheet->setCellValue('C7', 'TEMAS');
    $sheet->mergeCells('C7:I7'); // Fusionar celdas para el texto

     $sheet->setCellValue('N2', 'COD:ACD-FCC-03');
    $sheet->mergeCells('N2:P2'); 

    $sheet->setCellValue('C11', 'OBJETIVO DE LA MATERIA');
    $sheet->mergeCells('C11:E11'); 
    $sheet->mergeCells('C12:J15'); 

    $sheet->setCellValue('K11', 'ESTRATEGIAS DE APRENDIZAJE');
    $sheet->mergeCells('K11:M11'); 
    $sheet->mergeCells('K12:P15');

     $sheet->setCellValue('C16', 'CRONOGRAMA');
    $sheet->mergeCells('C16:P16');  
    $sheet->getStyle('C16')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('C16')->getFont()->setBold(true); 


    $sheet->setCellValue('C6', 'Docente:');
    $sheet->mergeCells('C6:D6'); // Fusionar celdas para el texto
    $sheet->mergeCells('E6:H6');
    $sheet->setCellValue('C7', 'Carrera:');
    $sheet->mergeCells('C7:D7'); // Fusionar celdas para el texto
    $sheet->mergeCells('E7:F7');
    $sheet->setCellValue('C8', 'Turno:');
    $sheet->mergeCells('C8:D8'); // Fusionar celdas para el texto
    $sheet->mergeCells('E8:F8');
    $sheet->setCellValue('C9', 'Materia:');
    $sheet->mergeCells('C9:D9'); // Fusionar celdas para el texto
    $sheet->mergeCells('E9:H9');

      $sheet->setCellValue('J6', 'FECHA DE PRESENTACION:');
    $sheet->mergeCells('J6:L6'); // Fusionar celdas para el texto
    $sheet->mergeCells('M6:P6');
    $sheet->setCellValue('J7', 'FEECHA DE INICIO:');
    $sheet->mergeCells('J7:L7'); // Fusionar celdas para el texto
    $sheet->mergeCells('M7:P7');
    $sheet->setCellValue('J8', 'FECHA DE FINALIZACION:');
    $sheet->mergeCells('J8:L8'); // Fusionar celdas para el texto
    $sheet->mergeCells('M8:P8');
    $sheet->setCellValue('J9', 'CODIGO DE ASIGNATURA:');
    $sheet->mergeCells('J9:L9'); // Fusionar celdas para el texto
    $sheet->mergeCells('M9:P9');


    $sheet->setCellValue('N3', 'Fecha : ' . date('d/m/y'));
    $sheet->mergeCells('N3:P3');

    $sheet->setCellValue('E2', 'INSTITUTO TECNICO CEETII'); // Texto personalizado
    $sheet->mergeCells('E2:G2');
     $sheet->setCellValue('E3', 'R.M 0907/22 - R.A. 155/23'); // Texto personalizado
    $sheet->mergeCells('E3:G3');

      $sheet->setCellValue('H2', 'CRONOGRAMA CURRICULAR PRIMER BIMESTRE'); // Texto personalizado
      $sheet->mergeCells('H2:M3');
      //$mergedCellStyle = $sheet->getStyle('H2');
      $sheet->getStyle('H2:M3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('H2:M3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
       $sheet->getStyle('H2')->getFont()->setBold(true);
  
   
   

    $sheet->setCellValue('K17', 'FECHAS');
    $sheet->mergeCells('K17:P17');
    $sheet->getStyle('K17')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('K17')->getFont()->setBold(true); 

     $sheet->setCellValue('C17', 'TEMAS');
    $sheet->mergeCells('C17:H20');
    $sheet->getStyle('C17:H20')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('C17:H20')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
       $sheet->getStyle('C17')->getFont()->setBold(true);

    $sheet->mergeCells('D21:H21'); 
    $sheet->mergeCells('D22:H22'); 
    $sheet->mergeCells('D23:H23'); 
    $sheet->mergeCells('D24:H24'); 
    $sheet->mergeCells('D25:H25'); 
    $sheet->mergeCells('D26:H26'); 
    $sheet->mergeCells('D27:H27'); 
    $sheet->mergeCells('D28:H28'); 
    $sheet->mergeCells('D29:H29'); 


       $styleArray = [
        'fill' => [
            'fillType' => Fill::FILL_SOLID,
            'startColor' => ['argb' => 'FF7FFFD4'], // Color gris para el fondo
        ],
        'font' => [
            'bold' => true,
            'color' => ['rgb' => 'FF000000'], // Color blanco para el texto
        ],
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'], // Color negro para el borde
            ],
        ],
    ];

    $sheet->getStyle('D21:H29')->applyFromArray($styleArray); // Aplicar el estilo a las celdas del encabezado
    $sheet->getStyle('C12:J15')->applyFromArray($styleArray);
    $sheet->getStyle('K17:P19')->applyFromArray($styleArray);
    $sheet->getStyle('E6:H6')->applyFromArray($styleArray);
    $sheet->getStyle('E9:H9')->applyFromArray($styleArray);
    $sheet->getStyle('E8:F8')->applyFromArray($styleArray);
    $sheet->getStyle('E7:F7')->applyFromArray($styleArray);
    $sheet->getStyle('M6:P6')->applyFromArray($styleArray);
    $sheet->getStyle('M7:P7')->applyFromArray($styleArray);
    $sheet->getStyle('M8:P8')->applyFromArray($styleArray);
    $sheet->getStyle('M9:P9')->applyFromArray($styleArray);
    $sheet->getStyle('I20:P29')->applyFromArray($styleArray);

      $borderStyle = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['argb' => 'FF000000'], // Color negro para el borde
            ],
        ],
    ];

    $sheet->getStyle('C17:P29')->applyFromArray($borderStyle);
     $sheet->getStyle('E2:P3')->applyFromArray($borderStyle);
     $sheet->getStyle('C12:P15')->applyFromArray($borderStyle);


     // Establecer encabezados (fechas) en una fila
    $queryFechas = "SELECT DISTINCT fecha FROM cronograma WHERE id_mat = '$materia' ORDER BY fecha";
    $resultFechas = $conexion->query($queryFechas);
    $col = 11;

    while ($fecha_data = $resultFechas->fetch_assoc()) {
        $sheet->setCellValueByColumnAndRow($col, 19, \PhpOffice\PhpSpreadsheet\Shared\Date::PHPToExcel($fecha_data['fecha']));
       $sheet->getStyleByColumnAndRow($col, 19)->getNumberFormat()->setFormatCode('DD/MM/YYYY');
        $sheet->getStyleByColumnAndRow($col, 19)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
        $sheet->getStyleByColumnAndRow($col, 19)->getAlignment()->setTextRotation(90);
       // $sheet->mergeCellsByColumnAndRow($col, 18, $col, 20);
        $col++;
    }

    // Establecer encabezados
  /*  $sheet->setCellValue('C21', 'ID');
   
    $sheet->setCellValue('D21', 'Materia');
    
    $sheet->setCellValue('E21', 'Actividad');*/
    
   // $sheet->setCellValue('F8', 'Fecha');

     
   

    // Obtener datos de la base de datos para la materia seleccionada
    $query = "SELECT * FROM cronograma WHERE id_mat = '$materia'";
    $result = $conexion->query($query);

    // Llenar el archivo Excel con los datos
    $row = 21;
    $cont=1;
    while ($row_data = $result->fetch_assoc()) {
        $sheet->setCellValue('C' . $row, $cont);
        $sheet->setCellValue('D' . $row, $row_data['actividad']);
       // $sheet->setCellValue('E' . $row, $row_data['actividad']);
       // $sheet->setCellValue('F' . $row, $row_data['fecha']);
        
        $row++;
        $cont++;
    }

    // Configurar encabezados y salida del archivo
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=cronograma_' . $materia . '.xlsx');

    // Crear el objeto de escritura y guardar el archivo
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
} else {
    // Redirigir a la página principal si no se proporciona una materia
    header("Location: index.php");
    exit;
}
?>
