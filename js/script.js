window.onload = function () {
    const loader = document.getElementById('loader');
    loader.classList.remove('hide-loader');
    setTimeout(function () {
        loader.style.opacity = '0';
        setTimeout(function () {
            loader.style.display = 'none';
        }, 500);
    }, 2000);
};