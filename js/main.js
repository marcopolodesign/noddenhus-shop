let pageName = document.querySelector('[data-barba=container]');
const windowHeight = window.innerHeight;


const runScripts = () => {
  pageName = document.querySelector('[data-barba=container]');

  const postAnimations = () => {
  let posts = document.querySelectorAll('section>div');
  
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.intersectionRatio >= 0.2) {
          entry.target.classList.add('in-view');
        } else {
          if (pageName.classList.contains('shop')) {
            entry.target.classList.remove('in-view');
          }
        }
      });
    },
    {
      threshold: [0, 0.2, 1],
    }
  );

  if (pageName.classList.contains('home')) {
    let productsGrid = document.querySelector('.home-products');
    let homeEnding = document.querySelector('.home-ending')
    observer.observe(productsGrid);

    observer.observe(homeEnding)
  }
};

  const changeBg = () => {
    let backgroundChange = document.querySelector("div[background-color]");
    let body = document.querySelector('body')
    document.addEventListener('scroll', ()=> {
      const pixels = window.pageYOffset;
      let newColor = backgroundChange.getAttribute('background-color');
  
      if (backgroundChange.offsetTop < pixels + windowHeight / 2) {
        body.classList.add(newColor);
        console.log('changee')
      } else {
        body.classList.remove(newColor);
        console.log('revert changee')

      }
    })
  }

  const initScripts = () => {
    if (pageName.classList.contains('home')) {
    }
  }

  initScripts(); 
  postAnimations();
  changeBg();
}


const Menu = () => {
  const onScroll = () => {
    let container = document.querySelector('header');
    let prevScroll = 0;
    document.addEventListener('scroll', () => {
      const currentScroll = window.pageYOffset;

      if (currentScroll < 100) {
        container.classList.remove('scrolled');
      } else if (currentScroll > 100 && prevScroll < currentScroll) {
        container.classList.add('scrolled');
      } else if (prevScroll - 15 > currentScroll) {
        // container.classList.remove('scrolled');
      }

      prevScroll = currentScroll;
    });
  };
  onScroll();
};

Menu();


