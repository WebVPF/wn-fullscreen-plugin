document.addEventListener('DOMContentLoaded', () => {
    let btnScreen = document.getElementById('fullscreen'),
        i = btnScreen.querySelector('i');

    function toggleFullScreen() {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen();
            i.className = 'icon-minimize';
        }
        else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
                i.className = 'icon-maximize';
            }
        }
    }

    btnScreen.addEventListener('click', toggleFullScreen);
});
