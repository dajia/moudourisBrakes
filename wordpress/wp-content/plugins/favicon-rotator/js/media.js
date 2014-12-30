/**
 * Media
 * @package Favicon Rotator
 * @author Archetyped
 */

if ( typeof(fvrt) == 'undefined' || typeof(fvrt) != 'object' )
	fvrt = {};
(function($) {
	fvrt['media'] = {
		/**
		 * Set selected image as an icon in rotation
		 * @param object a Media arguments
		 * Arguments
		 * 	id: Attachment ID
		 *  name: Attachment file name
		 *  url: Attachment URL
		 */
		setIcon : function (a) {
			if ( typeof(a) == 'object' && fvrt.addItem ) {
				fvrt.addItem(a);
			}
			//Close popup
			tb_remove();
		}
	}
})(jQuery);
