export const nav = () => {
    
    const menu = document.querySelector('.logonav');
    const links = document.querySelector('.logonav__nav');

    const showNav = () => {
        menu.classList.remove('logonav--hide');
        links.classList.remove('logonav__nav--hide');
    };

    const hideNav = () => {
        links.classList.add('logonav__nav--hide');
        menu.classList.add('logonav--hide');
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
