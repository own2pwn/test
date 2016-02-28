var $engine = $.extend(true, {}, $main);
$engine.listPath = '/admpanel/engine';

$engine.initSearchPage = function() {
    $engine.listColumns = [
        {data: 'id'},
        {data: 'name'}
    ];
    $engine.initSearch();
};

$engine.initEditPage = function() {
    $engine.initForm();
};

$engine.init();
