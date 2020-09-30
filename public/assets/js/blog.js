$(document).ready(function () {
    $(".content-container").on("click",".more-posts",function(){
      let $data = $(this).data('count')
      $.ajax({
        url: "/",
        data: {'count':$data},
        type: "post",
        cache: false,
        contentType: "application/x-www-form-urlencoded;charset=utf-8",
        success: function (response) {
          render(response);
        },
        error: function (response) {
          console.log(response);
        },
      }).then((response) => {
            $(document.body).html(response);
            console.log(response)
          });  
    });
    //------------------------------------
  });
  