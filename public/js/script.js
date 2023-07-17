const ratingStars = [...document.getElementsByClassName("rating__star")];

function executeRating(stars) {
  const starClassActive = "rating__star fa fa-star active";
  const starClassInactive = "rating__star fa fa-star";
  const starsLength = stars.length;
  let i;
  stars.map((star) => {
    star.onclick = () => {
      i = stars.indexOf(star);

      if (star.className===starClassInactive) {
        for (i; i >= 0; --i) stars[i].className = starClassActive;
      } else {
        for (i; i < starsLength; ++i) stars[i].className = starClassInactive;
      }
    };
  });
}
  
executeRating(ratingStars);


// pass rating data
ratingStars.forEach(function(star){
  star.addEventListener('click', (e) => {
    sessionStorage.setItem('rating', e.target.dataset.value);
  });
});

const ratingSubmitButton = document.getElementById("ratingSubmitButton");
const ratingValue = document.getElementById("ratingValue");

ratingSubmitButton.addEventListener('click', function() {
  ratingValue.value = sessionStorage.getItem('rating');
});