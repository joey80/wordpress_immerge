export function projects() {
    const containers = Array.from(document.querySelectorAll('.projects__container'));
    let i = 0;
    let next;

    const timeIt = () => {
        i = i % containers.length;
        if (i === containers.length - 1 ? next = 0 : next = i + 1);

        moveIt(i, next);
        //hideIt(i, next);

        console.log(`i: ${i} next: ${next}`);
        i++;
    };

    const moveIt = (iterate, next) => {
        // hide current slide
        containers[iterate].classList.add('projects__container--hide-last');
        // cleanup old slide
        containers[iterate].classList.remove('projects__container--display');
        containers[iterate].classList.add('projects__container--hide-first');
        containers[iterate].classList.remove('projects__container--hide-last');
        // move in new slide
        containers[next].classList.remove('projects__container--hide-first');
        setTimeout(() => {
            containers[next].classList.add('projects__container--display');
        },1000);
        
    };

    setInterval(timeIt, 5000);
};

export default { projects };