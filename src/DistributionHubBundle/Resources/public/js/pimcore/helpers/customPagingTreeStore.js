Ext.define('pimcore.plugin.distributionhub.helpers.customPagingTreeStore', {

    extend: 'Ext.data.TreeStore',
    alias: 'customPagingTreeStore',
    ptb: false,

    onProxyLoad: function(operation) {
        try {
            var me = this;
            var options = operation.initialConfig
            var node = options.node;
            var proxy = me.getProxy();
            var extraParams = proxy.getExtraParams();


            var response = operation.getResponse();
            var data = Ext.decode(response.responseText);

            node.fromPaging = data.fromPaging;
            node.filter = data.filter;
            node.inSearch = data.inSearch;
            node.overflow = data.overflow;

            proxy.setExtraParam("fromPaging", 0);

            var total = data.total;

            var text = node.data.text;
            if (typeof total == "undefined") {
                total = 0;
            }

            node.addListener("expand", function (node) {
                var tree = node.getOwnerTree();
                if (tree) {
                    var view = tree.getView();
                    view.updatePaging();
                }
            }.bind(this));

            //to hide or show the expanding icon depending if childs are available or not
            node.addListener('remove', function (node, removedNode, isMove) {
                if (!node.hasChildNodes()) {
                    node.set('expandable', false);
                }
            });
            node.addListener('append', function (node) {
                node.set('expandable', true);
            });

            if (me.pageSize < total || node.inSearch) {
                node.needsPaging = true;
                node.pagingData = {
                    total: data.total,
                    offset: data.offset,
                    limit: data.limit
                }
            } else {
                node.needsPaging = false;
            }

            me.superclass.onProxyLoad.call(this, operation);
            var proxy = this.getProxy();
            proxy.setExtraParam("start", 0);
        } catch (e) {
            console.log(e);
        }
    }
});

Ext.define('pimcore.tree.CustomView', {
    extend: 'Ext.tree.View',
    alias: 'widget.custompimcoretreeview',
    listeners: {
        refresh: function() {
            this.updatePaging();
        },
        beforeitemupdate: function(record) {
            if(record.ptb) {
                record.ptb.destroy();
                delete record.ptb;
            }
        }
    },

    queue: {},

    renderRow: function(record, rowIdx, out) {
        var me = this;
        if (record.needsPaging) {
            me.queue[record.id] = record;
        }

        me.superclass.renderRow.call(this, record, rowIdx, out);

        if (record.needsPaging && typeof record.ptp == "undefined") {
            this.doUpdatePaging(record);
        }

        this.fireEvent("itemafterrender", record, rowIdx, out);
    },

    doUpdatePaging: function(node) {

        if (node.data.expanded && node.needsPaging) {

            node.ptb = ptb = Ext.create('pimcore.toolbar.CustomPaging', {
                    node: node,
                    width: 260
                }
            );

            node.ptb.node = node;
            node.ptb.store = this.store;


            var tree = node.getOwnerTree();
            var view = tree.getView();
            var nodeEl = Ext.fly(view.getNodeByRecord(node));
            if (!nodeEl) {
                //console.log("Could not resolve node " + node.id);
                return;
            }
            nodeEl = nodeEl.getFirstChild();
            nodeEl = nodeEl.query(".x-tree-node-text");
            nodeEl = nodeEl[0];
            var el = nodeEl;

            //el.addCls('x-grid-header-inner');
            el = Ext.DomHelper.insertAfter(el, {
                tag: 'span',
                "class": "pimcore_pagingtoolbar_container"
            }, true);

            el.addListener("click", function(e) {
                e.stopPropagation();
            });


            el.addListener("mousedown", function(e) {
                e.stopPropagation();
            });

            ptb.render(el);
            tree.updateLayout();

             if (node.filter) {
                node.ptb.filterFieldCustom.focus([node.filter.length, node.filter.length]);
            } else if (node.fromPaging) {
                node.ptb.numberItem.focus();
            }
        }

    },

    updatePaging: function() {
        var me = this;
        var queue = me.queue;

        var names = Object.getOwnPropertyNames(queue);

        for (i = 0; i < names.length; i++) {
            var node = queue[names[i]];
            this.doUpdatePaging(node);
        }

        me.queue = {}
    }
});

