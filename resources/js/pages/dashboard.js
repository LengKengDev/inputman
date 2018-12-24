/*global Chart*/
'use strict';

class Dashboard {
  index() {
    var _$ = window.$;
    var mode = 'light';//(themeMode) ? themeMode : 'light';
    var fonts = {
      base: 'Open Sans'
    };
    var colors = {
      gray: {
        100: '#f6f9fc',
        200: '#e9ecef',
        300: '#dee2e6',
        400: '#ced4da',
        500: '#adb5bd',
        600: '#8898aa',
        700: '#525f7f',
        800: '#32325d',
        900: '#212529'
      },
      theme: {
        'default': '#172b4d',
        'primary': '#5e72e4',
        'secondary': '#f4f5f7',
        'info': '#11cdef',
        'success': '#2dce89',
        'danger': '#f5365c',
        'warning': '#fb6340'
      },
      black: '#12263F',
      white: '#FFFFFF',
      transparent: 'transparent',
    };

    function chartOptions() {
      // Options
      var options = {
        defaults: {
          global: {
            responsive: true,
            maintainAspectRatio: false,
            defaultColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
            defaultFontColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
            defaultFontFamily: fonts.base,
            defaultFontSize: 13,
            layout: {
              padding: 0
            },
            legend: {
              display: false,
              position: 'bottom',
              labels: {
                usePointStyle: true,
                padding: 16
              }
            },
            elements: {
              point: {
                radius: 0,
                backgroundColor: colors.theme['primary']
              },
              line: {
                tension: .4,
                borderWidth: 4,
                borderColor: colors.theme['primary'],
                backgroundColor: colors.transparent,
                borderCapStyle: 'rounded'
              },
              rectangle: {
                backgroundColor: colors.theme['warning']
              },
              arc: {
                backgroundColor: colors.theme['primary'],
                borderColor: (mode == 'dark') ? colors.gray[800] : colors.white,
                borderWidth: 4
              }
            },
            tooltips: {
              enabled: false,
              mode: 'index',
              intersect: false,
              custom: function (model) {

                // Get tooltip
                var _$tooltip = _$('#chart-tooltip');

                // Create tooltip on first render
                if (!_$tooltip.length) {
                  _$tooltip = _$('<div id="chart-tooltip" class="popover bs-popover-top" role="tooltip"></div>');

                  // Append to body
                  _$('body').append(_$tooltip);
                }

                // Hide if no tooltip
                if (model.opacity === 0) {
                  _$tooltip.css('display', 'none');
                  return;
                }

                function getBody(bodyItem) {
                  return bodyItem.lines;
                }

                // Fill with content
                if (model.body) {
                  var titleLines = model.title || [];
                  var bodyLines = model.body.map(getBody);
                  var html = '';

                  // Add arrow
                  html += '<div class="arrow"></div>';

                  // Add header
                  titleLines.forEach(function (title) {
                    html += '<h3 class="popover-header text-center">' + title + '</h3>';
                  });

                  // Add body
                  bodyLines.forEach(function (body) {
                    var indicator = '<span class="badge badge-dot"><i class="bg-primary"></i></span>';
                    var align = (bodyLines.length > 1) ? 'justify-content-left' : 'justify-content-center';
                    html += '<div class="popover-body d-flex align-items-center ' + align + '">' + indicator + body + '</div>';
                  });

                  _$tooltip.html(html);
                }

                // Get tooltip position
                var _$canvas = _$(this._chart.canvas);

                var canvasTop = _$canvas.offset().top;
                var canvasLeft = _$canvas.offset().left;

                var tooltipWidth = _$tooltip.outerWidth();
                var tooltipHeight = _$tooltip.outerHeight();

                var top = canvasTop + model.caretY - tooltipHeight - 16;
                var left = canvasLeft + model.caretX - tooltipWidth / 2;

                // Display tooltip
                _$tooltip.css({
                  'top': top + 'px',
                  'left': left + 'px',
                  'display': 'block',
                  'z-index': '100'
                });

              },
              callbacks: {
                label: function (item, data) {
                  var label = data.datasets[item.datasetIndex].label || '';
                  var yLabel = item.yLabel;
                  var content = '';

                  if (data.datasets.length > 1) {
                    content += '<span class="badge badge-primary mr-auto">' + label + '</span>';
                  }

                  content += '<span class="popover-body-value">' + yLabel + '</span>';
                  return content;
                }
              }
            }
          },
          doughnut: {
            cutoutPercentage: 83,
            tooltips: {
              callbacks: {
                title: function (item, data) {
                  var title = data.labels[item[0].index];
                  return title;
                },
                label: function (item, data) {
                  var value = data.datasets[0].data[item.index];
                  var content = '';

                  content += '<span class="popover-body-value">' + value + '</span>';
                  return content;
                }
              }
            },
            legendCallback: function (chart) {
              var data = chart.data;
              var content = '';

              data.labels.forEach(function (label, index) {
                var bgColor = data.datasets[0].backgroundColor[index];

                content += '<span class="chart-legend-item">';
                content += '<i class="chart-legend-indicator" style="background-color: ' + bgColor + '"></i>';
                content += label;
                content += '</span>';
              });

              return content;
            }
          }
        }
      };

      // yAxes
      Chart.scaleService.updateScaleDefaults('linear', {
        gridLines: {
          borderDash: [2],
          borderDashOffset: [2],
          color: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
          drawBorder: false,
          drawTicks: false,
          lineWidth: 0,
          zeroLineWidth: 0,
          zeroLineColor: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
          zeroLineBorderDash: [2],
          zeroLineBorderDashOffset: [2]
        },
        ticks: {
          beginAtZero: true,
          padding: 10,
          callback: function (value) {
            if (!(value % 10)) {
              return value;
            }
          }
        }
      });

      // xAxes
      Chart.scaleService.updateScaleDefaults('category', {
        gridLines: {
          drawBorder: false,
          drawOnChartArea: false,
          drawTicks: false
        },
        ticks: {
          padding: 20
        },
        maxBarThickness: 10
      });

      return options;

    }

    // Parse global options
    function parseOptions(parent, options) {
      for (var item in options) {
        if (typeof options[item] !== 'object') {
          parent[item] = options[item];
        } else {
          parseOptions(parent[item], options[item]);
        }
      }
    }

    parseOptions(Chart, chartOptions());

    (function () {

      // Variables

      var _$chart = _$('#chart-sales');


      // Methods

      function init(_$chart) {

        var salesChart = new Chart(_$chart, {
          type: 'line',
          options: {
            scales: {
              yAxes: [{
                gridLines: {
                  color: '#1B284B',
                  zeroLineColor: '#1B284B'
                },
                ticks: {
                  callback: function (value) {
                    if (!(value % 10)) {
                      return value;
                    }
                  }
                }
              }]
            },
            tooltips: {
              callbacks: {
                label: function (item, data) {
                  var label = data.datasets[item.datasetIndex].label || '';
                  var yLabel = item.yLabel;
                  var content = '';

                  if (data.datasets.length > 1) {
                    content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                  }

                  content += '<span class="popover-body-value">' + yLabel + '</span>';
                  return content;
                }
              }
            }
          },
          data: {
            labels: JSON.parse(_$('.database').attr('time')),
            datasets: [{
              label: 'Performance',
              data: JSON.parse(_$('.database').attr('data'))
            }]
          }
        });

        // Save to jQuery object

        _$chart.data('chart', salesChart);

      }


      // Events

      if (_$chart.length) {
        init(_$chart);
      }

    })();
  }
}

export default window.dashboard = new Dashboard();
