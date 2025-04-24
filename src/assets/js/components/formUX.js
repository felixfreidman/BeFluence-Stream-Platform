if (document.querySelector('main').classList.contains('editPage')) {
    const editDataForm = document.querySelector('.editContainer__form');
    const allPersonalInputs = editDataForm.querySelectorAll('input');
    allPersonalInputs.forEach(input => {
        input.addEventListener('click', () => { copyToClipboard(input) })
    })
}

function copyToClipboard(input) {
    if (input.classList.contains('showModeActive')) {
        input.select();
        input.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(input.value);
        showNotification('copy');
    }
}

const notificationTypes = [
    {
        value: 'Скопировано значение!'
    },
]

function showNotification(type) {
    const notificationHolder = document.querySelector('.notifcation');
    switch (type) {
        case 'copy':
            const notificationContainer = document.createElement('div');
            notificationContainer.classList.add('notifcation__container', 'jsHiddenRightTransformX')
            notificationContainer.innerHTML = `<span class="notifcation__value">${notificationTypes[0].value}</span>`
            notificationHolder.appendChild(notificationContainer)
            setTimeout(() => {
                notificationContainer.classList.remove('jsHiddenRightTransformX')
            }, 100)
            setTimeout(() => {
                notificationContainer.classList.add('jsHiddenRightTransformX')
                setTimeout(() => { notificationHolder.removeChild(notificationContainer) }, 500)
            }, 2000)

            break;
    }
}
