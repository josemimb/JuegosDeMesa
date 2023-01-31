$(function () {
  $(".mesa").draggable({

    start: function (ev, ui) {
      $(this).attr("data-y", ui.offset.top)
      $(this).attr("data-x", ui.offset.left)
    },
    revert: true,
    helper: "clone",
    revertDuration: 0
  });

  $("#almacen").droppable({
    drop: function (ev, ui) {
      var mesa = ui.draggable;
      mesa.attr("style", "");
      $(this).append(mesa)

    }
  });

  $(".sala").droppable({
    drop: function (ev, ui) {

      difX = $(this).offset().left
      difY = $(this).offset().top

      var mesa = ui.draggable;
      var left = parseInt(ui.offset.left);
      var top = parseInt(ui.offset.top)
      var width = parseInt(mesa.width())
      var height = parseInt(mesa.height())


      var pos1 = [left, +left + width, top, top + height]
      console.log(top)
      console.log(left)

      var mesaYa = $(".sala .mesa").eq(0);
      if (mesaYa.length > 0) {

        var posX = parseInt(mesaYa.offset().left)
        var posY = parseInt(mesaYa.offset().top)
        var anchura = parseInt(mesaYa.width())
        var altura = parseInt(mesaYa.height())
        var pos2 = [posX, posX + anchura, posY, posY + altura];

        if (((pos1[0] > pos2[0] && pos1[0] < pos2[1]) ||
            (pos1[1] > pos2[0] && pos1[1] < pos2[1]) ||
            (pos1[0] <= pos2[0] && pos1[1] >= pos2[1])) &&
          ((pos1[2] > pos2[2] && pos1[2] < pos2[3]) ||
            (pos1[3] > pos2[2] && pos1[3] < pos2[3]) ||
            (pos1[2] <= pos2[2] && pos1[3] >= pos2[3]))) {
          console.log("CHOCA")
        } else {
          $(this).append(mesa)
          mesa.css({
            position: "absolute",
            top: top - difY + "px",
            left: left - difX + "px"
          })
        }
      } else {
        $(this).append(mesa)
        mesa.css({
          position: "absolute",
          top: top - difY + "px",
          left: left - difX + "px"
        })
      }
    }
  });


  //Metodo para coger las coordenas en las que se ha soltado la mesa
  function coordenadas() {
    return $(document).ready(function () {
      // $('.ui-widget-header').css('width', $(window).width());
      // $('.ui-widget-header').css('height', $(window).height());

      $('.almacen').on('click', function (e) {
        $('.mesa').css('top', e.pageY);
        $('.mesa').css('left', e.pageX);
        $('.mesa').text(e.pageX + ':' + e.pageY);
      });
    });
  }

  // Metodo para una mesa nueva
  function mesa() {
    return function () {
      // alert("has comprado  "+id)

      $.ajax({
          data: {
            "id": "1",
            "nombre": "mesa1",
            "ancho": "200",
            "alto": "200",
            "x": "484",
            "y": "306"
          },
          method: "get",
          url: "http://127.0.0.1:8000/api/mesa",
          dateType: "json"
        })
        .done(function (data) {
          console.log(data);
          $.each(data.municipios, function (i, v) {

            $("<option>")
              .val(v.CODIGOINE.substr(0, 5))
              .text(v.NOMBRE)
              .appendTo(municipios)
          })
        }).fail(function () {
          alert("Algo ha fallado")
        }).always()
    }

  }
  // ver ajax
  $(document).ready(function () {
    $.ajax({
      url: 'http://127.0.0.1:8000/api/mesa',
      type: 'get',
      dataType: 'JSON',
      success: function (response) {
        var len = response.length;
        for (var i = 0; i < len; i++) {
          var id = response[i].id;
          var nombre = response[i].nombre;
          var ancho = response[i].ancho;
          var alto = response[i].alto;
          var x = response[i].x;
          var y = response[i].y;

          var tr_str = "<tr>" +
            "<td align='left'>" + (id + 1) + "</td>" +
            "<td align='left'>" + nombre + "</td>" +
            "<td align='left'>" + ancho + "</td>" +
            "<td align='left'>" + alto + "</td>" +
            "<td align='left'>" + x + "</td>" +
            "<td align='left'>" + y + "</td>" +
            "</tr>";

          $("#userTable tbody").append(tr_str);
        }

      }
    });

  });

//jax almacen pintar caja
  $(document).ready(function () {
    $.ajax({
      url: 'http://127.0.0.1:8000/api/mesa',
      type: 'get',
      dataType: 'JSON',
      success: function (response) {
        var len = response.length;
        for (var i = 0; i < len; i++) {
          var id = response[i].id;
          var nombre = response[i].nombre;
          var ancho = response[i].ancho;
          var alto = response[i].alto;
          var x = response[i].x;
          var y = response[i].y;

          var tr_str = "<tr>" +
            "<td align='left'>" + (id + 1) + "</td>" +
            "<td align='left'>" + nombre + "</td>" +
            "<td align='left'>" + ancho + "</td>" +
            "<td align='left'>" + alto + "</td>" +
            "<td align='left'>" + x + "</td>" +
            "<td align='left'>" + y + "</td>" +
            "</tr>";

          $("#almacen1").append(tr_str);
        }

      }
    });

  });


})