<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Document</title>
</head>

<body>
    <h1><span class="blue">&lt;</span>Table<span class="blue">&gt;</span> <span class="yellow">Responsive</pan></h1>
    <h2>Created with love by<span>  Leonid Almanza</span></h2>
    <table class="containerTable">
        <thead>
            <tr>
                
                <th>Sities</th>
                <th>Views</th>
                <th>Clicks</th>
                <th>Average</th>
            </tr>
        </thead>
        <tbody>
           
        <?php
            require_once 'https://github.com/PHPOffice/PHPExcel.git'
           /* require_once './PHPExcel/Classes/PHPExcel.php';*/
            $archivo="tablaresponsive.xls";
            $inputFileType = PHPExcel_IOFactory::identify($archivo);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($archivo);
            $sheet = $objPHPExcel->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); 
            $highestColumn = $sheet->getHighestColumn();
            
            $num=0;
            for ($row = 2; $row <= $highestRow; $row++){ $num++;
        ?>
                    <tr>
                    <td><?php echo $sheet->getCell("A".$row)->getValue();?></td>
                    <td><?php echo $sheet->getCell("B".$row)->getValue();?></td>
                    <td><?php echo $sheet->getCell("C".$row)->getValue();?></td>
                    <td><?php echo $sheet->getCell("D".$row)->getValue();?></td>
                    </tr>
        <?php    
            }
        ?>
                        
        </tbody>
    </table>
</body>

</html>
