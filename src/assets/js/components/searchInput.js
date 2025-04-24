if (document.querySelector('.mainPage__searchInput')) {
    const searchInput = document.querySelector('.mainPage__searchInput')
    const searchButton = document.querySelector('.mainPage__searchButton');

    // params

    searchInput.addEventListener('input', () => {
        if (searchInput.value.trim() !== '') {
            searchButton.classList.remove('jsTranslateHidden');
            const isLikedParam = document.getElementById('querySearchIsLiked') ? document.getElementById('querySearchIsLiked').textContent : 'false';
            const platformParam = document.getElementById('querySearchPlatform') ? document.getElementById('querySearchPlatform').textContent : 'all';
            const countryParam = document.getElementById('querySearchCountry') ? document.getElementById('querySearchCountry').textContent : 'all';
            const isGambleParam = document.getElementById('querySearchIsGamble') ? document.getElementById('querySearchIsGamble').textContent : 'all';
            const isWorkedParam = document.getElementById('querySearchisWorked') ? document.getElementById('querySearchisWorked').textContent : 'all';
            const isBlockedParam = document.getElementById('querySearchIsBlocked') ? document.getElementById('querySearchIsBlocked').textContent : 'all';
            searchButton.href = `http://localhost:3001/BeFluence/wp/search?showLiked=${isLikedParam}&platform=${platformParam}&country=${countryParam}&isGamble=${isGambleParam}&isWorked=${isWorkedParam}&isBlocked=${isBlockedParam}&searchName=${searchInput.value.trim()}`
        } else {
            searchButton.classList.add('jsTranslateHidden')
        }
    })
}

// ?showLiked=false&searchName=false&platform=YouTube&country=USA&isGamble=all&isWorked=all&isBlocked=all
