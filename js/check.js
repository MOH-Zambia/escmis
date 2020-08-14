$(function(){
 
    // add multiple select / deselect functionality
    $("#delete").click(function () {
          $('.chk').attr('checked', this.checked);
    });
 
    // if all checkbox are selected, check the selectall checkbox
    // and viceversa
    $(".case").click(function(){
 
        if($(".chk").length == $(".chk:checked").length) {
            $("#delete").attr("checked", "checked");
        } else {
            $("#delete").removeAttr("checked");
        }
 
    });
});