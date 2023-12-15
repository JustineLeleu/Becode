let list = document.querySelector("ol");
let first = list.firstChild;
let last = list.children[4];
list.prepend(last, first);

let sections = document.querySelectorAll("section");
console.log(sections);
let section2 = sections[1];
let section3 = sections[2].children[0];
section2.prepend(section3.children[0]);
section3.prepend(section2.children[1]);

section3.remove();