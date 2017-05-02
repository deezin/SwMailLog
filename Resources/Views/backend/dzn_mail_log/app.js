
Ext.define('Shopware.apps.DznMailLog', {
    extend: 'Enlight.app.SubApplication',

    name: 'Shopware.apps.DznMailLog',

    loadPath: '{url action=load}',
    bulkLoad: true,

    views: [
        'list.Window',
        'list.List',

        'list.extensions.Info'
    ],

    stores: [ 'Mail' ],
    models: [ 'Mail' ],
    controllers: [ 'Main' ],

    launch: function() {
        return this.getController('Main').mainWindow;
    }

 });