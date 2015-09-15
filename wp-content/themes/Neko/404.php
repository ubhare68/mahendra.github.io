<?php get_header(); ?>
<div id="content" class="narrowcolumn" style="border:0px;">
<div class="post">
<div class="entry">
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td class="titlebg">Error</td>
</tr>
<tr>
<td>
<fieldset>
<legend>404 Page Not Found</legend>
<strong>Sorry but this page doesn't exist. </strong>
<br />
You could try going <a href="javascript:history.back()">&laquo; back</a> or maybe you can find what your looking for below:
<br />
<div class="new-stuff">
<?php get_archives('postbypost', 10); ?>
</div>
</fieldset>
</td>
</tr>
</table>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>