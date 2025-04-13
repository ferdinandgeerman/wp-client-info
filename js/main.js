

// document.addEventListener("DOMContentLoaded", function () {

//     const copyShorCodeElements = document.getElementsByClassName("short-code-copy-icon");

//     Array.from(copyShorCodeElements).forEach((el)=>{
//         el.addEventListener("click", function () {
//             copyShortCode(el);
//         });
//     })
  
// });

// function copyShortCode(el){
//    const shortcode = el.previousElementSibling.innerText;

//    navigator.clipboard.writeText(shortcode)
//     .then(() => {
//       alert("Copied: " + shortcode);
//     })
//     .catch(err => {
//       console.error("Copy failed", err);
//     });
// }

function copyShortCode(el){

    const shortcode = el.dataset.shortcode;

    navigator.clipboard.writeText(shortcode)
     .then(() => {
       alert("Copied: " + shortcode);
     })
     .catch(err => {
       console.error("Copy failed", err);
     });
 }