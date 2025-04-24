if (document.querySelector('.filterContainer__rowButton')) {
    const filterButton = document.querySelector('.filterContainer__rowButton');
    const allSelect = document.querySelectorAll('.filterContainer__select');
    const nameParam = document.getElementById('querySearchName') ? document.getElementById('querySearchName').textContent : 'false';
    const isLikedParam = document.getElementById('querySearchIsLiked') ? document.getElementById('querySearchIsLiked').textContent : 'false';
    filterButton.addEventListener('click', () => {
        let finalQuery = `?showLiked=${isLikedParam}&searchName=${nameParam}`;
        allSelect.forEach(select => {
            const selectName = select.getAttribute('name');
            switch (selectName) {
                case "set_platform":
                    finalQuery += `&platform=${select.value}`;
                    break;
                case "set_country":
                    finalQuery += `&country=${select.value}`;
                    break;
                case "set_isGamble":
                    finalQuery += `&isGamble=${select.value}`;
                    break;
                case "set_isWorked":
                    finalQuery += `&isWorked=${select.value}`;
                    break;
                case "set_isBlocked":
                    finalQuery += `&isBlocked=${select.value}`;
                    break;
            }
        })
        setTimeout(() => {
            window.location.href = `http://localhost:3001/BeFluence/wp/search/${finalQuery}`
        }, 600)

    })
}
