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
