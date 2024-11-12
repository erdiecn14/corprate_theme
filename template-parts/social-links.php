<?php
  $social = SOCIAL_MEDIA;
  $fb_url = $social['facebook']['profile_link'];
  $in_url = $social['instagram']['profile_link'];
  $tw_url = $social['twitter']['profile_link'];
  $sn_url = $social['snapchat']['profile_link'];
  $tt_url = $social['tik_tok']['profile_link'];
  $yt_url = $social['youtube']['profile_link'];

  if ( 
    empty( $fb_url ) && 
    empty( $in_url ) &&
    empty( $tw_url ) && 
    empty( $sn_url ) &&
    empty( $tt_url ) &&
    empty( $yt_url ) 
    ) {
    echo $social = '';
  }

?>

<?php if( false  ==  empty($social) ) : ?>
<ul class="social-link-list">
  <?php if ( $social['facebook']['profile_link'] ) : ?>
  <li class="social-link">
    <a href="<?= $social['facebook']['profile_link']; ?>" title="link opens in new tab" target="_blank" rel="noopener">
    <?php get_template_part('template-parts/svg/social/social','facebook.svg'); ?>
    <span class="sr-only">Facebook</span>
    </a>
  </li>
  <?php endif; ?>
  <?php if ( $social['instagram']['profile_link'] ) : ?>
  <li class="social-link">
    <a href="<?= $social['instagram']['profile_link']; ?>" title="link opens in new tab" target="_blank" rel="noopener">
    <?php get_template_part('template-parts/svg/social/social','instagram.svg'); ?>
    <span class="sr-only">Instagram</span>
    </a>
  </li>
  <?php endif; ?>
  <?php if ( $social['twitter']['profile_link'] ) : ?>
  <li class="social-link">
    <a href="<?= $social['twitter']['profile_link']; ?>" title="link opens in new tab" target="_blank" rel="noopener">
    <?php get_template_part('template-parts/svg/social/social','twitter.svg'); ?>
    <span class="sr-only">Twitter</span>
    </a>
  </li>
  <?php endif; ?>
  <?php if ( $social['snapchat']['profile_link'] ) : ?>
  <li class="social-link">
    <a href="<?= $social['snapchat']['profile_link']; ?>" title="link opens in new tab" target="_blank" rel="noopener">
    <?php get_template_part('template-parts/svg/social/social','snapchat.svg'); ?>
    <span class="sr-only">Snapchat</span>
    </a>
  </li>
  <?php endif; ?>
  <?php if ( $social['tik_tok']['profile_link'] ) : ?>
  <li class="social-link">
    <a href="<?= $social['tik_tok']['profile_link']; ?>" title="link opens in new tab" target="_blank" rel="noopener">
    <?php get_template_part('template-parts/svg/social/social','tik-tok.svg'); ?>
    <span class="sr-only">Tik Tok</span>
    </a>
  </li>
  <?php endif; ?>
  <?php if ( $social['youtube']['profile_link'] ) : ?>
  <li class="social-link">
    <a href="<?= $social['youtube']['profile_link']; ?>" title="link opens in new tab" target="_blank" rel="noopener">
    <?php get_template_part('template-parts/svg/social/social','youtube.svg'); ?>
    <span class="sr-only">YouTube</span>
    </a>
  </li>
  <?php endif; ?>
</ul>
<?php endif; ?>