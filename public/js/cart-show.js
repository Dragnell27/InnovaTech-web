
window.onresize = () =>{


    try {
        var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        if (windowWidth <= 600) {
            var myDiv;
            myDiv = document.getElementById("resumenContainer");
            myDiv.classList.add("col-sm-12");
        } else {
            var myDiv;
            myDiv = document.getElementById("resumenContainer");
            myDiv.classList.remove("col-sm-12");
        }
      } catch (exceptionVar) {
        var error = exceptionVar;
      }




};