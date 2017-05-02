Ext.define('Shopware.apps.DznMailLog.view.list.extensions.Info', {
    extend: 'Shopware.listing.InfoPanel',
    alias:  'widget.mail-list-info-panel',
    width: 500,

    configure: function() {
        return {
            model: 'Shopware.apps.DznMailLog.model.Mail',
            fields: {
                content: '<div style="white-space:pre-line;">{literal}{content}{/literal}</div>'
            }
        };
    }
});