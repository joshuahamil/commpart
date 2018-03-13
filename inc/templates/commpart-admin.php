<h1>Community Partners Manage Staff & Board</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
    <?php settings_fields( 'commpart_staff-group' ); ?>
    <?php do_settings_sections( 'commpart_staff' ); ?>
    <?php submit_button(); ?>
    <select name="current_staff_edit" id="current_staff">
        <option value="0">Executive Director</option>
        <option value="1">Volunteer Coordinator</option>
        <option value="2">Caregiver Counsellor</option>
        <option value="3">Health & Wellness Coordinator</option>
        <option value="4">Social Programming Coordinator</option>
    </select>
</form>

<!--
	<svg width="350" height="350">
		  <g
     inkscape:label="Layer 1"
     inkscape:groupmode="layer"
     id="layer1">
    <rect
       id="box1"
       width="81.935486"
       height="81.935486"
       x="1.3655914"
       y="213.69891"
       style="fill:none;stroke:#852e8c;stroke-width:2.73118281;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />
    <ellipse
       style="fill:none;stroke:#852e8c;stroke-width:3.50268435;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
       id="path4510"
       cx="40.632366"
       cy="256.36758"
       rx="24.706989"
       ry="24.706991" />
    <path
       style="fill:none;stroke:#852e8c;stroke-width:2.64583325;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
       d="m 59.638271,296.19635 c 8.40998,-8.59896 -3.59077,-21.82813 -3.59077,-21.82813"
       id="path4548-4"
       inkscape:connector-curvature="0" />
    <path
       style="fill:none;stroke:#852e8c;stroke-width:2.64583325;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
       d="m 21.037933,296.5567 c -8.40998,-8.59896 3.59077,-21.82813 3.59077,-21.82813"
       id="path4548-4-1"
       inkscape:connector-curvature="0" />
  </g>
	</svg>
-->