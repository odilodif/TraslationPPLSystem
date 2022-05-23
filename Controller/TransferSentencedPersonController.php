<?php

include_once ('./../Model/TransferSentencedPerson.php');
include_once ('./../Model/PrisonPerson.php');
if (isset($_POST['TransferSentencedPerson'])) {
    if ($_POST['TransferSentencedPerson'] === 'Search') {

        //echo $_POST['txtIdentificatorProntuario'] . ' ->' . $_POST['op_searchingPPL'];

        switch ($_POST['op_searchingPPL']) {
            case 0:
                /*  id	name	last_name	celda	crime	state	center	prontuario	identificador	image0	regimen	sanctions	date_in  */
                $prison_person = new PrisonPerson();
                $pp_id                     = $prison_person->getPPLByIdentificator($_POST['txtIdentificatorProntuario'])['id'];
                $pp_name                   = $prison_person->getPPLByIdentificator($_POST['txtIdentificatorProntuario'])['name'];
                $pp_last_name              = $prison_person->getPPLByIdentificator($_POST['txtIdentificatorProntuario'])['last_name'];                
                $pp_celda                  = $prison_person->getPPLByIdentificator($_POST['txtIdentificatorProntuario'])['celda'];                
                $pp_crime                  = $prison_person->getPPLByIdentificator($_POST['txtIdentificatorProntuario'])['crime'];                
                $pp_state                  = $prison_person->getPPLByIdentificator($_POST['txtIdentificatorProntuario'])['state'];                
                $pp_center                 = $prison_person->getPPLByIdentificator($_POST['txtIdentificatorProntuario'])['center'];                
                $pp_prontuario             = $prison_person->getPPLByIdentificator($_POST['txtIdentificatorProntuario'])['prontuario'];                
                $pp_identificador          = $prison_person->getPPLByIdentificator($_POST['txtIdentificatorProntuario'])['identificador'];                
                $pp_imagen0                = $prison_person->getPPLByIdentificator($_POST['txtIdentificatorProntuario'])['image0'];                
                $pp_regimen                = $prison_person->getPPLByIdentificator($_POST['txtIdentificatorProntuario'])['regimen'];                
                $pp_sanctions              = $prison_person->getPPLByIdentificator($_POST['txtIdentificatorProntuario'])['sanctions'];
                $pp_date_in                = $prison_person->getPPLByIdentificator($_POST['txtIdentificatorProntuario'])['date_in'];
                $tranferSentencedppl       = new TransferSentencedPerson();
                $array_crime               = $tranferSentencedppl->getIdsCrimes($_POST['txtIdentificatorProntuario']);
                $crime_namecomplete        = $tranferSentencedppl->get_crime_namecoplete($array_crime['crime_id'])['crime_name_complete'];
                
               $data_TransferSentencedPerson= array('success'=>TRUE,
                    'crime_namecomplete'=>$crime_namecomplete,
                   'pp_name'=>$pp_name,
                   '$pp_last_name'=>$pp_last_name
                      );
                   echo ''.$data_TransferSentencedPerson['pp_name'];
            case 1:

                break;

            default:
                break;
        }
    }
}

if (isset($_POST['downloadPDF'])) {


    include_once './../Model/connection.php';
    include_once './../Utilitarian/fpdf/fpdf.php';
    $pdf2 = new FPDF();
    $pdf2->AddPage();
    $pdf2->SetFont('Arial', '', 12);
    $pdf2->Cell(10, 10, '', 0);
    $pdf2->Cell(130, 10, 'NRO. DE DOCUMENTO:SNAI-TE-00067397', 0);

    $pdf2->Image('./../View/images/encabezado.png', 10, 8, 18, 12, 'png');
    $pdf2->SetFont('Arial', 'B', 15);
    $pdf2->Cell(10, 10, '', 0);
    $pdf2->Cell(100, 10, 'TRASLADO: ', 0);
    $pdf2->Ln(8);
    $pdf2->SetFont('Arial', '', 9);
    $pdf2->Cell(140, 5, 'Matriz:Av. 10 de Agosto N49-67 y Juan Galindez ', 0);
    $pdf2->Cell(10, 5, '', 0);
    $pdf2->SetFont('Arial', 'B', 9);
    $pdf2->Cell(40, 5, 'RUC: 17114321574001', 1);
    $pdf2->Ln(5);
    $pdf2->SetFont('Arial', '', 9);
    $pdf2->Cell(130, 5, '', 0);
    $pdf2->SetFont('Arial', 'B', 15);
    $pdf2->Cell(30, 5, '    TOTAL', 0);

    $pdf2->Ln(15);
    $pdf2->SetFont('Arial', '', 9);
    $pdf2->Cell(50, 10, utf8_decode('Fecha Impresión: ') . date('d-m-Y') . '', 0);
    $pdf2->Output("FichaPPLTrasl.pdf", "D");
}
?>
