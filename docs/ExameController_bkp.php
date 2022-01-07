<?php
require_once("../application/modules/default/models/Exame.php");
/**
 * Nível de Técnicas
 *1. Cinza
 *2. Azul
 *3. Amarela
 *4. Laranja
 *5. Verde
 *6. Roxa
 *7. Marrom
 */

class Default_ExameController extends Zend_Controller_Action{

    public function init(){}

    public function indexAction(){
        $this->view->title = "DojoSys - Exame de Graduação"; 
    }

    public function geraexameAction(){   
        $this->view->title = "DojoSys - Exame de Graduação";

        $faixa = $_GET['faixa'];
        $nivTec = $_GET['nivTec'];
        $this->view->grad = $faixa;
        
        if($faixa == 'Cinza'){
            /** BUSCAR TÉCNICAS DE NAGE ( CODCLA == 1 e 2 PARA CINZA == NÍVEL 1 )**/
            $tec = new Default_Model_Exame;
            $tec->setNivTec('1');
            $result = $tec->getTecFromNivNage();

            echo '<input type="hidden" name="nivtec" id="nivtec" value="1" />
            <div class="row">
            <h4 class="text-center printtitle">Nage Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="nota" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody>
            </table>
            </div>';

            /** BUSCAR TÉCNICAS DE OSSAE WAZA ( CODCLA = 6 ) **/
            $result = $tec->getTecFromNivOssae();

            echo '<div class="row">
            <h4 class="text-center printtitle">Ossae Komi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="nota" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div></div></div></form>';

            mysqli_free_result($result);

        }

        /** BUSCAR TÉCNICAS DE AZUL == NÍVEL 2 **/
        else if($faixa == 'Azul'){ 
            $tec = new Default_Model_Exame;
            $tec->setNivTec('2');
            $randnage  = 4;
            $randossae = 3;

            $result  = $tec->getTecFromNivNage();
            $result2 = $tec->getTecFromNivNageRand($randnage);

            echo '<input type="hidden" name="nivtec" id="nivtec" value="2" />
            <input type="hidden" name="randnage" id="randnage" value="'.$randnage.'" />
            <input type="hidden" name="randossae" id="randossae" value="'.$randossae.'" />
            <div class="row">
            <h4 class="text-center printtitle">Nage Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead>
                <tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota_prat"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
                </tr>
            </thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notanage" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>';
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notanage" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE OSSAE WAZA ( CODCLA = 6 ) **/
            $result  = $tec->getTecFromNivOssae();
            $result2 = $tec->getTecFromNivOssaeRand($randossae); 
            echo '<div class="row">
            <h4 class="text-center printtitle">Ossae Komi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notaossae" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notaossae" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div></div></div></form>';
        
            mysqli_free_result($result);
            mysqli_free_result($result2);
        }

        /** BUSCAR TÉCNICAS DE AMARELA == NÍVEL 3 **/
        else if($faixa == 'Amarela'){
            $tec = new Default_Model_Exame;
            $tec->setNivTec('3');
            $randnage  = 4;
            $randossae = 4;

            $result  = $tec->getTecFromNivNage();
            $result2 = $tec->getTecFromNivNageRand($randnage);

            echo '<input type="hidden" name="nivtec" id="nivtec" value="3" />
            <input type="hidden" name="randnage" id="randnage" value="'.$randnage.'" />
            <input type="hidden" name="randossae" id="randossae" value="'.$randossae.'" />
            <div class="row">
            <h4 class="text-center printtitle">Nage Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notanage" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notanage" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE RENRAKU WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivRenraku();
            echo '<div class="row">
            <h4 class="text-center printtitle">Renraku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenraku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE RENZOKU WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivRenzoku();
            echo '<div class="row">
            <h4 class="text-center printtitle">Renzoku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenzoku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE KAESHI WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivKaeshi();
            echo '<div class="row">
            <h4 class="text-center printtitle">Kaeshi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakaeshi" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE OSSAE WAZA ( CODCLA = 6 ) **/
            $result  = $tec->getTecFromNivOssae();
            $result2 = $tec->getTecFromNivOssaeRand($randossae); 
            echo '<div class="row">
            <h4 class="text-center printtitle">Ossae Komi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notaossae" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notaossae" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div></div></div></form>';

            mysqli_free_result($result);
            mysqli_free_result($result2);
        }

        /** BUSCAR TÉCNICAS DE LARANJA == NÍVEL 4 **/
        else if($faixa == 'Laranja'){
            $tec = new Default_Model_Exame;
            $tec->setNivTec('4');
            $randnage  = 8;
            $randossae = 4;
            $randrenzoku = 1;
            $randrenraku = 2;
            $randkaeshi = 1;
            $result  = $tec->getTecFromNivNage();
            $result2 = $tec->getTecFromNivNageRand($randnage);

            echo '<input type="hidden" name="nivtec" id="nivtec" value="4" />
            <input type="hidden" name="randnage" id="randnage" value="'.$randnage.'" />
            <input type="hidden" name="randossae" id="randossae" value="'.$randossae.'" />
            <input type="hidden" name="randrenzoku" id="randrenzoku" value="'.$randrenzoku.'" />
            <input type="hidden" name="randrenraku" id="randrenraku" value="'.$randrenraku.'" />
            <input type="hidden" name="randkaeshi" id="randkaeshi" value="'.$randkaeshi.'" />
            <div class="row">
            <h4 class="text-center printtitle">Nage Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notanage" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notanage" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE RENRAKU WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivRenraku();
            $result2 = $tec->getTecFromNivRenrakuRand($randrenraku);
            echo '<div class="row">
            <h4 class="text-center printtitle">Renraku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenraku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenraku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE RENZOKU WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivRenzoku();
            $result2 = $tec->getTecFromNivRenzokuRand($randrenzoku);
            echo '<div class="row">
            <h4 class="text-center printtitle">Renzoku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenzoku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenzoku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE KAESHI WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivKaeshi();
            $result2 = $tec->getTecFromNivKaeshiRand($randkaeshi);
            echo '<div class="row">
            <h4 class="text-center printtitle">Kaeshi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakaeshi" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakaeshi" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE OSSAE WAZA ( CODCLA = 6 ) **/
            $result  = $tec->getTecFromNivOssae();
            $result2 = $tec->getTecFromNivOssaeRand($randossae); 
            echo '<div class="row">
            <h4 class="text-center printtitle">Ossae Komi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notaossae" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notaossae" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE SHIME WAZA ( CODCLA = 6 ) **/
            $result  = $tec->getTecFromNivShime();
            echo '<div class="row">
            <h4 class="text-center printtitle">Shime Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notashime" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE KANSETSU WAZA ( CODCLA = 6 ) **/
            $result  = $tec->getTecFromNivKansetsu(); 
            echo '<div class="row">
            <h4 class="text-center printtitle">Kansetsu Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakansetsu" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div></div></div></form>';

            mysqli_free_result($result);
            mysqli_free_result($result2);
        }

        /** BUSCAR TÉCNICAS DE VERDE == NÍVEL 5 **/
        else if($faixa == 'Verde'){
            $tec = new Default_Model_Exame;
            $tec->setNivTec('5');
            $randnage  = 12;
            $randrenzoku = 2;
            $randrenraku = 4;
            $randkaeshi = 3;
            $randshime = 2;
            $randkansetsu = 1;

            $result  = $tec->getTecFromNivNage();
            $result2 = $tec->getTecFromNivNageRand($randnage);

            echo '<input type="hidden" name="nivtec" id="nivtec" value="5" />
            <input type="hidden" name="randnage" id="randnage" value="'.$randnage.'" />
            <input type="hidden" name="randrenzoku" id="randrenzoku" value="'.$randrenzoku.'" />
            <input type="hidden" name="randrenraku" id="randrenraku" value="'.$randrenraku.'" />
            <input type="hidden" name="randkaeshi" id="randkaeshi" value="'.$randkaeshi.'" />
            <input type="hidden" name="randshime" id="randshime" value="'.$randshime.'" />
            <input type="hidden" name="randkansetsu" id="randkansetsu" value="'.$randkansetsu.'" />
            <div class="row">
            <h4 class="text-center printtitle">Nage Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notanage" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notanage" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE RENRAKU WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivRenraku();
            $result2 = $tec->getTecFromNivRenrakuRand($randrenraku);
            echo '<div class="row">
            <h4 class="text-center printtitle">Renraku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenraku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenraku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE RENZOKU WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivRenzoku();
            $result2 = $tec->getTecFromNivRenzokuRand($randrenzoku);
            echo '<div class="row">
            <h4 class="text-center printtitle">Renzoku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenzoku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenzoku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE KAESHI WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivKaeshi();
            $result2 = $tec->getTecFromNivKaeshiRand($randkaeshi);
            echo '<div class="row">
            <h4 class="text-center printtitle">Kaeshi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakaeshi" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakaeshi" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE OSSAE WAZA ( CODCLA = 6 ) **/
            $result  = $tec->getAllTecFromOssae(); 
            echo '<div class="row">
            <h4 class="text-center printtitle">Ossae Komi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notaossae" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE SHIME WAZA ( CODCLA = 6 ) **/
            $result  = $tec->getTecFromNivShime();
            $result2  = $tec->getTecFromNivShimeRand($randshime);
            echo '<div class="row">
            <h4 class="text-center printtitle">Shime Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notashime" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notashime" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE KANSETSU WAZA ( CODCLA = 6 ) **/
            $result  = $tec->getTecFromNivKansetsu(); 
            $result2  = $tec->getTecFromNivKansetsuRand($randkansetsu); 
            echo '<div class="row">
            <h4 class="text-center printtitle">Kansetsu Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakansetsu" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakansetsu" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div></div></div></form>';

            mysqli_free_result($result);
            mysqli_free_result($result2);
        }

        /** BUSCAR TÉCNICAS DE ROXA == NÍVEL 6 **/
        else if($faixa == 'Roxa'){
            $tec = new Default_Model_Exame;
            $tec->setNivTec('6');
            $randnage = 16;
            $randrenzoku = 4;
            $randrenraku = 6;
            $randkaeshi = 6;
            $randshime = 4;
            $randkansetsu = 4;
            $result  = $tec->getTecFromNivNage();
            $result2 = $tec->getTecFromNivNageRand($randnage);

            echo '<input type="hidden" name="nivtec" id="nivtec" value="6" />
            <input type="hidden" name="randnage" id="randnage" value="'.$randnage.'" />
            <input type="hidden" name="randrenzoku" id="randrenzoku" value="'.$randrenzoku.'" />
            <input type="hidden" name="randrenraku" id="randrenraku" value="'.$randrenraku.'" />
            <input type="hidden" name="randkaeshi" id="randkaeshi" value="'.$randkaeshi.'" />
            <input type="hidden" name="randshime" id="randshime" value="'.$randshime.'" />
            <input type="hidden" name="randkansetsu" id="randkansetsu" value="'.$randkansetsu.'" />
            <div class="row">
            <h4 class="text-center printtitle">Nage Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notanage" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notanage" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE RENRAKU WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivRenraku();
            $result2 = $tec->getTecFromNivRenrakuRand($randrenraku);
            echo '<div class="row">
            <h4 class="text-center printtitle">Renraku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenraku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenraku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE RENZOKU WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivRenzokuRand($randrenzoku);
            echo '<div class="row">
            <h4 class="text-center printtitle">Renzoku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenzoku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE KAESHI WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivKaeshi();
            $result2 = $tec->getTecFromNivKaeshiRand($randkaeshi);
            echo '<div class="row">
            <h4 class="text-center printtitle">Kaeshi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakaeshi" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakaeshi" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE OSSAE WAZA ( CODCLA = 6 ) **/
            $result = $tec->getAllTecFromOssae(); 
            echo '<div class="row">
            <h4 class="text-center printtitle">Ossae Komi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notaossae" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE SHIME WAZA ( CODCLA = 6 ) **/
            $result  = $tec->getTecFromNivShime();
            $result2  = $tec->getTecFromNivShimeRand($randshime);
            echo '<div class="row">
            <h4 class="text-center printtitle">Shime Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notashime" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notashime" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE KANSETSU WAZA ( CODCLA = 6 ) **/
            $result  = $tec->getTecFromNivKansetsu(); 
            $result2  = $tec->getTecFromNivKansetsuRand($randkansetsu); 
            echo '<div class="row">
            <h4 class="text-center printtitle">Kansetsu Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakansetsu" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakansetsu" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div></div></div></form>';

            mysqli_free_result($result);
            mysqli_free_result($result2);
        }

        /** BUSCAR TÉCNICAS DE MARROM == NÍVEL 7 **/
        else if($faixa == 'Marrom'){
            $tec = new Default_Model_Exame;
            $tec->setNivTec('7');
            $randnage = 20;
            $randrenzoku = 6;
            $randrenraku = 8;
            $randkaeshi = 9;
            $randshime = 6;
            $randkansetsu = 8;
            $result  = $tec->getTecFromNivNage();
            $result2 = $tec->getTecFromNivNageRand($randnage);

            echo '<input type="hidden" name="nivtec" id="nivtec" value="7" />
            <input type="hidden" name="randnage" id="randnage" value="'.$randnage.'" />
            <input type="hidden" name="randrenzoku" id="randrenzoku" value="'.$randrenzoku.'" />
            <input type="hidden" name="randrenraku" id="randrenraku" value="'.$randrenraku.'" />
            <input type="hidden" name="randkaeshi" id="randkaeshi" value="'.$randkaeshi.'" />
            <input type="hidden" name="randshime" id="randshime" value="'.$randshime.'" />
            <input type="hidden" name="randkansetsu" id="randkansetsu" value="'.$randkansetsu.'" />
            <div class="row">
            <h4 class="text-center printtitle">Nage Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notanage" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>';
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notanage" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE RENRAKU WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivRenrakuRand($randrenraku);
            echo '<div class="row">
            <h4 class="text-center printtitle">Renraku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenraku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE RENZOKU WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivRenzokuRand($randrenzoku);
            echo '<div class="row">
            <h4 class="text-center printtitle">Renzoku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notarenzoku" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE KAESHI WAZA ( CODCLA = 4 ) **/
            $result = $tec->getTecFromNivKaeshi();
            $result2 = $tec->getTecFromNivKaeshiRand($randkaeshi);
            echo '<div class="row">
            <h4 class="text-center printtitle">Kaeshi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakaeshi" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakaeshi" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE OSSAE WAZA ( CODCLA = 6 ) **/
            $result = $tec->getAllTecFromOssae(); 
            echo '<div class="row">
            <h4 class="text-center printtitle">Ossae Komi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notaossae" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE SHIME WAZA ( CODCLA = 6 ) **/
            $result  = $tec->getTecFromNivShime();
            $result2  = $tec->getTecFromNivShimeRand($randshime);
            echo '<div class="row">
            <h4 class="text-center printtitle">Shime Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result2)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notashime" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notashime" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** BUSCAR TÉCNICAS DE KANSETSU WAZA ( CODCLA = 6 ) **/
            $result  = $tec->getTecFromNivKansetsuRand($randkansetsu); 
            echo '<div class="row">
            <h4 class="text-center printtitle">Kansetsu Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="notakansetsu" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div></div></div></form>';

            mysqli_free_result($result);
            mysqli_free_result($result2);
        }

