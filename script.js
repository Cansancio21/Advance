const form = document.querySelector("form"),
        nextBtn = document.querySelector(".nextBtn"),
        backBtn = document.querySelector(".backBtn"),
        allInput = document.querySelectorAll(".first input");

        nextBtn.addEventListener("click", ()=>{
            allInput.forEach(input =>{
                if(input.value != ""){
                    form.classList.add('secActive');
                }else{
                    form.classList.remove('secActive');
                }
            }) 

        });

        nextBtn.addEventListener("click", ()=>   form.classList.remove('secActive'));




        civilStatusSelect.addEventListener("change", function() {
            if (this.value === "Others") {
                othersInput.style.display = "block";
                othersInput.setAttribute("required", "true");
            } else {
                othersInput.style.display = "none";
                othersInput.removeAttribute("required");
            }
        });
    


        