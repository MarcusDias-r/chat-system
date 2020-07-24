function addGroupModal(){
    var html = '<h1>Criar Nova Sala</h1>';

    html +='<input type="text" id="newGroupName" placeholder="Digita o nome da sala"/>';
   
    html +='<br/><button id="newGroupButton">Cadastrar</button>'

    html +='<hr/>';
    html +='<button onclick="fecharModal()">Fechar Janela</button>';

    $('.modal_area').html(html);
    $('.modal_bg').show();

    $('#newGroupButton').on('click', function(){
        var newGroupName = $('#newGroupName').val();

        if(newGroupName != ''){
            chat.addNewGroup(newGroupName, function(json){
                if(json.error == '0'){

                    $('.add_tab').click();//Abre modal anterior com a nova sala criada
                }else{
                    alert(json.errorMsg);
                }
            });
        }
    });
}

function fecharModal(){
    $('.modal_bg').hide();
}

$(function(){

   $('.add_tab').on('click', function(){
       var html ='<h1>Novo Janela de Bate Papo</h1><br/><br/>'
       html += '<div id="groupList">Carregando...</div>'
       html += '<hr/>';
       html += '<button onclick="addGroupModal()">Criar Nova Sala</button>'
       html += '<button onclick="fecharModal()">fechar janela</button>'
      
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

    $('nav ul').on('click', 'li', function(){//evendo de click em grupos abertos
        var id= $(this).attr('data-id');

       chat.setActiveGroup(id);
    });

    $('#sender_input').on('keyup', function(e){
        
        if(e.keyCode == 13){
            var msg = $(this).val();
            $(this).val('');

            chat.sendMessage(msg);
        }

    })
});

