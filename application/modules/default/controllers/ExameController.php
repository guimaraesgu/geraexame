<?php
require_once("../application/modules/default/models/Exame.php");
require_once("regrasNegocio.php");
/**
 * Nível de Técnicas
 *1 = Cinza
 *2 = Azul
 *3 = Amarela
 *4 = Laranja
 *5 = Verde
 *6 = Roxa
 *7 = Marrom
 */

class Default_ExameController extends Zend_Controller_Action{
    private $randnage = 0;
    private $randossae = 0;
    private $randrenraku = 0;
    private $randrenzoku = 0;
    private $randkaeshi = 0;
    private $randshime = 0;
    private $randkansetsu = 0;

    public function init(){}

    public function indexAction(){
        $this->view->title = "DojoSys - Exame de Graduação"; 
    }

    public function geraexameAction(){   
        $this->view->title = "DojoSys - Exame de Graduação";

        $faixa = $_GET['faixa'];
        $this->view->grad = $faixa;

        $nivTec = $_GET['nivTec'];
        Default_ExameController::getRand($nivTec);
        
        $tec = new Default_Model_Exame;
        $tec->setNivTec($nivTec);

        /***** NAGE WAZA *****/
        if($nivTec < 8){
            $result[0] = $tec->getTecFromNivNage();
            $result[1] = $tec->getTecFromNivRenraku();
            $result[2] = $tec->getTecFromNivRenzoku();
            $result[3] = $tec->getTecFromNivKaeshi();
            $result[4] = $tec->getTecFromNivOssae();
            $result[5] = $tec->getTecFromNivShime();
            $result[6] = $tec->getTecFromNivKansetsu();
        }else{
            $result[0] = $tec->getAllTecFromNage();
            $result[1] = $tec->getAllTecFromRenraku();
            $result[2] = $tec->getAllTecFromRenzoku();
            $result[3] = $tec->getAllTecFromKaeshi();
            $result[4] = $tec->getAllTecFromOssae();
            $result[5] = $tec->getAllTecFromShime();
            $result[6] = $tec->getAllTecFromKansetsu();
        }

        echo '<input type="hidden" name="nivtec" id="nivtec" value="'. $nivTec .'" />
        <input type="hidden" name="randnage" id="randnage" value="'.  $this->randnage .'" />
        <input type="hidden" name="randossae" id="randossae" value="'.  $this->randossae .'" />       
        <input type="hidden" name="randrenzoku" id="randrenzoku" value="'.  $this->randrenzoku.'" />
        <input type="hidden" name="randrenraku" id="randrenraku" value="'.  $this->randrenraku.'" />
        <input type="hidden" name="randkaeshi" id="randkaeshi" value="'.  $this->randkaeshi.'" />
        <input type="hidden" name="randshime" id="randshime" value="'.  $this->randshime.'" />
        <input type="hidden" name="randkansetsu" id="randkansetsu" value="'.  $this->randkansetsu.'" />
        <div class="row">
        <h4 class="text-center printtitle">Nage Waza</h4>
        <table class="table table-bordered" id="teoria">
        <thead><tr>
                <td class="techprat"><h5>Técnicas</h5></td>
                <td class="nota"><h5>Nota</h5></td>
                <td class="obsprat"><h5>Obs.</h5></td>
        </tr></thead>
        <tbody class="tb">';
        
        if($this->randnage != 0){
            $result2 = $tec->getTecFromNivNageRand($this->randnage);
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
        }
        while($row = mysqli_fetch_array($result[0])){
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

        /***** RENRAKU WAZA *****/
        if($nivTec > 3){
            echo '<div class="row">
            <h4 class="text-center printtitle">Renraku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            if($this->randrenraku != 0){
                $result2 = $tec->getTecFromNivRenrakuRand($this->randrenraku);
                while($row = mysqli_fetch_array($result2)){
                    echo '<tr>
                        <td>'. $row['NomTec'] . '</td>
                        <td>
                        <input type="text" class="input-nota" name="notanrenraku" />
                        </td>
                        <td>
                        <input type="text" class="input-obs" />
                        </td>
                    </tr>';
                }
            }
            while($row = mysqli_fetch_array($result[1])){
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


            /***** RENZOKU WAZA *****/
            echo '<div class="row">
            <h4 class="text-center printtitle">Renzoku Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            if($this->randrenzoku != 0){
                $result2 = $tec->getTecFromNivRenzokuRand($this->randrenzoku);
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
            }
            while($row = mysqli_fetch_array($result[2])){
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

            /***** KAESHI WAZA *****/
            echo '<div class="row">
            <h4 class="text-center printtitle">Kaeshi Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techseq"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsseq"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            if($this->randkaeshi != 0){
                $result2 = $tec->getTecFromNivKaeshiRand($this->randkaeshi);
                while($row = mysqli_fetch_array($result2)){
                    echo '<tr>
                        <td>'. $row['NomTec'] . '</td>
                        <td>
                        <input type="text" class="input-nota" name="notankaeshi" />
                        </td>
                        <td>
                        <input type="text" class="input-obs" />
                        </td>
                    </tr>';
                }
            }
            while($row = mysqli_fetch_array($result[3])){
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
        }

        /***** OSSAE WAZA *****/
        echo '<div class="row">
        <h4 class="text-center printtitle">Ossae Komi Waza</h4>
        <table class="table table-bordered" id="teoria">
        <thead><tr>
                <td class="techprat"><h5>Técnicas</h5></td>
                <td class="nota"><h5>Nota</h5></td>
                <td class="obsprat"><h5>Obs.</h5></td>
        </tr></thead>
        <tbody class="tb">';
        if($this->randossae != 0){
            $result2 = $tec->getTecFromNivOssaeRand($this->randossae); 
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
        }
        while($row = mysqli_fetch_array($result[4])){
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

        if($nivTec > 3){
            /***** SHIME WAZA *****/
           
            echo '<div class="row">
            <h4 class="text-center printtitle">Shime Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            if( $this->randshime != 0){
                $result2 = $tec->getTecFromNivShimeRand($this->randshime);
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
            }
            while($row = mysqli_fetch_array($result[5])){
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

            /***** KANSETSU WAZA *****/
            echo '<div class="row">
            <h4 class="text-center printtitle">Kansetsu Waza</h4>
            <table class="table table-bordered" id="teoria">
            <thead><tr>
                    <td class="techprat"><h5>Técnicas</h5></td>
                    <td class="nota"><h5>Nota</h5></td>
                    <td class="obsprat"><h5>Obs.</h5></td>
            </tr></thead>
            <tbody class="tb">';
            if($this->randkansetsu != 0){
                $result2 = $tec->getTecFromNivKansetsuRand($this->randkansetsu);
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
            }
            while($row = mysqli_fetch_array($result[6])){
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
            echo '</tbody></table></div></div></div></form><';
        }
    }


    /**** FUNCOES AUXILIARES ****/
    public function getRand($nivTec){
        if($nivTec == 1 || $nivTec == 8){}
        elseif ($nivTec == 2) {
             $this->randnage = RANDNAGEAZUL;
             $this->randossae = RANDOSSAEAZUL;
        }
        elseif ($nivTec == 3) {
             $this->randnage = RANDNAGEAMARELA;
             $this->randossae = RANDOSSAEAMARELA;
        }
        elseif ($nivTec == 4) {
             $this->randnage = RANDNAGELARANJA;
             $this->randossae = RANDOSSAELARANJA;
             $this->randrenraku = RANDRENRAKULARANJA;
             $this->randrenzoku = RANDRENZOKULARANJA;
             $this->randkaeshi = RANDKAESHILARANJA;
        }
        elseif ($nivTec == 5) {
             $this->randnage = RANDNAGEVERDE;
             $this->randossae = RANDOSSAEVERDE;
             $this->randrenraku = RANDRENRAKUVERDE;
             $this->randrenzoku = RANDRENZOKUVERDE;
             $this->randkaeshi = RANDKAESHIVERDE;
             $this->randshime = RANDSHIMEVERDE;
             $this->randkansetsu = RANDKANSETSUVERDE;
        }
        elseif ($nivTec == 6) {
             $this->randnage = RANDNAGEROXA;
             $this->randossae = RANDOSSAEROXA;
             $this->randrenraku = RANDRENRAKUROXA;
             $this->randrenzoku = RANDRENZOKUROXA;
             $this->randkaeshi = RANDKAESHIROXA;
             $this->randshime = RANDSHIMEROXA;
             $this->randkansetsu = RANDKANSETSUROXA;
        }
        elseif ($nivTec == 7) {
             $this->randnage = RANDNAGEMARROM;
             $this->randossae = RANDOSSAEMARROM;
             $this->randrenraku = RANDRENRAKUMARROM;
             $this->randrenzoku = RANDRENZOKUMARROM;
             $this->randkaeshi = RANDKAESHIMARROM;
             $this->randshime = RANDSHIMEMARROM;
             $this->randkansetsu = RANDKANSETSUMARROM;
        }
    }
}