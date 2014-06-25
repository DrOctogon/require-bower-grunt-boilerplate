requirejs.config({
    baseUrl: '/assets/js/',
    waitSeconds: 0,
    paths: {
        jquery: '../../build/bower_components/jquery/dist/jquery',
        parsleyjs: '../../build/bower_components/parsleyjs/dist/parsley',
        site: 'app/site',
        colorbox: '../../build/bower_components/colorbox/jquery.colorbox',
    },
    shim: {
        site: [
            'jquery'
        ]
    },
    packages: [

    ]
});