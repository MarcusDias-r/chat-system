var chat = {

    groups:[],
    groupList:[],

    setGroup:function(id, name){
        var found = false;

        for(var i in this.groups){
            if(this.groups[i].id == id){
                found = true;
            }
        }

        if(found === false){
            this.groups.push({
                id:id,
                name:name
            });
        }

        this.updateGroupView();
    },

    getGroups:function(){
        return this.groups;
    },
    
    loadGroupList:function(ajaxCallback){
        $.ajax({
            url:BASE_URL+'ajax/get_groups',
            type:'GET',
            dataType:'json',
            success:function(json){
                if(json.status == '1'){
                  ajaxCallback(json);
                    
                }else{
                    window.location.href = BASE_URL+'login';
                }
            }
        })
    },
    updateGroupView:function(){
        var html = '';

        for(var i in this.groups){
            html += '<li>'+this.groups[i].name+'</li>';
        }

        $('nav ul').html(html);// .html é uma funcionalidade o jquery para alterar o html do item selecionado
    }
};
// Aula-10 a 15 ----- 41:27