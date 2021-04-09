export const staff = () => {
  const items = Array.from(document.querySelectorAll('.staff__image__container'));
  eventListenerInit(items);
};

const eventListenerInit = array => {
  array.forEach(elm => {
    elm.addEventListener('click', event => {
      event.target.parentNode.classList.add('staff__image--active');
    });

    elm.addEventListener('click', event => {
      event.target.parentNode.classList.remove('staff__image--active');
    });
  });
};

export default { staff };
