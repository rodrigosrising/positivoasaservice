// Selector
const sliderItems = document.querySelectorAll('.vantagens-item');
const btnNext = document.querySelector('.slider-setas-next');
const btnPrev = document.querySelector('.slider-setas-prev');
// console.log(sliderItems);

// Slider
const Slider = {
    currentItem: 0,

    init: () => {
        Slider.in(Slider.currentItem);
    },

    in: (index) => {
        const item = sliderItems[index];
        const titulo = item.querySelector('.vantagens-item-titulo');
        const textli = item.querySelectorAll('li');
        const textp = item.querySelector('.texto-legal');
        const svgs = item.querySelectorAll('.icov');

        const timeline = new TimelineMax();

        TweenMax.set(item, {right: '100%'});

        timeline
            .to(item, .5, { right:0, delay: .5 })
            .staggerFrom(svgs, .3, {right: '-15px', autoAlpha: 0, ease: Back.easeOut }, .3)
            .staggerFrom(titulo, .3, {left: '-15px', autoAlpha: 0, ease: Back.easeOut }, .3)
            .staggerFrom(textli, .3, {left: '-15px', autoAlpha: 0, ease: Back.easeOut }, .3)
            .staggerFrom(textp, .3, {left: '-15px', autoAlpha: 0, ease: Back.easeOut }, .3)
    },

    out: (index, nextIndex) => {
        const item = sliderItems[index];
        const titulo = item.querySelector('.vantagens-item-titulo');
        const textli = item.querySelectorAll('li');
        const textp = item.querySelector('.texto-legal');
        const svgs = item.querySelectorAll('.icov');

        const timeline = new TimelineMax();

        timeline
            .to(item, .3, { right:'100%' })
            .staggerTo(svgs, .3, {right: '15px', autoAlpha: 0, ease: Back.easeIn }, '-0.3')
            .staggerTo(titulo, .3, {left: '15px', autoAlpha: 0, ease: Back.easeIn }, '-0.3')
            .staggerTo(textli, .3, {left: '15px', autoAlpha: 0, ease: Back.easeIn }, '-0.3')
            .staggerTo(textp, .3, {left: '15px', autoAlpha: 0, ease: Back.easeIn }, '-0.3')
            .call(Slider.in, [nextIndex], this, 0)
            .set([svgs, titulo, textli, textp], {clearProps: 'all'})
    },

    next: () => {
        const next = Slider.currentItem !== sliderItems.length - 1 ? Slider.currentItem + 1 : 0;
        Slider.out(Slider.currentItem, next);
        Slider.currentItem = next;
    },

    prev: () => {
        const prev = Slider.currentItem > 0 ? Slider.currentItem - 1 : sliderItems.length - 1;
        Slider.out(Slider.currentItem, prev);
        Slider.currentItem = prev;
    },

    dots: () => {

    }
}
btnNext.addEventListener('click', Slider.next);
btnPrev.addEventListener('click', Slider.prev);
Slider.init();