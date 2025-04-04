const wrapperZoom = document.querySelector('.wrapperZoom');
let initZoom = 1;

function reportWindowSize() {
    let currentWidth = window.screen.width;
    console.log(currentWidth);

    let initWidth = 0;
    let zoomLevelPerPixel = 0;
    let zoomLevel = 0;

    if (currentWidth > 1399) {
        initWidth = 1440;
        zoomLevelPerPixel = 0.0005;
        calcZoom(initZoom, initWidth, currentWidth, zoomLevelPerPixel)
    }
    if (currentWidth <= 1399 && currentWidth >= 961) {
        zoomLevelPerPixel = 0.0007;
        initWidth = 1440;
        calcZoom(initZoom, initWidth, currentWidth, zoomLevelPerPixel)
    }
    if (currentWidth <= 960 && currentWidth > 639) {
        initZoom = 1;
        zoomLevelPerPixel = 0.0012;
        initWidth = 640;
        calcZoom(initZoom, initWidth, currentWidth, zoomLevelPerPixel)
    }
    if (currentWidth <= 639) {
        initZoom = 1.5;
        zoomLevelPerPixel = 0.002;
        initWidth = 639;
        calcZoom(initZoom, initWidth, currentWidth, zoomLevelPerPixel)
    }
}

function calcZoom(initZoom, initWidth, currentWidth, zoomLevelPerPixel) {
    let zoomLevel = initZoom - ((initWidth - currentWidth) * zoomLevelPerPixel);
    wrapperZoom.style.zoom = zoomLevel;
}

window.addEventListener('resize', reportWindowSize)
document.addEventListener('DOMContentLoaded', reportWindowSize)

