import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

console.log("test");

document.addEventListener("DOMContentLoaded", function(event){
    // Your code to run since DOM is loaded and ready

    var expanded = false;

    var selectBox = document.querySelector(".selectBox");
    selectBox.addEventListener("click", function() {
        var checkboxes = document.getElementById("checkboxes");
        if(!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        }
        else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    });
});

