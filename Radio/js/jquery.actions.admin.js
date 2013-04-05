var baseUrl;

$(function() {
	baseUrl = $.url.attr('protocol') + '://' + $.url.attr('host') + '/';

	$('#topBar a.button.home').button({
		icons: {
			primary: 'ui-icon-home'
		},
		text: false
	}).next('a.button.logout').button({
		icons: {
			primary: 'ui-icon-key'
		},
		text: false
	}).next('a.button.tools').button({
		icons: {
			primary: 'ui-icon-gear'
		},
		text: false
	}).parent().buttonset();

	$('.pagination').buttonset();

	if ($('#infoBox').length) {
		setTimeout(function() {
			$('tr td#infoBox div').slideUp('slow');
		}, 5000);
	}
});