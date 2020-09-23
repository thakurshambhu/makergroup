<script type="text/javascript">
     var chart1;
$(function () {

    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "{{url('/')}}/get-chart",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function (data) {
                if (data.status == "success") { // if true (1)
                    chart_data = data.chart_values;
                   
                    var options = {
                        colors: ["#f1b91c", "#f1b91c", "#FF9A00", "#00B8F1"],
                        chart: {
                            renderTo: 'container1',
                            type: 'column',
                            panning: true,
                            backgroundColor: 'white',
                            borderColor: 'black',
                            borderWidth: 0,
                            className: 'dark-container',
                            plotBackgroundColor: 'white',
                            plotBorderColor: 'black',
                            plotBorderWidth: 0,
                        },
                        credits: {
                            enabled: false
                        },
                        title: {
                            text: 'Pre Workshop Survey',
                            style: {
                                color: '#252422',
                                font: 'normal 1.57em "Montserrat"'
                            },
                            align: 'left'
                        },
                        tooltip: {
                            formatter: function () {
                                return 'Average Rating for <b>' + this.x.replace(/_/g, ' ') +
                                    '</b> is <b>' + this.y + '</b>';
                            },
                            backgroundColor: 'rgba(0, 0, 0, 0.75)',
                            style: {
                                color: '#F0F0F0'
                            }
                        },
                        categories: {
                            enabled: 'true'
                        },
                        legend: {
                            // enabled: false,
                            layout: 'vertical',
                            align: 'center',
                            verticalAlign: 'top',
                            borderWidth: 0,
                            itemStyle: {
                                font: '9pt Segoe UI',
                                color: 'black'
                            },
                            itemHoverStyle: {
                                color: 'grey'
                            },


                            labelFormatter: function() 
                                {
                                    if(this.name!='Series 1')
                                    {
                                        return 'Ratings';
                                    }
                                    else
                                    {
                                        return 'Ratings';
                                    }
                                }
                                                         
                        },
                        xAxis: {
                            gridLineWidth: 0,
                            categories: ["Conflict", "Fairness", "Competitiveness", "Questioning_and_Listening", "Planning", "Trust", "Creativity", "Perspective"],
                            tickInterval: 1,
                            overflow: 'justify',
                            labels: { useHTML: true, formatter: function() { return '<div id="'+this.value.replace(/ /g, '<br />') +'">'+this.value.replace(/_/g, ' ')+'</div>';},rotation: -45,
                            },
                            title: {
                                enabled: true
                            },


                        },
                        yAxis: {
                            gridLineWidth: 0,
                            tickInterval: 1,
                            min: 0,
                            max: 7,
                            title: {
                                enabled: true,
                                text: "Ratings",
                                style: {
                                    fontWeight: 'normal',
                                    color: 'black'
                                }
                            },
                            labels: {
                                style: {
                                    color: 'black'
                                }
                            },



                        },
                        exporting: {
                            enabled: true,
                            buttons: {
                                contextButton: {
                                    menuItems: Highcharts.defaultOptions.exporting.buttons.contextButton.menuItems.slice(0,11)
                                },
                            },


                            chartOptions: {
                                  chart: {
                                    height: 600,
                                    marginBottom: 300,
                                    events: {
                                      load: function() {
                                        var renderer = this.renderer;

                                        // renderer.path(['M', 30, 450, 'L', 570, 450, 'Z']).attr({
                                        //   stroke: 'black',
                                        //   'stroke-width': 1
                                        // }).add();


                                        // renderer.text("Fairness is a tricky subject in negotiation, but not for the reason you might think. Not because there is not enough of it, but because there is too much of it. Many people bring in their personal set of morals, values and beliefs into their deals, front and center for most, is their personal belief in FAIRNESS. Let’s face it, most people are fair by nature, we’re taught from a young age to be fair in all aspects of our life. However, in negotiation, it is precisely this internal sense of fairness that can cause people to sub optimize their deals. They leave money on the table, they don’t think they can make demands of the other party out of fear that the other party will perceive them as “unfair”.<b class='gridMap'> Even more dangerous, is when that internal sense of fairness is actively exploited by another party who doesn’t value fairness in the same way as you. They’re able to park their sense of fairness at the door, but continue to exploit you with yours", 30, 450).add();
                                       
                                      }
                                    }
                                  },
                                  legend: {
                                    y: -220
                                  },
                                  // credits: {
                                  //   position: {
                                  //     y: -220
                                  //   }
                                  // }
                                }
                            },
                        plotOptions: {
                            series: {
                                stacking: 'normal',
                                cursor: 'pointer'
                            }
                        },
                        series: []
                    };
                    options.series = [{
                        data:  [1,2,3,4,2,4,3,1]    // chart_data.split(',').map(Number)
                    }];
                    chart1 = new Highcharts.Chart(options);
                    chart1.series[0].name = "Ratings";
                    chart1.redraw();
                    
                }

                   
        $("#Conflict").tooltip({placement: 'bottom', title:'Conflict : "Your ability to handle conflict, think clearly and make sound decisions in the face of adversity."'});

        $("#Fairness").tooltip({placement: 'bottom', title:'Fairness : "Your ability to not be influenced by your internal sense of fairness."'});

        $("#Competitiveness").tooltip({placement: 'bottom', title:'Competitiveness : "Your ability to operate objectively and without ego."'});

        $("#Questioning_and_Listening").tooltip({placement: 'bottom', title:'Questioning & Listening : "Your ability to ask effective questions and process incoming information."'});

        $("#Planning").tooltip({placement: 'bottom', title:'Planning : "Your ability effectively strategize and map out an entire negotiation from start to end."'});

        $("#Trust").tooltip({placement: 'bottom', title:'Trust : "Your ability to create the appropriate climate to complement your strategy."'});

        $("#Creativity").tooltip({placement: 'bottom', title:'Creativity : "Your ability to generate solutions previously not considered."'});

        $("#Perspective").tooltip({placement: 'bottom', title:'Perspective : "Your ability to view the negotiation from the other party’s point of view."'});
            },
        });
    });
});

