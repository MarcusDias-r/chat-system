function abrirChat(){
    var cid = $('#chat_id').val();
    var cnm = $('#chat_nome').val();

    chat.setGroup(cid, cnm);
    $('.modal_bg').hide();//esconde modal

}
function fecharModal(){
    $('.modal_bg').hide();
}
$(function(){

   $('.add_tab').on('click', function(){
       var html ='<h1>Novo Janela de Bate Papo</h1><input type="text" id="chat_id" placeholder="Digite o Id do chat."><br/><br/>'
       html += '<input type="text" id="chat_nome" placeholder="Digite o Nome do chat."><br/><br/>'
       html += '<button onclick="abrirChat()">Abrir</button><br/><br/><hr/>'; 
       html += '<button onclick="fecharModal()">fechar janela</button>'
       $('.modal_area').html(html);
      
       $('.modal_bg').show();
    /*  var chatId = window.prompt("Digite o ID do chat:");
        var chatName = window.prompt("Digite o nome do chat:");

        chat.setGroup(chatId, chatName);*/
    })
});// ASSISTIR AULA  10 A 15