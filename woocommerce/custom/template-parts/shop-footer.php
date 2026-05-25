<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


use RT\Blenco\Helpers\Fns;


?>
		</main>
			</div>
				<?php
				if ( is_active_sidebar( Fns::default_sidebar('woo-archive') ) ) {
					blenco_sidebar( Fns::default_sidebar('woo-archive')  );
				} else {
					blenco_sidebar( Fns::default_sidebar('main') );
				}
				?>
			</div>
		</div>
	</div>
</div>
