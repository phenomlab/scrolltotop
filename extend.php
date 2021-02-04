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
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Frontend('forum'))
	->css(__DIR__ . '/resources/css/style.css')
        ->content(function (Document $document) {
$document->body[] = <<<HTML
HTML;
            $document->foot[] = <<<HTML
<a id="btt"><i class="fas fa-chevron-up"></i></a>
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
HTML;
        })
];