// document.getElementById('download-pdf').addEventListener("click", downloadPDF);
// function downloadPDF() {
//   var canvas = document.querySelector('#container');
//     console.log(canvas)
//     var canvasImg = canvas.toDataURL({
//         'quality':  1.9,
//         'format': 'jpeg'
//     });
  
//     //creates PDF from img
//     var doc = new jsPDF('2','mm','a4');
//     doc.setFontSize(10);
//     doc.text(15, 15, "Survey Report");
//     doc.addImage(canvasImg, 'PNG', 10, 10, 200, 100 );
//     doc.text(10,120,"1. Conflict - Your ability to handle conflict, think clearly and make sound decisions in the face of adversity");
//     doc.text(10,140,"2. Fairness - Your ability to not be influenced by your internal sense of fairness");
//     doc.text(10,160,"3. Competitiveness - Your ability to operate objectively and without ego");
//     doc.text(10,180,"4. Questioning & Listening - Your ability to ask effective questions and process incoming information");
//     doc.text(10,200,"5. Planning - Your ability effectively strategize and map out an entire negotiation from start to end");
//     doc.text(10,220,"6. Trust - Your ability to create the appropriate climate to complement your strategy");
//     doc.text(10,240,"7. Creativity - Your ability to generate solutions previously not considered");
//     doc.text(10,260,"8. Perspective - Your ability to view the negotiation from the other party’s point of view");
//     doc.save('canvas.pdf');
// }


$(function() {
  Highcharts.getSVG = function(charts, texts) {
    var svgArr = [],
      top = 0,
      width = 0,
      txt;
    Highcharts.each(charts, function(chart, i) {
      var svg = chart.getSVG();
      svg = svg.replace('<svg', '<g transform="translate(0,' + top + ')" ');
      svg = svg.replace('</svg>', '</g>');
      top += 650;
      //top += chart.chartHeight;
      //width = Math.max(width, chart.chartWidth);
      width = 600;
      svgArr.push(svg);
      txt = texts[i];
      txt = '<text x= "' + 0 + '" y = "' + (top + 20) + '" styles = "' + txt.attributes.style.value + '">' + $(txt).val() + '</text>';
      top += 60;
      svgArr.push(txt);
    });
    return '<svg height="' + top + '" width="' + width + '" version="1.1" xmlns="http://www.w3.org/2000/svg">' + svgArr.join('') + '</svg>';
  };


  Highcharts.exportChartWithText = function(charts, texts, options) {

    // Merge the options
    options = Highcharts.merge(Highcharts.getOptions().exporting, options);

    // Post to export server
    Highcharts.post(options.url, {
      filename: options.filename || 'chart',
      type: options.type,
      width: options.width,
      svg: Highcharts.getSVG(charts, texts)
    });
  };


  

  var texts = $('.HC');

  $("#save_img").click(function() {
    Highcharts.exportChartWithText([chart1], texts, {
      type: 'application/pdf',
      filename: '{{Auth()->user()->name}}_report'
    });
  });
});
</script>

