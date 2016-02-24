requirejs.config({
    baseUrl: '/assets',
    paths: {
        app: '/assets/app',
        jquery: '../../assets/third-party/jquery/1.12.0/jquery.min.js',
        bootstrap: '../../assets/js/bootstrap.min.js'
    },
    shim:{
        bootstrap: {
            deps: ['jquery'],
            exports: 'bootstrap'
        }
    }
});


requirejs(['app/main']);