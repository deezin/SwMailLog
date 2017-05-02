Ext.define('Shopware.apps.DznMailLog.store.Mail', {
    extend:'Shopware.store.Listing',

    configure: function() {
        return {
            controller: 'DznMailLog'
        };
    },

    model: 'Shopware.apps.DznMailLog.model.Mail'
});