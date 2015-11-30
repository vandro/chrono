/*jslint plusplus: true */

// Cria um namespace
var chrono = {};

/**
 * Observa os eventos de clique no botão de menu em telas menores.
 * Realiza a abertura ou fechamento da barra lateral quando o botão
 * é acionado ou fecha a barra lateral quando o usuário clica fora
 * da barra.
 * @returns {undefined}
 */
chrono.fnSidebarOpener = function () {
    'use strict';
    var btnToggleSidebar = document.querySelector("aside.sidebar > header > .btn"),
        bSidebarOpened = false,
        fnToggleSidebar = function (e) {
            e.preventDefault();
            var bodycls = document.body.getAttribute('class') || '';
            if (bodycls.indexOf('sidebar-open') > -1) {
                bodycls = bodycls.replace(/\s*sidebar-open\s*/g, ' ');
                bSidebarOpened = false;
            } else {
                bodycls = bodycls + ' sidebar-open';
                bSidebarOpened = true;
            }
            document.body.setAttribute('class', bodycls.trim());
        };
    btnToggleSidebar.addEventListener('click', fnToggleSidebar, false);
    document.querySelector('main[role="main"]').addEventListener('click', function (e) {
        if (bSidebarOpened) {
            fnToggleSidebar(e);
        }
    }, false);
};

/**
 * Torna links apontando para '#' inúteis.
 * @returns {undefined}
 */
chrono.fnUselessLinks = function () {
    'use strict';

    var aoTargetlessLinks = document.querySelectorAll('a[href="#"]'),
        fnDoNothing = function (e) {
            e.preventDefault();
        };

    Array.prototype.forEach.call(aoTargetlessLinks, function (v) {
        v.addEventListener('click', fnDoNothing, false);
    });
};

/**
 * Controla os formularios de edição inline das matérias e tópicos.
 * @returns {undefined}
 */
chrono.fnInlineEditings = function () {
    'use strict';

    var aoMateriaFields = document.querySelectorAll('.inline-edition > .form-control'),
        fnStartEditing,
        fnCancelLastEditing,
        fnRespondEscapeKey,
        oLastEditing;

    /**
     * Essa função é chamada quando o usuário pressiona uma tecla. Ela libera o modo
     * de edição para o campo em foco e cancela edições não salvas de outros campos.
     * Se o usuário pressionar a tecla ESC, cancela a edição.
     * @returns {undefined}
     */
    fnStartEditing = function (e) {
        if (!oLastEditing || oLastEditing !== this) {
            // Desfaz a alteração não salva anterior
            fnCancelLastEditing();

            // Apresenta o campo no modo de edição
            this.parentNode.classList.add('editing');
            oLastEditing = this;
        }
    };

    /**
     * Cancela uma edição não salva e retorna o campo ao estado inicial.
     * @returns {undefined}
     */
    fnCancelLastEditing = function () {
        if (!!oLastEditing) {
            oLastEditing.parentNode.classList.remove('editing');
            oLastEditing.form.reset();
            if (document.activeElement === oLastEditing) {
                oLastEditing.blur();
            }
            oLastEditing = null;
        }
    };

    /**
     * Verifica se a tecla ESC é pressionada e chama a função fnCancelLastEditing
     * quando esse evento ocorre.
     * @returns {undefined}
     */
    fnRespondEscapeKey = function (e) {
        if (!!oLastEditing) {
            if (e.key === "Escape" || e.which === 27 || e.keyCode === 27 || e.charCode === 27) {
                fnCancelLastEditing();
            }
        }
    };

    // Observa o início da digitação.
    Array.prototype.forEach.call(aoMateriaFields, function (v) {
        v.addEventListener('input', fnStartEditing, false);

        // Impede que a tecla ENTER envie o formulário desnecessariamente.
        v.form.addEventListener('submit', function (e) {
            if (!oLastEditing || oLastEditing.form !== document.activeElement.form) {
                e.preventDefault();
                return false;
            }
        }, false);
    });

    // Observa a tecla ESC
    document.addEventListener('keyup', fnRespondEscapeKey, false);
};

chrono.fnLinkConfirmations = function () {
    'use strict';

    var aoLinks = document.querySelectorAll('a[data-confirm]');
    Array.prototype.forEach.call(aoLinks, function (v) {
        v.addEventListener('click', function (e) {
            e.preventDefault();
            if (window.confirm(this.getAttribute('data-confirm') || 'Tem certeza?')) {
                location.href = this.getAttribute('href');
            }
            this.blur();
        }, false);
    });
};

chrono.fnAutocloseAlerts = function () {
    'use strict';

    setTimeout(function () {
        var aoLinks = document.querySelectorAll('.alert');
        Array.prototype.forEach.call(aoLinks, function (v) {
            v.classList.add('closing');
            setTimeout(function () { v.remove(); }, 500);
        });
    }, 10000);
};

// Inicialização
window.addEventListener('load', function () {
    'use strict';
    var i;
    for (i in chrono) {
        if (typeof chrono[i] === 'function' && i.substr(0, 2) === 'fn') {
            chrono[i]();
        }
    }
}, false);
