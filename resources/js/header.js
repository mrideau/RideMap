const header = document.querySelector('.header');
const headerTopOffset = header.offsetTop;

window.onscroll = () => {
    if (window.scrollY > headerTopOffset) {
        header.classList.add('sticky');
    } else {
        header.classList.remove('sticky');
    }
};
