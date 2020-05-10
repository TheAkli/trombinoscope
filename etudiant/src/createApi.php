

<?php
header('Content-Type: application/json');

function api($classe,$groupe){
   
    $RecupFich=file('account.csv');
    $etu['name']=$classe."-".$groupe;
    $etu['etudiant']=array();

    for($i=0;$i <sizeof($RecupFich);$i++){
        $ligne=explode(";", $RecupFich[$i]);
        $tab=array();
        if($classe==$ligne[5] && $groupe == $ligne[6]){
            $tab[$i]['nom']=$ligne[0];
            $tab[$i]['prenom']=$ligne[1];
            $tab[$i]['email']=$ligne[2];
            $tab[$i]['classe']=$ligne[5];
            $tab[$i]['groupe']=$ligne[6];
			$tab[$i]['imgPerso']=$ligne[8];

        }
        else{
            continue;
        }
        array_push($etu['etudiant'],$tab[$i]);
    }
    return($etu);
}



?>