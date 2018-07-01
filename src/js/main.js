import "../scss/main.scss";

const clickEvt = (toggler) => {
    let classname = toggler.getAttribute('data-toggle');
    let target = document.getElementById(
        toggler.getAttribute('data-target').replace('#','')
    );
    
    if( target.classList.toggle(classname) ) {
        toggler.classList.remove('alt');
    } else {
        toggler.classList.add('alt');
    }
};

var togglerList = document.querySelectorAll('nav.navbar .navbar-toggler');

console.log(2);

if( togglerList.length > 0 ){
    console.log(4);
    togglerList.forEach( (element) => {
        console.log(element);
        element.addEventListener( 'click', () => {
            clickEvt(element);
        } );
    });
}

console.log(5);