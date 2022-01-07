<?php
require_once('../db/connExame.php');

class Default_Model_Exame
{
	//Atributos
	/**
	 * Codigo da Tecnica
	 *@integer
	 */
	protected $CodTec;

	/**
	 * Nome da Tecnica
	 *@string
	 */
	protected $NomTec;
	
	/**
	 * Nivel da Tecnica
	 *@string
	 */
	 protected $NivTec;
	 
	/**
	 * Codigo da Classificacao da Tecnica
	 *@date
	 */
	 protected $CodCla;
	 
	 /**
	 * CLASS CONSTRUCTOR
	 */
	public function __construct(){
		$db = new DATABASE();
		$this->link = $db->getConnection();
	}

	//***** GETTERS LOCAL *****\\

	/**
	 * @return the $CodTec
	 */
	public function getCodTec() {
		return $this->CodTec;
	}

	/**
	 * @return the $NomTec
	 */
	public function getNomTec() {
		return $this->NomTec;
	}

	/**
	 * @return the $NivTec
	 */
	public function getNivTec() {
		return $this->NivTec;
	}

	/**
	 * @return the $CodCla
	 */
	public function getCodCla() {
		return $this->CodCla;
	}

	//***** GETTERS DB *****\\

	/** BUSCA TODAS AS TÉCNICAS DE UM NÍVEL **/
	public function getTecFromNivNage(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec = '$this->NivTec' AND ( CodCla = 1 OR CodCla = 2 )");
	}
	public function getTecFromNivOssae(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec = '$this->NivTec' AND CodCla = 6");
	}
	public function getTecFromNivRenraku(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec = '$this->NivTec' AND CodCla = 4");
	}
	public function getTecFromNivRenzoku(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec = '$this->NivTec' AND CodCla = 5");
	}
	public function getTecFromNivKaeshi(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec = '$this->NivTec' AND CodCla = 3");
	}
	public function getTecFromNivShime(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec = '$this->NivTec' AND CodCla = 7");
	}
	public function getTecFromNivKansetsu(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec = '$this->NivTec' AND CodCla = 8");
	}

	/** BUSCA TODAS AS TÉCNICAS DE NÍVEL ABAIXO **/
	public function getTecFromNivNageRand($limit){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec < '$this->NivTec' AND ( CodCla = 1 OR CodCla = 2 ) ORDER BY rand() LIMIT $limit");
	}
	public function getTecFromNivOssaeRand($limit){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec < '$this->NivTec' AND CodCla = 6 ORDER BY rand() LIMIT $limit");
	}
	public function getTecFromNivRenrakuRand($limit){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec < '$this->NivTec' AND CodCla = 4 ORDER BY rand() LIMIT $limit");
	}
	public function getTecFromNivRenzokuRand($limit){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec < '$this->NivTec' AND CodCla = 5 ORDER BY rand() LIMIT $limit");
	}
	public function getTecFromNivKaeshiRand($limit){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec < '$this->NivTec' AND CodCla = 3 ORDER BY rand() LIMIT $limit");
	}
	public function getTecFromNivShimeRand($limit){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec < '$this->NivTec' AND CodCla = 7 ORDER BY rand() LIMIT $limit");
	}
	public function getTecFromNivKansetsuRand($limit){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE NivTec < '$this->NivTec' AND CodCla = 8 ORDER BY rand() LIMIT $limit");
	}


	/** BUSCA TODAS AS TÉCNICAS **/
	public function getAllTecFromNage(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE ( CodCla = 1 OR CodCla = 2 )");
	}
	public function getAllTecFromRenraku(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE CodCla = 4");
	}
	public function getAllTecFromRenzoku(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE CodCla = 5");
	}
	public function getAllTecFromKaeshi(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE CodCla = 3");
	}
	public function getAllTecFromOssae(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE CodCla = 6");
	}
	public function getAllTecFromShime(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE CodCla = 7");
	}
	public function getAllTecFromKansetsu(){
		return mysqli_query($this->link,"SELECT NomTec FROM Tecnicas WHERE CodCla = 8");
	}

	
	//***** SETTERS LOCAL *****\\
	/**
	 * @param field_type $CodTec
	 */
	public function setCodTec($CodTec) {
		$this->CodTec = $CodTec;
	}

	/**
	 * @param field_type $NomTec
	 */
	public function setNomTec($NomTec) {
		$this->NomTec = $NomTec;
	}

	/**
	 * @param field_type $NivTec
	 */
	public function setNivTec($NivTec) {
		$this->NivTec = $NivTec;
	}

	/**
	 * @param field_type $CodCla
	 */
	public function setCodCla($CodCla) {
		$this->CodCla = $CodCla;
	}
}

