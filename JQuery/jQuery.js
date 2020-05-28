$(function(){
// 1. 「全選択」する
  $('#all').on('click', function() {
    $("input[name='check[]']").prop('checked', this.checked);
    console.log("dd");
  });

  $('.custom-file-input').on('change',function(){
    $(this).next('.custom-file-label').html($(this)[0].files[0].name);
    $(this).next('.custom-file-label').css('overflow','hidden');
  })



});
