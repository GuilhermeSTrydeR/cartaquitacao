<?php

include_once('conexaoBD.php');


class Valida{
	
	//funcao para validar por meio de formula matematica se o cnpj eh valido ou nao
	public function validar_cnpj($cnpj){
		$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
		
		// Valida tamanho
		if (strlen($cnpj) != 14)
			return false;

		// Verifica se todos os digitos são iguais
		if (preg_match('/(\d)\1{13}/', $cnpj))
			return false;	

		// Valida primeiro dígito verificador
		for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
		{
			$soma += $cnpj[$i] * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}

		$resto = $soma % 11;

		if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
			return false;

		// Valida segundo dígito verificador
		for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
		{
			$soma += $cnpj[$i] * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}

		$resto = $soma % 11;

		return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
	}

	//var_dump(validar_cnpj('11.444.777/0001-61'));

	public function validar_unimed($cnpj){

		global $pdo;
		$sql = "SELECT CNPJ FROM unimeds where cnpj = :CNPJ";
		$sql = $pdo->prepare($sql);
		$sql->bindValue("CNPJ", $cnpj);

		$sql->execute();

		if($sql->rowCount() == 1){

			return true;
		}
	
		else{

			return false;

		}

	}


}