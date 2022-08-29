class Carousel {
    carousel = null;
    items = null;
    dotsContainer = null;
    dots = [];

    lastIndex = null;
    currIndex = 0;

    constructor(carousel) {
        this.carousel = carousel;
        this.items = carousel.querySelectorAll('.carousel-item');

        this.dotsContainer = carousel.querySelector('.dots');

        this.items.forEach((item, key) => {
            let dot = document.createElement('span');
            this.dots.push(dot);

            dot.classList.add('dot')
            dot.onclick = () => {
                this.setIndex(key);
            }

            this.dotsContainer.appendChild(dot);
        });

        this.refesh();
    }

    calculIndex(index) {
        return index > this.items.length - 1 ? 0 : (index < 0 ? this.items.length - 1 : index);
    }

    refesh() {
        if (this.lastIndex !== null) {
            this.dots[this.lastIndex].classList.remove('active');
            this.items[this.lastIndex].classList.remove('active');
        }

        this.items[this.currIndex].classList.add('active');
        this.dots[this.currIndex].classList.add('active');
    }

    setIndex(newIndex) {
        this.lastIndex = this.currIndex;
        this.currIndex = this.calculIndex(newIndex);

        this.refesh();
    }

    next() {
        this.setIndex(this.currIndex + 1);
    }

    prev() {
        this.setIndex(this.currIndex - 1);
    }
}

const carousels = document.querySelectorAll('.carousel');
carousels.forEach(carousel => {
    const car = new Carousel(carousel);
    // setInterval(() => {
    //     car.next();
    // }, 2000);
});
