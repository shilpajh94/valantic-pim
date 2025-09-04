document.addEventListener('click', function (event) {
    const target = event.target;

    if (target.tagName.toLowerCase() === 'a' && target.hasAttribute('data-pimcore-open-id')) {
        pimcore.helpers.openElement(
            target.getAttribute('data-pimcore-open-id'),
            target.getAttribute('data-pimcore-open-type')
        )
    }
});
