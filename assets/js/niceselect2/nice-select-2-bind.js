const commonNiceSelect = document.querySelectorAll('.nice-select')
commonNiceSelect.forEach(niceSelectItem => {
    NiceSelect.bind(niceSelectItem, {
        searchable: niceSelectItem.getAttribute("searchable") || false,
        placeholder: niceSelectItem.getAttribute("data-placeholder")
    });
})