var myChart0 = document.getElementById('myChart0').getContext('2d');
var myChart1 = document.getElementById('myChart1').getContext('2d');
var myChart2 = document.getElementById('myChart2').getContext('2d');
var myChart3 = document.getElementById('myChart3').getContext('2d');
var myChart4 = document.getElementById('myChart4').getContext('2d');
var myChart5 = document.getElementById('myChart5').getContext('2d');
// Global Options
Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 18;
Chart.defaults.global.defaultFontColor = '#777';
$.getJSON(baseURL + 'Principal/ticketsOfMonth', function(data) {
 console.log(data);
  var Enero       = data.enero[0].total_tickets;
  var Febrero     = data.febrero[0].total_tickets;
  var Marzo     = data.marzo[0].total_tickets;
  var Abril     = data.abril[0].total_tickets;
  var Mayo     = data.mayo[0].total_tickets;
  var Junio     = data.junio[0].total_tickets;
  var Julio     = data.julio[0].total_tickets;
  var Agosto     = data.agosto[0].total_tickets;
  var Setiembre     = data.setiembre[0].total_tickets;
  var Octubre     = data.octubre[0].total_tickets;
  var Noviembre     = data.noviembre[0].total_tickets;
  var Diciembre     = data.diciembre[0].total_tickets;
  
  new Chart(myChart0, {
  
      type:"bar", 
      data:{
        labels:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets:[{
          label:'Tickets ',
          data:[
            Enero,
            Febrero,
            Marzo,
            Abril,
            Mayo,
            Junio,
            Julio,
            Agosto,
            Setiembre,
            Octubre,
            Noviembre,
            Diciembre
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Reporte estadistico de tickets',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
  });
});



$.getJSON(baseURL + 'Principal/getUsuariosAfiliadosByMonth', function(data) {

  var Enero       = data.enero[0].total_afiliado;
  var Febrero     = data.febrero[0].total_afiliado;
  var Marzo     = data.marzo[0].total_afiliado;
  var Abril     = data.abril[0].total_afiliado;
  var Mayo     = data.mayo[0].total_afiliado;
  var Junio     = data.junio[0].total_afiliado;
  var Julio     = data.julio[0].total_afiliado;
  var Agosto     = data.agosto[0].total_afiliado;
  var Setiembre     = data.setiembre[0].total_afiliado;
  var Octubre     = data.octubre[0].total_afiliado;
  var Noviembre     = data.noviembre[0].total_afiliado;
  var Diciembre     = data.diciembre[0].total_afiliado;
  var massPopChart1 = new Chart(myChart1, {
      type:"horizontalBar", 
      data:{
        labels:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets:[{
          label:'Usuarios afiliados',
          data:[
            Enero,
            Febrero,
            Marzo,
            Abril,
            Mayo,
            Junio,
            Julio,
            Agosto,
            Setiembre,
            Octubre,
            Noviembre,
            Diciembre
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',//enero
            'rgba(54, 162, 235, 0.6)',//febrero
            'rgba(255, 206, 86, 0.6)',//marzo
            'rgba(75, 192, 192, 0.6)',//abril
            'rgba(153, 102, 255, 0.6)',//mayo
            'rgba(255, 159, 64, 0.6)',//junio
            'rgba(8, 159, 94 , 0.6)',//julio
            'rgba(255, 99, 132, 0.6)',//agosto
            'rgba(255, 199, 152, 0.6)',//septiembre
            'rgba(255, 99, 12, 0.6)',//octubre
            'rgba(255, 99, 132, 0.6)',//noviembre
            'rgba(255, 39, 132, 0.6)',//diciembre
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Reporte estadistico de Usuarios afiliados',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
  });
});

$.getJSON(baseURL + 'Principal/getActividadofMonth', function(data) {
    var Enero       = data.enero[0].Actividad_total;
    var Febrero     = data.febrero[0].Actividad_total;
    var Marzo     = data.marzo[0].Actividad_total;
    var Abril     = data.abril[0].Actividad_total;
    var Mayo     = data.mayo[0].Actividad_total;
    var Junio     = data.junio[0].Actividad_total;
    var Julio     = data.julio[0].Actividad_total;
    var Agosto     = data.agosto[0].Actividad_total;
    var Setiembre     = data.setiembre[0].Actividad_total;
    var Octubre     = data.octubre[0].Actividad_total;
    var Noviembre     = data.noviembre[0].Actividad_total;
    var Diciembre     = data.diciembre[0].Actividad_total;
  
     var massPopChart2 = new Chart(myChart2, {
      type:"line", 
      data:{
        labels:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets:[{
          label:'Registros',
          data:[
            Enero,
            Febrero,
            Marzo,
            Abril,
            Mayo,
            Junio,
            Julio,
            Agosto,
            Setiembre,
            Octubre,
            Noviembre,
            Diciembre
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Reporte estadistico de la actividad del sitema',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
  });
});

$.getJSON(baseURL + 'Principal/ticketsOfMonth', function(data) {
    var Enero       = data.enero[0].total_tickets;
    var Febrero     = data.febrero[0].total_tickets;
    var Marzo     = data.marzo[0].total_tickets;
    var Abril     = data.abril[0].total_tickets;
    var Mayo     = data.mayo[0].total_tickets;
    var Junio     = data.junio[0].total_tickets;
    var Julio     = data.julio[0].total_tickets;
    var Agosto     = data.agosto[0].total_tickets;
    var Setiembre     = data.setiembre[0].total_tickets;
    var Octubre     = data.octubre[0].total_tickets;
    var Noviembre     = data.noviembre[0].total_tickets;
    var Diciembre     = data.diciembre[0].total_tickets;

    var massPopChart3 = new Chart(myChart3, {
      type:"pie", 
      data:{
        labels:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets:[{
          label:'Tickets Generados',
          data:[
            Enero,
            Febrero,
            Marzo,
            Abril,
            Mayo,
            Junio,
            Julio,
            Agosto,
            Setiembre,
            Octubre,
            Noviembre,
            Diciembre
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',//enero
            'rgba(54, 162, 235, 0.6)',//febrero
            'rgba(255, 206, 86, 0.6)',//marzo
            'rgba(75, 192, 192, 0.6)',//abril
            'rgba(153, 102, 255, 0.6)',//mayo
            'rgba(255, 159, 64, 0.6)',//junio
            'rgba(8, 159, 94 , 0.6)',//julio
            'rgba(255, 99, 132, 0.6)',//agosto
            'rgba(252, 246, 15 , 0.6)',//septiembre
            'rgba(255, 99, 12, 0.6)',//octubre
            'rgba(255, 99, 132, 0.6)',//noviembre
            'rgba(255, 39, 132, 0.6)',//diciembre
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Reporte estadistico de tickets',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
  });
});
$.getJSON(baseURL + 'Principal/ticketsByStatus', function(data) {
 
  var pendientes  = data.pendientes;
  var procesando  = data.procesando;
  var cerrado     = data.cerrado;
   new Chart(myChart4, {
      type:"doughnut", 
      data:{
        labels:[ "tickets pendientes","tickets en proceso","tickets cerrados"],
        datasets:[{
          label:'tickets',
          data:[
          pendientes,
           procesando,
           cerrado,
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)'
            
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Reporte estadistico de tickets por estado',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
  });
});

$.getJSON(baseURL + 'Principal/getAfiliadosByMonth', function(data) {
 
  var Enero       = data.enero[0].total_afiliado;
  var Febrero     = data.febrero[0].total_afiliado;
  var Marzo     = data.marzo[0].total_afiliado;
  var Abril     = data.abril[0].total_afiliado;
  var Mayo     = data.mayo[0].total_afiliado;
  var Junio     = data.junio[0].total_afiliado;
  var Julio     = data.julio[0].total_afiliado;
  var Agosto     = data.agosto[0].total_afiliado;
  var Setiembre     = data.setiembre[0].total_afiliado;
  var Octubre     = data.octubre[0].total_afiliado;
  var Noviembre     = data.noviembre[0].total_afiliado;
  var Diciembre     = data.diciembre[0].total_afiliado;
 var massPopChart5 = new Chart(myChart5, {
      type:"polarArea", 
      data:{
        labels:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo','Junio',"Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
        datasets:[{
          label:'afiliados:',
          data:[
            Enero,
            Febrero,
            Marzo,
            Abril,
            Mayo,
            Junio,
            Julio,
            Agosto,
            Setiembre,
            Octubre,
            Noviembre,
            Diciembre
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',//enero
            'rgba(54, 162, 235, 0.6)',//febrero
            'rgba(255, 206, 86, 0.6)',//marzo
            'rgba(75, 192, 192, 0.6)',//abril
            'rgba(153, 102, 255, 0.6)',//mayo
            'rgba(255, 159, 64, 0.6)',//junio
            'rgba(8, 159, 94 , 0.6)',//julio
            'rgba(255, 99, 132, 0.6)',//agosto
            'rgba(252, 246, 15 , 0.6)',//septiembre
            'rgba(255, 99, 12, 0.6)',//octubre
            'rgba(255, 99, 132, 0.6)',//noviembre
            'rgba(255, 39, 132, 0.6)',//diciembre
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Reporte estadistico de afiliados',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
});

});

    