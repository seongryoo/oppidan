import {strudel} from './strudel.js';

const onLoad = function() {
  const body = document.getElementsByTagName('body')[0];
  const header = document.getElementById('strudel-header');
  const burger = document.getElementById('strudel-burger');
  const overlay = document.getElementById('strudel-overlay');

  const toggleMenu = function() {
    header.classList.toggle('open');
  };
  const hideMenu = function() {
    header.classList.remove('open');
  };

  strudel.clickPress('#strudel-burger', toggleMenu);
  overlay.addEventListener('click', hideMenu);
  window.addEventListener('resize', hideMenu);

  const isNavVisible = function() {
    return strudel.isStyle('#strudel-burger', 'display', 'none') ||
      strudel.hasClass('#strudel-header', 'open');
  };
  const burgerOpen = strudel.query(isNavVisible)
      .watch('#strudel-header', 'class')
      .watch('#strudel-burger', 'style')
      .reaction('#strudel-header nav ul li a')
          .remove('tabIndex')
          .remove('aria-hidden')
        .else()
          .set('tabIndex', -1)
          .set('aria-hidden', true)
      .reaction('#strudel-burger')
          .set('aria-expanded', 'true')
        .else()
          .set('aria-expanded', 'false');
  const isNoScroll = function() {
    return !strudel.isStyle('#strudel-burger', 'display', 'none') &&
      strudel.hasClass('#strudel-header', 'open');
  };
  const noScroll = strudel.query(isNoScroll)
      .watch('#strudel-header', 'class')
      .watch('#strudel-burger', 'style')
      .reaction('body')
          .add('noscroll')
        .else()
          .remove('noscroll');

  burgerOpen.allReact();
  noScroll.allReact();
};
document.addEventListener('DOMContentLoaded', onLoad);
