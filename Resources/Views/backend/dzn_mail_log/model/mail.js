Ext.define('Shopware.apps.DznMailLog.model.Mail', {
    extend: 'Shopware.data.Model',

    configure: function() {
        return {
            controller: 'DznMailLog'
        };
    },

    fields: [
        { name : 'id', type: 'int', useNull: true },
        { name : 'subject', type: 'string' },
        { name : 'fromMail', type: 'string' },
        { name : 'content', type: 'text' },
        { name : 'recipient', type: 'string' },
        { name : 'time', type: 'date', dateFormat: 'd.m.Y H:i:s' }
    ]
});