<?php

function recherche($budget, $climat, $activite){
    $pdo = new PDO('mysql:host=localhost;dbname=tpvoyage', 'root', ''); 
    $pdo->exec('SET NAMES utf8');

    $sql = "SELECT villes.nom, Climat, typeActivite, TypeBudget, villes.Code, pays.Nom
    FROM pays
    INNER JOIN CorrPPC ON CorrPPC.Code = pays.Code
    INNER JOIN villes ON villes.Code = pays.code
    INNER JOIN corrvpb ON corrvpb.IDVille = villes.IDVille
    INNER JOIN corrva ON CorrVA.IDVille = villes.IDVille
    INNER JOIN activites ON corrva.IDActivite = activites.IDActivite
    WHERE TypeBudget = '$budget' AND activites.TypeActivite = '$activite' AND climat = '$climat';";

    $req = $pdo->query($sql);
    $result = $pdo->query($sql) ? $req->fetchAll(PDO::FETCH_ASSOC) : [];
    if(sizeof($result) == 0)
    {
       echo '<div class="alert alert-danger" role="alert">Aucun résultat trouvé.</div>';
    }
    else
    {
        foreach($result as $row)
        {
            echo '<div class="card" style="width: 18rem;">
                    <img src="img/'.$row["Nom"].'" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'.$row["nom"].'</h5>
                        <p class="card-text">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">'.$row["Climat"].'</li>
                                <li class="list-group-item">'.$row["typeActivite"].'</li>
                                <li class="list-group-item">'.$row["TypeBudget"].'</li>
                            </ul>
                        </p>
                        <a href="https://www.skyscanner.fr/transport/vols/ory/'.$row["Code"].'/190916/190923/?adults=1&children=0&adultsv2=1&childrenv2=&infants=0&cabinclass=economy&rtn=1&preferdirects=false&outboundaltsenabled=false&inboundaltsenabled=false&ref=home" target="_blank" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>';
        }
    }
}

?>
