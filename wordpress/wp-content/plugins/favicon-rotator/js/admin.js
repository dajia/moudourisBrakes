/**
 * Admin JS
 * @package Favicon Rotator
 */

/* Prototypes */

if ( !Array.indexOf ) {
	Array.prototype.indexOf = function(val) {
		for ( var x = 0; x < this.length; x++ ) {
			if ( this[x] == val )
				return x;
		}
		return -1;
	}
}

if ( typeof(fvrt) != 'object' )
	fvrt = {};
(function($) {
	/**
	 * Initialization routines
	 */
	fvrt.init = function() {
		this.setupActions();
	};
	
	fvrt.sel = {
		msg_empty: '#fv_msg_empty',
		item_wrap: '#fv_item_wrap',
		item_temp: '#fv_item_temp',
		item: '.fv_item',
		image: '.icon',
		details: '.details',
		name: '.name',
		remove: '.remove',
		field: '#fv_id',
	};
	
	/**
	 * Setup event actions for icon elements
	 */
	fvrt.setupActions = function() {
		//Get remove links on page
		var t = this;
		$(this.buildSelector('item', 'remove')).live('click', function() {
			t.removeItem(this);
			return false;
		});
	};
	
	/**
	 * Build selector string from variable number of parameters
	 */
	fvrt.getSelector = function() {
		var sep = '_', args = [];
		for ( var i = 0; i < arguments.length; i++ ) {
			args.push(arguments[i]);
		}
		return args.join(sep);
	};
	
	fvrt.buildSelector = function() {
		var sel = [];
		for ( var i = 0; i < arguments.length; i++ ) {
			if ( arguments[i] in this.sel ) {
				sel.push(this.sel[arguments[i]]);
			}
		}
		return sel.length ? sel.join(' ') : '';
	};
	
	/**
	 * Retrieve IDs hidden field
	 * @return object IDs field
	 */
	fvrt.getField = function(itype) {
		return $(this.getSelector(this.sel.field, itype));
	};
	
	/**
	 * Gets IDs of icons
	 * @return array Icon IDs
	 */
	fvrt.getIds = function(itype) {
		var ids = [];
		var idVal = $(this.getField(itype)).val();
		if ( idVal.toString().length > 0 ) {
			ids = idVal.split(',');
		}
		return ids;
	};
	
	/**
	 * Check if ID is already added
	 * @param int itemId Icon ID
	 * @return bool TRUE if icon is already added
	 */
	fvrt.hasId = function(img) {
		return ( this.getIds(img.type).indexOf(img.id) != -1 ) ? true : false; 
	};
	
	/**
	 * Sets list of Icon IDs
	 * @param array Icon IDs
	 */
	fvrt.setIds = function(ids, itype) {
		$(this.getField(itype)).val(ids.join(','));
	};
	
	/**
	 * Determine if icon type can support mutliple icons
	 * @param string itype Icon type
	 * @return bool TRUE if type supports multiple icons
	 */
	fvrt.isMulti = function(itype) {
		//Get wrapper
		var w = (this.getSelector(this.sel.item_wrap, itype));
		//Check for class
		return $(w).hasClass('multi');
	}
	
	/**
	 * Add ID to IDs field
	 * @param int itemId Attachment ID to add
	 */
	fvrt.addId = function(img) {
		if ( !this.hasId(img) ) {
			var vals;
			//Append ID to field if multiple images are supported
			if (this.isMulti(img.type)) {
				vals = this.getIds(img.type);
				vals.push(img.id);
			} else {
				//Set single ID if only one image supported
				vals = [img.id];
			}
			this.setIds(vals, img.type);
		}
	};
	
	/**
	 * Remove ID from IDs field
	 * @param int itemId Icon ID to remove
	 * @param string itype Icon type
	 */
	fvrt.removeId = function(itemId, itype) {
		var vals = this.getIds(itype);
		var idx = vals.indexOf(itemId);
		if ( idx != -1 )
			vals.splice(idx, 1);
		this.setIds(vals, itype);
	};
	
	/**
	 * Split element ID segments into array
	 * @param {Object} el Node element
	 * @return array ID segements
	 */
	fvrt.getItemIdParts = function(el) {
		return $(el).attr('id').split('_');
	};
	
	/**
	 * Retrieve specific segment of ID
	 * @uses fvrt.getItemIdParts to get all parts
	 * @param {Object} el Node element
	 * @param int part Index of segment
	 * @return string Specific segment (empty string if segment is higher than number of parts)
	 */
	fvrt.getItemIdPart = function(el, part) {
		var parts = this.getItemIdParts(el);
		if ( part < 0 )
			part = parts.length + part;
		return ( part >= 0 && part < parts.length ) ? parts[part] : '';
	};
	
	/**
	 * Get Icon ID of specified item
	 * @param {Object} el Node element
	 * @return string Icon ID
	 */
	fvrt.getItemId = function(el) {
		return this.getItemIdPart(el, -1);
	};
	
	/**
	 * Get Icon Type of specified item
	 * @param {Object} el Node element
	 * @return string Icon type
	 */
	fvrt.getItemType = function(el) {
		return this.getItemIdPart(el, -2);
	};
	
	/**
	 * Add item to list
	 * @param object args Icon properties
	 *   id: Attachment ID
	 *   name: File name
	 *   url: Attachment URL
	 */
	fvrt.addItem = function(img) {
		if ( typeof img != 'object' )
			return false;
		if ( img.type_name )
			img.type = img.type_name;
		if ( img.id && img.name && img.url && img.type && !this.hasId(img)) {
			//Build new item
			var	id_base = img.type + '_' + img.id,
				item = $(this.getSelector(this.sel.item_temp, img.type)).clone(),
				item_wrap = this.getSelector(this.sel.item_wrap, img.type);	
			$(item).attr('id', 'fv_item_' + id_base);
			$(item).find(this.sel.image).attr('src', img.url);
			$(item).find(this.sel.name).text(img.name);
			$(item).find(this.sel.remove).attr('id', 'fv_id_' + id_base);

			//Remove item(s) from container if multiple icons are not supported
			if ( !this.isMulti(img.type) )
				$(item_wrap).empty();

			//Add element to container
			$(item).appendTo(item_wrap);

			//Add element ID to list
			this.addId(img);
			this.setMessageVisibility(img.type);
		}
	};
	
	/**
	 * Remove item from list
	 * @param {Object} el Node to remove
	 */
	fvrt.removeItem = function(el) {
		//Get ID of item
		var id = this.getItemId(el);
		var itype = this.getItemType(el);
		
		//Remove item
		$(el).parents(this.sel.item).remove();
		//Remove ID from field
		this.removeId(id, itype);
		
		this.setMessageVisibility(itype);
	};
	
	/**
	 * Hide/Show message based on number of items in container
	 * @param {Object} itype Icon type
	 */
	fvrt.setMessageVisibility = function(itype) {
		var msg = this.getSelector(this.sel.msg_empty, itype);
		if (this.getIds(itype).length)
			$(msg).hide();
		else {
			$(msg).show();
		}
	};
	
	//Initialize on document load
	$(document).ready(function() {fvrt.init();});
}) (jQuery);