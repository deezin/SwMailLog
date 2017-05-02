Ext.define('Shopware.apps.DznMailLog.view.list.Window', {
    extend: 'Shopware.window.Listing',
    alias: 'widget.mail-list-window',
    title: 'E-Mail-Archiv',

    configure: function() {
        return {
            listingGrid: 'Shopware.apps.DznMailLog.view.list.List',
            listingStore: 'Shopware.apps.DznMailLog.store.Mail',
            extensions: [
                { xtype: 'mail-list-info-panel' }
            ]
        };
    }
});