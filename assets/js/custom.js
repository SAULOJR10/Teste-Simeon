document.addEventListener("DOMContentLoaded", function(event) {
    nav_active();

    const showNavbar = (toggleId, navId, bodyId, headerId, btn_menuId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId),
            btn_menu = document.getElementById(btn_menuId)

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd && btn_menu) {
            toggle.addEventListener('click', () => {
                // show navbar
                nav.classList.toggle('show')
                    // animação btn-menu
                btn_menu.classList.toggle('active-btn-menu')
                    // change icon
                toggle.classList.toggle('bx-x')
                    // add padding to body
                bodypd.classList.toggle('body-pd')
                    // add padding to header
                headerpd.classList.toggle('body-pd')
            })
        }
    }

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header', 'btn-menu')

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(l => l.addEventListener('click', colorLink))

    // Your code to run since DOM is loaded and ready
});

function nav_active() {
    let pagina = window.location.href.split('/').at(-1);
    if (pagina == 'controle_postagens.php') {
        $('#nav-postagens').addClass('active');
    } else if (pagina == 'controle_usuarios.php') {
        $('#nav-usuarios').addClass('active');
    } else if (pagina == 'controle_comentarios.php') {
        $('#nav-comentarios').addClass('active');
    }
}


// Função para verificar login no banco de dados
function login() {
    let user = document.getElementById("user").value;
    let senha = MD5(document.getElementById("senha").value);
    let acao = "login";
    $.ajax({
        method: 'post',
        dataType: 'json',
        url: 'assets/functions/select.json.php',
        data: {
            acao: acao,
            user: user,
            senha: senha,
            processoData: false,
            contentype: false,
        },
        success: function(data) {
            if (data == "adm") {
                window.location.href = 'controle_postagens.php';
            } else if (data == "user") {
                window.location.href = 'index.php';
            } else {
                alert(data);
            }
        },
        error: function(msg) {
            alert(msg.responseText);
        }
    });
}

function postagens() {
    let acao = "postagens";
    $.ajax({
        method: 'post',
        dataType: 'json',
        url: 'assets/functions/select.json.php',
        data: {
            acao: acao,
            processoData: false,
            contentype: false,
        },
        success: function(data) {
            $("#postagens").append(data);
        },
        error: function(msg) {
            alert(msg.responseText);
        }
    });
}

function usuarios() {
    let acao = "usuarios";
    $.ajax({
        method: 'post',
        dataType: 'json',
        url: 'assets/functions/select.json.php',
        data: {
            acao: acao,
            processoData: false,
            contentype: false,
        },
        success: function(data) {
            $("#usuarios").append(data);
        },
        error: function(msg) {
            alert(msg.responseText);
        }
    });
}

function comentarios() {
    select_posts();
    let acao = "comentarios";
    $.ajax({
        method: 'post',
        dataType: 'json',
        url: 'assets/functions/select.json.php',
        data: {
            acao: acao,
            processoData: false,
            contentype: false,
        },
        success: function(data) {
            $("#comentarios").append(data);
        },
        error: function(msg) {
            alert(msg.responseText);
        }
    });
}

function postagens_inicial() {
    let acao = "postagens_inicial";
    $.ajax({
        method: 'post',
        dataType: 'json',
        url: 'assets/functions/select.json.php',
        data: {
            acao: acao,
            processoData: false,
            contentype: false,
        },
        success: function(data) {
            $("#postagens_inicial").append(data);
        },
        error: function(msg) {
            alert(msg.responseText);
        }
    });
}

function select_posts() {
    let acao = "select_posts";
    $.ajax({
        method: 'post',
        dataType: 'json',
        url: 'assets/functions/select.json.php',
        data: {
            acao: acao,
            processoData: false,
            contentype: false,
        },
        success: function(data) {
            $("#select_posts").append(data);
        },
        error: function(msg) {
            alert(msg.responseText);
        }
    });
}

