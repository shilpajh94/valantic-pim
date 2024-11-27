pimcore.registerNS("pimcore.plugin.button");
pimcore.plugin.addassetbutton = Class.create({

    initialize: function () {
        document.addEventListener(pimcore.events.postOpenAsset, this.postOpenAsset.bind(this));
    },

    postOpenAsset: function (e) {
        let asset = e.detail.asset.tab.items.items[1].items.items;
        for (let i = 0; i < asset.length; i++) {
            if (asset[i].config && asset[i].config.title === "Custom Metadata") {
                let tbar = asset[i].config.tbar;
                for (let j = 0; j < tbar.length; j++) {
                    if (tbar[j].text === "Add predefined definitions") {
                        // Attach click event to the button
                        tbar[j].on('click', function () {
                            let newRow = {
                                name: "title",   
                                type: "input",    
                                language: "en",        
                            };
                            let grid = asset[i].store; 
                            grid.add(newRow);      
                        });
                    }
                }
            }
        }
    }
});

// Instantiate the plugin
var assetMetaDataButton = new pimcore.plugin.addassetbutton();
