/* .the_content内のyoutube埋め込みをレスポンシブ対応
*********************************************/
$('.the_content iframe[src*=youtube]').wrapAll('<div class="youtube-wrap"></div>');

/* .the_content内のiframeをレスポンシブ対応
*********************************************/
$('.the_content iframe').wrapAll('<div class="iframe-wrap"></div>');