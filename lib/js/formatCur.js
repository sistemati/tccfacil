function inputHandler(masks, max, event) {
    var c = event.target;
    var v = c.value.replace(/\D/g, '');
    var m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
}
var inicio_cursoMask = ['99/99/9999', '99/99/9999'];
var inicio_curso = document.querySelector('#inicio_curso');
VMasker(inicio_curso).maskPattern(inicio_cursoMask[0]);
inicio_curso.addEventListener('input', inputHandler.bind(undefined, inicio_cursoMask, 15), false);