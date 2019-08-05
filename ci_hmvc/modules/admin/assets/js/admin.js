/**
 * @copyright 2015 MSCMS
 * @author http://polyakov.co.ua <zhenya_polyakov@mail.ru>
 * @cms http://mscms.com.ua <dev@mscms.com.ua>
 */
//====================================== Смена заставки в зависимости от времени суток
//Moment.js Time Display
var datetime = null,
    date = null;

var update = function() {
    date = moment(new Date())
    datetime.html(date.format('H:mm:ss'));
    //datetime.html(date.format('dddd<br>MMMM Do, YYYY<br>H:mm:ss'));
};

$(document).ready(function() {
    datetime = $('#datetime')
    update();
    setInterval(update, 1000);
});
$(document).ready(function() {
    datetoday = new Date(); // create new Date()
    timenow = datetoday.getTime(); // grabbing the time it is now
    datetoday.setTime(timenow); // setting the time now to datetoday variable
    hournow = datetoday.getHours(); //the hour it is

    if (hournow >= 18) // if it is after 6pm
        $('div.tile-img').addClass('evening');
    else if (hournow >= 12) // if it is after 12pm
        $('div.tile-img').addClass('afternoon');
    else if (hournow >= 6) // if it is after 6am
        $('div.tile-img').addClass('morning');
    else if (hournow >= 0) // if it is after midnight
        $('div.tile-img').addClass('midnight');
});

//====================================== чарты для верхнего блока
$(function() {
    //Responsive Sparkline Inline Charts
    $("#sparklineA").sparkline([200, 215, 221, 214, 232, 265], {
        disableTooltips: true,
        type: 'bar',
        zeroAxis: false,
        height: 24,
        chartRangeMin: 100,
        barColor: 'rgba(255,255,255,0.5)',
        negBarColor: 'rgba(255,255,255,0.5)'
    });

    $("#sparklineB").sparkline('html', {
        disableTooltips: true,
        type: 'pie',
        height: 24,
        sliceColors: ['rgba(255,255,255,0.2)', 'rgba(255,255,255,0.4)', 'rgba(255,255,255,0.6)']
    });

    $("#sparklineC").sparkline([22, 29, 14, 12, 18, 21, 24], {
        disableTooltips: true,
        type: 'bar',
        zeroAxis: false,
        height: 24,
        chartRangeMin: 0,
        barColor: 'rgba(255,255,255,0.5)',
        negBarColor: 'rgba(255,255,255,0.5)'
    });

    $("#sparklineD").sparkline([72, 65, 45, 65, 82, 78, 92, 83, 46, 87, 69, 96], {
        disableTooltips: true,
        type: 'line',
        lineColor: 'rgba(255,255,255,0.8)',
        fillColor: 'rgba(255,255,255,0.3)',
        spotColor: '#ffffff',
        minSpotColor: '#ffffff',
        maxSpotColor: '#ffffff',
        highlightLineColor: '#ffffff',
        height: 24,
        chartRangeMin: 25,
        drawNormalOnTop: false
    });
});