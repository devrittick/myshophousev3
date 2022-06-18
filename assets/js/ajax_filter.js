if(document.getElementById('s').value.length<=2){

jQuery(".cat-list_item").on("click", function () {  jQuery(".cat-list_item").removeClass("active");  jQuery(this).addClass("active");  jQuery.ajax({    type: "POST",    url: "/wp-admin/admin-ajax.php",    dataType: "html",    data: {      action: "filter_projects",      category: jQuery(this).data("slug"),    },    success: function (res) {      jQuery(".project-tiles").html(res);    },  });});
}else{
jQuery("#s").on("focusout", function () {
  jQuery("#datafetch").removeClass("showdata");
});
}