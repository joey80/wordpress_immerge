import { nav } from '../components/nav/nav';

export default {
  init() {
    nav();
    console.log('this is common');
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
