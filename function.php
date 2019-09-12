<?php

function recherche($budget, $climat, $activite){
    $pdo = new PDO('mysql:host=localhost;dbname=tpvoyage', 'root', ''); 
    $pdo->exec('SET NAMES utf8');

    $sql = "SELECT villes.nom, villes.long, villes.lat, Climat, typeActivite, TypeBudget, villes.Code, pays.code as code_pays, pays.Nom
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
        echo '<script>$("#divAlert").show();</script>';
        echo '<script>
                $(function(){
                  $("#world-map").vectorMap({
                        map: "world_mill",
                        backgroundColor: "#71C5EA",
                    });
                })
            </script>';
    }
    else
    {
        $marqueur = '[';
        $colors = ['#24345A', '#279DE1', '#26CDCB', '#FF90AA', '#FED566', '#844076', '#FFCF4F', '#344B5E'];
        foreach($result as $row)
        {
            $marqueur .= '{
                "latLng": [parseFloat('.str_replace(',', '.', $row["lat"]).'), parseFloat('.str_replace(',', '.', $row["long"]).')],
                "name": "'.$row["nom"].'",
                "img": "img/'.$row["Nom"].'",
                "climat": "'.$row["Climat"].'",
                "activite": "'.$row["typeActivite"].'",
                "budget": "'.$row["TypeBudget"].'",
                "code": "'.$row["Code"].'",
              },';
            if(!isset($pays[$row["code_pays"]]))
            {
                $pays[$row["code_pays"]] = $colors[rand(0 ,7)];
            }
        }
        $payes = "{";
        foreach($pays as $key=>$value)
        {
            $payes .= "'".$key."':'".$value."',";
        }
        $payes .= "}";
        $marqueur .= ']';
        echo "
        <script>
        var marqueurs_ville = ".$marqueur."
        $('#world-map').vectorMap({
            map: 'world_mill',
            markerStyle: {
              initial: {
                fill: '#F8E23B',
                stroke: '#383f47'
              }
            },
            backgroundColor: '#71C5EA',
            series: {
              regions: [{
                values: ".$payes.",
                attribute: 'fill'
              }]
            },
            markers: marqueurs_ville,
            onMarkerTipShow: function(event, label, index){
                label.html(
                    \"<div class='card' >\"+
                        \"<img style='width:18rem;' src='\"+marqueurs_ville[index].img+\"' class='card-img-top'>\"+
                        \"<div class='card-body'>\"+
                            \"<h5 style='color:black' class='card-title'>\"+marqueurs_ville[index].name+\"</h5>\"+
                                \"<p class='card-text'>\"+
                                    \"<ul class='list-group list-group-flush'>\"+
                                        \"<li style='color:black' class='list-group-item'>Climat : \"+marqueurs_ville[index].climat+\"</li>\"+
                                        \"<li style='color:black' class='list-group-item'>Activité : \"+marqueurs_ville[index].activite+\"</li>\"+
                                        \"<li style='color:black' class='list-group-item'>Budget : \"+marqueurs_ville[index].budget+\" €</li>\"+
                                    \"</ul>\"+
                                \"</p>\"+
                            \"<a href='#' class='btn btn-primary'>Go somewhere</a>\"+
                        \"</div>\"+
                    \"</div>\"
                );
            }
        });
        </script>";
    }
//    " <a href'https://www.skyscanner.fr/transport/vols/ory/\"+marqueurs_ville[index].climat+\"/190916/190923/?adults=1&children=0&adultsv2=1&childrenv2=&infants=0&cabinclass=economy&rtn=1&preferdirects=false&outboundaltsenabled=false&inboundaltsenabled=false&ref=home' target='_blank' class='btn btn-primary'>Go somewhere</a>\"+
                        
}

?>
