
try {
    window.addEventListener("load",()=>{
        changeWidth();
        const btn = ()=>{
            const boton = document.querySelector("#btnPago").addEventListener("click",(e)=>{
           
                if(example == "false" ){
                    e.preventDefault(); 
                }
            });
        }
        btn();
      

        let direccionAdmin = document.getElementById('direciones');
        if(direccionAdmin != null){
            direccionAdmin.addEventListener('change', function(event){
                example = "true";
                const btn = document.getElementById("")
                console.log(example);
                btn();
            })

        }
     
    })
  } catch (exceptionVar) {
    
  }
  window.addEventListener("resize",changeWidth);

  function changeWidth() {
    if(window.innerWidth <= 575){
        const div = document.querySelector("#resumeDiv");
        div.classList.remove("col-8");
        div.classList.remove("col-sm-3");
        div.classList.add("col-sm-4");
        div.classList.add("col-12");

    }else{
        const div = document.querySelector("#resumeDiv");
        div.classList.remove("col-12");
        div.classList.remove("col-sm-4");
        div.classList.add("col-sm-3");
        div.classList.add("col-8");

    }
    
  }