if (document.querySelector('main').classList.contains('mainPage') ||
    document.querySelector('main').classList.contains('searchPage')) {
    if (document.querySelector('.mainPage__filterContainer')) {
        const parentFilterContainer = document.querySelector('.mainPage__filterContainer');
        const filterDarkLayer = parentFilterContainer.querySelector('.filterContainer__darkLayer');
        const filterContainer = parentFilterContainer.querySelector('.filterContainer__filters');
        const closeFilterButton = parentFilterContainer.querySelector('.filterContainer__closeButton');

        closeFilterButton.addEventListener('click', () => {
            filterContainer.classList.remove('anim__translateIn')
            setTimeout(() => {
                filterDarkLayer.classList.remove('anim__fadeIn')
            }, 200)
            setTimeout(() => {
                parentFilterContainer.classList.add('jsHidden')
            }, 300)
        })

        filterDarkLayer.addEventListener('click', () => {
            filterContainer.classList.remove('anim__translateIn')
            setTimeout(() => {
                filterDarkLayer.classList.remove('anim__fadeIn')
            }, 200)
            setTimeout(() => {
                parentFilterContainer.classList.add('jsHidden')
            }, 300)
        })


        const openFilterButton = document.querySelector('.openFilters');

        openFilterButton.addEventListener('click', () => {
            parentFilterContainer.classList.remove('jsHidden')

            setTimeout(() => {
                filterDarkLayer.classList.add('anim__fadeIn')
            }, 100)

            setTimeout(() => {
                filterContainer.classList.add('anim__translateIn')
            }, 200)
        })
    }



}