function cad_usuario(){
    let acao = "cad_usuario";
    let nome = document.getElementById('nome').value;
    let e_mail = document.getElementById('e_mail').value;
    let senha = MD5(document.getElementById('senha').value);
    let confirm_senha = MD5(document.getElementById('confirm-senha').value);
    if(senha != confirm_senha){
        alert("As senhas não coincidem");
        return;
    }
    if(nome == '' || e_mail == '' || senha == '' || confirm_senha == ''){
        alert("Por favor preencha todos os campos");
    }
    $.ajax({
        method: 'post',
        dataType: 'json',
        url: 'assets/functions/insert.json.php',
        data: {
            acao: acao,
            nome: nome,
            e_mail: e_mail,
            senha: senha,
            processoData: false,
            contentype: false,
        },
        success: function(data) {
            if(data == 'E-mail já cadastrado'){
                alert(data);
            }else{
                window.location.href = "login.php";
            }
        },
        error: function(msg) {
            alert(msg.responseText);
        }
    });
}

function cad_posts() {
    let acao = "cad_postagens";
    let titulo = document.getElementById('titulo').value;
    let descricao = document.getElementById('descricao').value;
    $.ajax({
        method: 'post',
        dataType: 'json',
        url: 'assets/functions/insert.json.php',
        data: {
            acao: acao,
            titulo: titulo,
            descricao: descricao,
            processoData: false,
            contentype: false,
        },
        success: function(data) {
            alert(data);
            window.location.reload();
        },
        error: function(msg) {
            alert(msg.responseText);
            window.location.reload();
        }
    });
}


function cad_comentarios() {
    let acao = "cad_comentarios";
    let descricao = document.getElementById('descricao').value;
    let select_posts = document.getElementById('select_posts').value;
    $.ajax({
        method: 'post',
        dataType: 'json',
        url: 'assets/functions/insert.json.php',
        data: {
            acao: acao,
            descricao: descricao,
            select_posts: select_posts,
            processoData: false,
            contentype: false,
        },
        success: function(data) {
            alert(data);
            window.location.reload();
        },
        error: function(msg) {
            alert(msg.responseText);
            window.location.reload();
        }
    });
}





// Função para gerar MD5 na máquina do cliente e não precisar fazer requisiçao com conteúdo sigiloso para ao servidor
function MD5(d) {
    var r = M(V(Y(X(d), 8 * d.length)));
    return r.toLowerCase()
};

function M(d) { for (var _, m = "0123456789ABCDEF", f = "", r = 0; r < d.length; r++) _ = d.charCodeAt(r), f += m.charAt(_ >>> 4 & 15) + m.charAt(15 & _); return f }

function X(d) { for (var _ = Array(d.length >> 2), m = 0; m < _.length; m++) _[m] = 0; for (m = 0; m < 8 * d.length; m += 8) _[m >> 5] |= (255 & d.charCodeAt(m / 8)) << m % 32; return _ }

function V(d) { for (var _ = "", m = 0; m < 32 * d.length; m += 8) _ += String.fromCharCode(d[m >> 5] >>> m % 32 & 255); return _ }

