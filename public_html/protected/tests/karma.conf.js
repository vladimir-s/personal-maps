// Karma configuration
// Generated on Wed Jul 24 2013 22:19:56 GMT+0300 (FLE Daylight Time)


// base path, that will be used to resolve files and exclude
basePath = '';


// list of files / patterns to load in the browser
files = [
  JASMINE,
  JASMINE_ADAPTER,
  'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
  'http://maps.googleapis.com/maps/api/js?sensor=false',
  '../../js/markdown.js',
  'http://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js',
  'libs/angular-mocks.js',
  '../../js/ui-bootstrap-tpls-0.4.0.min.js',
  '../../js/angular-translate.min.js',
  'unit/js/bootstrap.js',
  '../../js/app.js',
  '../../js/controllers/*.js',
  '../../js/services/*.js',
  '../../js/directives/*.js',
  'unit/js/controllers/*.spec.js',
  'unit/js/services/*.spec.js',
  'unit/js/directives/*.spec.js'
];


// list of files to exclude
exclude = [
  
];


// test results reporter to use
// possible values: 'dots', 'progress', 'junit'
reporters = ['progress'];


// web server port
port = 9876;


// cli runner port
runnerPort = 9100;


// enable / disable colors in the output (reporters and logs)
colors = true;


// level of logging
// possible values: LOG_DISABLE || LOG_ERROR || LOG_WARN || LOG_INFO || LOG_DEBUG
logLevel = LOG_DEBUG;


// enable / disable watching file and executing tests whenever any file changes
autoWatch = true;


// Start these browsers, currently available:
// - Chrome
// - ChromeCanary
// - Firefox
// - Opera
// - Safari (only Mac)
// - PhantomJS
// - IE (only Windows)
browsers = ['Chrome'];


// If browser does not capture in given timeout [ms], kill it
captureTimeout = 60000;


// Continuous Integration mode
// if true, it capture browsers, run tests and exit
singleRun = false;
