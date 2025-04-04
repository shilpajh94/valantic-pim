document.addEventListener(pimcore.events.pimcoreReady, (e) => {

if(pimcore.settings.perspective.elementTree[0].name==="UnifiedPIM"){
 setTimeout(
     ()=>{
         document.getElementById('cs_product').remove();
         document.getElementById('distribution_hub_channel_export').remove();
         document.getElementById('b2b_translation_mapping').remove();
     },
     250
 )
}
});
