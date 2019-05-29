import { nav } from '../components/nav/nav';
import { projects } from '../components/projects/projects';
import { lazyLoad } from '../util/LazyLoad';

export function lazyLoadImages() {
  const lazyImages = Array.from(document.querySelectorAll('.immerge_lazy'));

  lazyImages.forEach((elm) => {
    lazyLoad(elm, elm.dataset.type);
  });
}

export default {
  init() {
    lazyLoadImages();
    nav();
    //projects();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
