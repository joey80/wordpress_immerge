const containers = Array.from(document.querySelectorAll('.projects__container'));
const containers_length = containers.length;
let i = 0;
let next = 1;

export function projects() {
    const parallaxArray1Init = Array.from(containers[i].children[1].children);
    containers[0].children[0].classList.add('projects__container__item--display');
    containers[0].children[2].classList.add('projects__container__item--display');
    showMiddleSection(parallaxArray1Init);
    setInterval(timeIt, 5000);
};

// Controls what gets moved
const timeIt = () => {
    i = i % containers_length;
    if (i === containers_length - 1 ? next = 0 : next = i + 1);

    moveIt();
    i++;
};

// Controls how it gets moved
const moveIt = () => {
    const parallaxArray1 = Array.from(containers[i].children[1].children);
    const parallaxArray2 = Array.from(containers[next].children[1].children);

    // Remove from current set
    hideMiddleSection(parallaxArray1);
    containers[i].children[2].classList.remove('projects__container__item--display');

    // Add to next set
    showMiddleSection(parallaxArray2);
    setTimeout(() => {
        containers[next].children[2].classList.add('projects__container__item--display');
    }, 200);
};

// Shows the middle project section
const showMiddleSection = (array) => {
    let randomInt = 0.4;

    array.forEach((elm) => {
        elm.style.transition = `all ${randomInt}s cubic-bezier(0.000, 0.500, 0.000, 1.075)`;
        elm.classList.add('projects--show');
        randomInt += 0.2;
    });
};

// Hides the middle project section
const hideMiddleSection = (array) => {
    array.forEach((elm) => {
        elm.classList.remove('projects--show');
    });
};

export default { projects };