// Return a helper with preserved width of cells
var fixHelper = function(e, ui){
    ui.children().each(function(){
        $(this).width($(this).width());
    });
    return ui;
};

$(function() {
    
    // Classes
    datatable = {};
    datatable.sortgroupped_class = 'ui-sortable-grouped';
    datatable.sortgroupped_class_main = 'ui-sortable-grouped-main';
    datatable.unactive_class = 'ui-sortable-unactive';
    datatable.sorting_class = 'ui-sortable-sorting';

    /* Functions */
    function saveSort(model, ids, orders)
    {
        console.log(model, ids, orders);
    }
        
    function stop_sorting()
    {
        $('.datatable tbody').removeClass(datatable.sorting_class);
        $('.datatable tbody tr').removeClass(datatable.unactive_class);
    }
        
    function find_tree(element)
    {
        var cur_level = element.find('[data-level]').data('level');
        if(typeof cur_level == 'undefined') cur_level = 0;
        var go_next = true;
        var next = element;
        while(go_next)
        {
            next = next.next();
            var next_level = next.find('[data-level]').data('level');
            if(typeof next_level == 'undefined') next_level = 0;
            if(next_level > cur_level) next.addClass('temporary_class');
            else go_next = false;
        }
        var result = $('.temporary_class');
        result.removeClass('temporary_class');
        return result;
    }

    $('.datatable tbody tr[data-sortgroup]')
    .unbind('mouseover mouseout')
    .on('mouseover', function() {
        $('.datatable tbody tr[data-sortgroup]').removeClass(datatable.sortgroupped_class);
        $(this).addClass(datatable.sortgroupped_class + ' ' + datatable.sortgroupped_class_main);
        find_tree($(this)).addClass(datatable.sortgroupped_class);
        if($('tr[data-sortgroup="' + $(this).data('sortgroup') + '"]').length > 1)
        {
            $(this).parent('tbody').find('tr td .handle').on('mousedown', function(){
                datatable.length_dropdown.val(datatable.length_dropdown.find('option').last().val())
                stop_sorting();
            });
            var sortable_group = $(this).data('sortgroup');
            var sortable_items_selector = 'tr[data-sortgroup="' + sortable_group + '"]:visible';
            var sortable_items_object = $(sortable_items_selector);
            $(this).parent('tbody').sortable({
                helper: fixHelper,
                items: sortable_items_selector,
                axis: 'y',
                handle: '.handle',
                start: function(event, ui) {
                    $(this).addClass(datatable.sorting_class);
                    $(this).find('tr').removeClass(datatable.unactive_class).each(function(){
                        if($(this).data('sortgroup') != ui.helper.data('sortgroup')) $(this).addClass(datatable.unactive_class);
                    });
                    datatable.main_row = $(this).find('tr[data-sortgroup].' + datatable.sortgroupped_class + '.' + datatable.sortgroupped_class_main);
                    datatable.sub_rows = $(this).find('tr[data-sortgroup].' + datatable.sortgroupped_class + ':not(.' + datatable.sortgroupped_class_main + ')');
                    datatable.this_prev = $($(ui.item).prevAll('tr[data-sortgroup="' + $(ui.item).data('sortgroup') + '"]')[0]);
                    datatable.this_prev_childs = find_tree(datatable.this_prev);
                    datatable.this_next = $($(ui.item).nextAll('tr[data-sortgroup="' + $(ui.item).data('sortgroup') + '"]')[0]);
                    datatable.this_next_childs = find_tree(datatable.this_next);
                },
                update: function(event, ui) {
                    datatable.main_row.after(datatable.sub_rows);
                    datatable.this_prev.after(datatable.this_prev_childs);
                    datatable.this_next.after(datatable.this_next_childs);
                    var result = $(this).sortable("toArray");
                    var sortable_items_ids = new Array();
                    sortable_items_object.each(function(){
                        sortable_items_ids.push($(this).attr('id'));
                    });
                    saveSort(ui.item.data('table'), sortable_items_ids, result);
                    var aoData = datatable.object.fnSettings().aoData;
                    var aoData_sort = [];
                    sortable_items_object.each(function(){
                        for(var aoData_index in datatable.object.fnSettings().aoData)
                        {
                            if(typeof aoData[aoData_index] == "object" && aoData[aoData_index].nTr == this) aoData_sort.push(aoData_index);
                        }
                    });
                    function getNode(id)
                    {
                        for(var node in aoData)
                        {
                            if(typeof aoData[node] == "object" && aoData[node].nTr.id == id && $(aoData[node].nTr).data('sortgroup') == sortable_group) return aoData[node];
                        }
                    }
                    // TODO: Clone array
                    //var new_aoData = datatable.object.fnSettings().aoData;
                    var new_aoData = [];
                    aoData.forEach(function(item){
                        new_aoData.push(item);
                    });
                    for(var index in aoData_sort)
                    {
                        var new_object = getNode(result[index]);
                        if(typeof new_object == "object") new_aoData[aoData_sort[index]] = new_object;
                    }
                    datatable.object.fnSettings().aoData = new_aoData;
                    sorting_changing = false;
                },
                stop: function(event, ui){
                    stop_sorting();
                    $(this).find('tr').show().css('display', 'table-row');
                    sorting_changing = false;
                }
            });
        }
    })
    .on('mouseout', function(){
        $('.datatable tbody tr[data-sortgroup]').removeClass(datatable.sortgroupped_class + ' ' + datatable.sortgroupped_class_main);
    });

    /* Level Icons Genertion */
    $('table tr[data-level]').each(function() {
        var tr = $(this);
        var level = parseInt(tr.data('level'));

        if(level > 0)
        {
            var td = tr.children('td:first-child');
            var handle = td.find('.handle')[0];
            var handle_html = (typeof handle == 'undefined') ? '' : handle.outerHTML;
            var pre = '';

            for(level; level > 0; level--)
            {
                pre += '<span class="pre fa fa-angle-right"></span>';
            }

            if (typeof handle != 'undefined')
            {
                handle.remove();
            }

            td.html(handle_html + pre + td.html());
        }
    });
    
    datatable.languages = new Array();
    
    datatable.languages['sk'] = {
        "sProcessing":   "Pracujem...",
        "sLengthMenu":   "Zobraz _MENU_ záznamov",
        "sZeroRecords":  "Neboli nájdené žiadne záznamy",
        "sInfo":         "Záznamy _START_ až _END_ z celkovo _TOTAL_",
        "sInfoEmpty":    "Záznamy 0 až 0 z celkovo 0",
        "sInfoFiltered": "(filtrovanť z celkovo _MAX_ záznamov)",
        "sInfoPostFix":  "",
        "sSearch":       "Hľadaj:",
        "sUrl":          "",
        "oPaginate": {
            "sFirst":    "Prvá",
            "sPrevious": "Predchádzajúca",
            "sNext":     "Ďalšia",
            "sLast":     "Posledná"
        }
    };
    
    // TODO: Zlangovat datatables
    
    datatable.languages['en'] = {
        "sEmptyTable":     "No data available in table",
        "sInfo":           "Showing _START_ to _END_ of _TOTAL_ entries",
        "sInfoEmpty":      "Showing 0 to 0 of 0 entries",
        "sInfoFiltered":   "(filtered from _MAX_ total entries)",
        "sInfoPostFix":    "",
        "sInfoThousands":  ",",
        "sLengthMenu":     "Show _MENU_ entries",
        "sLoadingRecords": "Loading...",
        "sProcessing":     "Processing...",
        "sSearch":         "Search:",
        "sZeroRecords":    "No matching records found",
        "oPaginate": {
            "sFirst":    "First",
            "sLast":     "Last",
            "sNext":     "Next",
            "sPrevious": "Previous"
        },
        "oAria": {
            "sSortAscending":  ": activate to sort column ascending",
            "sSortDescending": ": activate to sort column descending"
        }
    };
    
    $('.datatable').each(function(){
        var $this = $(this);
        if($this.find('tr[data-sortgroup]').length > 0) $this.removeClass('datatable-sorting');

        datatable.object = $(this).dataTable({
            "bJQueryUI": true,
            "bSort": $this.hasClass('datatable-sorting'),
            "iDisplayLength": -1,
            "aLengthMenu": [
                 [10, 20, 30, 60, 100, 200, -1],
                 [10, 20, 30, 60, 100, 200, "všetky"]
             ],
            // TODO
            "oLanguage": datatable.languages['sk'],
            //"fnDrawCallback": page.ezmark
        });
        
        datatable.length_dropdown = $(this).parent('.dataTables_wrapper').find('.dataTables_length select');
        datatable.filter_input = $(this).parent('.dataTables_wrapper').find('.dataTables_filter input');
        
    });
    
    /* Keyboard Controlled Datatables */
    $(window).on('keydown', function(e){
        if(!$('*:focus').is('textarea, input, select') && $('.datatable').is(':visible')) {
            if(e.keyCode == $.ui.keyCode.LEFT) datatable.object.fnPageChange('previous');
            else if(e.keyCode == $.ui.keyCode.UP){
                var $DataTables_length = $('#DataTables_Table_0_length');
                var $prev = $DataTables_length.find(':selected').prev();
                if($prev.is('option')){
                    $DataTables_length.find('option').removeAttr('selected');
                    $prev.attr('selected', 'selected');
                }
                $DataTables_length.find('select').trigger('change');
            }
            else if(e.keyCode == $.ui.keyCode.DOWN){
                var $DataTables_length = $('#DataTables_Table_0_length');
                var $next = $DataTables_length.find(':selected').next();
                if($next.is('option')){
                    $DataTables_length.find('option').removeAttr('selected');
                    $next.attr('selected', 'selected');
                }
                $DataTables_length.find('select').trigger('change');
            }
            else if(e.keyCode == $.ui.keyCode.RIGHT) datatable.object.fnPageChange('next');
            else if(e.keyCode == $.ui.keyCode.ENTER){
                var $first_row = $('.datatable').find('a').first();
                if(typeof $first_row != 'undefined') $first_row.trigger('click');
            }
            else if(!e.ctrlKey && e.keyCode >= 32) $('.dataTables_filter :input').focus();
        }
    });

});
