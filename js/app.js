// When URL has a query parameter
// prevents the responseMsg from being null when adding classes
if (window.location.search) {
  // add animation using animate.css library for success and error states
  const responseMsg = document.querySelector('.user-msg')
  responseMsg.classList.add('animated', 'zoomOut', 'delay-2s')
  // remove user message after 3 seconds 
  setTimeout(function () {
    responseMsg.style.display = 'none'
  }, 2000)
}
