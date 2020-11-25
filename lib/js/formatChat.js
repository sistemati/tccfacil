function inputHandler(masks, max, event) {
    var c = event.target;
    var v = c.value.replace(/\D/g, '');
    var m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
}


var telefone_unidadeMask = ['(99) 9999-99999', '(99) 99999-9999'];
var telefone_unidade = document.querySelector('#telefone_unidade');
VMasker(telefone_unidade).maskPattern(telefone_unidadeMask[0]);
telefone_unidade.addEventListener('input', inputHandler.bind(undefined, telefone_unidadeMask, 14), false);


