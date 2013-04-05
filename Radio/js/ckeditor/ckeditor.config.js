var ckeConfig;

jQuery(document).ready(function() {
	ckeConfig = {
		language: 'pl',
		uiColor: 'transparent',
		docType: '<!DOCTYPE HTML>',
		toolbar: [{
			name: 'styles', 
			items : [ 'Maximize', 'Source', 'Format' ]
		},
		{
			name: 'basicstyles', 
			items : [ 'TextColor', 'BGColor', '-', 'Bold', 'Italic', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat', '-', 'Link', 'Unlink' ]
		},
		{
			name: 'clipboard', 
			items : [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ]
		},
		{
			name: 'paragraph', 
			items : [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ]
		},
		{
			name: 'insert', 
			items : [ 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar' ]
		}]};
});