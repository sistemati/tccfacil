function inputHandler(masks, max, event) {
    var c = event.target;
    var v = c.value.replace(/\D/g, '');
    var m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
}

var ie_unidadeMask = ['999.999.999.999', '999.999.999.999'];
var ie_unidade = document.querySelector('#ie_unidade');
VMasker(ie_unidade).maskPattern(ie_unidadeMask[0]);
ie_unidade.addEventListener('input', inputHandler.bind(undefined, ie_unidadeMask, 15), false);

var telefone_unidadeMask = ['(99) 9999-99999', '(99) 99999-9999'];
var telefone_unidade = document.querySelector('#telefone_unidade');
VMasker(telefone_unidade).maskPattern(telefone_unidadeMask[0]);
telefone_unidade.addEventListener('input', inputHandler.bind(undefined, telefone_unidadeMask, 14), false);

var cnpj_unidadeMask = ['99.999.999/9999-99'];
var cnpj_unidade = document.querySelector('#cnpj_unidade');
VMasker(cnpj_unidade).maskPattern(cnpj_unidadeMask[0]);
cnpj_unidade.addEventListener('input', inputHandler.bind(undefined, cnpj_unidadeMask, 18), false);
