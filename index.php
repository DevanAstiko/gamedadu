<html>
<body>

	<?php

	$Agung=new pemain(6,"Agung");
	$Budi=new pemain(6,"Budi");
	$Cakil=new pemain(6,"Cakil");
	$Dean=new pemain(6,"Dean");

	$Agung->lawankanan($Budi);
	$Budi->lawankanan($Cakil);
	$Cakil->lawankanan($Dean);
	$Dean->lawankanan($Agung);


	$count=0;
	while(true){
		echo "<b>Babak ke  ".++$count."</b><br>";
		echo $Agung->name()."{".$Agung->hitungdadu()."}"." = ".join(",",$Agung->putar())."<br>";
		echo $Budi->name()."{".$Budi->hitungdadu()."}"." = ".join(",",$Budi->putar())."<br>";
		echo $Cakil->name()."{".$Cakil->hitungdadu()."}"." = ".join(",",$Cakil->putar())."<br>";
		echo $Dean->name()."{".$Dean->hitungdadu()."}"." = ".join(",",$Dean->putar())."<br>";
		$Agung->proses();
		$Budi->proses();
		$Cakil->proses();
		$Dean->proses();



		if(($Agung->hitungdadu()==0)||($Budi->hitungdadu()==0)||($Cakil->hitungdadu()==0)||($Dean->hitungdadu()==0)){


			if($Agung->hitungdadu()==0){
				echo "<br>";
				echo "pemenangnya adalah  ".$Agung->name();

			}
			if($Budi->hitungdadu()==0){
				echo "<br>";
				echo "pemenangnya adalah  ".$Budi->name();

			}
			if($Cakil->hitungdadu()==0){
				echo "<br>";
				echo "pemenangnya adalah  ".$Cakil->name();

			}
			if($Dean->hitungdadu()==0){
				echo "<br>";
				echo "pemenangnya adalah  ".$Dean->name();

			}

			break;
		}

	}

	class pemain{


		private $lawansisikanan;
		private $labelpemain="";
		private $nomordadu=0;
		private $nilaidadu=Array();


		public function name(){
			return $this->labelpemain;
		}

		public function pemain($nomor,$label){
			$this->labelpemain=$label;
			$this->nomordadu=$nomor;
		}

		public function tambahdadu(){
			$this->nomordadu++;
		}
		public function rm_dice(){
			$this->nomordadu--;
		}
		public function hitungdadu(){
			return $this->nomordadu;
		}
		public function lawankanan($p){
			$this->lawansisikanan=$p;
		}
		public function get_lawansisikanan(){
			return $this->lawansisikanan;
		}
		public function pass_dice(){
			$this->rm_dice();
			$next=$this->get_lawansisikanan();
			$next->tambahdadu();
		}

		public function proses(){
			foreach($this->get_nilaidadu() as $v){
				if($v==1){
					$this->pass_dice();
				}
				else if($v==6){
					$this->rm_dice();
				}
			}
		}
		public function putar(){
			$this->nilaidadu=Array();
			for($i=0;$i<$this->hitungdadu();$i++){
				$value=rand(1, 6);
				$this->nilaidadu[]=$value;
			}
			return $this->nilaidadu;
		}

		public function get_nilaidadu(){
			return $this->nilaidadu;
		}
	}


	?>
	<br>
	<br>
	<br>
	<br>
	By DEVAN ASTIKO BAKTIYAR
</body>
</html>