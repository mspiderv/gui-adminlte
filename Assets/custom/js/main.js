function assetsLoaded()
{
	/* iCheck */
	if ($(':radio, :checkbox').length > 0)
	{
		var checkboxCfg = window.cfg['gui-adminlte.icheck.checkbox'];
		var radioCfg = window.cfg['gui-adminlte.icheck.radio'];

		$('input').iCheck({
	        checkboxClass: 'icheckbox_' + checkboxCfg.class,
	        radioClass: 'iradio_' + radioCfg.class
	    });
	}

	/* Select2 */
	if (typeof $.fn.select2 == 'function')
	{
		$('select').css('width', '100%').select2();
	}
}