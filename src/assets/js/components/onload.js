window.addEventListener('load', () => {
    if (document.querySelector('main').classList.contains('mainPage')) {
        initLayout()
    }

    if (document.querySelector('main').classList.contains('editPage')) {
        initFormInactive()
        initCountTextareaValue()
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

function initCountTextareaValue() {
    const commentTextareaSymbolCounter = document.querySelector('.editContainer__formTextareaSymbolCounter');
    const commentTextarea = document.querySelector('.editContainer__formTextarea');
    const maxValue = 580;
    commentTextareaSymbolCounter.textContent = maxValue - commentTextarea.value.length;
    if (parseInt(commentTextareaSymbolCounter.textContent) <= 50) {
        commentTextareaSymbolCounter.classList.add('lowSymbols')
    }

    if (parseInt(commentTextareaSymbolCounter.textContent) <= 0) {
        commentTextareaSymbolCounter.classList.add('noSymbols')
    }
}

function initFormInactive() {
    const editDataForm = document.querySelector('.editContainer__form');
    const allPersonalInputs = editDataForm.querySelectorAll('input');
    const personalTextarea = editDataForm.querySelectorAll('textarea');
    setFormInactive(allPersonalInputs)
    setFormInactive(personalTextarea)
}

function setFormInactive(nodeList) {
    nodeList.forEach(node => {
        node.setAttribute('readonly', true);
        node.setAttribute('disabled', true);
        if (node.getAttribute('data-show')) {
            node.setAttribute('placeholder', node.getAttribute('data-show'))
        }
        node.classList.add('showModeActive')
    })
}