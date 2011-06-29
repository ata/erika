Ext.Loader.setConfig({enabled: true});
Ext.Loader.setPath('Ext.ux', BASE_URL + '/js/ux');

Ext.require([
	'Ext.selection.CellModel',
	'Ext.grid.*',
	'Ext.data.*',
	'Ext.util.*',
	'Ext.state.*',
	'Ext.form.*',
	'Ext.ux.grid.FiltersFeature',
]);



Ext.onReady(function() {

	Ext.define('Po', {
		extend: 'Ext.data.Model',
		fields: [
			{name: 'id', type: 'int'},
			{name: 'po_number', type: 'int'},
			{name: 'wp_id', type: 'int'},
			{name: 'line_item', type: 'string'},
			{name: 'po_date', type: 'date'},
			{name: 'customer_po_no', type: 'string'},
			{name: 'area', type: 'string'},
			{name: 'po_received_date', type: 'date'},
			{name: 'po_status', type: 'string'},
			{name: 'qc_status', type: 'string'},
			{name: 'wcc_area', type: 'date'},
			{name: 'wcc_jakarta', type: 'date'},
			{name: 'tanda_terima_wcc', type: 'date'},
			{name: 'wcc_no', type: 'string'},
			{name: 'invoice', type: 'date'},
			{name: 'po_open', type: 'string'},
			{name: 'site_based_on_epm', type: 'string'},
			{name: 'site_name', type: 'string'},
			{name: 'po_description', type: 'string'},
			{name: 'po_tsel', type: 'string'},
			{name: 'remark', type: 'string'},
		]
	});

	var postore = Ext.create('Ext.data.Store', {
		model: 'Po',
		pageSize: 25,
		autoLoad: true,
		autoSync: true,
		autoDestroy: true,
		proxy: {
			type: 'ajax',
			url: PO_LIST_URL,
			api: {
				create: PO_CREATE_URL,
				update: PO_UPDATE_URL,
				destroy: PO_DESTROY_URL,
			},
			reader: {
				successProperty: 'success',
				root: 'data',
				messageProperty: 'message'
			},
			writer: {
				writeAllFields: false,
				root: 'data'
			},
			reader: {
				type: 'json',
				root: 'po',
				successProperty: 'success',
				totalProperty: 'total',
			}
		}
	});

	var cellEditing = Ext.create('Ext.grid.plugin.CellEditing');

	var grid = Ext.create('Ext.grid.Panel', {
		renderTo: Ext.getBody(),
		store: postore,
		frame: true,
		border: true,
		layout: 'fit',
		title: 'Data PO',
		columns: [
			{
				header: 'PO Number',
				dataIndex: 'po_number',
				field: {
					allowBlank: false
				}
			},
			{
				header: 'WP ID',
				dataIndex: 'wp_id',
				//locked: true,
				selectOnTab: true,
				field: {
					allowBlank: false
				}
			},
			{
				header: 'Line Item',
				dataIndex: 'line_item',
				//locked: true,
				selectOnTab: true,
				field: {
					allowBlank: false
				}
			},
			{
				header: 'PO Date',
				dataIndex: 'po_date',
				//locked: true,
				xtype: 'datecolumn',
				selectOnTab: true,
				field: {
					xtype: 'datefield',
					allowBlank: false,
					format: 'm/d/Y',
					minValue: '01/01/1970',
					minheader: 'Cannot have a start date before the company existed!',
					maxValue: Ext.Date.format(new Date(), 'm/d/Y'),
				},

			},
			{
				header: 'Customer PO No.',
				dataIndex: 'customer_po_no',
				selectOnTab: true,
				//locked: true,
				field: {
					allowBlank: false
				}
			},
			{
				header: 'Area',
				dataIndex: 'area',
				selectOnTab: true,
				field: {
					xtype: 'combobox',
					allowBlank: false,
					typeAhead: true,
					store: [
						['West Java','West Java'],
						['East Java','East Java'],
						['Central Java','Central Java'],
					],
				},
			},
			{
				header: 'PO Received Date',
				dataIndex: 'po_received_date',
				xtype: 'datecolumn',
				selectOnTab: true,
				field: {
					xtype: 'datefield',
					allowBlank: false,
					format: 'm/d/Y',
					minValue: '01/01/1970',
					minheader: 'Cannot have a start date before the company existed!',
					maxValue: Ext.Date.format(new Date(), 'm/d/Y'),
				},
			},
			{
				header: 'PO Status',
				dataIndex: 'po_status',
				selectOnTab: true,
				field: {
					allowBlank: false
				}
			},
			{
				header: 'QC Status',
				dataIndex: 'qc_status',
				selectOnTab: true,
				field: {
					xtype: 'combobox',
					allowBlank: false,
					typeAhead: true,
					store: [
						['QC Signed','QC Signed'],
						['On Process/Alarm','On Process/Alarm'],
						['Not In Air','Not In Air'],
					],
				}
			},
			{
				header: 'WCC Area',
				dataIndex: 'wcc_area',
				xtype: 'datecolumn',
				selectOnTab: true,
				field: {
					xtype: 'datefield',
					allowBlank: false,
					format: 'm/d/Y',
					minValue: '01/01/1970',
					minheader: 'Cannot have a start date before the company existed!',
					maxValue: Ext.Date.format(new Date(), 'm/d/Y'),
				},
			},
			{
				header: 'WCC Jakarta',
				dataIndex: 'wcc_jakarta',
				xtype: 'datecolumn',
				selectOnTab: true,
				field: {
					xtype: 'datefield',
					allowBlank: false,
					format: 'm/d/Y',
					minValue: '01/01/1970',
					minheader: 'Cannot have a start date before the company existed!',
					maxValue: Ext.Date.format(new Date(), 'm/d/Y'),
				},
			},
			{
				header: 'Tanda Terima WCC',
				dataIndex: 'tanda_terima_wcc',
				xtype: 'datecolumn',
				selectOnTab: true,
				field: {
					xtype: 'datefield',
					allowBlank: false,
					format: 'm/d/Y',
					minValue: '01/01/1970',
					minheader: 'Cannot have a start date before the company existed!',
					maxValue: Ext.Date.format(new Date(), 'm/d/Y'),
				},
			},
			{
				header: 'WCC No.',
				dataIndex: 'wcc_no',
				selectOnTab: true,
				field: {
					allowBlank: false
				}
			},
			{
				header: 'Invoice',
				dataIndex: 'invoice',
				xtype: 'datecolumn',
				selectOnTab: true,
				field: {
					xtype: 'datefield',
					allowBlank: false,
					format: 'm/d/Y',
					minValue: '01/01/1970',
					minheader: 'Cannot have a start date before the company existed!',
					maxValue: Ext.Date.format(new Date(), 'm/d/Y'),
				},
			},
			{
				header: 'PO Open',
				dataIndex: 'po_open',
				selectOnTab: true,
				field: {
					xtype: 'combobox',
					allowBlank: false,
					typeAhead: true,
					store: [
						['Open','Open'],
						['Close','Close'],
					],
				}
			},
			{
				header: 'Site EPM',
				dataIndex: 'site_based_on_epm',
				selectOnTab: true,
				field: {
					allowBlank: false
				}
			},
			{
				header: 'Site Name',
				dataIndex: 'site_name',
				selectOnTab: true,
				field: {
					allowBlank: false
				}
			},
			{
				header: 'PO Description',
				dataIndex: 'po_description',
				selectOnTab: true,
				field: {
					allowBlank: false
				}
			},
			{
				header: 'PO TSEL',
				dataIndex: 'po_tsel',
				selectOnTab: true,
				field: {
					allowBlank: false
				}
			},
			{
				header: 'Remark',
				dataIndex: 'remark',
				selectOnTab: true,
				field: {
					allowBlank: false
				}
			}
		],
		dockedItems: [{
			xtype: 'pagingtoolbar',
			store: postore,   // same store GridPanel is using
			dock: 'bottom',
			displayInfo: true
		}],
		tbar: [
			{
				text: 'Add',
				iconCls: 'item-add',
				handler : function() {
					var r = Ext.ModelManager.create({},'Po');
					postore.insert(0, r);
					cellEditing.startEditByPosition({row: 0, column: 0});
				},
			}, {
				text: 'Delete',
				itemId: 'item-delete',
				iconCls: 'item-delete',
				handler: function() {
					var sm = grid.getSelectionModel();
					postore.remove(sm.getSelection());
					if (postore.getCount() > 0) {
						sm.select(0);
					}
				},
				disabled: true,
			}
		],
		plugins: [cellEditing],
		listeners: {
			'selectionchange': function(view, records) {
				grid.down('#item-delete').setDisabled(!records.length);
			}
		},
	});
});
