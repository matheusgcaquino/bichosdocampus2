function addSelect(select, id, text)
  {
      var x = document.getElementById(select);
      var option = document.createElement("option");
      option.text = text;
      option.value = id;
      x.add(option);
  }

  function buscar(data, callback)
  {
    $.each(data[0], function (i, item) {
      const {id_especie, especie} = item;
      addSelect("S_especie", id_especie, especie);
    });

    $.each(data[1], function (i, item) {
      const {id_pelagem, pelagem} = item;
      addSelect("S_pelagem", id_pelagem, pelagem);
    });

    $.each(data[2], function (i, item) {
      const {id_local, local} = item;
      addSelect("S_local", id_local, local);
    });

    @if (isset($raca))
      var raca = {!! json_encode($raca, JSON_HEX_TAG) !!};
      console.log(raca);
      
      $.each(raca, function (i, item) {
        const {id_raca, raca} = item;
        addSelect("S_raca", id_raca, raca);
      });
      var div = document.getElementById("div_raca");
      div.style.display = "block";
    @endif
    callback();  
  }

  function cleanRaca() {
    var x = document.getElementById("S_raca");
    while (x.options[1] != null) {
      console.log(" ops: "+x.options[1].text);  
      x.options.remove(1);
    }
  }

  function addRaca(value)
  {
    var div = document.getElementById("div_raca");
    if (value == '') {
      div.style.display = "none";
      cleanRaca();
    } else {
      if (div.style.display == "block") {
        cleanRaca();
      } else {
        div.style.display = "block";
      }
      $.getJSON("/animais/ajax_raca/" + value, function (data) {
        $.each(data, function (i, item) {
          const {id_raca, id_especie, raca} = item;
          addSelect("S_raca", id_raca, raca);
        });
      });
    } 
  }

  function buscar_option()
  {
    @if (isset($buscar))
      var busca = {!! json_encode($buscar, JSON_HEX_TAG) !!};
      console.log(busca);        
      $.each(busca, function (i, item) {
        if (i == 'nome') {
          var x = document.getElementById("S_nome");
          x.value = item;
        } else {
          console.log('i: '+i);
          var x = document.getElementById("S_" + i);
          var j = 1;
          while (x.options[j] != null) {
            if (x.options[j].value == item) {
              x.options[j].selected = true;
              break;
            }
            j++;
          }
        }
      });
    @endif
  }

  function buscar_modal(callback) 
  {
    $.getJSON("{{route('buscar.ajax')}}", function (data) {
      buscar(data, buscar_option);
    });
  }

  window.onload = buscar_modal;