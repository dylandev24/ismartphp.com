/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	config.allowedContent = true;
    config.filebrowserBrowseUrl = 'public/js/plugins/ckfinder/ckfinder.html';
    config.filebrowserUploadUrl = 'public/js//plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
};
