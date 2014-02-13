jQuery(document).ready(function() {


  $( "body" ).on( "click", "a#edit", function() {
    event.preventDefault();
    $('#ajax_res').empty();
    bla=$(this).attr("href");
    $("#ajax_res").hide();
    $.ajax({
      type: "GET",
      url: "/site/modules/mod_modul/form.php",
      success: function (data) {
          $(data).appendTo('#ajax_res');

      }
    });

    $.ajax({
      type: "GET",
      dataType: 'json',
      url: bla,
      success: function (data) {

         $("#greeting").val(data['item']['greeting']);
          $("#id_item").val(data['item']['id']);

         $.each(data['cat'], function(key, value) {
              $('#id')
              .append($("<option></option>")
              .attr("value",value['id'])
              .text(value['category_name']))

//$(":option[name=sel][value='2']").attr(«selected»,«selected»);
      });
$("select option[value='"+data['item']['category_id']+"']").attr("selected","selected");

//$("#id").find("value=2").

 }



    });

 $("#ajax_res").fadeIn(1500);
  });

  /*$('a').click(function(event) {
    event.preventDefault();

 /*
  })*/

    // подтягивает данные по выбору определенной категории из списка.
  $('#cat').change(function() {
    $('#ajax_res').empty();
    category_id=jQuery(this).val();
    $.ajax({
      type: "GET",
      dataType: 'json',
      url: "/components/com_categoriya/select.php?id="+category_id,
      success: function (data) {
        for (var i = 0; i < data['item'].length; i++){
                   elem = data['item'][i];
          str = '<tr valign="top"><td width="305"><img src="/'+elem['img']+'" height="30"/></td><td>'+'<a href="/joml/index.php?option=com_compon&view=details&it='+elem['id']+'">'+elem['greeting']+'</a><td>'+'<a href="/index.php?option=com_categoriya&view=stati&layout=edit&id='+elem['id']+'">Изменить</a>'+'</td></tr>';
          $(str).appendTo('#ajax_res');

        }

      }
    });
  });


});

  function call() {
      var msg   = $('#forms').serialize();
        $.ajax({
          type: 'POST',
          url: 'index.php?option=com_compon&view=itemadd',
          data: msg,
          success: function() {
            $("#ajax_res").hide();
              $("#ajax_res").html('<h3 style="color:green">Изменения внесены!</h3>');
            $("#ajax_res").fadeIn(1500);
          },
          error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        });

    }