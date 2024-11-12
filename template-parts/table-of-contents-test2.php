<?php
/**
 * Template part for displaying the table of contents demo
 */
?>
<nav id="toc" class="table-of-contents">
    
    <header>Contents</header>
    <button id="toc-toggle" class="toc-heading" aria-expanded="false">
      Contents
      <svg class="expand-icon--plus-minus" viewBox="0 0 10 10" aria-hidden="true" focusable="false">
        <rect class="vert" height="8" width="2" y="1" x="4" />
        <rect height="2" width="8" y="4" x="1" />
      </svg>
    </button>
    <ul class="content-list">
      <li>
        <a href="#section-1">Main Topic Heading Text</a>
        <ul>
          <li><a href="#section-1-1">Sub-topic I Heading Text</a></li>
          <li><a href="#section-1-2">Sub-topic II Heading Text</a></li>
        </ul> 
      </li>
      <li>
        <a href="#section-2">Main Topic II Heading Text</a>
      </li>
      <li>
        <a href="#section-3">Main Topic III Heading Text</a>
        <ul>
          <li><a href="#section-3-1">Sub-topic I Heading Text</a></li>
        </ul> 
      </li>
    </ul>
</nav>