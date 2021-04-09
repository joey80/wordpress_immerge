import { nav } from '../components/nav/nav';
import { lazyLoad } from '../util/LazyLoad';
import simpleParallax from 'simple-parallax-js';

export function lazyLoadImages() {
  const lazyImages = Array.from(document.querySelectorAll('.immerge_lazy'));
  const heroImage = document.querySelector('.hero__image');

  new simpleParallax(heroImage);

  lazyImages.forEach(elm => {
    lazyLoad(elm, elm.dataset.type);
  });
}

export default {
  init() {
    lazyLoadImages();
    nav();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
