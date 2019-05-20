import 'intersection-observer';

/**
* LazyLoad.js - Lazy Load
*
* Author - Joey Leger (2019)
* Description - Lazy loads images
*
*/
export function lazyLoad(source, type) {
    const io = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                
                const imgSource = source.getAttribute('data-src');
                
                switch (type) {
                    case 'img':
                        source.setAttribute('src', source);
                        break;
                    case 'bg':
                        source.style.backgroundImage = `url(${imgSource})`;
                        break;
                    default:
                        console.log('Error: Not a valid type to lazy load');
                }

                observer.disconnect();
            }
        })
    });

    io.observe(source);
};

export default { lazyLoad };