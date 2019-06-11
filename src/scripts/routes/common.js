import { nav } from '../components/nav/nav';
import { lazyLoad } from '../util/LazyLoad';
import simpleParallax from 'simple-parallax-js';

export function lazyLoadImages() {
  const lazyImages = Array.from(document.querySelectorAll('.immerge_lazy'));
  const heroImage = document.querySelector('.hero__image');
  const heroContent = document.querySelector('.hero__content');

  new simpleParallax(heroImage);
  new simpleParallax(heroContent, {
    orientation: 'right',
    overflow: true
  });

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