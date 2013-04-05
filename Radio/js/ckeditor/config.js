/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function(config) {
	config.language = 'pl';
	config.uiColor = 'transparent';
	config.entities = false;
	config.entities_latin = false;
	config.docType = '<!DOCTYPE HTML>';
	config.toolbar = [
	[ 'Maximize', 'Source', 'Format', 'Font', 'FontSize' ],
	[ 'TextColor', 'BGColor', '-', 'Bold', 'Italic', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat', '-', 'Link', 'Unlink' ],
	[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
	[ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote','CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ],
	[ 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar' ]
	];
};