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

// 編集
$(function () {
  // 編集ボタン(class="js-modal-open")が押されたら発火
  $('.js-modal-open').on('click', function () {
    // モーダルの中身(class="js-modal")の表示
    $('.js-modal').fadeIn();
    // 押されたボタンから投稿内容を取得し変数へ格納
    var post = $(this).attr('post');
    // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
    var post_id = $(this).attr('post_id');

    // 取得した投稿内容をモーダルの中身へ渡す
    $('.modal_post').text(post);
    // 取得した投稿のidをモーダルの中身へ渡す
    $('.modal_id').val(post_id);
    return false;
  });

  // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
  $('.js-modal-close').on('click', function () {
    // モーダルの中身(class="js-modal")を非表示
    $('.js-modal').fadeOut();
    return false;
  });
});
