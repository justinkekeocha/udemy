export function useSlide() {
  //Get all slideContainers
  const slideContainers = document.querySelectorAll("[data-slide-container]");
  const slideDistance = window.screen.availWidth / 1.5;
  // Iterate over each container
  slideContainers.forEach((container) => {
    let containerMotion =
      container.parentElement.attributes["data-slide-motion"].value;
    //Implement automatic slide
    if (containerMotion == "slide") {
      setInterval(function () {
        container.scrollLeft += slideDistance;
      }, 5000);
    }
    let nextButton = container.querySelectorAll("[data-slide-next]")[0];
    let previousButton = container.querySelectorAll("[data-slide-previous]")[0];

    //add a click event to each of the slide
    nextButton.addEventListener("click", () => {
      container.scrollLeft += slideDistance;
    });

    previousButton.addEventListener("click", () => {
      container.scrollLeft -= slideDistance;
    });
  });
}
