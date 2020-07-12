define(function (require) {

    var echarts = require('../echarts');

    require('../components/parallel');

    require('./parallel/ParallelSeries');
    require('./parallel/ParallelView');

    echarts.registerVisualCoding('chart', require('./parallel/parallelVisual'));

});