import 'intersection-observer';

/**
* mod1.js - Lazy Load
*
* Author - Joey Leger (2018)
* Description - These are helpful
*
*/
export function lazyLoad(target) {
    const io = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const tgt = entry.target;
                tgt.classList.remove('lazy_img');
                tgt.classList.add('lazy_show');
                observer.disconnect();
            }
        })
    });

    io.observe(target);
};

export default { lazyLoad };