if (document.querySelector('main').classList.contains('mainPage')) {
    const parentFilterContainer = document.querySelector('.mainPage__filterContainer');
    const filerDarkLayer = parentFilterContainer.querySelector('.filterContainer__darkLayer');
    const filterContainer = parentFilterContainer.querySelector('.filterContainer__filters');
    const closeFilterButton = parentFilterContainer.querySelector('.filterContainer__closeButton');

    const openFilterButton = document.querySelector('.openFilters');

    openFilterButton.addEventListener('click', () => {
        parentFilterContainer.classList.remove('jsHidden')

        setTimeout(() => {
            filerDarkLayer.classList.add('anim__fadeIn')
        }, 100)

        setTimeout(() => {
            filterContainer.classList.add('anim__translateIn')
        }, 200)
    })

    closeFilterButton.addEventListener('click', () => {
        filterContainer.classList.remove('anim__translateIn')
        setTimeout(() => {
            filerDarkLayer.classList.remove('anim__fadeIn')
        }, 200)
        setTimeout(() => {
            parentFilterContainer.classList.add('jsHidden')
        }, 300)
    })

    filerDarkLayer.addEventListener('click', () => {
        filterContainer.classList.remove('anim__translateIn')
        setTimeout(() => {
            filerDarkLayer.classList.remove('anim__fadeIn')
        }, 200)
        setTimeout(() => {
            parentFilterContainer.classList.add('jsHidden')
        }, 300)
    })
}