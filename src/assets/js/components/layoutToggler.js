if (document.querySelector('main').classList.contains('mainPage') ||
    document.querySelector('main').classList.contains('searchPage')) {
    const setTableButton = document.querySelector('.setTable');
    const setGridButton = document.querySelector('.setGrid');
    const layoutTable = document.querySelector('.mainPage__layoutTable')
    const layoutGrid = document.querySelector('.mainPage__layoutGrid')

    setTableButton.addEventListener('click', () => {
        setTableButton.classList.add('layoutContainer__buttonActive')
        setGridButton.classList.remove('layoutContainer__buttonActive')
        layoutTable.classList.add('mainPage__layoutActive')
        layoutGrid.classList.remove('mainPage__layoutActive')
        localStorage.setItem('lauout_pref', 'table')
    })

    setGridButton.addEventListener('click', () => {
        setGridButton.classList.add('layoutContainer__buttonActive')
        setTableButton.classList.remove('layoutContainer__buttonActive')
        layoutGrid.classList.add('mainPage__layoutActive')
        layoutTable.classList.remove('mainPage__layoutActive')
        localStorage.setItem('lauout_pref', 'grid')
    })
}