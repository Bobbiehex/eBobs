const mobile_menu_icon = document.querySelector(".mobile_menu_icon");
const top_line = document.querySelector(".top_line");
const middle_line = document.querySelector(".middle_line");
const bottom_line = document.querySelector(".bottom_line");
const ul = document.querySelector("ul");

let mobile_menu_icon_add_at_runtime = document.querySelector(".mobile_menu_icon_add_at_runtime");
let top_line_add_at_runtime = document.querySelector(".top_line_add_at_runtime");
let middle_line_add_at_runtime = document.querySelector(".middle_line_add_at_runtime");
let bottom_line_add_at_runtime = document.querySelector(".bottom_line_add_at_runtime");


let search_icon = document.querySelector(".search_icon");
let search_bar = document.querySelector(".search_bar");
let btnCloseSearch = document.querySelector(".btnCloseSearch");

let dim_page_search = document.querySelector(".dim_page")

search_icon.addEventListener("click", ()=>{
    search_bar.style.display = "block";
    dim_page_search.style.pointerEvents = "fill";
    dim_page_search.style.opacity = .8;
});

btnCloseSearch.addEventListener("click", ()=>{
    search_bar.style.display = "none";
    dim_page_search.style.pointerEvents = "none";
    dim_page_search.style.opacity = 0;
});


let menu_monitor = 0;

mobile_menu_icon.addEventListener("click", ()=>{
    if(menu_monitor ===0){
        // ul.style.display="block";
        ul.style.left= 0;

        menu_monitor = 1;

        mobile_menu_icon.classList.add("mobile_menu_icon_add_at_runtime");
        top_line.classList.add("top_line_add_at_runtime");
        middle_line.classList.add("middle_line_add_at_runtime");
        bottom_line.classList.add("bottom_line_add_at_runtime");

    }else{
        // ul.style.display="none";
        ul.style.left="-80em";

        menu_monitor = 0;

        mobile_menu_icon.classList.remove("mobile_menu_icon_add_at_runtime");
        top_line.classList.remove("top_line_add_at_runtime");
        middle_line.classList.remove("middle_line_add_at_runtime");
        bottom_line.classList.remove("bottom_line_add_at_runtime");
    }
});