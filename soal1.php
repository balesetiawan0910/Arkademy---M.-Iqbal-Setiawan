<?php
soal1("M. Iqbal Setiawan", 22);

function soal1($name, $age){
    $address = "Jl. Alam Raya GG. Naras III";
    $hobbies = array("Ngoding", "Basket", "Berenang");
    $is_merried = false;
    $list_school = array();
    $sd = array(
        'nama' => 'SDN 028 Pekanbaru',
        'year_in' => '2003',
        'year_out' => '2009',
        'major' => null
    );
    $smp = array(
        'nama' => 'SMPN 22 Pekanbaru',
        'year_in' => '2009',
        'year_out' => '2012',
        'major' => null
    );
    $smk = array(
        'nama' => 'SMKN 1 Pekanbaru',
        'year_in' => '2012',
        'year_out' => '2015',
        'major' => 'TKJ'
    );
    $kuliah = array(
        'nama' => 'Politeknik Caltek Riau',
        'year_in' => '2003',
        'year_out' => '2009',
        'major' => 'TI'
    );
    $list_school[]= $sd;
    $list_school[]= $smp;
    $list_school[]= $smk;
    $list_school[]= $kuliah;

    $skills = array();
    $skill1 = array(
        'nama' => 'php',
        'skill' => 'Beginner',
    );
    $skill2 = array(
        'nama' => 'java',
        'skill' => 'Beginner',
    );
    $skill3 = array(
        'nama' => 'blender',
        'skill' => 'Beginner',
    );
    $skills[] = $skill1;
    $skills[] = $skill2;
    $skills[] = $skill3;
    $interest_in_coding = true;
    $array = array(
        'Nama' => $name,
        'Age' => $age,
        'Address' => $address,
        'Hobbies' => $hobbies,
        'Is_married' => $is_merried,
        'List_school' => $list_school,
        'Skills' => $skills,
        'Interest_in_coding' => $interest_in_coding  
    );
    $json = json_encode($array);
    echo $json;


}
?>
