export function nav() {
    
    const menu = document.querySelector('.logonav');
    const logo = document.querySelector('.logonav__logo');
    const links = document.querySelector('.logonav__nav');

    const showNav = () => {
        menu.classList.remove('logonav--hide');
        logo.classList.remove('logonav__logo--hide');
        setTimeout(() => {
            links.classList.remove('logonav__nav--hide');
        }, 200);
    };

    const hideNav = () => {
        logo.classList.add('logonav__logo--hide');
        setTimeout(() => {
            links.classList.add('logonav__nav--hide');
            menu.classList.add('logonav--hide');
        }, 100);
    };

    const handleMenu = () => {
        if (menu.classList.contains('logonav--hide') ? showNav() : hideNav());
    };

    menu.addEventListener('click', () => {
        handleMenu();
    });

    window.addEventListener('scroll', () => {
        if (menu.classList.contains('logonav--hide') ? null : hideNav());
    });
}

export default { nav };
