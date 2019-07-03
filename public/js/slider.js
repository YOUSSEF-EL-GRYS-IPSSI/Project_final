let myIndex = 0
carousel()
showActive("accueil")

function carousel() {
    let i
    let x = document.getElementsByClassName("mySlide")
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"
    }
    myIndex++
    if (myIndex > x.length) {
        myIndex = 1
    }
    x[myIndex - 1].style.display = "block"
    setTimeout(carousel, 2000) // Change iage every 2 seconds
}

///////////////////////////////////////
let slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    let i;
    let x = document.getElementsByClassName("mySlides")
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"
    }
    x[slideIndex - 1].style.display = "block"
}
////

function connectionPrevent(elem) {
    elem.preventDefault();
}

function hideModal() {
    document.querySelector(".modal").classList.remove("active")
    document.querySelector(".mask").classList.remove("active")
}