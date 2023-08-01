//æuthor DARKJ
window.addEventListener("load", async ()=>{
    // consumo al API de pqrs, debo cambiar el url cuando se compre el hosting
        const url ="http://localhost:8012/proyecto_web/public/api/faqs/type/1";
       const response = await fetch(url);
       const data = await response.json();
//Select donde los voy a meter
       const select = document.querySelector("#param_type");
       
       const handleData= (data) => {
        data.forEach(element => {
            let name = element.name;
            let id = element.id;

            const option = document.createElement("option");
            option.value = id;
            option.text = name;
            select.appendChild(option);  
        })
      
       }
       handleData(data);
});


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

