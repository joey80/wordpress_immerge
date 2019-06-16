export const faq = () => {
    const containers = Array.from(document.querySelectorAll('.faq__question'));
    eventListenerInit(containers);
};

const handleClick = target => {
    const answer = target.nextElementSibling;
    if (answer.style.maxHeight ? setStyle(answer, {'maxHeight': null}, 'hide') : setStyle(answer, {'maxHeight': `${answer.scrollHeight + 40}px`}, 'show'));
};

const setStyle = (div, props, state) => {
    if (state === 'show' ? div.classList.add('faq__answer--show') : div.classList.remove('faq__answer--show'));
    for (let prop in props) {
        div.style[prop] = props[prop];
    }
};
    
const eventListenerInit = array => {
    array.forEach(elm => {
        elm.addEventListener('click', event => {
            let target = event.target;
            handleClick(target);
        });
    });
};

export default { faq };