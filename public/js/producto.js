var selectedSmallImage = null;
function myFunction(smallImg){
    var fullImg=document.getElementById("imgBox")
fullImg.src=smallImg.src;

if (selectedSmallImage !== null) {
    selectedSmallImage.classList.remove('selected');
}
smallImg.classList.add('selected');
selectedSmallImage = smallImg;

}



const allStars = document.querySelectorAll(".star");

allStars.forEach((star, i) => {
    star.onclick = function () {
        let current_star_level = i + 1;
        allStars.forEach((star, j) => {
            console.log(j + 1);
            if (current_star_level >= j + 1) {
                star.innerHTML = '&#9733';
            } else {
                star.innerHTML = '&#9734';
            }
        })
    }
})
