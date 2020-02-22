const ele = document.getElementById('lista-alimentos');
const selectBox = document.querySelector('.selectBox');

ele.addEventListener('click', showCheckboxes);

let expanded = false;

function showCheckboxes(e) {
    if(e.target.classList.contains('overSelect')) {
        let checkboxes = e.target.parentElement.nextElementSibling;
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
}