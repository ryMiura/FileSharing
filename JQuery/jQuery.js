$(function(){


  //ダウンロードボタンをクリックしたら
  $('.dl-bt').click(function() {

    //すべてのチェック済みvalue値を取得する
    $('input:checked').each(function() {
        let r = $(this).val();

        console.log(r);
    })

})


});
