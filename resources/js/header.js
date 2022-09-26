const header = document.querySelector('.header');
const btnToTop = document.querySelector('.btn_to_top');
const headerTopOffset = header.offsetTop;

btnToTop.addEventListener('click', () => {
   window.scrollTo(0, 0);
});

window.onscroll = () => {
    if (window.scrollY > headerTopOffset) {
        header.classList.add('sticky');
        btnToTop.classList.add('active');
    } else {
        header.classList.remove('sticky');
        btnToTop.classList.remove('active');
    }
};
