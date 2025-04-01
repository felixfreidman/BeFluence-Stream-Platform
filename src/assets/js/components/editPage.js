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
}