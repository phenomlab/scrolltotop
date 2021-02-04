<?php

/*
 * A Flarum extension created by Mark Cutting.
 * Adds a simple button to scroll back to the top
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For instructions, please view the README file.
 */


use Flarum\Extend;
use Flarum\Frontend\Document;

return [
    (new Extend\Frontend('forum'))
        ->content(function (Document $document) {
            $document->foot[] = <<<HTML
<script>
 flarum.core.compat.extend.extend(flarum.core.compat['components/CommentPost'].prototype, 'oncreate', function(output, vnode) {
  const self = this;

  <a id="btt"><i class="fal fa-chevron-up"></i></a>
  <script>
  var btn = $('#btt');
  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });

  btn.on('click', function(e) {
    e.preventDefault();
   $('html, body').animate({scrollTop:0}, '300');
  });
  </script>
});
</script>
HTML;
        })
];
