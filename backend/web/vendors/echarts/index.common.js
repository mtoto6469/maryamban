/**
 * Export echarts as CommonJS module
 */
module.exports = require('./lib/echarts');

require('./lib/chart/line');
require('./lib/chart/bar');
require('./lib/chart/pie');
require('./lib/chart/scatter');
require('./lib/components/tooltip');
require('./lib/components/legend');

require('./lib/components/grid');
require('./lib/components/title');

require('./lib/components/markPoint');
require('./lib/components/markLine');
require('./lib/components/dataZoom');
require('./lib/components/toolbox');

require('zrender/lib/vml/vml');