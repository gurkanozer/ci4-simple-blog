$(document).ready(function () {
  /*Disable form default action*/
  $(".none-action-form").submit(function (e) {
    e.preventDefault();
  });
  /*Edit Item */
  $(".edit-item-btn").on("click", function () {
    var data = $(this).data("title");
    var url = $(this).data("url");
    Swal.fire({
      title: "Düzenle",
      input: "text",
      inputValue: data,
      inputAttributes: {
        autocapitalize: "off",
      },
      showCancelButton: true,
      confirmButtonText: "Kaydet",
      cancelButtonText: "İptal",
      showLoaderOnConfirm: true,
      allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
      if (result.isConfirmed) {
        post(url, { title: result.value });
      }
    });
  });
  /*Set Is Active*/
  $(".content-container").on("change", ".is-active", function () {
    let $url = $(this).data("url");
    let $data = $(this).prop("checked");
    if (typeof $data !== "undefined" && typeof $url !== "undefined") {
      $.ajax({
        url: $url,
        data: { data: $data },
        type: "post",
        cache: false,
        success: function (response) {
          console.log(response);
        },
        error: function (response) {
          console.log(response);
        },
      });
    }
  });
  /*Remove Item*/
  $(".content-container").on("click", ".remove-item-btn", function () {
    let $url = $(this).data("url");
    let $data = $(this).data("id");
    Swal.fire({
      title: "Emin misiniz?",
      text: "Bu işlem geri alınamaz!",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Evet, sil!",
      cancelButtonText: "Hayır, iptal!",
    }).then((result) => {
      if (result.isConfirmed) {
        post($url, { data: $data })
      }
    });
  });
  /*Add Item*/
  $(".none-action-form").on("click", ".add-item-btn", function () {
    let $url = $(this).data("url");
    let $data = bring_data_from_form(".none-action-form");
    post($url, $data).then((response) => {
      console.log(response)
    });
  });
  /*Bring Data from Form*/
  bring_data_from_form = function (form) {
    var x = $(form).serializeArray();
    datas = {};
    $.each(x, function (i, field) {
      datas[field.name] = field.value;
      y = field.name;
      $("#" + y).val("");
    });
    console.log(datas);
    return datas;
  };
  /*Post Data and Render*/
  post = function (url, data) {
    return $.ajax({
      url: url,
      data: data,
      type: "post",
      cache: false,
      contentType: "application/x-www-form-urlencoded;charset=utf-8",
      success: function (response) {
        render(response);
      },
      error: function (response) {
        console.log(response);
      },
    });
  };
  render = function (data) {
    $(document.body).html(data);
  };
  //------------------------------------
});
