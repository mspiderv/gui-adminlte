function assetsLoaded()
{
	/* iCheck */
	if ($(':radio, :checkbox').length > 0)
	{
		var checkboxCfg = window.cfg['gui.icheck.checkbox'];
		var radioCfg = window.cfg['gui.icheck.radio'];

		$('input').iCheck({
	        checkboxClass: 'icheckbox_' + checkboxCfg.style + '-' + checkboxCfg.color,
	        radioClass: 'iradio_' + radioCfg.style + '-' + radioCfg.color
	    });
	}

	/* Select2 */
	if (typeof $.fn.select2 == 'function')
	{
		$('select').css('width', '100%').select2();
	}
}