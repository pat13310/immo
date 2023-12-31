const Encore = require('@symfony/webpack-encore');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or subdirectory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
     */
    
    .addEntry('app', './assets/app.js')
    //.addEntry('panel', './assets/js/panel.js')
    //.addEntry('bootstrap', '.bootstrap/dist/js/bootstrap.js')
    .addStyleEntry('main', './assets/styles/main.css')  // Ajoutez cette ligne pour inclure votre fichier CSS
    .addStyleEntry('media', './assets/styles/media.css')  // Ajoutez cette ligne pour inclure votre fichier CSS
    .addStyleEntry('login', './assets/styles/login.css')  // Ajoutez cette ligne pour inclure votre fichier CSS
    // When enabled, Webpack "splits" your files into smaller pieces for greater optimization.
    .splitEntryChunks()
    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()

    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // configure Babel
    // .configureBabel((config) => {
    //     config.plugins.push('@babel/a-babel-plugin');
    // })

    // enables and configure @babel/preset-env polyfills
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = '3.23';
    })

    .copyFiles({
        from:'./assets/images',
        to:'images/[path][name].[ext]'
    })
    .copyFiles({
        from: './assets/fonts', // Répertoire source des polices
        to: 'fonts/[path][name].[ext]', // Répertoire de destination et modèle de nom de fichier
    })
    .copyFiles({
        from: './assets/js', // Répertoire source des polices
        to: 'js/[path][name].[ext]', // Répertoire de destination et modèle de nom de fichier
    })
    .copyFiles({
        from: './assets/data', // Répertoire source des polices
        to: 'data/[path][name].json', // Répertoire de destination et modèle de nom de fichier
    })

    // enables Sass/SCSS support
    .enableSassLoader()

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you use React
    //.enableReactPreset()

    // uncomment to get integrity="..." attributes on your script & link tags
    // requires WebpackEncoreBundle 1.4 or higher
    //.enableIntegrityHashes(Encore.isProduction())

    // uncomment if you're having problems with a jQuery plugin
    //.autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