function Y(d, _) {
    d[_ >> 5] |= 128 << _ % 32, d[14 + (_ + 64 >>> 9 << 4)] = _;
    for (var m = 1732584193, f = -271733879, r = -1732584194, i = 271733878, n = 0; n < d.length; n += 16) {
        var h = m,
            t = f,
            g = r,
            e = i;
        f = md5_ii(f = md5_ii(f = md5_ii(f = md5_ii(f = md5_hh(f = md5_hh(f = md5_hh(f = md5_hh(f = md5_gg(f = md5_gg(f = md5_gg(f = md5_gg(f = md5_ff(f = md5_ff(f = md5_ff(f = md5_ff(f, r = md5_ff(r, i = md5_ff(i, m = md5_ff(m, f, r, i, d[n + 0], 7, -680876936), f, r, d[n + 1], 12, -389564586), m, f, d[n + 2], 17, 606105819), i, m, d[n + 3], 22, -1044525330), r = md5_ff(r, i = md5_ff(i, m = md5_ff(m, f, r, i, d[n + 4], 7, -176418897), f, r, d[n + 5], 12, 1200080426), m, f, d[n + 6], 17, -1473231341), i, m, d[n + 7], 22, -45705983), r = md5_ff(r, i = md5_ff(i, m = md5_ff(m, f, r, i, d[n + 8], 7, 1770035416), f, r, d[n + 9], 12, -1958414417), m, f, d[n + 10], 17, -42063), i, m, d[n + 11], 22, -1990404162), r = md5_ff(r, i = md5_ff(i, m = md5_ff(m, f, r, i, d[n + 12], 7, 1804603682), f, r, d[n + 13], 12, -40341101), m, f, d[n + 14], 17, -1502002290), i, m, d[n + 15], 22, 1236535329), r = md5_gg(r, i = md5_gg(i, m = md5_gg(m, f, r, i, d[n + 1], 5, -165796510), f, r, d[n + 6], 9, -1069501632), m, f, d[n + 11], 14, 643717713), i, m, d[n + 0], 20, -373897302), r = md5_gg(r, i = md5_gg(i, m = md5_gg(m, f, r, i, d[n + 5], 5, -701558691), f, r, d[n + 10], 9, 38016083), m, f, d[n + 15], 14, -660478335), i, m, d[n + 4], 20, -405537848), r = md5_gg(r, i = md5_gg(i, m = md5_gg(m, f, r, i, d[n + 9], 5, 568446438), f, r, d[n + 14], 9, -1019803690), m, f, d[n + 3], 14, -187363961), i, m, d[n + 8], 20, 1163531501), r = md5_gg(r, i = md5_gg(i, m = md5_gg(m, f, r, i, d[n + 13], 5, -1444681467), f, r, d[n + 2], 9, -51403784), m, f, d[n + 7], 14, 1735328473), i, m, d[n + 12], 20, -1926607734), r = md5_hh(r, i = md5_hh(i, m = md5_hh(m, f, r, i, d[n + 5], 4, -378558), f, r, d[n + 8], 11, -2022574463), m, f, d[n + 11], 16, 1839030562), i, m, d[n + 14], 23, -35309556), r = md5_hh(r, i = md5_hh(i, m = md5_hh(m, f, r, i, d[n + 1], 4, -1530992060), f, r, d[n + 4], 11, 1272893353), m, f, d[n + 7], 16, -155497632), i, m, d[n + 10], 23, -1094730640), r = md5_hh(r, i = md5_hh(i, m = md5_hh(m, f, r, i, d[n + 13], 4, 681279174), f, r, d[n + 0], 11, -358537222), m, f, d[n + 3], 16, -722521979), i, m, d[n + 6], 23, 76029189), r = md5_hh(r, i = md5_hh(i, m = md5_hh(m, f, r, i, d[n + 9], 4, -640364487), f, r, d[n + 12], 11, -421815835), m, f, d[n + 15], 16, 530742520), i, m, d[n + 2], 23, -995338651), r = md5_ii(r, i = md5_ii(i, m = md5_ii(m, f, r, i, d[n + 0], 6, -198630844), f, r, d[n + 7], 10, 1126891415), m, f, d[n + 14], 15, -1416354905), i, m, d[n + 5], 21, -57434055), r = md5_ii(r, i = md5_ii(i, m = md5_ii(m, f, r, i, d[n + 12], 6, 1700485571), f, r, d[n + 3], 10, -1894986606), m, f, d[n + 10], 15, -1051523), i, m, d[n + 1], 21, -2054922799), r = md5_ii(r, i = md5_ii(i, m = md5_ii(m, f, r, i, d[n + 8], 6, 1873313359), f, r, d[n + 15], 10, -30611744), m, f, d[n + 6], 15, -1560198380), i, m, d[n + 13], 21, 1309151649), r = md5_ii(r, i = md5_ii(i, m = md5_ii(m, f, r, i, d[n + 4], 6, -145523070), f, r, d[n + 11], 10, -1120210379), m, f, d[n + 2], 15, 718787259), i, m, d[n + 9], 21, -343485551), m = safe_add(m, h), f = safe_add(f, t), r = safe_add(r, g), i = safe_add(i, e)
    }
    return Array(m, f, r, i)
}

function md5_cmn(d, _, m, f, r, i) { return safe_add(bit_rol(safe_add(safe_add(_, d), safe_add(f, i)), r), m) }

function md5_ff(d, _, m, f, r, i, n) { return md5_cmn(_ & m | ~_ & f, d, _, r, i, n) }

function md5_gg(d, _, m, f, r, i, n) { return md5_cmn(_ & f | m & ~f, d, _, r, i, n) }

function md5_hh(d, _, m, f, r, i, n) { return md5_cmn(_ ^ m ^ f, d, _, r, i, n) }

function md5_ii(d, _, m, f, r, i, n) { return md5_cmn(m ^ (_ | ~f), d, _, r, i, n) }

function safe_add(d, _) { var m = (65535 & d) + (65535 & _); return (d >> 16) + (_ >> 16) + (m >> 16) << 16 | 65535 & m }

function bit_rol(d, _) { return d << _ | d >>> 32 - _ }