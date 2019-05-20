import { lazyLoad } from '../../util/LazyLoad';

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

export function createModal(elm) {
    const modal = document.querySelector('.modal');
    const modalClose = document.querySelector('.modal__close');
    const modalTitle = document.querySelector('.modal__title');

    modal.classList.add('modal--show');
    modal.style.backgroundImage = `url(${elm.dataset.src})`;

    modalTitle.innerHTML = elm.dataset.alt;

    modalClose.addEventListener('click', () => {
        modal.classList.remove('modal--show');
    });
};

export function eventListenerInit(array) {
    array.forEach((elm) => {
        elm.addEventListener('click', (event) => {
            createModal(elm);
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