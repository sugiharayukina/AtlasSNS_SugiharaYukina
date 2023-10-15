// $(function () { // if document is ready
//   alert('hello world')
// });

// アコーディオンメニュー
$(function () {
  // タイトルをクリックすると
  $(".js-accordion-title").on("click", function () {
    // クリックした次の要素を開閉
    $(this).next().slideToggle();
    // タイトルにopenクラスを付け外しして矢印の向きを変更
    $(this).toggleClass("open");
  });
});

// 投稿フォーム
// 初期値で無効化
$(function () {
  if ($('.post-text').val().length == 0) {
    $('.post-button').prop('disabled', true);
  }

  $('.post-text').on('keydown keyup keypress change', function () {
    if ($(this).val().length == 0) {
      // 0文字の時ボタン無効
      $('.post-button').prop('disabled', true);
    } else if ($(this).val().length > 150) {
      // 150文字の時ボタン無効
      $('.post-button').prop('disabled', true);
    } else {
      // ボタン有効化
      $('.post-button').prop('disabled', false);
    }
  });
});
