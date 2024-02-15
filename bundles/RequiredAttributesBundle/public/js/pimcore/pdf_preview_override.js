pimcore.registerNS("pimcore.plugin.RequiredAttributesBundle.pdf_preview_override");

pimcore.plugin.RequiredAttributesBundle.pdf_preview_override = Class.create({

    overrideGetLayout: function(){
        Ext.override(pimcore.document.printpages.pdfpreview,{
            getLayout: function () {

                if (this.layout == null) {

                    var details = [];

                    // Generate PDF Panel
                    this.publishedWarning = new Ext.form.Label({
                        text: t("web2print_only_published"),
                        style: "color: red",
                        hidden: this.page.data.published
                    });

                    this.generateButton = new Ext.Button({
                        text: t("web2print_generate_pdf"),
                        iconCls: "pimcore_material_icon_pdf pimcore_material_icon",
                        style: "float: right;  margin-top: 10px",
                        disabled: !this.page.data.published,
                        handler: this.generatePdf.bind(this)
                    });
                    this.generateForm = new Ext.form.FormPanel({
                        autoHeight: true,
                        border: false,
                        items: [this.getProcessingOptionsGrid(), this.publishedWarning, this.generateButton]
                    });

                    this.progressBar = Ext.create('Ext.ProgressBar', {
                        style: "margin-bottom: 10px"
                    });

                    this.statusUpdateBox = Ext.create('Ext.Panel', {
                        autoHeight: true,
                        border: false,
                        hidden: true,
                        items: [this.progressBar, {
                            xtype: 'button',
                            style: "float: right;",
                            text: t("web2print_cancel_pdf_creation"),
                            iconCls: "pimcore_icon_cancel",
                            handler: function() {
                                Ext.Ajax.request({
                                    url: Routing.generate('pimcore_bundle_web2print_document_printpage_cancelgeneration'),
                                    method: 'DELETE',
                                    params: {id: this.page.id},
                                    success: function(response) {
                                        var result = Ext.decode(response.responseText);
                                        if(!result.success) {
                                            pimcore.helpers.showNotification(t('web2print_cancel_generation'), t('web2print_cancel_generation_error'), "error");
                                        }
                                    }.bind(this)
                                });
                            }.bind(this)
                        }]
                    });
                    // customization -- open
                    this.cutomProgressPanel = Ext.create('Ext.Panel', {
                        autoHeight: true,
                        border: false,
                        hidden: true,
                        style:{
                            'marginLeft': 'auto',
                            'marginRight': 'auto',
                            'width': '50%'
                        },
                        items: [{
                            xtype: 'image',
                            src: '/static/images/pdf_conversion_loader.gif'
                        }]
                    });
                    details.push({
                        title: t("web2print_generate_pdf"),
                        expandable: true,
                        bodyStyle: "padding: 10px;",
                        border: true,
                        items: [
                            this.generateForm, this.statusUpdateBox, this.cutomProgressPanel
                        ]
                    });
                    // customization -- closed

                    //Download PDF Panel
                    this.downloadButton = new Ext.Button({
                        text: t("web2print_download_pdf"),
                        iconCls: "pimcore_icon_download",
                        style: "float: right; margin-top: 10px",
                        handler: function () {
                            var date = new Date();
                            var url = Routing.generate('pimcore_bundle_document_printpage_pdfdownload', {id: this.page.id, download: 1, time: date.getTime()});
                    	     pimcore.helpers.download(url);
                        }.bind(this)
                    });
                    this.generatedDateField = new Ext.form.TextField({
                        readOnly: true,
                        width: "100%",
                        name: "last-generated",
                        fieldLabel: t("web2print_last-generated"),
                        value: ""
                    });
                    this.generateMessageField = new Ext.form.TextArea({
                        readOnly: true,
                        height: 100,
                        width: "100%",
                        name: "last-generate-message",
                        fieldLabel: t("web2print_last-generate-message"),
                        value: ""
                    });
                    this.dirtyLabel = new Ext.form.Label({
                        text: t("web2print_documents_changed"),
                        style: "color: red",
                        hidden: true
                    });
                    details.push(new Ext.form.FormPanel({
                        title: t("web2print_download_pdf"),
                        bodyStyle: "padding: 10px;",
                        style: "padding-top: 10px",
                        border: true,
                        items: [this.generatedDateField, this.generateMessageField, this.dirtyLabel, this.downloadButton]
                    }));


                    this.iframeName = 'document_pdfpreview_iframe_' + this.page.id;

                    this.layout = new Ext.Panel({
                        title: t('web2print_preview_pdf'),
                        layout: "border",
                        autoScroll: false,
                        iconCls: "pimcore_material_icon_pdf pimcore_material_icon",
                        items: [{
                            region: "center",
                            hideMode: "offsets",
                            bodyCls: "pimcore_overflow_scrolling pimcore_preview_body",
                            forceLayout: true,
                            autoScroll: true,
                            border: false,
                            scrollable: false,
                            html: '<iframe src="about:blank" width="100%" frameborder="0" id="' + this.iframeName + '" name="' + this.iframeName + '"></iframe>'
                        },{
                            region: "west",
                            width: 350,
                            items: details,
                            style: "padding-right: 10px",
                            bodyStyle: "padding: 10px",
                            autoScroll: true
                        }]
                    });

                    this.layout.on("resize", this.onLayoutResize.bind(this));
                    this.layout.on("activate", this.refresh.bind(this));
                    this.layout.on("afterrender", function () {
                        Ext.get(this.iframeName).on('load', function() {
                            // this is to hide the mask if edit/startup.js isn't executed (eg. in case an error is shown)
                            // otherwise edit/startup.js will disable the loading mask
                            if(!this["frame"]) {
                                this.loadMask.hide();
                            }
                        }.bind(this));

                        this.loadMask = new Ext.LoadMask({
                            target: this.layout,
                            msg: t("please_wait")
                        });

                        this.loadMask.show();
                    }.bind(this));
                }

                return this.layout;
            },


        });
    },

    overrideGeneratePdf: function(){
        Ext.override(pimcore.document.printpages.pdfpreview,{
            generatePdf: function() {

                var params = this.generateForm.getForm().getFieldValues();

                this.processingOptionsStore.each(function(rec) {
                    params[rec.data.name] = rec.data.value;
                });
                params.id = this.page.id;

                // customization -- open
                console.log(params);
                if(params['disableBackgroundExecution']){
                    this.generateForm.hide();
                    this.cutomProgressPanel.show();
                }
                // customization -- closed

                Ext.Ajax.request({
                    url: Routing.generate('pimcore_bundle_web2print_document_printpage_startpdfgeneration'),
                    method: 'POST',
                    jsonData: params,
                    timeout: 2400000,
                    success: function(response) {
                        result = Ext.decode(response.responseText);
                        if(result.success) {
                            this.checkForActiveGenerateProcess();
                        }
                        // customization -- open
                        if(params['disableBackgroundExecution']){
                            this.cutomProgressPanel.hide();
                            this.generateForm.show();
                        }
                        // customization -- closed
                    }.bind(this)
                });
            },

        });
    }
});

