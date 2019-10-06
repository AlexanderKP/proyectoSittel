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
  
var massPopChart0 = new Chart(myChart0, {
      type:"bar", 
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

var massPopChart1 = new Chart(myChart1, {
      type:"horizontalBar", 
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

var massPopChart2 = new Chart(myChart2, {
      type:"line", 
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

var massPopChart4 = new Chart(myChart4, {
      type:"doughnut", 
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

var massPopChart5 = new Chart(myChart5, {
      type:"polarArea", 
      data:{
        labels:['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo','Junio'],
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
    