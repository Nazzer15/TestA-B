Highcharts.chart('graficoefectividadtests', {
    chart: {
      type: 'column',
      backgroundColor: "transparent",
    },
    title: {
      text: 'Efectividad Test A/B'
    },
   /* subtitle: {
      text: 'Source: WorldClimate.com'
    },*/
    xAxis: {
      categories: [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec'
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Cantidad de tests'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'A',
      data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
  
    }, {
      name: 'B',
      data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
  
    }]
  });
  Highcharts.chart('graficoefectividadcumplimientoobjetivos', {
    chart: {
      type: 'column',
      backgroundColor: "transparent",
    },
    title: {
      text: 'Efectividad cumplimiento de objetivos'
    },
   /* subtitle: {
      text: 'Source: WorldClimate.com'
    },*/
    xAxis: {
      categories: [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec'
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Cantidad de contactos'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Reuniones',
      data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
  
    }, {
      name: 'Contrataciones',
      data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
  
    }]
  });
  // piesectoresmasseleccionadosmes
Highcharts.chart('piesectoresmasseleccionadosmes', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie',
    backgroundColor: "transparent",
  },
  title: {
    text: 'Sectores más seleccionados en el mes'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: false
      },
      showInLegend: true
    }
  },
  series: [{
    name: 'Porcentaje',
    colorByPoint: true,
    data: [{
      name: 'Deporte y Ocio',
      y: 31.41,
      sliced: true,
      selected: true
    }, {
      name: 'Salud',
      y: 11.84
    }, {
      name: 'Turismo',
      y: 21.84
    }, {
      name: 'Tiendas',
      y: 9.84
    }
    ]
  }]
});
/*pie año*/
Highcharts.chart('piesectoresmasseleccionadosano', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie',
    backgroundColor: "transparent",
  },
  title: {
    text: 'Sectores más seleccionados en el año'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
        enabled: false
      },
      showInLegend: true
    }
  },
  series: [{
    name: 'Porcentaje',
    colorByPoint: true,
    data: [{
      name: 'Deporte y Ocio',
      y: 31.41,
      sliced: true,
      selected: true
    }, {
      name: 'Salud',
      y: 11.84
    }, {
      name: 'Turismo',
      y: 21.84
    }, {
      name: 'Tiendas',
      y: 9.84
    }
    ]
  }]
});
/*Comparativo Sector Medio Mes*/
Highcharts.chart('comparativosector-medios-mes', {
  chart: {
    type: 'column',
    backgroundColor: "transparent",
  },
  title: {
    text: 'Stacked column chart'
  },
  xAxis: {
    categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Total fruit consumption'
    }
  },
  tooltip: {
    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
    shared: true
  },
  plotOptions: {
    column: {
      stacking: 'percent'
    }
  },
  series: [{
    name: 'John',
    data: [5, 3, 4, 7, 2]
  }, {
    name: 'Jane',
    data: [2, 2, 3, 2, 1]
  }, {
    name: 'Joe',
    data: [3, 4, 4, 2, 5]
  }]
}); 
//comparativa año
Highcharts.chart('comparativosector-medios-ano', {
  chart: {
    type: 'column',
    backgroundColor: "transparent",
  },
  title: {
    text: 'Comparativo entre sector y medios'
  },
  xAxis: {
    categories: ['Deportes y ocio', 'Tiendas', 'Tursimo', 'Salud', 'Entretenimiento','Finanzas y Seguros','Tiendas departamentales','Bienes de Consumo']
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Total fruit consumption'
    }
  },
  tooltip: {
    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
    shared: true
  },
  plotOptions: {
    column: {
      stacking: 'percent'
    }
  },
  series: [{
    name: 'Llamada',
    data: [5, 3, 4, 7, 2,1,3,4]
  }, {
    name: 'Email',
    data: [2, 2, 3, 2, 1,2,3,4]
  }, {
    name: 'Whatsapp',
    data: [3, 4, 1, 2, 5,2,3,2]
  }, {
    name: 'Reunion',
    data: [3, 1, 2, 2, 5,2,1,2]
  }, {
    name: 'Contratacion',
    data: [3, 4, 4, 1, 5,2,1,2]
  }]
}); 