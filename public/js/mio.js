$( function() {
    var diasFestivos=["27/02/2023","28/02/2023","01/03/2023"];
    $.datepicker.setDefaults($.datepicker.regional ["es"])

    $("#desde").datepicker({
        dateFormat:"dd/mm/yy",
        minDate:"+1D",
        maxDate:"+3M +1D",
        firstDay:1,
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        onSelect:function(text,obj){
            $("#hasta").datepicker("destroy").datepicker({
            dateFormat:"dd/mm/yy",
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
            firstDay:1,

                minDate: new Date(obj.currentYear, obj.currentMonth, obj.currentDay+1),
                maxDate: new Date(obj.currentYear, obj.currentMonth, obj.currentDay+23),
                // beforeShowDay: $.datepicker.noWeekends
                beforeShowDay: function(fecha){
                    
                    var respuesta = [true,"",""];
                    var dia = fecha.getDate();
                    var mes = fecha.getMonth()+1;
                    var anno = fecha.getFullYear();
                    var cadenaFecha=((dia<10)?"0"+dia:dia)+"/"+
                                    ((mes<10)?"0"+mes:mes)+"/"+anno;
                    if (fecha.getDay()%6==0 || diasFestivos.indexOf(cadenaFecha)>-1){
                        respuesta=[false,"",""];
                    }
                    return respuesta;
                }
            })
        }

    })


  } );

