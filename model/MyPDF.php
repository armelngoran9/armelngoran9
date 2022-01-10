<?php  

	namespace AppGestion\model;
	
	require "fpdf/fpdf.php";

	/**
	 * 
	 */
	class MyPDF extends FPDF
	{
		
		function header()
		{
			//$this->Image('../images/logos/cantoa.png');
			$this->SetFont('Arial', 'B',16);
			$this->Cell(276, 5, 'Rapport en pdf', 0, 0, 'C');
			$this->Ln();
			$this->SetFont('Times', '', 12);
			$this->Cell(276, 10, '', 0, 0, 'C');
			$this->Ln(20);
		}
		function footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial', '', 8);
			$this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0,0,'C');
		}
		function headerTableAdherent()
		{	
			$this->SetFont('Times', 'B', 14);
			$this->Cell(20, 10, 'Id', 1, 0, 'C');
			$this->Cell(40, 10, 'Nom', 1, 0, 'C');
			$this->Cell(40, 10, 'Prenoms', 1, 0, 'C');
			$this->Cell(40, 10, 'Contact', 1, 0, 'C');
			$this->Cell(40, 10, 'Date Inscription', 1, 0, 'C');
			$this->Cell(30, 10, 'id Parrain', 1, 0, 'C');
			$this->Cell(30, 10, 'id Groupe', 1, 0, 'C');
			$this->Ln();
		}

		
		function headerTableBilanGroupe()
		{	
			$this->SetFont('Times', 'B', 14);
			$this->Cell(50, 10, 'Id Rubrique', 1, 0, 'C');
			$this->Cell(50, 10, 'Nom Rubrique', 1, 0, 'C');
			$this->Cell(50, 10, 'Total (Fcfa)', 1, 0, 'C');
			$this->Ln();
		}

		function viewAdherent($idGroupe)
		{
			try {
				$db = new \PDO("mysql:host=localhost;dbname=projet_web", "root", "");
						
			} catch (Exception $e) {
				die('Erreur: '. $e->getMessage());
			}
		
			$this->SetFont('Times', '', 12);
			$req = $db->prepare("SELECT * FROM adherent WHERE idGroupe = ?");
			$req->execute([$idGroupe]);

			$res = $req->fetchAll();

			
			$this->AliasNbPages();
			$this->AddPage('R', 'A4', 0);
			$this->headerTableAdherent();
			
			foreach ($res as $row) {
				
				$this->Cell(20, 10, $row['id'], 1, 0, 'C');
				$this->Cell(40, 10, $row['nom'], 1, 0, 'L');
				$this->Cell(40, 10, $row['prenoms'], 1, 0, 'L');
				$this->Cell(40, 10, $row['contact'], 1, 0, 'L');
				$this->Cell(40, 10, $row['dateInscription'], 1, 0, 'L');
				$this->Cell(30, 10, $row['idParrain'], 1, 0, 'L');
				$this->Cell(30, 10, $row['idGroupe'], 1, 0, 'L');
			
				$this->Ln();
				
			}
				$this->Output();
		}


		function viewBilanGroupe($idGroupe)
	{
		try {
			$db = new \PDO("mysql:host=localhost;dbname=projet_web", "root", "");
					
		} catch (Exception $e) {
			die('Erreur: '. $e->getMessage());
		}
	
		$this->SetFont('Times', '', 12);
		$req = $db->prepare(
			"SELECT compte.idRubrique, nomRubrique, SUM(montant) AS total
            FROM compte INNER JOIN versement 
            ON compte.numCompte = versement.numCompte
                INNER JOIN rubrique ON rubrique.idRubrique = compte.idRubrique
            WHERE idGroupe = ?
			GROUP BY compte.idRubrique");
			
		$req->execute([$idGroupe]);

		$res = $req->fetchAll(\PDO::FETCH_ASSOC);
		
		$this->SetLeftMargin(30);
		$this->AliasNbPages();
		$this->AddPage('R', 'A4', 0);
		$this->headerTableBilanGroupe();
		
		foreach ($res as $row) {
			$this->Cell(50, 10, $row['idRubrique'], 1, 0, 'C');
			$this->Cell(50, 10, $row['nomRubrique'], 1, 0, 'L');
			$this->Cell(50, 10, $row['total'], 1, 0, 'L');
		
			$this->Ln();
			
		}
			$this->Output();
	}


		
	function headerTableHistorique()
	{	
		$this->SetFont('Times', 'B', 14);
		$this->Cell(50, 10, 'id Vers', 1, 0, 'C');
		$this->Cell(50, 10, 'id Adh', 1, 0, 'C');
		$this->Cell(50, 10, 'Montant', 1, 0, 'C');
		$this->Cell(50, 10, 'date', 1, 0, 'C');
		$this->Cell(50, 10, 'N°Compte', 1, 0, 'C');
		$this->Ln();
	}


	function viewHistorique($idGroupe)
	{
		try {
			$db = new \PDO("mysql:host=localhost;dbname=projet_web", "root", "");
					
		} catch (Exception $e) {
			die('Erreur: '. $e->getMessage());
		}
	
		$this->SetFont('Times', '', 12);
		$req = $db->prepare(
			"   SELECT idVersement, dateVersement, montant, compte.numCompte, id 
            FROM (versement INNER JOIN compte ON versement.numCompte = compte.numCompte)
            INNER JOIN adherent ON adherent.id = compte.idProprietaire
            WHERE idGroupe = ? ");
			
		$req->execute([$idGroupe]);

		$res = $req->fetchAll(\PDO::FETCH_ASSOC);
		
		$this->AliasNbPages();
		$this->AddPage('R', 'A4', 0);
		$this->headerTableHistorique();
		
		foreach ($res as $row) {
			$this->Cell(50, 10, $row['idVersement'], 1, 0, 'C');
			$this->Cell(50, 10, $row['id'], 1, 0, 'L');
			$this->Cell(50, 10, $row['montant'], 1, 0, 'L');
			$this->Cell(50, 10, $row['dateVersement'], 1, 0, 'L');
			$this->Cell(50, 10, $row['numCompte'], 1, 0, 'L');
		
			$this->Ln();
			
		}
			$this->Output();
	}

		
	function headerBilanAdherent()
	{	
		$this->SetFont('Times', 'B', 14);
		$this->Cell(50, 10, 'N° Compte', 1, 0, 'C');
		$this->Cell(50, 10, 'Nom Rubrique', 1, 0, 'C');
		$this->Cell(50, 10, 'Solde', 1, 0, 'C');
		$this->Cell(50, 10, 'id Rubrique', 1, 0, 'C');
		$this->Ln();
	}

	
	function viewBilanAdherent($idAdherent)
	{
		try {
			$db = new \PDO("mysql:host=localhost;dbname=projet_web", "root", "");
					
		} catch (Exception $e) {
			die('Erreur: '. $e->getMessage());
		}
	
		$this->SetFont('Times', '', 12);
		$req = $db->prepare(
			"   SELECT numCompte, nomRubrique, solde, compte.idRubrique
				FROM compte INNER JOIN rubrique 
				ON compte.idRubrique = rubrique.idRubrique
				WHERE idProprietaire = ?
			");
			
		$req->execute([$idAdherent]);

		$res = $req->fetchAll(\PDO::FETCH_ASSOC);
		
		$this->AliasNbPages();
		$this->AddPage('R', 'A4', 0);
		$this->headerBilanAdherent();
		
		foreach ($res as $row) {
			$this->Cell(50, 10, $row['numCompte'], 1, 0, 'C');
			$this->Cell(50, 10, $row['nomRubrique'], 1, 0, 'L');
			$this->Cell(50, 10, $row['solde'], 1, 0, 'L');
			$this->Cell(50, 10, $row['idRubrique'], 1, 0, 'L');
			$this->Ln();
			
		}
			$this->Output();
	}
}


	
	



?>