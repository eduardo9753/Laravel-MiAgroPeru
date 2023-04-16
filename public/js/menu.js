const checkMenu = document.querySelector('#check');
const menu = document.querySelector('.navegacion'); //elemento cuanto estemos logeados


checkMenu.addEventListener('click', (e) => {
    console.log('click al input');
    menu.classList.toggle('activo');
    document.body.classList.toggle('opacity');
})