barba.init({
  timeout: 5000,
  prevent: ({ el }) => el.classList.contains('barba-prevent'),
  transitions: [
    {
      leave({ current, next, trigger }) {
        let cursor = document.querySelector('.cursor');
        cursor.classList.remove('is-hover');
        cursor.classList.remove('is-shop');
        cursor.classList.remove('add-cart');
        closeSideCart();
        closeMenu();

        return new Promise((resolve) => {
          const timeline = gsap.timeline({
            defaults: {
              ease: Expo.easeOut,
            },
            onComplete() {
              current.container.remove();
              resolve();
            },
          });
          timeline
            .call(() => {
              preLoad[0].classList.add('animate');
            })
            .set(preLoad, { x: '100%', opacity: '1' })
            .to(current.container, { opacity: 0.6, x: '-10%', duration: 2 }, 0)
            .to(preLoad[0], { x: '0%', ease: Power4.easeOut, duration: 1.5 }, 0);
        });
      },
      enter({ current, next, trigger }) {
        return new Promise((resolve) => {
          window.scrollTo({
            top: 0,
          });
          runScripts();
          const timeline = gsap.timeline({
            onComplete() {
              resolve();
            },
            defaults: {
              duration: 2,
              ease: Expo.easeOut,
            },
          });

          timeline
            .call(() => {
              preLoad[0].classList.remove('animate');
            })
            .set(next.container, { opacity: 0, x: '10%' })
            .to(preLoad, { x: '-100%', opacity: 1, duration: 2.3 }, 0)
            .to(next.container, { opacity: 1, x: '0' }, 0.5);
        });
      },
    },
    {
      to: { namespace: ['Cart'] },
      leave({ current, next, trigger }) {
        closeMenu();
        // ACA CUANDO ES AL CART
        return new Promise((resolve) => {
          const timeline = gsap.timeline({
            defaults: {
              duration: 0.5,
            },
            onComplete() {
              current.container.remove();
              resolve();
            },
          });
          timeline.to(current.container, { opacity: 0.2 });
          // .to('header', {opacity: 0.2}, 0)
          // .to(footer, {display: 'none'}, 0);
        });
      },
      enter({ current, next, trigger }) {
        console.log('entering to cart');
        let closeCart = document.querySelector('.close-sd');

        cartLink = current.url.path;
        if (cartLink === '/cart') {
          closeCart.setAttribute('href', '/shop');
        } else {
          closeCart.setAttribute('href', cartLink);
        }

        return new Promise((resolve) => {
          window.scrollTo({
            top: 0,
          });
          runScripts();
          const timeline = gsap.timeline({
            onComplete() {
              resolve();
            },
            defaults: {
              duration: 0.5,
              ease: Expo.easeOut,
            },
          });

          timeline
            // .set(header, {y: '-100%'})
            .to(next.container, { opacity: 1, scale: 0.95 });
        });
      },
    },

    {
      from: { namespace: ['Cart'] },
      leave({ current, next, trigger }) {
        closeMenu();
        // ACA CUANDO ES AL CART
        return new Promise((resolve) => {
          const timeline = gsap.timeline({
            defaults: {
              duration: 0.5,
            },
            onComplete() {
              current.container.remove();
              resolve();
            },
          });
          timeline
            .set(next.container, { opacity: 0.2 })
            .to(current.container, { opacity: 0, scale: 1 });
        });
      },
      enter({ current, next, trigger }) {
        console.log('leaving cart');

        return new Promise((resolve) => {
          window.scrollTo({
            top: 0,
          });
          runScripts();
          const timeline = gsap.timeline({
            onComplete() {
              resolve();
            },
            defaults: {
              duration: 0.5,
              ease: Expo.easeOut,
            },
          });

          console.log(current.container);
          timeline.to(next.container, { opacity: 1 });
        });
      },
    },
  ],
  views: [
    {
      namespace: 'home',
      afterEnter(data) {
      },

      beforeLeave(data) { },
    },

    {
      namespace: 'artists',
      afterEnter(data) {
        artistHover();
      },
    },
    {
      namespace: 'artist',
      afterEnter(data) {
        openBio();
        filterByLinks();
      },

      beforeLeave(data) {
        // clearInterval(handle);
        // handle = 0;
      },
    },
    {
      namespace: 'exhibicion',
      afterEnter(data) {
        openBio();
      },
    },
    {
      namespace: 'exhibiciones',
      afterEnter(data) {
        loadExhibits();
      },
    },

    {
      namespace: 'product',
      beforeEnter(data) { },
      afterEnter(data) {
        cuotas();
        let productDetails = Array.prototype.slice.call(
          document.querySelectorAll('.details-header>p')
        );
        let detailContent = document.querySelectorAll('#detail-value');
        let detailPlaceholder = document.querySelector('#detail-ph');

        let isUpside = document.querySelector('#product-upside');

        if (isUpside) {
          upside();
        }

        // multiOptions(productDetails, detailContent, detailPlaceholder);
      },
    },
    {
      namespace: 'entrevista',
      afterEnter(data) {
        interview();
        playAudio();
      }
    },
    {
      namespace: 'shop',
      beforeEnter(data) { },
      afterEnter(data) {
        // setInterval(homeSlide, 6000);
        homeSlide();
      },
    },
    {
      namespace: 'opening',
      afterEnter(data) {
        openingsCookies();
        obrasDisponibles();
        openBio();
        openBioCurador();
        playAudio();
      },
    }
  ],
  debug: true,
});


const realHeight = () => {
  let vh = window.innerHeight * 0.01;
  // Then we set the value in the --vh custom property to the root of the document
  document.documentElement.style.setProperty('--vh', `${vh}px`);  
}

realHeight();
runScripts();

// We listen to the resize event
window.addEventListener('resize', () => {
 realHeight();
});
