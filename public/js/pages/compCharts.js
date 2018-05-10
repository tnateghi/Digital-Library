/*
 *  Document   : compCharts.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Charts page
 */

var CompCharts = function() {

    // Get random number function from a given range
    var getRandomInt = function(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    };

    return {
        init: function() {
            /* Mini Line Charts with jquery.sparkline plugin, for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about */
            var miniChartLineOptions = {
                type: 'line',
                width: '120px',
                height: '65px',
                tooltipOffsetX: -25,
                tooltipOffsetY: 20,
                lineColor: '#de815c',
                fillColor: '#de815c',
                spotColor: '#555555',
                minSpotColor: '#555555',
                maxSpotColor: '#555555',
                highlightSpotColor: '#555555',
                highlightLineColor: '#555555',
                spotRadius: 3,
                tooltipPrefix: '',
                tooltipSuffix: ' Tickets',
                tooltipFormat: '{{prefix}}{{y}}{{suffix}}'
            };
            $('#mini-chart-line1').sparkline('html', miniChartLineOptions);

            miniChartLineOptions['lineColor'] = '#5ccdde';
            miniChartLineOptions['fillColor'] = '#5ccdde';
            miniChartLineOptions['tooltipPrefix'] = '$ ';
            miniChartLineOptions['tooltipSuffix'] = '';
            $('#mini-chart-line2').sparkline('html', miniChartLineOptions);

            /* Mini Bar Charts with jquery.sparkline plugin, for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about */
            var miniChartBarOptions = {
                type: 'bar',
                barWidth: 7,
                barSpacing: 6,
                height: '65px',
                tooltipOffsetX: -25,
                tooltipOffsetY: 20,
                barColor: '#de815c',
                tooltipPrefix: '',
                tooltipSuffix: ' Tickets',
                tooltipFormat: '{{prefix}}{{value}}{{suffix}}'
            };
            $('#mini-chart-bar1').sparkline('html', miniChartBarOptions);

            miniChartBarOptions['barColor'] = '#5ccdde';
            miniChartBarOptions['tooltipPrefix'] = '$ ';
            miniChartBarOptions['tooltipSuffix'] = '';
            $('#mini-chart-bar2').sparkline('html', miniChartBarOptions);

            // Randomize easy pie charts values
            var random;

            $('.toggle-pies').click(function() {
                $('.pie-chart').each(function() {
                    random = getRandomInt(1, 100);
                    $(this).data('easyPieChart').update(random);
                });
            });

            /*
             * Flot Charts Jquery plugin is used for charts
             *
             * For more examples or getting extra plugins you can check http://www.flotcharts.org/
             * Plugins included in this template: pie, resize, stack, time
             */

            // Get the elements where we will attach the charts
            var chartClassic    = $('#chart-classic');
            var chartStacked    = $('#chart-stacked');
            var chartPie        = $('#chart-pie');
            var chartBars       = $('#chart-bars');
            var chartLive       = $('#chart-live');
            var chartMixed      = $('#chart-mixed');

            // Data for the charts
            
            
            //var dataTickets     = [[1, 130], [2, 330], [3, 220], [4, 350], [5, 150], [6, 275], [7, 280], [8, 380], [9, 120], [10, 330], [11, 190], [12, 410]];

            var dataSalesBefore = [[1, 200], [4, 350], [7, 700], [10, 950], [13, 800], [16, 1050], [19, 1200], [22, 750], [25, 980], [28, 1300], [31, 1350], [34, 1200]];
            var dataSalesAfter  = [[2, 450], [5, 700], [8, 980], [11, 1200], [14, 1350], [17, 1200], [20, 1530], [23, 1750], [26, 1300], [29, 1620], [32, 1750], [35, 1750]];

            //var dataMonths      = [[1, 'فروردین'], [2, 'اردیبهشت'], [3, 'خرداد'], [4, 'تیر'], [5, 'مرداد'], [6, 'شهریور'], [7, 'مهر'], [8, 'آبان'], [9, 'آذر'], [10, 'دی'], [11, 'بهمن'], [12, 'اسفند']];
            var dataMonthsBars  = [[2, 'Jan'], [5, 'Feb'], [8, 'Mar'], [11, 'Apr'], [14, 'May'], [17, 'Jun'], [20, 'Jul'], [23, 'Aug'], [26, 'Sep'], [29, 'Oct'], [32, 'Nov'], [35, 'Dec']];

            // Classic Chart
            $.plot(chartClassic,
                [
                    
                    {
                        label: '',
                        data: dataTickets,
                        lines: {show: true, fill: true, fillColor: {colors: [{opacity: .2}, {opacity: .2}]}},
                        points: {show: true, radius: 5}
                    }
                ],
                {
                    colors: ['#5ccdde', '#454e59', '#ffffff'],
                    legend: {show: true, position: 'nw', backgroundOpacity: 0},
                    grid: {borderWidth: 0, hoverable: true, clickable: true},
                    yaxis: {tickColor: '#f5f5f5', ticks: 3},
                    xaxis: {ticks: dataMonths, tickColor: '#f5f5f5'}
                }
            );

            // Creating and attaching a tooltip to the classic chart
            var previousPoint = null, ttlabel = null;
            chartClassic.bind('plothover', function(event, pos, item) {

                if (item) {
                    if (previousPoint !== item.dataIndex) {
                        previousPoint = item.dataIndex;

                        $('#chart-tooltip').remove();
                        var x = item.datapoint[0], y = item.datapoint[1];

                        
                            ttlabel = '<strong>' + y + '</strong> امانت';
                        

                        $('<div id="chart-tooltip" class="chart-tooltip">' + ttlabel + '</div>')
                            .css({top: item.pageY - 45, left: item.pageX + 5}).appendTo("body").show();
                    }
                }
                else {
                    $('#chart-tooltip').remove();
                    previousPoint = null;
                }
            });

            // Stacked Chart
            $.plot(chartStacked,
                [{label: 'Tickets', data: dataTickets}],
                {
                    colors: ['#aaaaaa', '#454e59', '#5ccdde'],
                    series: {stack: true, lines: {show: true, fill: true}},
                    lines: {show: true, lineWidth: 0, fill: true, fillColor: {colors: [{opacity: .6}, {opacity: .6}]}},
                    legend: {show: true, position: 'nw', sorted: true, backgroundOpacity: 0},
                    grid: {borderWidth: 0},
                    yaxis: {tickColor: '#f5f5f5', ticks: 3},
                    xaxis: {ticks: dataMonths, tickColor: '#f5f5f5'}
                }
            );

            // Pie Chart
            $.plot(chartPie,
                [
                    {label: 'Tickets', data: 10}
                ],
                {
                    colors: ['#454e59', '#5cafde', '#5ccdde'],
                    legend: {show: false},
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            label: {
                                show: true,
                                radius: 2/3,
                                formatter: function(label, pieSeries) {
                                    return '<div class="chart-pie-label">' + label + '<br>' + Math.round(pieSeries.percent) + '%</div>';
                                },
                                background: {opacity: .75, color: '#000000'}
                            }
                        }
                    }
                }
            );

            // Bars Chart
            $.plot(chartBars,
                [
                    {
                        label: 'Sales Before',
                        data: dataSalesBefore,
                        bars: {show: true, lineWidth: 0, fillColor: {colors: [{opacity: .6}, {opacity: .6}]}}
                    },
                    {
                        label: 'Sales After',
                        data: dataSalesAfter,
                        bars: {show: true, lineWidth: 0, fillColor: {colors: [{opacity: .6}, {opacity: .6}]}}
                    }
                ],
                {
                    colors: ['#5ccdde', '#454e59'],
                    legend: {show: true, position: 'nw', backgroundOpacity: 0},
                    grid: {borderWidth: 0},
                    yaxis: {ticks: 3, tickColor: '#f5f5f5'},
                    xaxis: {ticks: dataMonthsBars, tickColor: '#f5f5f5'}
                }
            );

            // Live Chart
            var dataLive = [];

            function getRandomData() { // Random data generator

                if (dataLive.length > 0)
                    dataLive = dataLive.slice(1);

                while (dataLive.length < 300) {
                    var prev = dataLive.length > 0 ? dataLive[dataLive.length - 1] : 50;
                    var y = prev + Math.random() * 10 - 5;
                    if (y < 0)
                        y = 0;
                    if (y > 100)
                        y = 100;
                    dataLive.push(y);
                }

                var res = [];
                for (var i = 0; i < dataLive.length; ++i)
                    res.push([i, dataLive[i]]);

                // Show live chart info
                $('#chart-live-info').html(y.toFixed(0) + '%');

                return res;
            }

            function updateChartLive() { // Update live chart
                chartLive.setData([getRandomData()]);
                chartLive.draw();
                setTimeout(updateChartLive, 70);
            }

            var chartLive = $.plot(chartLive, // Initialize live chart
                [{data: getRandomData()}],
                {
                    series: {shadowSize: 0},
                    lines: {show: true, lineWidth: 2, fill: true, fillColor: {colors: [{opacity: .2}, {opacity: .2}]}},
                    colors: ['#5ccdde'],
                    grid: {borderWidth: 0, color: '#aaaaaa'},
                    yaxis: {show: true, min: 0, max: 110},
                    xaxis: {show: false}
                }
            );

            updateChartLive(); // Start getting new data

            // Mixed Chart
            $.plot(chartMixed,
                [
                    
                    {
                        label: 'Tickets',
                        data: dataTickets,
                        lines: {show: true},
                        points: {show: true, radius: 7}
                    }
                ],
                {
                    colors: ['#5ccdde', '#454e59', '#ffffff'],
                    legend: {show: true, position: 'nw', backgroundOpacity: 0},
                    grid: {borderWidth: 0},
                    yaxis: {tickColor: '#f5f5f5', ticks: 3},
                    xaxis: {ticks: dataMonths, tickColor: '#f5f5f5'}
                }
            );
        }
    };
}();