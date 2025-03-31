window.addEventListener('load', () => {
    if (document.querySelector('main').classList.contains('mainPage')) {
        initLayout()
    }
})

function initLayout() {
    const layoutPref = localStorage.getItem('lauout_pref');
    const setTableButton = document.querySelector('.setTable');
    const setGridButton = document.querySelector('.setGrid');
    const layoutTable = document.querySelector('.mainPage__layoutTable')
    const layoutGrid = document.querySelector('.mainPage__layoutGrid')

    switch (layoutPref) {
        case "table":
            setTableButton.classList.add('layoutContainer__buttonActive')
            setGridButton.classList.remove('layoutContainer__buttonActive')
            layoutTable.classList.add('mainPage__layoutActive')
            layoutGrid.classList.remove('mainPage__layoutActive')
            break;
        case "grid":
            setGridButton.classList.add('layoutContainer__buttonActive')
            setTableButton.classList.remove('layoutContainer__buttonActive')
            layoutGrid.classList.add('mainPage__layoutActive')
            layoutTable.classList.remove('mainPage__layoutActive')
            break;
        default:
            setTableButton.classList.add('layoutContainer__buttonActive')
            setGridButton.classList.remove('layoutContainer__buttonActive')
            layoutTable.classList.add('mainPage__layoutActive')
            layoutGrid.classList.remove('mainPage__layoutActive')
            break;
    }
}