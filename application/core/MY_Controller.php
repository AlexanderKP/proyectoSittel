<?php 

class MY_Controller extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->helper('cookie');        
		$this->load->module('Template');
        $this->sistema_model->getConfig();
	}
	function enviarMailRegistro($to,$post)
    {
        // Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
        $email_to = $to;
        $email_subject = "Sistema de Tickets FETRATEL";
        // Ahora se envía el e-mail usando la función mail() de PHP
        $headers = "From: " . 'fetratel@fetratel.com' . "\r\n";
        $headers .= "CC: jovillenad@gmail.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        // Aquí se deberían validar los datos ingresados por el usuario
        $email_message = "Detalles de acceso al sistema:\n\n";
        $email_message .= "Acceda a esta web para terminar de registrarse \n\n\n\n";
        $email_message .= base_url().'Login/firstInit/'.$post['token'];

        @mail($email_to, $email_subject, $email_message, $headers);
    }
    function enviarMailTicket($data)
    {
        // Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
        $email_to = $data['destino'];
        $email_subject = "Sistema de Tickets FETRATEL";
        // Ahora se envía el e-mail usando la función mail() de PHP
        $headers = "From: " . 'fetratel@fetratel.com' . "\r\n";
        $headers .= "CC: jovillenad@gmail.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        // Aquí se deberían validar los datos ingresados por el usuario
        $email_message = "Has recibido un mensaje del ticket #".$data['ticket'];

        @mail($email_to, $email_subject, $email_message, $headers);
    }

    function enviarPasswordHashed($data)
    {
        $email_to = $data['destino'];
        $email_subject = "Sistema de Tickets FETRATEL";

        // Aquí se deberían validar los datos ingresados por el usuario
        $email_message = "Su nueva clave es: ".$data['clave'];
        // Ahora se envía el e-mail usando la función mail() de PHP
        $headers = 'From: fetratel@fetratel.com'."\r\n".
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
    }

    function baseGenerarExcel($content){
        $this->load->library('Excel');
        header("Content-Type: text/html;charset=utf-8");    
        $data = $content['data'];
        $config = $this->session->userdata('config');
        $head[0] = 'Sistema Gestion de Tickets';
        $head[1] = 'FETRATEL PERU';
        $usuario = 'Usuario: ' . $this->session->userdata('s_user')->usuario_nombre;
        $logo = (file_exists(FCPATH . 'assets/imagenes/logo_max.png')) ? FCPATH . 'assets/imagenes/logo_max.png' : '';
        $titulo = $content['tituloExcel'];
        $filtro = $content['estado'];
        $rango_header = $content['header'];
        $name_keydata = $content['name_keydata'];
        $pos_content = 8;
        $pos_header = 7;
        $celdas = array(1=>'A',2=>'B',3=>'C',4=>'D',5=>'E',6=>'F',7=>'G',8=>'H',9=>'I',10=>'J',11=>'K');
        // Create new PHPExcel object
        $Excel = new PHPExcel();

        // Set document properties
        $Excel->getProperties()->setCreator("FETRATEL PERU")     ##  CREADOR
                   ->setLastModifiedBy("FETRATEL PERU")      ## CREADORES ULTIMO
                   ->setTitle($titulo) ## TITULO DEL DOC
                   ->setSubject("Office 2007 XLSX Document")   
                   ->setDescription("Documento informativo.") 
                   ->setKeywords("office 2007 openxml php")     ## ETIQUETAS
                   ->setCategory("Tramite");       ##  CATEGORIA

                   /* ------------------HEADER------------------- */
        //QUITO LAS LINEAS A UN RANGO DE CELDA
        $Excel->getActiveSheet()->getStyle('A1:A4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $Excel->getActiveSheet()->getStyle('B1:I1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $Excel->getActiveSheet()->getStyle('B2:I2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $Excel->getActiveSheet()->getStyle('B3:I3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $Excel->getActiveSheet()->getStyle('B3:I3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $Excel->getActiveSheet()->getStyle('D4:F4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $Excel->getActiveSheet()->getStyle('B5:I5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $Excel->getActiveSheet()->getStyle('G4:I4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $Excel->getActiveSheet()->getStyle('B4:C4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $Excel->getActiveSheet()->getStyle('A6:I6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        // GENERO LA CABEZERA DEL EXCEL
        $Excel->setActiveSheetIndex(0)
                    ->setCellValue('D1', $head[0])
                ->setCellValue('D2', $head[1])
                ->setCellValue('B3', $usuario)
                ->setCellValue('B4', $titulo)
                ->setCellValue('B5', $filtro);

        // LE AGREGO ESTILOS AL TITULO
        $Excel->getActiveSheet()->getStyle('D1')->getFont()->setName('Candara');
        $Excel->getActiveSheet()->getStyle('D1')->getFont()->setSize(15);
        $Excel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
        $Excel->getActiveSheet()->getStyle('D1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
        $Excel->getActiveSheet()->getStyle('D2')->getFont()->setName('Candara');
        $Excel->getActiveSheet()->getStyle('D2')->getFont()->setSize(12);
        $Excel->getActiveSheet()->getStyle('D2')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);
        $Excel->getActiveSheet()->getStyle('B3')->getFont()->setName('Candara');
        $Excel->getActiveSheet()->getStyle('B3')->getFont()->setSize(10);
        $Excel->getActiveSheet()->getStyle('B3')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
        $Excel->getActiveSheet()->getStyle('B4')->getFont()->setName('Candara');
        $Excel->getActiveSheet()->getStyle('B4')->getFont()->setSize(16);
        $Excel->getActiveSheet()->getStyle('B4')->getFont()->setBold(true);
        $Excel->getActiveSheet()->getStyle('B4')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKBLUE);

        //LE AGREGO ALTURA A UNA FILA
        $Excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
        $Excel->getActiveSheet()->getRowDimension('4')->setRowHeight(30);

        $BStyle = array(
            'borders' => array(
                'bottom' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FF000000'),
                    )
                )
            );
        $Excel->getActiveSheet()->getStyle('A3:I3')->applyFromArray($BStyle);

        $style = array(
            
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
            );
        $Excel->getActiveSheet()->getStyle("D4:F4")->applyFromArray($style);


        /*--------------------  END header      -------------------*/

        //LE AGREGO ANCHO A LAS CELDAS
        $Excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $Excel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $Excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $Excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $Excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $Excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $Excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
        $Excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
        $Excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

        //ESTILOS PARA LA CABEZERA
        $Excel->getActiveSheet()->getStyle('A7:' . $celdas[$content['header']] . '7')->applyFromArray(
            array(
                'font'    => array(
                    'bold'      => true
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
                'borders' => array(
                    'top'     => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
                    'rotation'   => 90,
                    'startcolor' => array(
                        'argb' => 'FFA0A0A0'
                    ),
                    'endcolor'   => array(
                        'argb' => 'FFFFFFFF'
                    )
                )
            )
        );
        for($h = 0; $h < $rango_header; $h++){
            $Excel->setActiveSheetIndex(0)
                    ->setCellValue($celdas[$h+1].$pos_header, $content['header_title'][$h]);
        }

        //ESTILOS PARA EL CONTENIDO
        $styleThinBlackBorderOutline = array(
        'borders' => array(
            'outline' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                'color' => array('argb' => 'FF000000'),
                ),
            ),
        );
        $header_Y = $celdas[$content['header']] . ($content['row']+7);
        $Excel->getActiveSheet()->getStyle('A8:' . $header_Y)->applyFromArray($styleThinBlackBorderOutline);
        

        
        $key = $content['row'];
        if ($key > 0) {
            if (isset($data[$content['name_keydata'][0][0]])) {
                $ii = 0;
                for($i = 8 ; $i <= (7+$key) ; $i++){
                    for($cel = 1 ; $cel <= $rango_header ; $cel++){
                        $llave = $content['name_keydata'][$cel-1];
                        $Excel->setActiveSheetIndex(0)
                            ->setCellValue($celdas[$cel].$i, $data[$llave][$ii]);
                    }
                $ii++;
                }
            } else {
                for($i = 8 ; $i <= (7+$key) ; $i++){
                    for($cel = 1 ; $cel <= $rango_header ; $cel++){
                        $llave = $content['name_keydata'][$cel-1];
                        $Excel->setActiveSheetIndex(0)
                            ->setCellValue($celdas[$cel].$i, $data[$llave]);
                    }
                }
            }
            
        }

        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('Logo');
        $objDrawing->setDescription('Logo');
        $objDrawing->setPath($logo);
        $objDrawing->setHeight(55);
        $objDrawing->setWorksheet($Excel->getActiveSheet());

        // Rename worksheet
        $Excel->getActiveSheet()->setTitle('Documento');   
        
        
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $Excel->setActiveSheetIndex(0);
        
        
        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'. $titulo .'.xlsx"');         ### TITULO DEL EXCEL
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        
        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0
        
        $objWriter = PHPExcel_IOFactory::createWriter($Excel, 'Excel2007');
        $objWriter->save('php://output');

    }
}