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
       var html ='<h1>Novo Janela de Bate Papo</h1><br/><br/>'
       html += '<div id="groupList">Carregando...</div>'

       html += '<hr/><button onclick="fecharModal()">fechar janela</button>'
      
       $('.modal_area').html(html);
       $('.modal_bg').show();

       chat.loadGroupList(function(json){
            var html = '';
                    
            for(var i in json.list){
                html += '<button data-id="'+json.list[i].id+'">'+json.list[i].name+'</button>';
            }

            $('#groupList').html(html);

            $('#groupList').find('button').on('click', function(){
                var cid = $(this).attr('data-id');
                var cnm = $(this).text();

                chat.setGroup(cid, cnm);
                $('.modal_bg').hide();
            });
       });

    })
});

