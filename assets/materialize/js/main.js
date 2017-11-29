// Quando incicializar o JS
$(document).ready(function(){
    // Modal -> Aviso na tela
    $('.modal').modal();
    // Select -> Define Seleção
    $('select').material_select();
    // Button-collapse -> Botão responsivo
    $(".button-collapse").sideNav();
    // tooltipped -> Tooltips são pequenas e interativas dicas textuais principalmente para elementos gráficos. Quando usados ícones para ações você pode usar um tooltip para esclarecer aquela ação para as pessoas.
    $('.tooltipped').tooltip({delay: 50});
    $('.delete').tooltip({delay: 20, position: 'top', tooltip: "Deletar"});
    $('.edit').tooltip({delay: 20, position: 'top', tooltip: "Editar"});
    $('.view').tooltip({delay: 20, position: 'top', tooltip: "Visualizar"});

    // Datepicker
    var diaSemana = [ 'Domingo', 'Segunda-Feira', 'Terca-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado' ];
    var mesAno = [ 'Janeiro', 'Fevereiro', 'Marco', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ];
    var data = new Date();
    var hoje = data.getDate() + ', ' + mesAno[data.getMonth()] + ' de ' + data.getFullYear();

    $(".datepicker").attr("value", hoje);
    $(".datepicker").pickadate({
        monthsFull: mesAno,
        monthsShort: [ 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ],
        weekdaysFull: diaSemana,
        weekdaysShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' ],
        weekdaysLetter: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S' ],
        selectMonths: true,
        selectYears: true,
        clear: false,
        format: 'd/mm/yyyy',
        today: "Hoje",
        close: "X",
        min: new Date(data.getFullYear(), 0),
        max: new Date(data.getFullYear() + 5, 11, 31),
        closeOnSelect: true
    });
  

    $(".datepicker").click(function (event) {
        event.stopPropagation();
        $(".datepicker").first().pickadate("picker").open();
    });
});
    