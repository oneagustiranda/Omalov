var nav = document.querySelector('.bottom-bar .nav')

nav.querySelectorAll('li a').forEach((a, i) => {
    a.onclick = (e) => {
        if (a.classList.contains('nav-item-active')) return

        nav.querySelector('li a.nav-item-active').classList.remove('nav-item-active')

        a.classList.add('nav-item-active')

        var nav_indicator = nav.querySelector('.nav-indicator')

        var width = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
        nav_indicator.style.left = `calc(${i * (width / 4) + (width / 8)}px - 43px)`
    }
})