Ext.define('pimcore.toolbar.CustomPaging', {
    extend: 'Ext.toolbar.Toolbar',
    requires: [
        'Ext.toolbar.TextItem',
        'Ext.form.field.Number'
    ],

    displayInfo: false,

    prependButtons: false,

    displayMsg: t('Displaying {0} - {1} of {2}'),

    emptyMsg: t('no_data_to_display'),

    beforePageText: t('page'),

    afterPageText: '/ {0}',

    firstText: t('first_page'),

    prevText: t('previous_page'),

    nextText: t('next_page'),

    lastText: t('last_page'),

    refreshText: t('refresh'),

    width: 280,

    height: 20,

    border: false,
    showSearch:false,
    emptyPageData: {
        total: 0,
        currentPage: 0,
        pageCount: 0,
        toRecord: 0,
        fromRecord: 0
    },
   loadStore: function(store,node) {
        this.inSearch = this.filterFieldCustom.getValue() != "" ? 1 : 0;
        store.load({
            node: node,
            params: {
                "filter": this.filterFieldCustom.getValue(),
                "inSearch": this.inSearch
            }
         }
        );
    },
    doCancelSearch: function (node) {
        this.inSearch = 0;
        this.cancelFilterButton.hide();
        this.filterButton.show();
        this.filterFieldCustom.setValue("");
        this.filterFieldCustom.hide();

        var store = this.store;
        store.load({
                node: node,
                params: {
                    "inSearch": 0
                }
            }
        );


        this.first.show();
        this.prev.show();
        this.numberItem.show();
        this.spacer.show();
        this.afterItem.show();
        this.next.show();
        this.last.show();
    },
    getCustomPagingItems: function () {
        var me = this,
            inputListeners = {
                scope: me,
                blur: me.onPagingBlur
            };

        var node = me.node;
        var pagingData = me.node.pagingData;

        var currPage = pagingData.offset / pagingData.limit + 1;

        this.inSearch = node.inSearch;
        var hidden = this.inSearch
        pimcore.isTreeFiltering = false;

        inputListeners[Ext.supports.SpecialKeyDownRepeat ? 'keydown' : 'keypress'] = me.onPagingKeyDown;

        this.filterFieldCustom = new Ext.form.field.Text({
            name: 'filter',
            width: 160,
            border: true,
            cls: "pimcore_pagingtoolbar_container_filter",
            fieldStyle: "padding: 0 10px 0 10px;",
            height: 18,
            value: node.filter ? node.filter : "",
            enableKeyEvents: true,
            hidden: !hidden,
            listeners: {
                "keydown": function (node, inputField, event) {
                    if (event.keyCode == 13) {
                        var store = this.store;
                        var proxy = store.getProxy();
                        this.currentFilter = this.filterFieldCustom.getValue();


                        try {
                            store.load({
                                    node: node,
                                    params: {
                                        "filter": this.filterFieldCustom.getValue(),
                                        "inSearch": this.inSearch
                                    }
                                }
                            );
                        } catch (e) {

                        }


                    }
                }.bind(this, node)
            }

        })
        ;

        var result = [this.filterFieldCustom];

        this.overflow = new Ext.button.Button(
            {
                tooltip: t("there_are_more_items"),
                overflowText: t("there_are_more_items"),
                iconCls: "pimcore_icon_warning",
                disabled: false,
                scope: me,
                border: false,
                hidden: !node.overflow
            });


        this.filterButton = new Ext.button.Button(
            {
                itemId: 'filterButton',
                tooltip: t("filter"),
                overflowText: t("filter"),
                iconCls: Ext.baseCSSPrefix + 'tbar-page-filter',
                margin: '-1 2 3 2',
                handler: function () {
                    this.inSearch = 1;
                    this.cancelFilterButton.show();
                    this.filterButton.hide();
                    this.filterFieldCustom.setValue("");
                    this.filterFieldCustom.show();

                    this.filterFieldCustom.focus();

                    this.first.hide();
                    this.prev.hide();
                    this.numberItem.hide();
                    this.spacer.hide();
                    this.afterItem.hide();
                    this.next.hide();
                    this.last.hide();
                }.bind(this),
                scope: me,
                hidden: this.inSearch
            });

        this.cancelFilterButton = new Ext.button.Button(
            {
                itemId: 'cancelFlterButton',
                tooltip: t("Clear"),
                overflowText: t("Clear"),
                margin: '-1 2 3 2',
                iconCls: Ext.baseCSSPrefix + 'tbar-page-cancel-filter',
                handler: function () {
                    this.doCancelSearch(node);

                }.bind(this),
                scope: me,
                hidden: !this.inSearch
            });
        this.clearSearchButton = new Ext.button.Button(
            {
                itemId: 'clearSearch',
                tooltip: t("refresh"),
                overflowText: t("filter"),
                iconCls:  Ext.baseCSSPrefix + 'tbar-page-refresh',
                margin: '-1 2 3 2',
                listeners :  {
                    click : function () {
                        this.filterFieldCustom.setValue("");
                        var store = this.store;
                        this.currentFilter = this.filterFieldCustom.getValue();
                        try {
                            this.loadStore(store,node);

                        } catch (e) {

                        }
                    }.bind(this)
                },
                scope: me,
                //hidden: !this.showSearch
            });
        this.afterItem = Ext.create('Ext.form.NumberField', {

            cls: Ext.baseCSSPrefix + 'tbar-page-number',
            value: Math.ceil(pagingData.total / pagingData.limit),
            hideTrigger: true,
            heightLabel: true,
            height: 18,
            width: 38,
            disabled: true,
            margin: '-1 2 3 2',
            hidden: hidden
        });


        this.numberItem = new Ext.form.field.Number({
            xtype: 'numberfield',
            itemId: 'inputItem',
            name: 'inputItem',
            heightLabel: true,
            cls: Ext.baseCSSPrefix + 'tbar-page-number',
            allowDecimals: false,
            minValue: 1,
            maxValue: this.getMaxPageNum(),
            value: currPage,
            hideTrigger: true,
            enableKeyEvents: true,
            keyNavEnabled: false,
            selectOnFocus: true,
            submitValue: false,
            height: 18,
            width: 40,
            isFormField: false,
            margin: '-1 2 3 2',
            listeners: inputListeners,
            hidden: hidden
        });


        this.first = new Ext.button.Button(
            {
                itemId: 'first',
                tooltip: me.firstText,
                overflowText: me.firstText,
                iconCls: Ext.baseCSSPrefix + 'tbar-page-first',
                disabled: me.node.pagingData.offset == 0,
                handler: me.moveFirst,
                scope: me,
                border: false,
                hidden: hidden

            });


        this.prev = new Ext.button.Button({
            itemId: 'prev',
            tooltip: me.prevText,
            overflowText: me.prevText,
            iconCls: Ext.baseCSSPrefix + 'tbar-page-prev',
            disabled: me.node.pagingData.offset == 0,
            handler: me.movePrevious,
            scope: me,
            border: false,
            hidden: hidden
        });


        this.spacer = new Ext.toolbar.Spacer({
            xtype: "tbspacer",
            hidden: hidden
        });


        this.next = new Ext.button.Button({
            itemId: 'next',
            tooltip: me.nextText,
            overflowText: me.nextText,
            iconCls: Ext.baseCSSPrefix + 'tbar-page-next',
            disabled: (Math.ceil(me.node.pagingData.total / me.node.pagingData.limit) - 1) * me.node.pagingData.limit == me.node.pagingData.offset,
            handler: me.moveNext,
            scope: me,
            hidden: hidden
        });


        this.last = new Ext.button.Button({
            itemId: 'last',
            tooltip: me.lastText,
            overflowText: me.lastText,
            iconCls: Ext.baseCSSPrefix + 'tbar-page-last',
            disabled: (Math.ceil(me.node.pagingData.total / me.node.pagingData.limit) - 1) * me.node.pagingData.limit == me.node.pagingData.offset,
            handler: me.moveLast,
            scope: me,
            hidden: hidden
        });


        result.push(this.overflow);
        result.push(this.clearSearchButton);
        result.push(this.filterButton);
        result.push(this.cancelFilterButton);

        result.push(this.filterFieldCustom);
        result.push(this.first);
        result.push(this.prev);
        result.push(this.numberItem);
        result.push(this.spacer);
        result.push(this.afterItem);
        result.push(this.next);
        result.push(this.last);


        return result;
    },

    getMaxPageNum: function() {
        var me = this;
        return Math.ceil(me.node.pagingData.total / me.node.pagingData.limit)
    },

    initComponent: function(config) {
        var me = this,
            userItems = me.items || me.buttons || [],
            pagingItems;

        pagingItems = me.getCustomPagingItems();
        if (me.prependButtons) {
            me.items = userItems.concat(pagingItems);
        } else {
            me.items = pagingItems.concat(userItems);
        }
        delete me.buttons;
        if (me.displayInfo) {
            me.items.push('->');
            me.items.push({
                xtype: 'tbtext',
                itemId: 'displayItem'
            });
        }
        me.callParent();
    },


    getInputItem: function() {
        return this.child('#inputItem');
    },


    onPagingBlur: function(e) {
        var inputItem = this.getInputItem(),
            curPage;
        if (inputItem) {
            //curPage = this.getPageData().currentPage;
            //inputItem.setValue(curPage);
        }
    },

    onPagingKeyDown: function(field, e) {
        this.processKeyEvent(field, e);
    },

    readPageFromInput: function() {
        var inputItem = this.getInputItem(),
            pageNum = false,
            v;
        if (inputItem) {
            v = inputItem.getValue();
            pageNum = parseInt(v, 10);
        }
        return pageNum;
    },


    processKeyEvent: function(field, e) {
        var me = this,
            k = e.getKey(),
        //pageData = me.getPageData(),
            increment = e.shiftKey ? 10 : 1,
            pageNum;
        if (k == e.RETURN) {
            e.stopEvent();
            pageNum = me.readPageFromInput();
            if (pageNum !== false) {
                pageNum = Math.min(Math.max(1, pageNum), this.getMaxPageNum());
                this.moveToPage(pageNum);
            }


        } else if (k == e.HOME) {
            e.stopEvent();
            this.moveFirst();
        } else if (k == e.END) {
            e.stopEvent();
            this.moveLast();
        } else if (k == e.UP || k == e.PAGE_UP || k == e.DOWN || k == e.PAGE_DOWN) {
            e.stopEvent();
            pageNum = me.readPageFromInput();
            if (pageNum) {
                if (k == e.DOWN || k == e.PAGE_DOWN) {
                    increment *= -1;
                }
                pageNum += increment;
                if (pageNum >= 1 && pageNum <= this.getMaxPageNum()) {
                    this.moveToPage(pageNum);
                }
            }
        }
    },

    moveToPage: function(page) {
        var me = this;
        var node = me.node;
        var pagingData = node.pagingData;
        var store = node.getTreeStore();

        var proxy = store.getProxy();
        proxy.setExtraParam("start",  pagingData.limit * (page - 1));
        proxy.setExtraParam("fromPaging", 1);
        this.loadStore(store,node);
    },

    moveFirst: function() {
        var me = this;
        var node = me.node;
        var pagingData = node.pagingData;
        var store = node.getTreeStore();
        var page = pagingData.offset / pagingData.total;

        var proxy = store.getProxy();
        proxy.setExtraParam("start", 0);
        this.loadStore(store,node);
    },

    movePrevious: function() {
        var me = this;
        var node = me.node;
        var pagingData = node.pagingData;
        var store = node.getTreeStore();
        var page = pagingData.offset / pagingData.total;

        var proxy = store.getProxy();
        proxy.setExtraParam("start", pagingData.offset - pagingData.limit);
        this.loadStore(store,node);
    },

    moveNext: function() {
        var me = this;
        var node = me.node;
        var pagingData = node.pagingData;
        var store = node.getTreeStore();
        var page = pagingData.offset / pagingData.total;

        var proxy = store.getProxy();
        proxy.setExtraParam("start", pagingData.offset + pagingData.limit);
        this.loadStore(store,node);

    },

    moveLast: function() {
        var me = this;
        var node = me.node;
        var pagingData = node.pagingData;
        var store = node.getTreeStore();
        var offset = (Math.ceil(pagingData.total / pagingData.limit) - 1) * pagingData.limit;

        var proxy = store.getProxy();
        proxy.setExtraParam("start", offset);
        this.loadStore(store,node);
    },

    doRefresh: function() {
        var me = this;
        var node = me.node;
        var pagingData = node.pagingData;
        var store = node.getTreeStore();
        var page = pagingData.offset / pagingData.total;

        var proxy = store.getProxy();
        proxy.setExtraParam("start", pagingData.offset);
        this.loadStore(store,node);
    },

    onDestroy: function() {
        //this.bindStore(null);
        this.callParent();
    }
});