        /** BUSCAR TÉCNICAS DE PRETA **/
        else if($faixa == 'Preta'){
            
            /** BUSCAR TÉCNICAS DE NAGE ( CODCLA == 1 e 2 )**/
            $tec = new Default_Model_Exame;
            $result = $tec->getAllTecFromNage();

            echo '<input type="hidden" name="nivtec" id="nivtec" value="1" />
            <div class="row">
            <h4 class="text-center printtitle">Nage Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="nota" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';

            /** RENRAKU **/
            $result = $tec->getAllTecFromRenraku();
            echo '<div class="row">
            <h4 class="text-center printtitle">Renraku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="nota" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';
            /** RENZOKU **/
            $result = $tec->getAllTecFromRenzoku();
            echo '<div class="row">
            <h4 class="text-center printtitle">Renzoku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="nota" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';
            /** KAESHI **/
            $result = $tec->getAllTecFromKaeshi();
            echo '<div class="row">
            <h4 class="text-center printtitle">Kaeshi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="nota" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';
            /** OSSAE **/
            $result = $tec->getAllTecFromOssae();
            echo '<div class="row">
            <h4 class="text-center printtitle">Ossae Komi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="nota" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';
            /** SHIME **/
            $result = $tec->getAllTecFromShime();
            echo '<div class="row">
            <h4 class="text-center printtitle">Shime Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="nota" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div>';
            /** KANSETSU **/
            $result = $tec->getAllTecFromKansetsu();
            echo '<div class="row">
            <h4 class="text-center printtitle">Kansetsu Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            while($row = mysqli_fetch_array($result)){
                echo '<tr>
                    <td>'. $row['NomTec'] . '</td>
                    <td>
                    <input type="text" class="input-nota" name="nota" />
                    </td>
                    <td>
                    <input type="text" class="input-obs" />
                    </td>
                </tr>'; 
            }
            echo '</tbody></table></div></div></div></form>';

            mysqli_free_result($result);
        }

    }

}