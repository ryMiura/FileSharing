$(function(){
// 1. 「全選択」する
  $('#all').on('click', function() {
    $("input[name='check[]']").prop('checked', this.checked);
    console.log("dd");
  });
});
