export function useSlide() {
  //Get all slideContainers
  const slideContainers = document.querySelectorAll("[data-slide-container]");

  for (var i = 0; i < slideContainers.length; i++) {
    //find the respective controls in each container
    let slideContainer = slideContainers[i];
    let slideContainerMotion =
      slideContainer.parentElement.attributes["data-slide-motion"].value;

    const slideDistance = window.screen.availWidth / 1.5;

    //Implement automatic slide
    if (slideContainerMotion == "slide") {
      setInterval(function () {
        slideContainer.scrollLeft += slideDistance;
      }, 5000);
    }

    let nextButton =
      slideContainers[i].querySelectorAll("[data-slide-next]")[0];
    let previousButton = slideContainers[i].querySelectorAll(
      "[data-slide-previous]"
    )[0];

    //add a click event to each of the slide
    nextButton.addEventListener("click", () => {
      slideContainer.scrollLeft += slideDistance;
    });

    previousButton.addEventListener("click", () => {
      slideContainer.scrollLeft -= slideDistance;
    });
  }
}
