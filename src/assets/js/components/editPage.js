if (document.querySelector('main').classList.contains('editPage')) {
    // Textarea Limit Control

    const commentTextarea = document.querySelector('.editContainer__formTextarea');
    const commentTextareaSymbolCounter = document.querySelector('.editContainer__formTextareaSymbolCounter');
    const maxValue = 580;
    commentTextarea.addEventListener('input', () => {
        commentTextareaSymbolCounter.textContent = maxValue - commentTextarea.value.length;
        if (parseInt(commentTextareaSymbolCounter.textContent) <= 50) {
            commentTextareaSymbolCounter.classList.add('lowSymbols')
            commentTextareaSymbolCounter.classList.remove('noSymbols')
        } else if (parseInt(commentTextareaSymbolCounter.textContent) > 50) {
            commentTextareaSymbolCounter.classList.remove('noSymbols')
            commentTextareaSymbolCounter.classList.remove('lowSymbols')
        }

        if (parseInt(commentTextareaSymbolCounter.textContent) <= 0) {
            commentTextareaSymbolCounter.classList.remove('lowSymbols')
            commentTextareaSymbolCounter.classList.add('noSymbols')
        }
    })

    commentTextarea.addEventListener('keydown', (event) => {
        const key = event.keyCode || event.charCode;
        if (parseInt(commentTextareaSymbolCounter.textContent) <= 0) {
            if (key !== 8 && key !== 46) {
                event.preventDefault()
            }
        }
    })

    // Enter Edit Mode

    const editButton = document.querySelector('.editButton');
    const editForm = document.querySelector('.editContainer__form');
    editButton.addEventListener('click', () => {
        editButton.classList.remove('jsOpacityShow')
        initLoader()
        setTimeout(() => {
            editForm.classList.add('editMode')
            editForm.classList.remove('showMode')
            initFormActive()
            setTimeout(deinitLoader, 1000)
        }, 300)
    })


}

function initLoader() {
    const loaderAnimation = document.querySelector('.loaderAnimation');
    const loaderLayer = document.querySelector('.editPage__layer');
    loaderLayer.classList.add('jsOpacityShow')
    loaderAnimation.classList.add('loader')
}

function deinitLoader() {
    const loaderAnimation = document.querySelector('.loaderAnimation');
    const loaderLayer = document.querySelector('.editPage__layer');
    loaderLayer.classList.remove('jsOpacityShow')
    loaderAnimation.classList.remove('loader')
}

function initFormActive() {
    const editDataForm = document.querySelector('.editContainer__form');
    const allPersonalInputs = editDataForm.querySelectorAll('input');
    const personalTextarea = editDataForm.querySelectorAll('textarea');
    setFormActive(allPersonalInputs)
    setFormActive(personalTextarea)
}

function setFormActive(nodeList) {
    nodeList.forEach(node => {
        node.removeAttribute('readonly');
        node.removeAttribute('disabled');
        if (node.getAttribute('data-edit')) {
            node.setAttribute('placeholder', node.getAttribute('data-edit'))
        }
        node.classList.remove('showModeActive')
    })
}