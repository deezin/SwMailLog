Ext.define('Shopware.apps.DznMailLog.view.list.List', {
    extend: 'Shopware.grid.Panel',
    alias: 'widget.mail-list-grid',
    region: 'center',
    configure: function () {
        return {
            columns: {
                subject: { header: 'Betreff' },
                fromMail: { header: 'Absender' },
                recipient: { header: 'Empfänger' },
                time: { header: 'Zeitpunkt' }
            },
            addButton: false,
            editColumn: false
        }
    }
});