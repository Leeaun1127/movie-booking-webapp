//Movies slider
var TrandingSlider = new Swiper('.tranding-slider', {
  effect: 'coverflow',
  grabCursor: true,
  centeredSlides: true,
  loop: true,
  slidesPerView: 'auto',
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 2.5,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }
});

const dateButtons = document.querySelectorAll('.date-button');
let selectedDateButton = null;
const timeButtons = document.querySelectorAll('.time-button');
let selectedTimeButton = null;
const cinemaButtons = document.querySelectorAll('.cinema-button');
let selectedCinemaButton = null;


function checkSelection() {
  const dateSelected = selectedDateButton !== null;
  const timeSelected = selectedTimeButton !== null;
  const cinemaSelected = selectedCinemaButton !== null;

  if (dateSelected && timeSelected && cinemaSelected) {
    console.log('All three buttons are selected!');

    //Set button to display
    document.getElementById("proceed").style["display"] = "block";

    //Add event listener to proceed button
    const proceedButton = document.getElementById('proceed');
    proceedButton.addEventListener('click', () => {
      console.log('Button clicked!');
      //navigate to select seat
    });
  } else {
    console.log('Not all three buttons are selected.');
    document.getElementById("proceed").style["display"] = "none";

  }
}

function toggleDate(element) {
  if (selectedDateButton !== null && selectedDateButton != element) {
    selectedDateButton.classList.remove('selected');
  }

  element.classList.toggle('selected');
  selectedDateButton = element.classList.contains('selected') ? element : null;

  const date_index = parseInt(element.dataset.index);
  console.log('Clicked button index:', date_index);
  document.getElementById("date").value=date_index;

  checkSelection();
}

function toggleTime(element) {
  if (selectedTimeButton !== null && selectedTimeButton != element) {
    selectedTimeButton.classList.remove('selected');
  }

  element.classList.toggle('selected');
  selectedTimeButton = element.classList.contains('selected') ? element : null;

  const time_index = parseInt(element.dataset.index);
  console.log('Clicked button index:', time_index);
  document.getElementById("time").value=time_index;
  checkSelection();
}

function toggleCinema(element) {
  if (selectedCinemaButton !== null && selectedCinemaButton != element) {
    selectedCinemaButton.classList.remove('selected');
  }

  element.classList.toggle('selected');
  selectedCinemaButton = element.classList.contains('selected') ? element : null;

  const cinema_index = parseInt(element.dataset.index);
  console.log('Clicked button index:', cinema_index);
  document.getElementById("cinema").value=cinema_index;
  checkSelection();
}

dateButtons.forEach(button => {
  button.addEventListener('click', () => {
    toggleDate(button);
  });
});

timeButtons.forEach(button => {
  button.addEventListener('click', () => {
    toggleTime(button);
  });
});

cinemaButtons.forEach(button => {
  button.addEventListener('click', () => {
    toggleCinema(button);
  });
});


TrandingSlider.on('transitionEnd', function() {
  getSelectingMovie();
});





function getSelectingMovie(){
  const elements = document.getElementsByClassName("swiper-slide tranding-slide");
  for (let i = 0; i < elements.length; i++) {
    
    if (elements[i].style.zIndex ==="1") {
      // Do something with the element
      console.log(elements[i].getAttribute('value'));
      document.getElementById("movie").value = elements[i].getAttribute('value');
    }
  }
}
