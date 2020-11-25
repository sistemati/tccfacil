 function inputHandler(masks, max, event) {
    var c = event.target;
    var v = c.value.replace(/\D/g, '');
    var m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
}

var data_inicioMask = ['99/99/9999', '99/99/9999'];
var data_inicio = document.querySelector('#data_inicio');
VMasker(data_inicio).maskPattern(data_inicioMask[0]);
data_inicio.addEventListener('input', inputHandler.bind(undefined, data_inicioMask, 15), false);

var data_fimMask = ['99/99/9999', '99/99/9999'];
var data_fim = document.querySelector('#data_fim');
VMasker(data_fim).maskPattern(data_fimMask[0]);
data_fim.addEventListener('input', inputHandler.bind(undefined, data_fimMask, 15), false);