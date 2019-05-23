import { lazyLoad } from '../../util/LazyLoad';
import { Coordinates } from '../../util/Coordinates';

// Check the parent or grandparent of the target div
export function getDataSrc(elm) {
    if (elm.parentNode.dataset.src != null) {
        return elm.parentNode.dataset.src;
    } else {
        return elm.parentNode.parentNode.dataset.src;
    }
};

export function lazyLoadImages(array) {
    array.forEach((elm) => {
        lazyLoad(elm, elm.dataset.type);
    });

    return array;
};

export function createModal(elm, modal) {
    const modalClose = document.querySelector('.modal__close');
    const modalTitle = document.querySelector('.modal__title');

    modal.classList.add('modal--show');
    modalTitle.innerHTML = elm.dataset.alt;

    modalClose.addEventListener('click', () => {
        modal.classList.remove('modal--show');
    });
};

export function addModalImage(elm, modal) {
    modal.style.backgroundImage = `url(${elm.dataset.src})`;
};

export function scrollToModal(modal) {
    const top = Coordinates(modal);

    window.scroll({
        behavior: 'smooth',
        left: 0,
        top: top.y - 10
    });
};

export function eventListenerInit(array) {
    const modal = document.querySelector('.modal');
    const gallery = document.querySelector('.gallery');

    array.forEach((elm) => {
        elm.addEventListener('click', () => {
            createModal(elm, modal);
            addModalImage(elm, modal);
            scrollToModal(gallery);
        });
    });

    return array;
};

export function gallery() {
    const items = Array.from(document.querySelectorAll('.gallery__item'));
    lazyLoadImages(items);
    eventListenerInit(items);
};

export default { gallery };