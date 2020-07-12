/**
 * Export echarts as CommonJS module
 */
module.exports = require('./lib/echarts');

// Import all charts and components
require('./lib/chart/line');
require('./lib/chart/bar');
require('./lib/chart/pie');
require('./lib/chart/scatter');
require('./lib/chart/radar');

require('./lib/chart/map');
require('./lib/chart/treemap');
require('./lib/chart/graph');
require('./lib/chart/gauge');
require('./lib/chart/funnel');
require('./lib/chart/parallel');
require('./lib/chart/sankey');
require('./lib/chart/boxplot');
require('./lib/chart/candlestick');
require('./lib/chart/effectScatter');
require('./lib/chart/lines');
require('./lib/chart/heatmap');

require('./lib/components/grid');
require('./lib/components/legend');
require('./lib/components/tooltip');
require('./lib/components/polar');
require('./lib/components/geo');
require('./lib/components/parallel');

require('./lib/components/title');

require('./lib/components/dataZoom');
require('./lib/components/visualMap');

require('./lib/components/markPoint');
require('./lib/components/markLine');

require('./lib/components/timeline');
require('./lib/components/toolbox');

require('zrender/lib/vml/vml');
