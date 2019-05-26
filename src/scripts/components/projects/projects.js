const containers = Array.from(document.querySelectorAll('.projects__container'));
const containers_length = containers.length;
let i = 0;
let next = 1;

export function projects() {
    containers[0].classList.add('projects__container--display');
    setInterval(timeIt, 5000);
};

const timeIt = () => {
    i = i % containers_length;
    if (i === containers_length - 1 ? next = 0 : next = i + 1);

    moveIt();
    i++;
};

const moveIt = () => {
    containers[next].classList.add('projects__container--display');
    containers[i].classList.remove('projects__container--display');
};

export default { projects };