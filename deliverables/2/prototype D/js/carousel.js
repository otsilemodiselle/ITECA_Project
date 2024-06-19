const track = document.querySelector('.carousel_track');
const slides = Array.from(track.children);
const nextButton = document.querySelector('.carousel_button--right');
const prevButton = document.querySelector('.carousel_button--left');
const dotsNav = document.querySelector('.carousel_nav');
const dots = Array.from(dotsNav.children);
const carouselCount = 0;

const slideWidth = slides[0].getBoundingClientRect().width;


// arrange the slides next to each other

const setSlidePosition = (slide, index) => {
  slide.style.left = slideWidth * index + 'px';
}

slides.forEach(setSlidePosition);

const moveToSlide = (track, currentSlide, targetSlide) => {
  track.style.transform = 'translate(-' + targetSlide.style.left + ')';
  currentSlide.classList.remove('current-slide'); // if using classlist, NO DOT
  targetSlide.classList.add('current-slide');
}

const updateDots = (currentDot, targetDot) => {
  currentDot.classList.remove('current-slide');
  targetDot.classList.add('current-slide');
}

const hideButtonsAtEdges = (slides, prevButton, nextButton, targetIndex) => {
  if (targetIndex === 0) {
    prevButton.classList.add('is-hidden');
    nextButton.classList.remove('is-hidden');
  } else if (targetIndex === slides.length - 1) {
    prevButton.classList.remove('is-hidden');
    nextButton.classList.add('is-hidden');
  } else {
    prevButton.classList.remove('is-hidden');
    nextButton.classList.remove('is-hidden');
  }
}

setInterval(function() {
  const currentSlide = track.querySelector('.current-slide') 
  const nextSlide = currentSlide.nextElementSibling;
  const currentDot = dotsNav.querySelector('.current-slide');
  const nextDot = currentDot.nextElementSibling;
  const nextIndex = slides.findIndex(slide => slide === nextSlide);
  if ((slides.findIndex(slide => slide === currentSlide)) === (slides.length -1)) {
    slides.forEach(setSlidePosition);
    slides.forEach(slide => slide.classList.remove('current-slide'));
    dots.forEach(dot => dot.classList.remove('current-slide'));
    slides[0].classList.add('current-slide');
    dots[0].classList.add('current-slide')
    const currentSlide = track.querySelector('.current-slide') 
    const nextSlide = currentSlide.nextElementSibling;
    track.style.transform = 'translate(-' + currentSlide.style.left + ')';}
    else{
      moveToSlide(track, currentSlide, nextSlide)
      updateDots(currentDot, nextDot);
      hideButtonsAtEdges(slides, prevButton, nextButton, nextIndex);
    } 
}, 5000); // 5000 milliseconds = 5 seconds


// when I click left, move slides to the left
prevButton.addEventListener('click', e =>{
  const currentSlide = track.querySelector('.current-slide') 
  const prevSlide = currentSlide.previousElementSibling;
  const currentDot = dotsNav.querySelector('.current-slide')
  const prevDot = currentDot.previousElementSibling;
  const prevIndex = slides.findIndex(slide => slide === prevSlide);
  moveToSlide(track, currentSlide, prevSlide)
  updateDots(currentDot, prevDot);
  hideButtonsAtEdges(slides, prevButton, nextButton, prevIndex);
})

// when I click right, move slides to the right
nextButton.addEventListener('click', e =>{
  const currentSlide = track.querySelector('.current-slide');
  const nextSlide = currentSlide.nextElementSibling;
  const currentDot = dotsNav.querySelector('.current-slide');
  const nextDot = currentDot.nextElementSibling;
  const nextIndex = slides.findIndex(slide => slide === nextSlide);
  moveToSlide(track, currentSlide, nextSlide);
  updateDots(currentDot, nextDot);
  hideButtonsAtEdges(slides, prevButton, nextButton, nextIndex);
})
// when I click nav indicators, move to that slide

dotsNav.addEventListener('click', e => {
  // what indicator was clicked on?
  const targetDot = e.target.closest('button');

  if (!targetDot) return;
  
  const currentSlide = track.querySelector('.current-slide');
  const currentDot = dotsNav.querySelector('.current-slide');
  const targetIndex = dots.findIndex(dot => dot === targetDot);
  const targetSlide = slides[targetIndex];

  moveToSlide(track, currentSlide, targetSlide);
  updateDots(currentDot, targetDot);
  hideButtonsAtEdges(slides, prevButton, nextButton, targetIndex);
})