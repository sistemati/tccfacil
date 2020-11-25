var app = {};

// Verificação para cadastro de usuário
app.formCadUsuario = function() {
    var enviando_formulario = false;

    $('.formCadUsuario').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.formCadUsuario :submit'),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Enviando...');
                    $('.error').remove();
                },

                url: '../classes/cadastraUsuario.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        // limpa o form					
                        $('.formCadUsuario').trigger("reset");
                        $.notify("Cadastro realizado com sucesso!", "success");
                        // $('#cadastrarUsuarioModal').modal('hide');
                        // console.log("Cadastrado com sucesso!");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};

// Verificação para editar cadastro de usuário
app.formAtualizarUsuario = function() {
    var enviando_formulario = false;

    $('.formAtualizarUsuario').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.formAtualizarUsuario :submit'),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Enviando...');
                    $('.error').remove();
                },

                url: '../classes/editaUsuario.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        $.notify("Cadastro atualizado com sucesso!", "success");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};


// deletar usuario - na verdade ele apenas altera o status de 1 p/ 2
app.forDeletarUsu = function(id) {
    var enviando_formulario = false;

    $('.forDeletarUsu').submit(function(e) {
        var obj = this,
            submit_btn = $(".forDeletarUsu :submit"),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Adicionando...');
                },

                url: '../classes/deletaUsuario.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == 'OK') {
                        window.location.reload();
                    } else {

                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                }
            });
        }
        return false;
    });
};



// Verificação para cadastro de Instituição
app.formCadInstituicao = function() {
    var enviando_formulario = false;

    $('.formCadInstituicao').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.formCadInstituicao :submit'),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Enviando...');
                    $('.error').remove();
                },

                url: '/classes/cadastraInstituicao.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        // limpa o form					
                        $('.formCadInstituicao').trigger("reset");
                        $.notify("Cadastro realizado com sucesso!", "success");
                        // $('#cadastrarUsuarioModal').modal('hide');
                        // console.log("Cadastrado com sucesso!");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};


// Verificação para editar cadastro de instituicao
app.formAtualizarInstituicao = function() {
    var enviando_formulario = false;

    $('.formAtualizarInstituicao').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.formAtualizarInstituicao :submit'),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Enviando...');
                    $('.error').remove();
                },

                url: '../classes/editaInstituicao.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        $.notify("Cadastro atualizado com sucesso!", "success");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};

// deletar instituicao - na verdade ele apenas altera o status de 1 p/ 2
app.forDeletarInst = function(id) {
    var enviando_formulario = false;

    $('.forDeletarInst').submit(function(e) {
        var obj = this,
            submit_btn = $(".forDeletarInst :submit"),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Adicionando...');
                },

                url: '../classes/deletarInstituicao.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == 'OK') {
                        window.location.reload();
                    } else {

                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                }
            });
        }
        return false;
    });
};



// Verificação para cadastro de Unidade
app.formCadUnidade = function() {
    var enviando_formulario = false;

    $('.formCadUnidade').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.formCadUnidade :submit'),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Enviando...');
                    $('.error').remove();
                },

                url: '/classes/cadastraUnidade.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        // limpa o form					
                        $('.formCadUnidade').trigger("reset");
                        $.notify("Cadastro realizado com sucesso!", "success");
                        // $('#cadastrarUsuarioModal').modal('hide');
                        // console.log("Cadastrado com sucesso!");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};

// Verificação para editar cadastro de instituicao
app.formEditarUnidade = function() {
    var enviando_formulario = false;

    $('.formEditarUnidade').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.formEditarUnidade :submit'),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Enviando...');
                    $('.error').remove();
                },

                url: '../classes/editaUnidade.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        $.notify("Cadastro atualizado com sucesso!", "success");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};

app.forDeletarUnidade = function(id) {
    var enviando_formulario = false;

    $('.forDeletarUnidade').submit(function(e) {
        var obj = this,
            submit_btn = $(".forDeletarUnidade :submit"),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Adicionando...');
                },

                url: '../classes/deletaUnidade.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == 'OK') {
                        window.location.reload();
                    } else {

                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                }
            });
        }
        return false;
    });
};

// Verificação para cadastro de curso
app.formCadCurso = function() {
    var enviando_formulario = false;

    $('.formCadCurso').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.formCadCurso :submit'),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Enviando...');
                    $('.error').remove();
                },

                url: '/classes/cadastraCurso.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        // limpa o form					
                        $('.formCadCurso').trigger("reset");
                        $.notify("Cadastro realizado com sucesso!", "success");
                        // $('#cadastrarUsuarioModal').modal('hide');
                        // console.log("Cadastrado com sucesso!");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};


// Verificação para editar cadastro de usuário
app.formEditarCurso = function() {
    var enviando_formulario = false;

    $('.formEditarCurso').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.formEditarCurso :submit'),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Enviando...');
                    $('.error').remove();
                },

                url: '../classes/editaCurso.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        $.notify("Cadastro atualizado com sucesso!", "success");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};


app.forDeletarCurso = function(id) {
    var enviando_formulario = false;

    $('.forDeletarCurso').submit(function(e) {
        var obj = this,
            submit_btn = $(".forDeletarCurso :submit"),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Adicionando...');
                },

                url: '../classes/deletaCurso.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == 'OK') {
                        window.location.reload();
                    } else {

                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                }
            });
        }
        return false;
    });
};


