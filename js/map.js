var marqueurs = [];
  var jsonData = "";
  var payes = [];
  var colors = ['#24345A', '#279DE1', '#26CDCB', '#FF90AA', '#FED566', '#844076', '#FFCF4F', '#344B5E'];
  $.getJSON("data.json", function(json) {
    jsonData = json;
    for (const [key, value] of Object.entries(jsonData)) {
      var villes = value;
      var keys = key;
      for (const [key, value] of Object.entries(villes.ville)) {
        marqueurs.push({
          "latLng": [parseFloat(value.lat.replace(",", ".")), parseFloat(value.long.replace(",", "."))],
          "name": value.ville,
          "img": villes.url,
          "climat": villes.climat,
          "activite": villes.activite,
          "budget": villes.budget
        });
        payes[keys] = colors[Math.ceil(Math.random() * 8)];
      }

    }
  }).then(function() {
    $('#world-map').vectorMap({
      map: 'world_mill',
      markerStyle: {
        initial: {
          fill: '#F8E23B',
          stroke: '#383f47'
        }
      },
      backgroundColor: "#71C5EA",
      series: {
        regions: [{
          values: payes,
          attribute: 'fill'
        }]
      },
      markers: marqueurs,
      onMarkerTipShow: function(event, label, index) {
        console.log(marqueurs[index]);
        label.html(
          "<div class='card' >" +
          "<img style='width:18rem;' src='" + marqueurs[index].img + "' class='card-img-top'>" +
          "<div class='card-body'>" +
          "<h5 style='color:black' class='card-title'>" + marqueurs[index].name + "</h5>" +
          "<p class='card-text'>" +
          "<ul class='list-group list-group-flush'>" +
          "<li style='color:black' class='list-group-item'>Climat : " + marqueurs[index].climat + "</li>" +
          "<li style='color:black' class='list-group-item'>Activité : " + marqueurs[index].activite + "</li>" +
          "<li style='color:black' class='list-group-item'>Budget : " + marqueurs[index].budget + " €</li>" +
          "</ul>" +
          "</p>" +
          "<a href='#' class='btn btn-primary'>Go somewhere</a>" +
          "</div>" +
          "</div>"
        );
      }
    });
  });