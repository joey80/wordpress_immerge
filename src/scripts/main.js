// import local dependencies
import '../styles/main.scss';
import Router from './util/Router';
import common from './routes/common';
import about from './routes/about';
import staff from './routes/staff';
import faqs from './routes/faqs';
import gallery from './routes/gallery';
import blog from './routes/blog';
import events from './routes/events';
import contact from './routes/contact';
import home from './routes/home';

/** Populate Router instance with DOM routes */
const routes = new Router({
    common,
    home,
    about,
    staff,
    faqs,
    gallery,
    blog,
    events,
    contact
});
  
window.addEventListener('DOMContentLoaded', () => {
    routes.loadEvents();
});