// Verificação para cadastro de linha de pesquisa
app.frmCadLinhaPesquisa = function() {
    var enviando_formulario = false;

    $('.frmCadLinhaPesquisa').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.frmCadLinhaPesquisa :submit'),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Enviando...');
                    $('.error').remove();
                },

                url: '/classes/cadastraLinhaPesquisa.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        // limpa o form					
                        $('.frmCadLinhaPesquisa').trigger("reset");
                        $.notify("Cadastro realizado com sucesso!", "success");
                        // $('#cadastrarUsuarioModal').modal('hide');
                        // console.log("Cadastrado com sucesso!");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};

// Verificação para editar cadastro de linha de pesquisa
app.frmEditarLinhaPesquisa = function() {
    var enviando_formulario = false;

    $('.frmEditarLinhaPesquisa').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.frmEditarLinhaPesquisa :submit'),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Enviando...');
                    $('.error').remove();
                },

                url: '../classes/editaLinhaPesquisa.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        $.notify("Cadastro atualizado com sucesso!", "success");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};

app.forDeletarLinhaPesquisa = function(id) {
    var enviando_formulario = false;

    $('.forDeletarLinhaPesquisa').submit(function(e) {
        var obj = this,
            submit_btn = $(".forDeletarLinhaPesquisa :submit"),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Adicionando...');
                },

                url: '../classes/deletaLinhaPesquisa.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == 'OK') {
                        window.location.reload();
                    } else {

                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                }
            });
        }
        return false;
    });
};


// Verificação para cadastro de projeto
app.frmCadProjeto = function() {
    var enviando_formulario = false;

    $('.frmCadProjeto').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.frmCadProjeto :submit'),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Enviando...');
                    $('.error').remove();
                },

                url: '/classes/cadastraProjeto.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        // limpa o form					
                        $('.frmCadProjeto').trigger("reset");
                        $.notify("Cadastro realizado com sucesso!", "success");
                        // $('#cadastrarUsuarioModal').modal('hide');
                        // console.log("Cadastrado com sucesso!");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};
// editar cadastro de projeto
// Verificação para cadastro de usuário
app.frmEditarProjeto = function() {
    var enviando_formulario = false;

    $('.frmEditarProjeto').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.frmEditarProjeto :submit'),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Enviando...');
                    $('.error').remove();
                },

                url: '../classes/editaProjeto.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        // limpa o form                 
                        $('.frmEditarProjeto').trigger("reset");
                        $.notify("Cadastro Atualizado com sucesso!", "success");
                        // $('#cadastrarUsuarioModal').modal('hide');
                        // console.log("Cadastrado com sucesso!");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};

app.forDeletarProjeto = function(id) {
    var enviando_formulario = false;

    $('.forDeletarProjeto').submit(function(e) {
        var obj = this,
            submit_btn = $(".forDeletarProjeto :submit"),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Adicionando...');
                },

                url: '../classes/deletaProjeto.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == 'OK') {
                        window.location.reload();
                    } else {

                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                }
            });
        }
        return false;
    });
};


// Verificação para cadastro de chat
app.formCadChat = function() {
    var enviando_formulario = false;


    $('.formCadChat').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.btnEnviar'),
            submit_btn_text = submit_btn.html(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.html(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.html('Enviando...');
                    $('.error').remove();
                },

                url: '../classes/cadastraChat.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        // limpa o form					
                        $('.formCadChat').trigger("reset");
                        $.notify("Mensagem enviada com sucesso!", "success");
                        // $('#cadastrarUsuarioModal').modal('hide');
                        // console.log("Cadastrado com sucesso!");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};


app.forDeletarInteracao = function(id) {
    var enviando_formulario = false;

    $('.forDeletarInteracao').submit(function(e) {
        var obj = this,
            submit_btn = $(".forDeletarInteracao :submit"),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Adicionando...');
                },

                url: '../classes/deletaChat.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == 'OK') {
                        window.location.reload();
                    } else {

                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                }
            });
        }
        return false;
    });
};



// Verificação para cadastro de usuário
app.formCadVinculo = function() {
    var enviando_formulario = false;

    $('.formCadVinculo').submit(function() {
        var obj = this,
            form = $(obj),
            submit_btn = $('.formCadVinculo :submit'),
            submit_btn_text = submit_btn.val(),
            dados = new FormData(obj);

        function volta_submit() {
            submit_btn.removeAttr('disabled');
            submit_btn.val(submit_btn_text);
            enviando_formulario = false;
        }

        if (!enviando_formulario) {
            $.ajax({
                beforeSend: function() {
                    enviando_formulario = true;
                    submit_btn.attr('disabled', true);
                    submit_btn.val('Enviando...');
                    $('.error').remove();
                },

                url: '../classes/cadastraVinculo.php',
                type: 'post',
                data: dados,
                processData: false,
                cache: false,
                contentType: false,

                success: function(data) {
                    volta_submit();

                    if (data == "OK") {
                        // limpa o form					
                        $('.formCadVinculo').trigger("reset");
                        $.notify("Vinculo realizado com sucesso!", "success");
                        // $('#cadastrarUsuarioModal').modal('hide');
                        // console.log("Cadastrado com sucesso!");
                    } else {
                        $.notify(data, "error");
                    }
                },
                error: function(request, status, error) {
                    volta_submit();
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
};