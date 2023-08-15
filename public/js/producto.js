function myFunction(smallImg){
    var fullImg=document.getElementById("imgBox")
fullImg.src=smallImg.src;
}

const allStars = document.querySelectorAll(".star");
allStars.forEach((star, i) => {
    star.onclick = function () {
        let current_star_level = i + 1;
        var stars;
        allStars.forEach((star, j) => {
            if (current_star_level >= j + 1) {
                star.innerHTML = '&#9733';
                stars = j+1;
            } else {
                star.innerHTML = '&#9734';
            }
        })
        document.getElementById('num_star').value = stars;
    }
})
