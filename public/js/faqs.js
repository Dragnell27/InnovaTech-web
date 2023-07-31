//æuthor DARKJ
var buttons = document.querySelectorAll(".actionBt");
buttons.forEach((btn) => {
    btn.addEventListener("click", () => {
        var faqsContainer = document.getElementById("faqs-container");
        var chatContainer = document.getElementById("chat-container");

        if (faqsContainer.classList.contains("active")) {
            faqsContainer.style.opacity = 0;
            faqsContainer.style.height = "0";
        } else {
            faqsContainer.style.opacity = 1;

            faqsContainer.style.height = faqsContainer.scrollHeight + "px";
        }

        faqsContainer.classList.toggle("active");
        chatContainer.classList.toggle("active");
    });
});

