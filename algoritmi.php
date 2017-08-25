<?php 
function printr($data){
		echo "<pre>";
		print_r($data);
		echo "<pre>";
	}
#################################
	echo "<samp>Zbir fibonacijevog niza za N elemenata (rekurzija)<br>";

	function fib($n){
		echo "N=$n ";
		if($n<=1){
			return 1;
		} else {
			return fib($n-1) + fib($n-2);
		}
	}
	echo "<br>Suma: ".fib(4);
#####################################
	echo "<hr>Faktorijel (rekurzija)<br>";

	function fak($n){
		echo "N=$n ";
		$rasult = 1;
		if ($n > 1) {
			$rasult = fak($n-1) * $n;
			return $rasult;
		}
		return  $rasult;
		
	}
	echo "<br>Suma: ".fak(5);
######################################

	echo "<hr>Suma brojeva u nizu X koji su deljivi sa brojem C duzine N <br>";
	
	function zadA($n,$c){
		$niz = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
		echo "niz X = 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16  N=$n C=$c <br>";
		$s = 0; $i = 0;
		while ($i <= $n) {
			if ($niz[$i]-(($niz[$i]/$c)*$c) === 0) {
				$s = $s + $niz[$i];
			}
			$i++;
		}
		echo "SUMA: $s";
	}
	zadA(10,3);
######################################
	echo "<hr> Suma brojeva veci od K u nizu X duzine N<br>";

	function zadB($n,$k){
		$nizBR = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
		echo "niz X  N=$n K=$k <br>";
		$s = 0; $i = 0;
		while ($i <= $n) {
			if ($nizBR[$i]>$k) {
				$s = $s+1;
			}
			$i++;
		}
		echo "SUMA: $s";
	}
	zadB(10,7);
######################################
	echo "<hr> Farenhaitove stepene pretvara u celzijus<br>";

	function zadC(){
		$min = 0; $max = 300; $step = 20;
		$fahr = $min;
		while($fahr<=$max){
			$celzijus = 5*($fahr-32)/9;
			echo "°F: $fahr | °C: $celzijus <br>";
			$fahr = $fahr + $step;
		}
	}
	zadC();
######################################
	echo "<hr> Racunanje niza Y Z=(X-Y[1])*(X-Y[2])...(X-Y[N])<br>";
	function nizF($x,$n){
		$y = array();
		$i=$n;
		while ($i>=1) {
			$y[$i] = $i;
			$i--;
		}
		#printr($y);
		function niz($y,$x,$n){
			echo "N=$n ";
			if($n<=1){
				return ($x-$y[1]);
			} else {
				$sum = ($x-$y[$n]) * niz($y,$x,$n-1);
				return $sum;
			}
		}
		$suma = niz($y,$x,$n);
		echo "<br>Suma $suma";
	}
	nizF(5,3);
######################################
	echo "<hr>NZD euklidov algoritam <br>";
	function euk($a,$b){
		while($a!=$b){
			if ($a>$b) {
				$a=$a-$b;
			} else {
				$b = $b-$a;
			}
		}
		echo "NZD: $a";
	}
	#euk(3654,1365);//21
	euk(12,8); //4  a=12-8, a=4 |a<b| b=8-4, b=4  |a=b| return $a
######################################
	echo "<hr>Napisati program koji proverava koliko cifara ima zadati prirodni broj , izračunava njihovu sumu i proverava koliko se puta u njemu pojavila cifra 5. <br>";
 	function numerator($n){
 		echo "Vas broj: $n <br>";
 		$br_cif = 0; $br_5 = 0; $s = 0;
 		while ($n > 0) {
 			$cifra = $n%10;
 			$br_cif++; 
 			$s = $s + $cifra;
 			if($cifra == 5){
 				$br_5 = $br_5 + 1;
 			}
 			$n = (int)($n/10); //Neophodno je castovanje u int zato sto php po defaultu deklarise promenljive
 		}
 		echo "Ukupno cifre: $br_cif <br>Suma: $s <br>Petice: $br_5";
 	}
 	numerator(875);
#############################################
 	echo "<hr>Sumua cifara prirodnog broja N (rekurzija) <br>";
 	function suma_cif($n){
 		if($n>0){ 
 			return $n - ((int)($n/10) * 10) + suma_cif((int)($n/10));
 		} else return 0;
 	}
 	echo "Suma: ".suma_cif(875);
###############################################

 	echo "<hr>NZD euklidov algoritam (rekurzija)<br>";
 	function euklid($m,$n){
 		if ($m == $n) {
 			return $m;
 		} else if ($m>$n){
 			return euklid($m-$n,$n);
 		} else if ($n>$m){
 			return euklid($m,$n-$m);
 		}
 	}
 	echo "NZD: ".euklid(12,8);
#############################################
echo "<hr>Sort direktno umetanje <br>";	
function sortUmetanje(array $niz){
	echo "POCETNI NIZ: "; printr($niz);
	for ($i=1; $i < count($niz); $i++) { 
		$key = $niz[$i];
		$j = $i;
		while ($j>0 && $niz[$j-1]>$key) {
			echo "J[".($j-1)."]=".$niz[$j-1]."::J[$j]=$key Za ".$niz[$j-1].">".$key."<br>";
			$niz[$j] = $niz[$j-1]; //Index gde je manji broj bice jednak vecem
			echo "index J[".($j-1)."]=".$niz[$j-1]."<br>";
			echo "index J[$j]=".$niz[$j]."<br>";
			$j = $j - 1;
			#printr($niz);
		}
		$niz[$j]=$key; echo "$key Ide u index J[$j]<br>";
		
	}
	echo "Rezultat:";
	printr($niz);
}
sortUmetanje(array(5,1,9,4,2,3,6,7,8));

#############################################
echo "<hr>Sort selekcijom <br>";	
# Trazi se najmanji broj i pomera se skroz levo do sledec manjeg
function sortSelection(array $niz){
	echo "POCETNI NIZ: "; printr($niz);
	for ($i=0; $i < count($niz)-1; $i++) { 
		$min = $i;
		for ($j=$i+1; $j < count($niz); $j++) { 
			if ($niz[$j]<$niz[$min]) {
				$min=$j;
			}
		}
		if ($min != $i) {
			$temp = $niz[$min];
			$niz[$min] = $niz[$i];
			$niz[$i] = $temp;
		}
	}
	echo "Rezultat:";
	printr($niz);
}

sortSelection(array(5,1,9,4,2,3,6,7,11,8));

#############################################
echo "<hr>Bubble sort <br>";	
function bubbleSort(array $niz){
	echo "POCETNI NIZ: "; printr($niz);
	$isSorted = false;
	while (!$isSorted) {
		$isSorted=true;
		for ($i=0; $i < count($niz)-1; $i++) { 
			if ($niz[$i] > $niz[$i+1]) {
				$temp = $niz[$i];
				$niz[$i] = $niz[$i+1];
				$niz[$i+1] = $temp;
				$isSorted = false;
			}
		}
		# Shakesort ili cocktailsort
		# Jos jedno poredjenje u nazad da bi i manje brojeve pomerili u levo
		/*for ($i=count($niz)-1; $i <=0 ; $i--) { 
			if ($niz[$i-1] > $niz[$i]) {
				$temp = $niz[$i-1];
				$niz[$i-1] = $niz[$i];
				$niz[$i] = $temp;
				$isSorted = false;
			}
		}*/
	}
	echo "Rezultat:";
	printr($niz);
}

bubbleSort(array(5,1,9,4,2,3,6,7,11,8));

 ?>




