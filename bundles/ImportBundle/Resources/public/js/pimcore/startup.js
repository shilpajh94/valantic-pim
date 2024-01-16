document.addEventListener(pimcore.events.pimcoreReady, (e) => {
    //print out the parameters of the event
    console.log('pimcore.plugin.ImportBundle pimcoreReady')
    e.preventDefault();
    e.stopPropagation();
});
