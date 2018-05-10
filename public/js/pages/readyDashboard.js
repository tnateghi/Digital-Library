/*
 *  Document   : readyDashboard.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Dashboard page
 */

var ReadyDashboard = function() {

    return {
        init: function() {
            /* With CountTo, Check out examples and documentation at https://github.com/mhuggins/jquery-countTo */
            $('[data-toggle="counter"]').each(function(){
                var $this = $(this);

                $this.countTo({
                    speed: 1000,
                    refreshInterval: 25,
                    onComplete: function() {
                        if($this.data('after')) {
                            $this.html($this.html() + $this.data('after'));
                        }
                    }
                });
            });

            /* Mini Line Charts with jquery.sparkline plugin, for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about */
            var widgetChartLineOptions = {
                type: 'line',
                width: '200px',
                height: '109px',
                tooltipOffsetX: -25,
                tooltipOffsetY: 20,
                lineColor: '#9bdfe9',
                fillColor: '#9bdfe9',
                spotColor: '#555555',
                minSpotColor: '#555555',
                maxSpotColor: '#555555',
                highlightSpotColor: '#555555',
                highlightLineColor: '#555555',
                spotRadius: 3,
                tooltipPrefix: '',
                tooltipSuffix: ' Sales',
                tooltipFormat: '{{prefix}}{{y}}{{suffix}}'
            };
            $('#widget-dashchart-sales').sparkline('html', widgetChartLineOptions);

            /*
             * Flot Charts Jquery plugin is used for charts
             *
             * For more examples or getting extra plugins you can check http://www.flotcharts.org/
             * Plugins included in this template: pie, resize, stack, time
             */

            // Get the element where we will attach the chart
            var chartClassicDash    = $('#chart-classic-dash');

            

            // Classic Chart
            $.plot(chartClassicDash,
                [
                    
                    {
                        data: dataSales,
                        lines: {show: true, fill: true, fillColor: {colors: [{opacity: .6}, {opacity: .6}]}},
                        points: {show: true, radius: 5}
                    }
                ],
                {
                    colors: ['#5ccdde', '#454e59', '#ffffff'],
                    legend: {show: true, position: 'nw', backgroundOpacity: 0},
                    grid: {borderWidth: 0, hoverable: true, clickable: true},
                    yaxis: {show: false, tickColor: '#f5f5f5', ticks: 3},
                    xaxis: {ticks: dataMonths, tickColor: '#f9f9f9'}
                }
            );

            // Creating and attaching a tooltip to the classic chart
            var previousPoint = null, ttlabel = null;
            chartClassicDash.bind('plothover', function(event, pos, item) {

                if (item) {
                    if (previousPoint !== item.dataIndex) {
                        previousPoint = item.dataIndex;

                        $('#chart-tooltip').remove();
                        var x = item.datapoint[0], y = item.datapoint[1];

                        if (item.seriesIndex === 0) {
                            ttlabel = '<strong>' + y + '</strong> امانت';
                        } else if (item.seriesIndex === 1) {
                            ttlabel = '<strong>' + y + '</strong> sales';
                        } else {
                            ttlabel = '<strong>' + y + '</strong> tickets';
                        }

                        $('<div id="chart-tooltip" class="chart-tooltip">' + ttlabel + '</div>')
                            .css({top: item.pageY - 45, left: item.pageX - 30}).appendTo("body").show();
                    }
                }
                else {
                    $('#chart-tooltip').remove();
                    previousPoint = null;
                }
            });
        }
    };
}();