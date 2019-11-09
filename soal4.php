<?php
printWords("arkademyy");
//conversi text ke array


function printWords($word){
    $converArray = str_split($word);
    $vocal = array();
    $konsonan = array();
foreach ($converArray as $row) {
 if(preg_match('/^[aiueo]/', $row[0]))
  {
    $vocal[] = $row[0];
   
  }
  else
  {
      $konsonan[] = $row[0];
 
 }
}
for($x=0;$x<count($vocal);$x++){
	echo $vocal[$x]."<br/>";
}

for($x=0;$x<count($konsonan);$x++){
	echo $konsonan[$x]."<br/>";
}

}

?>
